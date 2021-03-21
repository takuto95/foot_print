<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ReportStatus extends Model
{
    public function report_content()
    {
        return $this->belongsTo('App\ReportContent');
    }
}
