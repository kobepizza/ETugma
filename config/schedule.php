<?php

return [
    /*
    |--------------------------------------------------------------------------
    | Scheduler Configurations
    |--------------------------------------------------------------------------
    |
    | This is where you define your scheduled tasks and their frequency.
    | You can add more tasks by extending the array below.
    |
    */

    'tasks' => [
        [
            'command' => 'sessions:check', // This is the artisan command you want to run
            'frequency' => '*/2 * * * *', // Run every 2 minutes using cron expression
        ],
    ],
];