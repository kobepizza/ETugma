<?php

use Illuminate\Foundation\Inspiring;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Console\Scheduling\Schedule;


Artisan::command('inspire', function () {
    $this->comment(Inspiring::quote());
})->purpose('Display an inspiring quote')->hourly();

Artisan::command('check:session-end', function () {
    // Your command logic here
})->purpose('Check and update session statuses.');

app(Schedule::class)->command('sessions:check')->everyTwoMinutes();