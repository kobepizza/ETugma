<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Transaction;
use Illuminate\Support\Facades\Log;

class PaymentWebhookController extends Controller
{
    protected function verifyWebhookSignature(Request $request)
    {
        // Get the token from the request header (Xendit uses X-CALLBACK-TOKEN)
        $signature = $request->header('X-CALLBACK-TOKEN');
        
        // Get the expected signature from environment variables
        $expectedSignature = env( 'CALLBACK_TOKEN');

        // Compare the tokens
        return hash_equals($signature, $expectedSignature);
    }
    /**
     * Handle incoming payment webhooks from Xendit.
     */
    public function handlePaymentWebhook(Request $request)
    {
        Log::info('Expected Signature: ' . env('XENDIT_CALLBACK_TOKEN'));
        // First, verify the webhook signature
        if (!$this->verifyWebhookSignature($request)) { 
            Log::error('Invalid webhook signature.');
            return response()->json(['status' => 'error', 'message' => 'Invalid signature'], 403);
        }

        // Log the incoming webhook data for debugging
        Log::info('Webhook received:', $request->all());

        // Get the webhook payload
        $data = $request->all();

        // Check if the event type is 'invoice_paid' (depends on the payment provider)
        if (isset($data['status']) && $data['status'] == 'PAID') {

            // Extract relevant data
            $externalId = $data['external_id']; // Invoice ID (external_id)
            $amountTransferred = $data['amount']; // Amount transferred
            $referenceNumber = $data['payment_method']; // This might be a reference number, or get it from another field

            // Find the corresponding transaction using the external ID
            $transaction = Transaction::whereHas('booking.apiInvoiceRequest', function ($query) use ($externalId) {
                $query->where('external_id', $externalId);
            })->first();

            if ($transaction) {
                // Update the transaction details
                $transaction->amount_transferred = $amountTransferred;
                $transaction->reference_number = $referenceNumber;
                $transaction->paid = 1; // Mark as paid
                $transaction->save();

                Log::info('Transaction updated successfully for external ID: ' . $externalId);

                return response()->json(['status' => 'success'], 200);
            } else {
                Log::error('Transaction not found for external ID: ' . $externalId);
                return response()->json(['status' => 'error', 'message' => 'Transaction not found'], 404);
            }
        }

        return response()->json(['status' => 'ignored'], 200); // In case the event is not "paid"
    }

    /**
     * Verify the webhook signature to ensure it's from Xendit
     */
    
}
