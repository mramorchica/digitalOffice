<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\SlackNotification;

class SlackNotificationsController extends Controller
{
    public function receive_messages(Request $request)
    {
//       
        $notif = new SlackNotification;

        $notif->message = 'slack message';
        // $notif->message = $request->text;

        $notif->save();
    }

    public function check_messages()
    {
        $new_messages = SlackNotification::check_unread_user_messages();
        session(['new_messages' => $new_messages]);

        return redirect()->back();
        
    }

    public function read_new_messages()
    {
        $new_messages = SlackNotification::read_new_user_messages();
        session(['new_messages' => 0]);

        return view('notifications.slack.index', compact('new_messages'));
    }
}
