<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Employee;
use File;

class EmployeeController extends Controller
{
    public function index()
    {
        $employees = Employee::paginate(10);
        // return $employees;
        return view('admin.employee.index',['employees' => $employees]);
    }

    public function show($id)
    {
        $employee = Employee::find($id);
        // return $employee;        
        return view('admin.employee.edit',['employee' => $employee]);
    }

    public function new()
    {
        return view('admin.employee.new');
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
        $imageName = time().'.'. $request->logo->extension();  
     
        $request->logo->move(public_path('images/employee'), $imageName);
        
        $employee = new Employee();
        
        $employee->first_name = $request->first_name;
        $employee->last_name = $request->last_name;
        $employee->email = $request->email;
        $employee->phone = $request->phone;
        $employee->company_id = $request->company;
        $employee->logo = $imageName;
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
        

        if ($request->hasFile('logo')) {
            $request->validate([
                'logo' => 'required|image|mimes:jpeg,png,jpg,gif,svg|dimensions:min_width=100,min_height=100',
            ]);
            try {
                File::delete(public_path('images/employee'. '/' . $employee->logo ));
            } catch (\Throwable $th) {
                //throw $th;
            }

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
