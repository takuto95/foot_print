<?php

namespace App\Http\Controllers;

use App\Ideal;
use App\IndexContent;
use App\IndexStatus;
use Illuminate\Http\Request;
use App\Http\Requests\CreateIdeal;
use App\Http\Requests\EditIdeal;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class IdealController extends Controller
{
    public function showCreateForm()
    {
        return view('ideals/create');
    }

    public function create(CreateIdeal $request)
    {
        $ideal = new Ideal();
        $index = new IndexContent();
        $status = new IndexStatus();
        
        $index->content1 = $request->content1;
        $index->content2 = $request->content2;
        $index->content3 = $request->content3;
        Auth::user()->index_contents()->save($index);

        $ideal->title = $request->title;
        $ideal->limit = $request->due_date;
        $ideal->declaration = Carbon::today();
        Auth::user()->ideals()->save($ideal);

        $status->status1 = $request->status1;
        $status->status2 = $request->status2;
        $status->status3 = $request->status3;
        $status->index_content_id = $index->id;
        $status->save();

        return redirect()->route('home');
    }

    public function showEditForm()
    {
        return view('ideals/edit');
    }

    public function edit(EditIdeal $request)
    {
        $ideal = Auth::user()->ideals()->first();
        $index = Auth::user()->index_contents()->first();
        $status = $index->index_statuses()->first();

        $index->content1 = $request->content1;
        $index->content2 = $request->content2;
        $index->content3 = $request->content3;
        $index->save();

        $ideal->title = $request->title;
        $ideal->limit = $request->due_date;
        $ideal->declaration = Carbon::today();
        $ideal->save();

        $status->status1 = $request->status1;
        $status->status2 = $request->status2;
        $status->status3 = $request->status3;
        $status->save();

        return redirect()->route('home');
    }
}
