<?php

namespace App\Console\Commands;

use App\Models\TutorSession;
use Carbon\Carbon;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Log;

class DeleteExpiredSessions extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'delete:expired-sessions';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Delete expired tutor sessions';

    /**
     * Execute the console command.
     */
    public function handle()
{
    Log::info('Scheduled task executed');
    $now = Carbon::now();
    $query = TutorSession::where('session_end', '<=', Carbon::today());
    
    $deletedCount = $query->delete();

    $this->info('Deleted ' . $deletedCount . ' sessions');
}
}
