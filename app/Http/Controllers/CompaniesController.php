<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Company;

class CompaniesController extends Controller
{
    
    public function index()
    {

        $companies = Company::paginate(10);

        return view('companies.index')->with('companies', $companies);
    }

    
    public function create()
    {
        return view('companies.create');
    }

   
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'email' => 'email',
            'logo' => 'image|dimensions:min_width=100,min_height=100',
        ]);


        $filenameWithExt = $request->file('logo')->getClientOriginalName();
        $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
        $extension = $request->file('logo')->getClientOriginalExtension();
        $filenameToStore = $filename.'_'.time().'.'.$extension;
        $path = $request->file('logo')->storeAs('public/logo', $filenameToStore);

//        Upload Photo Album

        $companies = new Company;
        $companies->name = $request->input('name');
        $companies->email = $request->input('email');
        $companies->website = $request->input('website');
        $companies->logo = $filenameToStore;

        $companies->save();

        return redirect('/companies');
    }

    
    public function show($id)
    {
        //
    }

   
    public function edit($id)
    {
        $company = Company::find($id);
        return view('companies.edit')->with('company', $company);
    }

    
    public function update(Request $request, $id)
    {

        $companies = Company::find($id);
        $companies->name = $request->input('name');
        $companies->email = $request->input('email');
        $companies->website = $request->input('website');

        $companies->save();

        return redirect('/companies');
    }

    
    public function destroy($id)
    {
        $company = Company::find($id);

        $company->delete();

        return redirect('/companies');
    }
}
