<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ReportContent extends Model
{
    public function report_statuses()
    {
        return $this->hasMany('App\ReportStatus');
    }

    protected static function boot()
    {
        parent::boot();
        self::deleting(function ($reportcontent) {
            $reportcontent->report_statuses()->delete();
        });
    }
}
