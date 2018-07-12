<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    protected $fillable = ['name','place','dateEvent','timeEvent','hall','shuttlecockfees'];

    public function getTimeEventAttribute($value)
    {
        return date('h:i:s A ', strtotime($value));
    }

    public function players() {
        return $this->hasMany('App\Player');
    }
}
