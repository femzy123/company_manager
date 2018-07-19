<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Employee;
use App\Company;

class EmployeesController extends Controller
{
    
    public function index()
    {
        $employees = Employee::paginate(10);

        return view('employees.index', compact('employees'));
    }

    
    public function create()
    {
        return view('employees.create');
    }

    
    public function store(Request $request)
    {
        $this->validate($request, [
            'first_name' => 'required',
            'last_name' => 'required'
        ]);

        $employees = new Employee;
        $employees->first_name = $request->input('first_name');
        $employees->last_name = $request->input('last_name');
        $employees->company_id = $request->input('company_id');
        $employees->email = $request->input('email');
        $employees->phone = $request->input('phone');

        $employees->save();

        return redirect('/employees');
    }

    
    public function show($id)
    {
        //
    }

    
    public function edit($id)
    {
        $employee = Employee::find($id);
        return view('employees.edit', compact('employee'));
    }

    
    public function update(Request $request, $id)
    {
        $employees = new Employee;
        $employees->first_name = $request->input('first_name');
        $employees->last_name = $request->input('last_name');
        $employees->company_id = $request->input('company_id');
        $employees->email = $request->input('email');
        $employees->phone = $request->input('phone');

        $employees->save();

        return redirect('/employees');
    }

    
    public function destroy($id)
    {
        $employee = Employee::find($id);

        $employee->delete();

        return redirect('/employees');
    }
}
