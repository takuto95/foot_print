<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Future extends Model
{
    public function getFormattedDueDateAttribute(){
        $date = Carbon::createFromFormat('Y-m-d',$this->attributes['due_date']);
        return $date->format('Y/m/d');
    }
}
