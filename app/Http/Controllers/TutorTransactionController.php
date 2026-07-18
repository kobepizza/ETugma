<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use Illuminate\Http\Request;

class TutorTransactionController extends Controller
{
    public function index()
    {
        // Get the guardian_id from the session (assuming session('clientMain')->id is the guardian's ID)
        $tutorId = session('tutorMain')->tutor->id;

        // Fetch transactions that are associated with the current user's guardian
        // Traverse the relationships: Transaction -> Booking -> GuardianMain -> Guardian -> Compare the guardian_id
        $transaction = Transaction::whereHas('booking.tutorMain.tutor', function ($query) use ($tutorId) {
            $query->where('id', $tutorId); // Compare guardian's id with session id
        })

            ->where('paid', 1)
            ->get();

        //dd($transaction);
        // Return the view with the filtered transactions
        return view('tutor.tutortransaction', compact('transaction'));
    }
}
