<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\SlackNotification;

class SlackNotificationsController extends Controller
{
    public function receive_messages(Request $request)
    {
//         token=CCVakjSala0nFaCIsnKjPqLv
// team_id=T0001
// team_domain=example

// channel_id=C2147483705
// channel_name=test

// timestamp=1355517523.000005
// user_id=U2147483697
// user_name=Steve

// text=googlebot: What is the air-speed velocity of an unladen swallow?

// trigger_word=googlebot:
        $notif = new SlackNotification;

        $notif->message = 'slack message';
        // $notif->message = $request->text;

        $notif->save();
    }
}
