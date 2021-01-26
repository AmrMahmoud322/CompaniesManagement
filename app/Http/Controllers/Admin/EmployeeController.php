<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Employee;
use App\Models\Company;
use File;

class EmployeeController extends Controller
{
    public function index()
    {
        $employees = Employee::paginate(10); // get employees with pagination 10 row
        return view('admin.employee.index',['employees' => $employees]);
    }

    public function show($id)
    {
        $employee = Employee::find($id);
        $companies = Company::all();
        // return $employee;        
        return view('admin.employee.edit',['employee' => $employee,'companies' => $companies]);
    }

    public function new()
    {
        $companies = Company::all();
        return view('admin.employee.new',['companies' => $companies]);
    }

    public function add(Request $request)
    {
        // return $request;
        $request->validate([
            'first_name' => 'required|min:2|max:255',
            'last_name' => 'required|min:2|max:255',
            'email' => 'nullable|max:255',
            'phone' => 'nullable|max:255',

            'company' => 'required|exists:companies,id',
            'logo' => 'required|image|mimes:jpeg,png,jpg,gif,svg|dimensions:min_width=100,min_height=100',
        ]);
        $imageName = time().'.'. $request->logo->extension();  // create name for image (time + imageextension)
     
        $request->logo->move(public_path('images/employee'), $imageName); //store image in public folder 'images/employee'
        
        $employee = new Employee();
        
        $employee->first_name = $request->first_name;
        $employee->last_name = $request->last_name;
        $employee->email = $request->email;
        $employee->phone = $request->phone;
        $employee->company_id = $request->company;
        $employee->logo = $imageName; // save image name
        $employee->save();

        return redirect()->route('admin.employee.index')->with('success','successfully added employee.');
    }

    public function edit(Request $request)
    {
        // return $request;
        $request->validate([
            'id' => 'required|exists:employees,id',
            'first_name' => 'required|min:2|max:255',
            'last_name' => 'required|min:2|max:255',
            'email' => 'nullable|max:255',
            'phone' => 'nullable|max:255',

            'company' => 'required|exists:companies,id',
        ]);
        // return var_dump($request->phone_no);
        
        $employee = Employee::find($request->id);
        
        // check if admin change logo
        if ($request->hasFile('logo')) {
            // validate image before store it
            $request->validate([
                'logo' => 'required|image|mimes:jpeg,png,jpg,gif,svg|dimensions:min_width=100,min_height=100',
            ]);
            // delete old logo from public folder
            try {
                File::delete(public_path('images/employee'. '/' . $employee->logo ));
            } catch (\Throwable $th) {
                //throw $th;
            }
            // update company logo name and store it
            $imageName = time().'.'. $request->logo->extension();  
     
            $request->logo->move(public_path('images/employee'), $imageName);
            $employee->logo = $imageName;

        }

        $employee->first_name = $request->first_name;
        $employee->last_name = $request->last_name;
        $employee->email = $request->email;
        $employee->phone = $request->phone;
        $employee->company_id = $request->company;
        $employee->save();

        return redirect()->route('admin.employee.index')->with('success','successfully edited employee.');
    }

    public function delete(Request $request)
    {
        $request->validate([
            'id' => 'required|exists:employees,id',
        ]);
        $employee = Employee::find($request->id);
        $employee->delete();

        return redirect()->route('admin.employee.index')->with('success','You have successfully deleted employee.');    
    }
}
