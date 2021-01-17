<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Job extends Model
{
    use SoftDeletes;
	
    protected $guarded = [];

    public function position()
    {
        return $this->belongsTo('App\Models\Position');
    }

    public function department()
    {
        return $this->belongsTo('App\Models\Department');
    }

    public function responsibleUser()
    {
    	return $this->belongsTo('App\Models\User', 'responsible_user_id');
    }
}
