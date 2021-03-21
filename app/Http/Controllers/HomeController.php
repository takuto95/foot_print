<?php

namespace App\Http\Controllers;

use App\Ideal;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index()
    {
        if (Auth::check()) {
            $user = Auth::user();
            $ideals = $user->ideals()->get();
            $indexs = $user->index_contents()->get();
            $companies = $user->companies()->get();
            $teams = $user->teams()->get();
            return view('home', [
            'ideals' => $ideals,
            'indexs' => $indexs,
            'companies' => $companies,
            'teams' => $teams,
        ]);
        }
        return view('home');
    }
}
