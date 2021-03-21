<?php

namespace App\Http\Controllers;

use App\Company;
use Illuminate\Http\Request;
use App\Http\Requests\CreateCompany;
use App\Http\Requests\EditCompany;
use Illuminate\Support\Facades\Auth;

class CompanyController extends Controller
{
    public function showCreateForm()
    {
        return view('companies/create');
    }

    public function create(CreateCompany $request)
    {
        $company = new Company();
        $company->title = $request->title;
        Auth::user()->companies()->save($company);
        return redirect()->route('home');
    }

    public function showEditForm()
    {
        return view('companies/edit');
    }

    public function edit(EditCompany $request)
    {
        $company = Auth::user()->companies()->first();
        $company->title = $request->title;
        $company->save();
        return redirect()->route('home');
    }
}
