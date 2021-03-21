<?php

namespace App\Http\Controllers;

use App\Ideal;
use App\Future;
use App\ReportContent;
use App\ReportStatus;
use App\Done;
use Illuminate\Http\Request;
use App\Http\Requests\CreateFuture;
use App\Http\Requests\EditFuture;
use Illuminate\Support\Facades\Auth;

class FutureController extends Controller
{
    public function index()
    {
        $futures = Auth::user()->futures()->orderBy('limit', 'desc')->get();
        $ideals = Auth::user()->ideals()->first();
        $dones = Auth::user()->dones()->get();
        $reports = Auth::user()->report_contents()->get();
        if (is_null($futures)) {
            return view('futures/index');
        }
        return view('futures/index', [
            'futures' => $futures,
            'ideals' => $ideals,
            'reports' => $reports,
            'dones' => $dones,
        ]);
    }
    public function showCreateForm()
    {
        return view('futures/create');
    }
    public function create(CreateFuture $request)
    {
        $future = new Future();
        $future->title = $request->title;
        $future->detail = $request->detail;
        $future->limit = $request->due_date;
        Auth::user()->futures()->save($future);
        return redirect()->route('futures.index');
    }
    public function showEditForm(int $id)
    {
        $future = Future::find($id);
        return view('futures/edit', [
            'future_id' => $id,
            'future' => $future,
        ]);
    }
    public function edit(int $id, EditFuture $request)
    {
        $future = Future::find($id);
        $future->title = $request->title;
        $future->detail = $request->detail;
        $future->limit = $request->due_date;
        $future->save();
        return redirect()->route('futures.index');
    }

    public function delete(int $id)
    {
        $future = Future::find($id);
        $future->delete();
        return redirect()->route('futures.index');
    }

    public function update(int $id, Request $request)
    {
        $current_future = Future::find($id);
        $done = new Done();
        $done->future_id = $current_future->id;
        Auth::user()->dones()->save($done);
        return redirect()->route('futures.index');
    }
}
