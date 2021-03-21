<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class IndexContent extends Model
{
  public function index_statuses()
  {
      return $this->hasMany('App\IndexStatus');
  }
}
