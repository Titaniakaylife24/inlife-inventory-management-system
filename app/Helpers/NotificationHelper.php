<?php

namespace App\Helpers;

use App\Models\Notification;

class NotificationHelper
{
    public static function create(
        $userId,
        $title,
        $message,
        $url = null
    )
    {
        Notification::create([

            'user_id' => $userId,

            'title' => $title,

            'message' => $message,

            'url' => $url,

        ]);
    }
}