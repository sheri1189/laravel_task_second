<?php

namespace App\Http\Controllers;

use App\Models\Company;
use App\Http\Requests\StoreCompanyRequest;
use App\Http\Requests\UpdateCompanyRequest;
use Illuminate\Support\Facades\File;

class CompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $allcompanies = Company::where('added_from', session()->get('user_added'))->latest()->get();
        $compact = compact("allcompanies");
        return view('Company.view')->with($compact);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function add_company()
    {
        return view('Company.add');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCompanyRequest $request)
    {
        $input = $request->all();
        if ($request->hasFile("logo")) {
            $file = $request->file('logo');
            $extension = $file->getClientOriginalExtension();
            $fileName = rand(10000, 90000) . "." . $extension;
            $file->move('./logos/', $fileName);
        }
        $input['logo'] = $fileName;
        $input['name'] = strtolower($request->name);
        $input['added_from'] = session()->get('user_added');
        Company::create($input);
        return response()->json([
            "message" => 200,
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Company $company)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Company $company)
    {
        return response()->json([
            "message" => $company,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCompanyRequest $request, Company $company)
    {
        $request->validate(
            [
                "name" => "unique:companies,email,$company->id",
            ]
        );
        $input = $request->all();
        if ($request->hasFile("logo")) {
            $file = $request->file('logo');
            $extension = $file->getClientOriginalExtension();
            $fileName = rand(10000, 90000) . "." . $extension;
            $file->move('./logos/', $fileName);
        } else {
            $fileName = $company->logo;
        }
        $input['logo'] = $fileName;
        $input['name'] = strtolower($request->name);
        $input['added_from'] = session()->get('user_added');
        $company->update($input);
        return response()->json([
            "message" => 200,
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Company $company)
    {
        File::delete('./logos/' . $company->logo);
        $company->delete();
        return response()->json([
            "message" => 200,
        ]);
    }
}
