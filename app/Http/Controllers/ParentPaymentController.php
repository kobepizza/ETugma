<?php

namespace App\Http\Controllers;

use App\Events\UserNotification;
use App\Models\ApiInvoiceRequest;
use App\Models\Booking;
use App\Models\Notification;
use App\Models\Transaction;
use App\Models\TutorSession;
use App\Models\UserProfile;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;
use Xendit\Configuration;
use Xendit\Invoice\CreateInvoiceRequest;
use Xendit\Invoice\InvoiceApi;
use Xendit\Invoice\InvoiceItem;
use Illuminate\Support\Facades\Log;
use Xendit\PaymentRequest\PaymentRequestApi;
use Xendit\PaymentRequest\PaymentRequestParameters;

class ParentPaymentController extends Controller
{
    public function __construct()
    {
        Configuration::setXenditKey(env('XENDIT_SECRET_KEY'));
    }

    public function index()
    {
        // Get the guardian_id from the session (assuming session('clientMain')->id is the guardian's ID)
        $guardianId = session('clientMain')->guardian->id;

        // Fetch transactions that are associated with the current user's guardian
        // Traverse the relationships: Transaction -> Booking -> GuardianMain -> Guardian -> Compare the guardian_id
        $transaction = Transaction::whereHas('booking.guardianMain.guardian', function ($query) use ($guardianId) {
            $query->where('id', $guardianId); // Compare guardian's id with session id
        })

            ->where('paid', 1)
            ->get();

        //dd($transaction);
        // Return the view with the filtered transactions
        return view('parent.parenttransaction', compact('transaction'));
    }

    public function handleTransactionResult(Request $request)
    {
        // Determine if it's a success or failure by checking the route name
        if ($request->route()->getName() === 'payment.success') {
            // Set success message
            return redirect()->route('parent.transaction')->with('success', 'Your payment has been confirmed. Tutoring session may now begin.');
        } else {
            // Set failure message
            return redirect()->route('parent.transaction')->with('error', 'Payment failed. Please try again');
        }

        // Redirect to the main transaction page
        //return redirect()->route('parent.transaction');
    }

    public function sendPayment(Request $request)
    {
        $bookingID = $request->input('transaction_id');

        $booking = Booking::with([
            'guardianMain.guardian.userProfile',
            'guardianMain.guardian.userProfile.gender',
            'guardianMain.guardian.userProfile.userType',
            'guardianMain.guardian.userProfile.userStatus',
            'guardianMain.guardian.relation',
            'guardianMain.child.gender',
            'guardianMain.child.yearLevel',
            'guardianMain.preferenceLanguage.preference.teachingStyle',
            'guardianMain.preferenceLanguage.preference.modality',
            'guardianMain.preferenceLanguage.preference.availability',
            'guardianMain.preferenceLanguage',

            'tutorMain.tutor.userProfile.gender',
            'tutorMain.tutor.userProfile.userStatus',
            'tutorMain.tutor.userProfile.userType',
            'tutorMain.tutor.employmentSession',
            'tutorMain.tutor.employmentSession.sessionType',
            'tutorMain.tutor.employmentSession.employmentType',
            'tutorMain.educationLevel',
            'tutorMain.requirement',
            'tutorMain.preferenceLanguage',
            'tutorMain.preferenceLanguage',
            'tutorMain.preferenceLanguage.preference',
            'tutorMain.preferenceLanguage.preference.teachingStyle',
            'tutorMain.preferenceLanguage.preference.modality',
            'tutorMain.preferenceLanguage.preference.availability',
            'tutorMain.departmentYearSubject.department',
            'tutorMain.departmentYearSubject.subject',
            'tutorMain.departmentYearSubject.gradeLevel',
            'rate',
            'rate.yearLevel',
            'rate.sessionType',
            'rate.modality',
            'bookingStatus',
            'bookingAvailability.sessionType',
            'bookingAvailability.day',
            'bookingAvailability.availabilityStart',
            'bookingAvailability.availabilityEnd',
        ])->where('id', $bookingID)->first();

        if (!$booking) {
            return redirect()->back()->with('error', 'Error processing transaction. Booking does not exist.');
        }

        //dd($booking);
        $finalRate = null;
        if ($booking->rate->session_type_id == 2)
            $finalRate = $booking->rate_multiply;
        else
            $finalRate = $booking->rate->rate;



        $external_id = "" . rand();
        //dd($external_id);
        $createInvoice = new PaymentRequestParameters([
            'reference_id' => $external_id,
            'amount' => 1,
            'currency' => 'PHP',
            'country' => 'PH',
            'payment_method' => [
                'type' => 'EWALLET',
                'ewallet' => [
                    'channel_code' => 'GCASH',
                    'channel_properties' => [
                        'success_return_url' => 'https://etugma.com/payment/success',
                        'failure_return_url' => 'https://etugma.com/payment/failure'
                    ]
                ],
                'reusability' => 'ONE_TIME_USE'
            ]
        ]);


        Configuration::setXenditKey(env('XENDIT_SECRET_KEY'));
        $apiInstance = new PaymentRequestApi();
        $idempotency_key = $external_id; // string
        $for_user_id = ""; // string
        $with_split_rule = ""; // string
        $generateInvoice = "";
        $result = "";
        try {
            //$generateInvoice = $apiInstance->createPaymentRequest($createInvoice);
            $result = $apiInstance->createPaymentRequest($idempotency_key, $for_user_id, $with_split_rule, $createInvoice);

            //dd($result);
        } catch (\Xendit\XenditSdkException $e) {
            echo 'Exception when calling InvoiceApi->createInvoice: ', $e->getMessage(), PHP_EOL;
            echo 'Full Error: ', json_encode($e->getFullError()), PHP_EOL;
        }
        //dd($result);
        $urlRedirect = $result['actions'][0]['url'];


        $bookingID = $booking->id;
        $transaction = Transaction::where('booking_id', $bookingID)->update([
            'external_id' => $result['id']
        ]);

        return redirect()->to($urlRedirect);
    }

    public function notificationCallback(Request $request)
    {
        $getToken = $request->headers->get('x-callback-token');
        $callBackToken = env('XENDIT_CALLBACK_TOKEN');

        try {
            return response()->json([
                'status' => 'check token',
                'message' => 'Check Message from Xendit',
                'token' => $getToken

            ], Response::HTTP_OK);
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    public function webhook(Request $request)
    {

        /* Log::info('Xendit Webhook Received', $request->all());

        // Access the reference_id correctly from the nested 'data' object
        $referenceId = $request->input('data.id');
        $status = $request->input('data.status');
        
        Log::info('Received reference_id: ' . $referenceId);
        Log::info('Received status: ' . $status);
        // Retrieve the transaction using the correct identifier
        $transaction = Transaction::where('external_id', $referenceId)->first();

        if (!$transaction) {
            Log::error("Transaction not found for reference_id: " .  $referenceId);
            return response()->json(['status' => 'Transaction not found'], 404);
        }
        
        // Check the status of the payment
        switch ($status) {
            case 'PENDING':
                Log::info("Payment is pending for external_id: { $referenceId}");
                // Optional: Update your records to show the payment is pending if desired
                break;

            case 'SUCCEEDED':
            
                if ($transaction->paid === 1) {
                    return response()->json(['status' => 'Payment has already been processed'], 200);
                }
                
                // Start database transaction
                DB::beginTransaction();
                try {
                    // Update transaction details based on the webhook payload
                    $transaction->amount_transferred = $request->amount;
                    $transaction->reference_number = $request->id;
                    $transaction->paid = 1;
                    $transaction->updated_at = now();
                    $transaction->save();

                    // Update booking status to indicate payment success
                    $booking = $transaction->booking;
                    $booking->booking_status_id = 4;
                    $booking->save();

                    // Create tutor session
                    $tutorSession = new TutorSession();
                    $tutorSession->tutor_main_id = $transaction->booking->tutorMain->id;
                    $tutorSession->guardian_main_id = $transaction->booking->guardianMain->id;
                    $tutorSession->transaction_id = $transaction->id;
                    $tutorSession->booking_availability_id = $transaction->booking->booking_availability_id;
                    $tutorSession->session_status_id = 1;
                    $tutorSession->session_start = $transaction->booking->session_start_date;

                    if ($transaction->booking->bookingAvailability->session_type_id == 1) {
                        $tutorSession->session_end = \Carbon\Carbon::parse($transaction->booking->session_start_date)->addMonth();
                    } elseif ($transaction->booking->bookingAvailability->session_type_id == 2) {
                        $tutorSession->session_end = $transaction->booking->session_end_date;
                    }

                    // Check if a session for this child already exists
                    $childId = $transaction->booking->guardianMain->child_id;
                    if (TutorSession::whereHas('guardianMain', function ($query) use ($childId) {
                            $query->where('child_id', $childId);
                        })
                        ->where('tutor_main_id', $transaction->booking->tutorMain->id)
                        ->where('session_status_id', 1)
                        ->exists()) {
                        Log::info("Tutor session already exists for child_id: " . $childId);
                        DB::rollBack();
                        return response()->json(['status' => 'Session already exists'], 409);
                    }

                    // Save the tutor session
                    $tutorSession->save();

                    // Commit the transaction
                    DB::commit();

                    // Send notification
                    $receiverId = $tutorSession->guardianMain->guardian->user_profile_id;
                    $loggedUserID = session('loginId');
                    $user = UserProfile::find($loggedUserID);
                    $username = "$user->fname $user->lname";
                    $userType = $user->userType->type;

                    if ($loggedUserID) {
                        $Notif = new Notification();
                        $Notif->user_id = $receiverId;
                        $Notif->title = "A $userType has verified your session";
                        $Notif->author = $username;
                        $Notif->notification_type = 1;
                        $Notif->user_type = 1;
                        $Notif->seen = 0;
                        $Notif->tutoring_session_id = $tutorSession->id;
                        $Notif->created_at = now()->setTimezone(config('app.timezone'));
                        $Notif->save();

                        // Broadcast event
                        event(new UserNotification([
                            'user_id' => $receiverId,
                            'user_type' => '',
                            'author' => $Notif->author,
                            'title' => $Notif->title,
                            'time' => $Notif->created_at,
                            'type' => $Notif->notification_type,
                        ]));
                    }

                    Log::info("Payment succeeded and session created for reference ID: { $referenceId}");
                } catch (Exception $e) {
                    Log::error("Error: " . $e->getMessage());
                    DB::rollBack();
                    return response()->json(['status' => 'Error processing transaction'], 500);
                }
                break;

            case 'FAILED':
                Log::warning("Payment failed for booking ID: { $referenceId}");
                // Handle the failed payment, e.g., update booking status
                break;
                
            case 'EXPIRED':
                Log::warning("Payment expired for reference_id: {$referenceId}");
                break;

            default:
                Log::warning("Unknown payment status received: {$status}");
                break;
        }

        // Return acknowledgment to Xendit
        return response()->json(['status' => 'success'], 200);
    
        */

        $event = $request->input('event');
        $data = $request->input('data');

        if ($event === 'payment_request.succeeded') {
            $referenceId = $data['reference_id'];
            $transaction = Transaction::where('external_id', $referenceId)->first();

            if ($transaction) {
                $transaction->status = 'SUCCEEDED';
                $transaction->save();
                Log::info("Transaction with reference ID $referenceId was successful.");
            }
        }
        // Log the entire request for inspection

    }

    public function paymentSucceeded(Request $request)
    {

        Log::info('Xendit Webhook Received', $request->all());

        // Access the reference_id correctly from the nested 'data' object
        $externalId = $request->input('data.payment_request_id');
        $status = $request->input('data.status');
        $amount = $request->input('data.amount');
        $referenceID = $request->input('data.reference_id');

        Log::info('Received reference_id: ' . $referenceID);
        Log::info('Received status: ' . $status);
        // Retrieve the transaction using the correct identifier
        $transaction = Transaction::where('external_id', $externalId)->first(); //add to db

        if (!$transaction) {
            Log::error("Transaction not found for reference_id: " .  $externalId);
            return response()->json(['status' => 'Transaction not found'], 404);
        }

        // Check the status of the payment
        switch ($status) {
            case 'PENDING':
                Log::info("Payment is pending for external_id: { $externalId}");
                // Optional: Update your records to show the payment is pending if desired
                break;

            case 'SUCCEEDED':

                if ($transaction->paid === 1) {
                    return response()->json(['status' => 'Payment has already been processed'], 200);
                }

                // Start database transaction
                DB::beginTransaction();
                try {

                    // Check if a session for this child already exists
                    $childId = $transaction->booking->guardianMain->child_id;
                    $tutorId = $transaction->booking->tutorMain->id;
                    if (TutorSession::whereHas('guardianMain', function ($query) use ($childId) {
                        $query->where('child_id', $childId);
                    })
                        ->where('tutor_main_id', $tutorId)
                        ->where('session_status_id', 1)
                        ->exists()
                    ) {
                        Log::info("Tutor session already exists for child_id: " . $childId);
                        DB::rollBack();
                        return response()->json(['status' => 'Session already exists'], 409);
                    }

                    // Update transaction details based on the webhook payload
                    $transaction->amount_transferred = $amount;
                    $transaction->reference_number = $referenceID;
                    $transaction->paid = 1;
                    $transaction->updated_at = now()->setTimezone(config('app.timezone'));
                    $transaction->save();

                    // Update booking status to indicate payment success
                    $booking = $transaction->booking;
                    $booking->booking_status_id = 4;
                    $booking->save();

                    // Create tutor session
                    $tutorSession = new TutorSession();
                    $tutorSession->tutor_main_id = $transaction->booking->tutor_main_id;
                    $tutorSession->guardian_main_id = $transaction->booking->guardian_main_id;
                    $tutorSession->transaction_id = $transaction->id;
                    $tutorSession->booking_availability_id = $transaction->booking->booking_availability_id;
                    $tutorSession->session_status_id = 1;
                    $tutorSession->session_start = $transaction->booking->session_start_date;
                    $tutorSession->session_end = $transaction->booking->session_end_date;
                    $tutorSession->terminate = 0;

                    /*if ($transaction->booking->bookingAvailability->session_type_id == 1) {
                        $tutorSession->session_end = \Carbon\Carbon::parse($transaction->booking->session_start_date)->addMonth();
                    } elseif ($transaction->booking->bookingAvailability->session_type_id == 2) {
                        $tutorSession->session_end = $transaction->booking->session_end_date;
                    }*/

                    $tutorSession->save();

                    // Send notification for both parent and tutor
                    $ParentReceiverId = $tutorSession->guardianMain->guardian->user_profile_id;
                    $TutorReceiverId = $tutorSession->tutorMain->tutor->user_profile_id;
                    $loggedUserID = session('loginId'); // should be the parent who made the transaction
                    $user = UserProfile::find($ParentReceiverId);
                    
                      Log::info('Userprofile: ', [$ParentReceiverId]);

                    if (!$TutorReceiverId) {
                        DB::rollBack();
                        return response()->json(['status' => 'Tutor not found'], 404);
                    }
                    if (!$user) {
                        DB::rollBack();
                        return response()->json(['status' => 'Parent not found'], 404);
                    }
                    Log::info('Userprofile: ', [$user]);

                    $username = "$user->fname $user->lname";
                    $userType = $user->userType->type;


                    if ( $ParentReceiverId) {

                        //notif to tutor
                        $Notif = new Notification();
                        $Notif->user_id = $TutorReceiverId;
                        $Notif->title = "A Parent has completed payment. Tutoring session may now begin.";
                        $Notif->author = $username;
                         $Notif->content ="";
                        $Notif->notification_type = 1;
                        $Notif->user_type = 2;
                        $Notif->seen = 0;
                         $Notif->booking_id = 0;
                        $Notif->tutoring_session_id = $tutorSession->id;
                        $Notif->created_at = now()->setTimezone(config('app.timezone'));
                        $Notif->save();

                        // Broadcast event
                        event(new UserNotification([
                            'user_id' => $TutorReceiverId,
                            'user_type' => '',
                            'author' => $Notif->author,
                            'title' => $Notif->title,
                            'time' => $Notif->created_at,
                            'type' => $Notif->notification_type,
                        ]));

                        //notif to parent
                        $Notif2 = new Notification();
                        $Notif2->user_id = $ParentReceiverId;
                        $Notif2->title = "Your payment has been confirmed. Tutoring session may now begin.";
                        $Notif2->author = $username;
                         $Notif2->content ="";
                        $Notif2->notification_type = 1;
                        $Notif2->user_type = 1;
                        $Notif2->seen = 0;
                         $Notif2->booking_id = 0;
                        $Notif2->tutoring_session_id = $tutorSession->id;
                        $Notif2->created_at = now()->setTimezone(config('app.timezone'));
                        $Notif2->save();

                        // Broadcast event
                        event(new UserNotification([
                            'user_id' => $ParentReceiverId,
                            'user_type' => '',
                            'author' => $Notif2->author,
                            'title' => $Notif2->title,
                            'time' => $Notif2->created_at,
                            'type' => $Notif2->notification_type,
                        ]));
                    }

                    // Commit the transaction
                    DB::commit();
                    return redirect()->route('parent.transaction')->with('success', 'Your payment has been confirmed. Tutoring session may now begin.');
                    Log::info("Payment succeeded and session created for reference ID: {$externalId}");
                } catch (Exception $e) {
                    Log::error("Error: " . $e->getMessage());
                    DB::rollBack();
                     return redirect()->route('parent.transaction')->with('error', 'Payment failed. Please try again.');
                    return response()->json(['status' => 'Error processing transaction'], 500);
                }
                break;

            case 'FAILED':
                Log::warning("Payment failed for external_id: { $externalId}");
                // Handle the failed payment, e.g., update booking status
                break;

            case 'EXPIRED':
                Log::warning("Payment expired for external_id: {$externalId}");
                break;

            default:
                Log::warning("Unknown payment status received: {$status}");
                break;
        }

        // Return acknowledgment to Xendit
        session()->flash('message', 'Payment was successful!');
        return response()->json(['status' => 'success'], 200);
    }

    //BOOKINGS FUNCTIONS
    public function loadPaymentPending()
    {
        // Get guardian ID from session
        $guardianId = session('clientMain')->guardian->id;

        // Fetch transactions where bookings have unpaid status and the related guardian_id matches $guardianId
        $bookings = Transaction::where('paid', 0)  // Check if the transaction is unpaid
            ->whereHas('booking.guardianMain', function ($query) use ($guardianId) {
                $query->where('guardian_id', $guardianId);  // Compare the guardian_id inside guardianMain
            })
            ->with([
                'booking.guardianMain.guardian.userProfile',
                'booking.guardianMain.guardian.userProfile.gender',
                'booking.guardianMain.guardian.userProfile.userType',
                'booking.guardianMain.guardian.userProfile.userStatus',
                'booking.guardianMain.guardian.relation',
                'booking.guardianMain.child.gender',
                'booking.guardianMain.child.yearLevel',
                'booking.guardianMain.preferenceLanguage.preference.teachingStyle',
                'booking.guardianMain.preferenceLanguage.preference.modality',
                'booking.guardianMain.preferenceLanguage.preference.availability',
                'booking.guardianMain.preferenceLanguage',
                'booking.apiInvoiceRequest',

                'booking.tutorMain.tutor.userProfile.gender',
                'booking.tutorMain.tutor.userProfile.userStatus',
                'booking.tutorMain.tutor.userProfile.userType',
                'booking.tutorMain.tutor.employmentSession',
                'booking.tutorMain.tutor.employmentSession.sessionType',
                'booking.tutorMain.tutor.employmentSession.employmentType',
                'booking.tutorMain.educationLevel',
                'booking.tutorMain.requirement',
                'booking.tutorMain.preferenceLanguage',
                'booking.tutorMain.preferenceLanguage.preference',
                'booking.tutorMain.preferenceLanguage.preference.teachingStyle',
                'booking.tutorMain.preferenceLanguage.preference.modality',
                'booking.tutorMain.preferenceLanguage.preference.availability',
                'booking.tutorMain.departmentYearSubject.department',
                'booking.tutorMain.departmentYearSubject.subject',
                'booking.tutorMain.departmentYearSubject.gradeLevel',
                'booking.rate',
                'booking.rate.yearLevel',
                'booking.rate.sessionType',
                'booking.rate.modality',
                'booking.bookingStatus',
                'booking.bookingAvailability.sessionType',
                'booking.bookingAvailability.day',
                'booking.bookingAvailability.availabilityStart',
                'booking.bookingAvailability.availabilityEnd',
            ])
            ->join('bookings', 'transactions.booking_id', '=', 'bookings.id') // Adjust this join if necessary
            ->orderBy('bookings.session_start_date', 'ASC') // Correct ordering on related table
            ->get();

        return response()->json($bookings);
    }

    /*public function cancelBooking(Request $request)
    {
        $bookingId = $request->input('cancelBookingId');
        $booking = Booking::find($bookingId);

        if (!$booking) {
            return response()->json(['error' => true, 'message' => 'Booking not found'], 404);
        }

        try {
            DB::beginTransaction();

            // Perform the delete operation
            $booking->delete();

            // Commit the transaction
            DB::commit();

            return response()->json(['success' => true, 'message' => 'Booking cancelled successfully'], 200);
        } catch (\Exception $e) {
            // Rollback the transaction in case of error
            DB::rollBack();

            return response()->json(['error' => true, 'message' => 'Failed to cancel booking', 'error' => $e->getMessage()], 500);
        }
    }*/

    // Method to fetch details for the transaction modal
    public function getTransactionDetails(Request $request)
    {
        $transaction_id = $request->get('transaction_id');

        //dd($transaction_id);
        // Fetch transaction details based on transaction_id
        $transaction = Transaction::with('booking')->find($transaction_id);

        // Example response (adjust according to your schema)
        return response()->json([
            'transaction_id' => $transaction->id,
            'amount_due' => $transaction->booking->rate->rate,
            'qr_image' => asset('Images/gcash_payment.jpg'), // Adjust this to point to your QR image
            'user_name' => $transaction->booking->guardianMain->guardian->userProfile->fname . ' ' . $transaction->booking->guardianMain->guardian->userProfile->lname, // User's full name
        ]);
    }

    // Method to handle the submission of transaction payment details
    public function submitTransactionPayment(Request $request)
    {
        $transaction_id = $request->get('cancelBookingID');

        // Validate and process the receipt and reference number
        $request->validate([
            'uploadReceipt' => 'required|mimes:jpg,png,jpeg',
            'referenceNumber' => 'required|numeric',
            'amount' => 'required|numeric',
        ]);

        $transaction = Transaction::findOrFail($transaction_id);

        // Store the uploaded receipt (if provided)


        // Update the transaction details
        $transaction->reference_number = $request->input('referenceNumber');
        $transaction->amount_transferred = $request->input('amount');
        $transaction->paid = 1; // Mark as completed

        if ($request->has('uploadReceipt')) {

            $file = $request->file('uploadReceipt');
            $extension = $file->getClientOriginalExtension();

            $filename = time() . '.' . $extension;
            $path = 'transaction/';
            $file->move($path, $filename);




            $transaction->upload_receipt = $path . $filename;
            $transaction->save(); //
        }

        return response()->json(['success' => true]);
    }

    public function paymentSuccess(Request $request)
    {
        // Flash a success message
        session()->flash('message', 'Payment was successful!');
        return redirect()->route('parent.transaction');
    }

    public function paymentFailed(Request $request)
    {
        // Flash a failure message
        session()->flash('message', 'Payment failed. Please try again.');
        return redirect()->route('parent.transaction');
    }
}
