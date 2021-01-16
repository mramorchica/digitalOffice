<?php

namespace App\Http\Controllers;

use App\SlackNotification;
use Illuminate\Http\Request;
use App\Notifications\TestNotification;
use Illuminate\Support\Facades\Notification;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

    public function send_slack_message(){


        Notification::route('slack', 'https://hooks.slack.com/services/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')
      ->notify(new TestNotification());

    }


    public function receive_messages(){

        $flight = new SlackNotification;

        $flight->message = 'a message';

        $flight->save();
    }
}
