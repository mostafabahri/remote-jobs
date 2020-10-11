<?php

namespace App\Http\Controllers;

use App\Company;

class CompanyController extends Controller
{

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Company $company)
    {
        return view('companies.show', [
            'company' => $company,
            'jobs' => $company->jobs()->latest()->with('company')->get()
        ]);
    }
}
