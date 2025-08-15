<?php

namespace App\Http\Controllers;

use App\Models\Department;
use Illuminate\Http\Request;

class DepartmentController extends Controller
{
    // Show all departments
    public function index()
    {
        $departments = Department::all();
        return view('departments.index', compact('departments'));
    }

    // Show create form
    public function create()
    {
        return view('departments.create');
    }

    // Store new department
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|max:100',
            'description' => 'nullable|max:255',
        ]);

        Department::create($request->all());
        return redirect()->route('departments.index')->with('success', 'Department created successfully!');
    }

    // Show edit form
    public function edit($id)
    {
        $department = Department::findOrFail($id);
        return view('departments.edit', compact('department'));
    }

    // Update department
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|max:100',
            'description' => 'nullable|max:255',
        ]);

        $department = Department::findOrFail($id);
        $department->update($request->all());

        return redirect()->route('departments.index')->with('success', 'Department updated successfully!');
    }

    // Delete department
    public function destroy($id)
    {
        Department::findOrFail($id)->delete();
        return redirect()->route('departments.index')->with('success', 'Department deleted successfully!');
    }
}
