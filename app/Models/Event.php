<?php

namespace App\Models;

use App\Models\User;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    protected $table = 'events';
    protected $guarded = [];
    protected $dates = ['start','end'];

    public function creator()
    {
        return $this->hasOne(User::class, 'id','created_by');
    }
}
