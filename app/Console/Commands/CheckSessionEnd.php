<?php

namespace App\Console\Commands;

use App\Models\TutorSession;
use Carbon\Carbon;
use Illuminate\Console\Command;

class CheckSessionEnd extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'sessions:check';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Check if session_end has passed and update the session_status_id';

    /**
     * Execute the console command.
     */
    public function __construct()
    {
        parent::__construct();
    }

    public function handle()
    {
        $now = Carbon::now();
        
        $sessionsToUpdate = TutorSession::with('transaction.booking')
        ->where('session_end', '<=', $now)
        ->where('session_status_id', 1)
        ->get();

    // Update session_status_id and booking_status_id
    $sessionsToUpdate->each(function ($session) {
        // Update session status
        $session->update(['session_status_id' => 2]);

        // Update booking status if applicable
        if ($session->transaction && $session->transaction->booking) {
            $booking = $session->transaction->booking;
            $booking->update(['booking_status_id' => 4]); // Change booking status to 4
        }
    });

        $this->info('Session statuses updated successfully');
    }
}
