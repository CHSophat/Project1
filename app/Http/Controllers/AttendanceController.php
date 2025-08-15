<?php

namespace App\Http\Controllers;

use App\Models\Attendance;
use App\Models\Employee;
use Illuminate\Http\Request;

class AttendanceController extends Controller
{
    // List all attendance records
    public function index()
    {
        $attendances = Attendance::with('employee')->get();
        return view('attendance.index', compact('attendances'));
    }

    // Show create form
    public function create()
    {
        $employees = Employee::all();
        return view('attendance.create', compact('employees'));
    }

    // Store new attendance record
    public function store(Request $request)
    {
        $request->validate([
            'employee_id' => 'required|exists:employees,id',
            'date' => 'required|date',
            'check_in' => 'nullable',
            'check_out' => 'nullable',
            'status' => 'required|in:present,absent,late,leave',
        ]);

        Attendance::create($request->all());
        return redirect()->route('attendance.index')->with('success', 'Attendance added successfully.');
    }

    // Show edit form
    public function edit(Attendance $attendance)
    {
        $employees = Employee::all();
        return view('attendance.edit', compact('attendance', 'employees'));
    }

    // Update attendance
    public function update(Request $request, Attendance $attendance)
    {
        $request->validate([
            'employee_id' => 'required|exists:employees,id',
            'date' => 'required|date',
            'check_in' => 'nullable',
            'check_out' => 'nullable',
            'status' => 'required|in:present,absent,late,leave',
        ]);

        $attendance->update($request->all());
        return redirect()->route('attendance.index')->with('success', 'Attendance updated successfully.');
    }

    // Delete attendance
    public function destroy(Attendance $attendance)
    {
        $attendance->delete();
        return redirect()->route('attendance.index')->with('success', 'Attendance deleted successfully.');
    }
}
