<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SlackNotification extends Model
{
    protected $fillable = ['message'];
}
