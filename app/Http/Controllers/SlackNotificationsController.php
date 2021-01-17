<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Models\SlackNitification;

class SlackNotificationsController extends Controller
{
    public function receive_messages()
    {
        $notif = new SlackNotification;

        $notif->message = 'a message';

        $notif->save();
    }
}
