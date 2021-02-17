<?php

namespace App\Http\Controllers;

use App\Ideal;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index(){
        if(Auth::check()){
        $user = Auth::user();
        $ideals = $user->ideals()->get();
        return view('home',[
            'ideals' => $ideals,
        ]);
        }
        return view('home');
    }
}
