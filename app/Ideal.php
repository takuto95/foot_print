<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Ideal extends Model
{
    public function getFormattedDueDateAttribute()
    {
        $date = Carbon::createFromFormat('Y-m-d', $this->attributes['due_date']);
        return $date->format('Y/m/d');
    }

    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
