<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Company;
use File;

class CompanyController extends Controller
{
    public function index()
    {
        $companies = Company::paginate(10);
        // return $companies;
        return view('admin.company.index',['companies' => $companies]);
    }

    public function show($id)
    {
        $company = Company::find($id);
        // return $company;        
        return view('admin.company.edit',['company' => $company]);
    }

    public function new()
    {
        return view('admin.company.new');
    }

    public function add(Request $request)
    {
        // return $request;
        $request->validate([
            'name' => 'required|min:2|max:255',
            'email' => 'nullable|max:255',
            'website' => 'nullable|max:255',

            'logo' => 'required|image|mimes:jpeg,png,jpg,gif,svg|dimensions:min_width=100,min_height=100|max:2048',
        ]);

        $imageName = time().'.'. $request->logo->extension();  
     
        $request->logo->move(public_path('images/company'), $imageName);
        
        $company = new Company();
        
        $company->name = $request->name;
        $company->email = $request->email;
        $company->website = $request->website;
        $company->logo = $imageName;
        $company->save();

        return redirect()->route('admin.company.index')->with('success','successfully added company.');
    }

    public function edit(Request $request)
    {
        // return $request;
        $request->validate([
            'id' => 'required|exists:companies,id',
            'name' => 'required|min:2|max:255',
            'email' => 'nullable|max:255',
            'website' => 'nullable|max:255',

        ]);
        // return var_dump($request->phone_no);
        $company = Company::find($request->id);

        if ($request->hasFile('logo')) {
            $request->validate([
                'logo' => 'required|image|mimes:jpeg,png,jpg,gif,svg|dimensions:min_width=100,min_height=100',
            ]);
            try {
                File::delete(public_path('images/company'. '/' . $company->logo ));
            } catch (\Throwable $th) {
                //throw $th;
            }

            $imageName = time().'.'. $request->logo->extension();  
     
            $request->logo->move(public_path('images/company'), $imageName);
            $company->logo = $imageName;

        }
        
        $company->name = $request->name;
        $company->email = $request->email;
        $company->website = $request->website;
        $company->save();

        return redirect()->route('admin.company.index')->with('success','successfully edited company.');
    }

    public function delete(Request $request)
    {
        $request->validate([
            'id' => 'required|exists:companies,id',
        ]);
        $company = Company::find($request->id);
        $company->delete();

        return redirect()->route('admin.company.index')->with('success','You have successfully deleted company.');    
    }
}
