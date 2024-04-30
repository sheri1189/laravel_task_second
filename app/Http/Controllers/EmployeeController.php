<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Http\Requests\StoreEmployeeRequest;
use App\Http\Requests\UpdateEmployeeRequest;
use App\Models\Company;
use Illuminate\Support\Facades\File;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $allemployees = Employee::where('added_from', session()->get('user_added'))->latest()->get();
        $companies = Company::where('added_from', session()->get('user_added'))->latest()->get();
        $array_data=[];
        foreach ($allemployees as $employee) {
            $company = Company::where('id', $employee->company)->first();
            if ($company) {
                $array_data[$employee->id] = $company->name;
            }
        }
        $compact = compact("allemployees","array_data","companies");
        return view('Employee.view')->with($compact);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function add_employee()
    {
        $companies = Company::where('added_from', session()->get('user_added'))->latest()->get();
        return view('Employee.add', compact("companies"));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreEmployeeRequest $request)
    {
        $input = $request->all();
        $input['added_from'] = session()->get('user_added');
        Employee::create($input);
        return response()->json([
            "message" => 200,
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Employee $employee)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Employee $employee)
    {
        return response()->json([
            "message" => $employee,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateEmployeeRequest $request, Employee $employee)
    {
        $request->validate(
            [
                "name" => "unique:employees,email,$employee->id",
            ]
        );
        $input=$request->all();
        $input['added_from'] = session()->get('user_added');
        $employee->update($input);
        return response()->json([
            "message" => 200,
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Employee $employee)
    {
        $employee->delete();
        return response()->json([
            "message" => 200,
        ]);
    }
}
