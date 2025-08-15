<?php

namespace App\Http\Controllers;

use App\Models\Payroll;
use App\Models\Employee;
use Illuminate\Http\Request;

class PayrollController extends Controller
{
    public function index()
    {
        $payrolls = Payroll::with('employee')->get();
        return view('payroll.index', compact('payrolls'));
    }

    public function create()
    {
        $employees = Employee::all();
        return view('payroll.create', compact('employees'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'employee_id' => 'required|exists:employees,id',
            'month' => 'required|date',
            'salary' => 'required|numeric',
            'bonuses' => 'nullable|numeric',
            'deductions' => 'nullable|numeric',
            'paid_date' => 'nullable|date',
        ]);

        Payroll::create($request->all());
        return redirect()->route('payroll.index')->with('success', 'Payroll added successfully.');
    }

    public function edit(Payroll $payroll)
    {
        $employees = Employee::all();
        return view('payroll.edit', compact('payroll', 'employees'));
    }

    public function update(Request $request, Payroll $payroll)
    {
        $request->validate([
            'employee_id' => 'required|exists:employees,id',
            'month' => 'required|date',
            'salary' => 'required|numeric',
            'bonuses' => 'nullable|numeric',
            'deductions' => 'nullable|numeric',
            'paid_date' => 'nullable|date',
        ]);

        $payroll->update($request->all());
        return redirect()->route('payroll.index')->with('success', 'Payroll updated successfully.');
    }

    public function destroy(Payroll $payroll)
    {
        $payroll->delete();
        return redirect()->route('payroll.index')->with('success', 'Payroll deleted successfully.');
    }

    public function show(Payroll $payroll)
    {
        return view('payroll.show', compact('payroll'));
    }
}
