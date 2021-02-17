<?php

namespace App\Http\Controllers;

use App\Ideal;
use App\Future;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FutureController extends Controller
{
    public function index(){
        $futures = Auth::user()->futures()->get();
        $ideals = Auth::user()->ideals()->first();
        if(is_null($futures)){
            return view('futures/index');
        }
        return view('futures/index',[
            'futures' => $futures,
            'ideals' => $ideals,
        ]);
    }

    public function showCreateForm(){
        return view('futures/create');
    }

    public function create(Request $request){
        $future = new Future();
        $future->title = $request->title;
        $future->detail = $request->detail;
        $future->limit = $request->due_date;
        Auth::user()->futures()->save($future);
        return redirect()->route('futures.index');
    }

    public function showEditForm(int $id){
        $future = Future::find($id);
        return view('futures/edit',[
            'future_id' => $id,
            'future' => $future,
        ]);
    }

    public function edit(int $id,Request $request){
        $future = Future::find($id);
        $future->title = $request->title;
        $future->detail = $request->detail;
        $future->limit = $request->due_date;
        $future->save();
        return redirect()->route('futures.index');
    }

    public function delete(int $id){
       $future = Future::find($id);
       $future->delete();
        return redirect()->route('futures.index');
    }

}
