<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class IndexStatus extends Model
{
    public function index_content()
    {
        return $this->belongsTo('App\IndexContent');
    }
}
