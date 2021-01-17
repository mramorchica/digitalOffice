<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class SlackNotification extends Model
{
    protected $fillable = ['message'];

    public function users()
    {
        return $this->hasMany('App\Models\Users');
    }

    public static function check_unread_user_messages()
    {
        $last_checkup = DB::table('slack_notifications_users')
                        ->select('*')
                        ->where('user_id', Auth::user()->id)
                        ->get();

        $new_messages = DB::table('slack_notifications')
                        ->select(DB::raw('count(*) as num'))
                        ->where('user_id', Auth::user()->id)
                        ->where('created_at', '<', $last_checkup)
                        ->get();

        return $new_messages[0]->num;
    }
}
