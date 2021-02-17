<?php

namespace App\Http\Controllers;

use App\Ideal;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;


class IdealController extends Controller
{
    public function showCreateForm(){
        return view('ideal/create');
    }

    public function create(Request $request){
        $ideal = new Ideal();
        $ideal->title = $request->title;
        $ideal->limit = $request->due_date;
        $ideal->declaration = Carbon::today();
        Auth::user()->ideals()->save($ideal);
        return redirect()->route('home');
    }

    public function showEditForm(){
        return view('ideal/edit');
    }

    public function edit(Request $request){
        $ideal = Auth::user()->ideals()->first();
        $ideal->title = $request->title;
        $ideal->limit = $request->due_date;
        $ideal->declaration = Carbon::today();
        $ideal->save();
        return redirect()->route('home');
    }
}
