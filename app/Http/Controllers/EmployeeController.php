<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Alert;
use App\Models\Outlet;
use Illuminate\Support\Facades\Hash;

class EmployeeController extends Controller
{
    public function index()
    {
        $employees = Employee::join('outlets', 'outlets.id', '=', 'employees.outlet_id')
            ->select('employees.*', 'outlets.name as outlet')
            ->get();
        $data = [
            'employees' => $employees,
        ];
        return view('admin.management.employees.index', $data);
    }

    public function create()
    {
        $outlets = Outlet::all();
        $data = [
            'outlets' => $outlets,
        ];
        return view('admin.management.employees.create', $data);
    }

    public function store(Request $request)
    {
        Validator::validate($request->all(), [
            'fullname' => ['required', 'min:3', 'max:100'],
            'email' => ['required', 'min:3', 'max:100', 'unique:employees,email'],
            'password' => ['required', 'min:3', 'max:100'],
            'phone_number' => ['required', 'numeric', 'min:8'],
            'role' => ['required'],
            'outlet' => ['required'],
        ]);      

        $employee = new Employee([
            'fullname' => $request->input('fullname'),
            'email' => $request->input('email'),
            'password' => Hash::make($request->input('password')),
            'phone' => $request->input('phone_number'),
            'role' => $request->input('role'),
            'outlet_id' => $request->input('outlet'),
        ]);

        if ($employee->save()) {
            Alert::success('Create Employee', 'Success create employee');
            return redirect()->route('admin.employee.index');
        } else {
            Alert::error('Create Employee', 'Failed create employee');
            return redirect()->back();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function show(Employee $employee)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function edit(Employee $employee)
    {
        $outlets = Outlet::all();
        $data = [
            'employee' => $employee,
            'outlets' => $outlets
        ];
        return view('admin.management.employees.edit', $data);
    }

    public function update(Request $request, Employee $employee)
    {
        Validator::validate($request->all(), [
            'fullname' => ['required', 'min:3', 'max:100'],
            'email' => ['required', 'min:3', 'max:100'],
            'phone_number' => ['required', 'numeric', 'min:8'],
            'role' => ['required'],
            'outlet' => ['required'],
        ]);     
        
        $employee->fullname = $request->input('fullname');
        $employee->email = $request->input('email');
        $employee->phone = $request->input('phone_number');
        $employee->role = $request->input('role');
        $employee->outlet_id = $request->input('outlet');

        if (!empty($request->input('password'))) {
            $employee->password = Hash::make($request->input('password'));
        }

        if ($employee->save()) {
            Alert::success('Update Employee', 'Success update employee');
            return redirect()->route('admin.employee.index');
        } else {
            Alert::error('Update Employee', 'Failed update employee');
            return redirect()->back();
        }
    }

    public function destroy(Employee $employee)
    {
        if ($employee->delete()) {
            Alert::success('Delete Employee', 'Success delete employee');
        } else {
            Alert::error('Delete Employee', 'Failed delete employee');
        }

        return redirect()->route('admin.employee.index');
    }
}
