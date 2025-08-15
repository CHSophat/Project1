<?php

namespace App\Http\Controllers;

use App\Models\Benefit;
use App\Models\Employee;
use Illuminate\Http\Request;

class BenefitController extends Controller
{
    public function index()
    {
        $benefits = Benefit::with('employee')->get();
        return view('benefits.index', compact('benefits'));
    }

    public function create()
    {
        $employees = Employee::all();
        return view('benefits.create', compact('employees'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'employee_id' => 'required|exists:employees,id',
            'benefit_type' => 'required|in:insurance,loan,allowance,bonus,other',
            'description' => 'nullable|string|max:255',
            'amount' => 'nullable|numeric',
            'start_date' => 'nullable|date',
            'end_date' => 'nullable|date',
        ]);

        Benefit::create($request->all());
        return redirect()->route('benefits.index')->with('success', 'Benefit added successfully.');
    }

    public function edit(Benefit $benefit)
    {
        $employees = Employee::all();
        return view('benefits.edit', compact('benefit', 'employees'));
    }

    public function update(Request $request, Benefit $benefit)
    {
        $request->validate([
            'employee_id' => 'required|exists:employees,id',
            'benefit_type' => 'required|in:insurance,loan,allowance,bonus,other',
            'description' => 'nullable|string|max:255',
            'amount' => 'nullable|numeric',
            'start_date' => 'nullable|date',
            'end_date' => 'nullable|date',
        ]);

        $benefit->update($request->all());
        return redirect()->route('benefits.index')->with('success', 'Benefit updated successfully.');
    }

    public function destroy(Benefit $benefit)
    {
        $benefit->delete();
        return redirect()->route('benefits.index')->with('success', 'Benefit deleted successfully.');
    }
}
