<?php

namespace App\Helpers;

use Carbon\Carbon;

class DateHelper
{
    public static function formatTimeAgo($timestamp)
    {
        // Convert timestamp to a Carbon instance
        $date = Carbon::createFromTimestamp($timestamp);

        // Get the current time
        $now = Carbon::now();

        // Calculate the difference
        $diffInSeconds = $now->diffInSeconds($date);

        if ($diffInSeconds < 60) {
            return floor($diffInSeconds)."s ago";
        }

        $diffInMinutes = $now->diffInMinutes($date);
        if ($diffInMinutes < 60) {
            return floor($diffInMinutes)."m ago";
        }

        $diffInHours = $now->diffInHours($date);
        if ($diffInHours < 24) {
            return floor($diffInHours)."h ago";
        }

        $diffInDays = $now->diffInDays($date);
        return floor($diffInDays)."d ago";
    }
}
