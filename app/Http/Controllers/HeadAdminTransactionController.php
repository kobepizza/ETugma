<?php

namespace App\Http\Controllers;

use App\Events\UserNotification;
use App\Models\Notification;
use App\Models\Transaction;
use App\Models\TutorSession;
use App\Models\UserProfile;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class HeadAdminTransactionController extends Controller
{
    public function index()
    {
        return view('head_admin.headadmintransaction');
    }

    public function loadTransactions()
    {
        $transactions = Transaction::with(
            'booking.tutorMain.tutor.employmentSession.sessionType',
            'booking.tutorMain.tutor.userProfile',
            'booking.guardianMain.guardian.userProfile',
        )
            ->where('paid', 1)
            ->get();

        return response()->json($transactions);
    }
    public function searchTransactions(Request $request)
    {
        $searchQuery = $request->input('query');

        $search = Transaction::with(
            'booking.tutorMain.tutor.employmentSession.sessionType',
            'booking.tutorMain.tutor.userProfile',
            'booking.guardianMain.guardian.userProfile',
        )
            ->where('paid', 1)
            ->where(function ($query) use ($searchQuery) {
                // Search by first name, last name, or full name within the same UserProfile record
                $query->where('reference_number', 'LIKE', "%{$searchQuery}%");
            })
            ->get();

        return response()->json($search);
    }
}
