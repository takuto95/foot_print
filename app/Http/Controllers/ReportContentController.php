<?php

namespace App\Http\Controllers;

use App\ReportContent;
use App\ReportStatus;
use App\IndexContent;
use Illuminate\Http\Request;
use App\Http\Requests\CreateReportContent;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class ReportContentController extends Controller
{
    public function showCreateForm()
    {
        $ideals = Auth::user()->ideals()->get();
        $contents = Auth::user()->index_contents()->get();
        return view('reportcontents/create', [
            'ideals' => $ideals,
            'contents' => $contents,
        ]);
    }

    public function create(CreateReportContent $request)
    {
        $ideal = Auth::user()->ideals()->first();
        $index = Auth::user()->index_contents()->first();

        $report = new ReportContent();
        $status = new ReportStatus();
        
        $report->content1 = $index->content1;
        $report->content2 = $index->content2;
        $report->content3 = $index->content3;
        $report->comment = $request->comment;
        $report->declaration = Carbon::today();
        Auth::user()->report_contents()->save($report);

        $status->status1 = $request->status1;
        $status->status2 = $request->status2;
        $status->status3 = $request->status3;
        $status->report_content_id = $report->id;
        $status->save();

        return redirect()->route('futures.index');
    }

    public function delete(int $id)
    {
        $reportcontent = ReportContent::find($id);
        $reportcontent->delete();
 
        return redirect()->route('futures.index');
    }
}
