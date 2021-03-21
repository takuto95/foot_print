<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Done extends Model
{
    public function future()
    {
        return $this->belongsTo('App\Future');
    }

    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
