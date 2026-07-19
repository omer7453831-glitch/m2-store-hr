<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    public function index()
    {
        $employees = Employee::latest()->get();

        return view('employees.index', compact('employees'));
    }

    public function create()
    {
        return view('employees.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'phone' => 'required',
            'job_title' => 'required',
        ]);

        Employee::create([
            'employee_code' => 'EMP' . rand(1000, 9999),
            'name' => $request->name,
            'phone' => $request->phone,
            'email' => '',
            'job_title' => $request->job_title,
            'department' => 'General',
            'salary' => 0,
            'hire_date' => now(),
            'status' => 'Active',
            'image' => '',
        ]);

        return redirect()->route('employees.index')
            ->with('success', 'تم إضافة الموظف');
    }

    public function show(Employee $employee)
    {
        //
    }

    public function edit(Employee $employee)
    {
        return view('employees.edit', compact('employee'));
    }

    public function update(Request $request, Employee $employee)
    {
        $request->validate([
            'name' => 'required',
            'phone' => 'required',
            'job_title' => 'required',
        ]);

        $employee->update([
            'name' => $request->name,
            'phone' => $request->phone,
            'job_title' => $request->job_title,
        ]);

        return redirect()->route('employees.index')
            ->with('success', 'تم تعديل الموظف');
    }

    public function destroy(Employee $employee)
    {
        $employee->delete();

        return redirect()->route('employees.index')
            ->with('success', 'تم حذف الموظف');
    }
}