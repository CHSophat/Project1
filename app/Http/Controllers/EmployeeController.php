<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Models\Department;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    public function index()
    {
        $employees = Employee::with('department', 'manager')->get();
        return view('employees.index', compact('employees'));
    }

    public function create()
    {
        $departments = Department::all();
        $managers = Employee::all();
        return view('employees.create', compact('departments', 'managers'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'first_name' => 'required|max:100',
            'last_name'  => 'required|max:100',
            'email'      => 'required|email|unique:employees,email',
            'hire_date'  => 'required|date',
            'department_id' => 'nullable|exists:departments,id',
            'manager_id'    => 'nullable|exists:employees,id',
        ]);

        Employee::create($request->all());
        return redirect()->route('employees.index')->with('success', 'Employee created successfully.');
    }

    public function show(Employee $employee)
    {
        return view('employees.show', compact('employee'));
    }

    public function edit(Employee $employee)
    {
        $departments = Department::all();
        $managers = Employee::all();
        return view('employees.edit', compact('employee', 'departments', 'managers'));
    }

    public function update(Request $request, Employee $employee)
    {
        $request->validate([
            'first_name' => 'required|max:100',
            'last_name'  => 'required|max:100',
            'email'      => 'required|email|unique:employees,email,'.$employee->id,
            'hire_date'  => 'required|date',
            'department_id' => 'nullable|exists:departments,id',
            'manager_id'    => 'nullable|exists:employees,id',
        ]);

        $employee->update($request->all());
        return redirect()->route('employees.index')->with('success', 'Employee updated successfully.');
    }

    public function destroy(Employee $employee)
    {
        $employee->delete();
        return redirect()->route('employees.index')->with('success', 'Employee deleted successfully.');
    }
}
