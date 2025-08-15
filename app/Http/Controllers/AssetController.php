<?php

namespace App\Http\Controllers;

use App\Models\Asset;
use App\Models\Employee;
use Illuminate\Http\Request;

class AssetController extends Controller
{
    public function index()
    {
        $assets = Asset::with('employee')->get();
        return view('assets.index', compact('assets'));
    }

    public function create()
    {
        $employees = Employee::all();
        return view('assets.create', compact('employees'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'asset_name' => 'required|string|max:100',
            'serial_number' => 'nullable|string|max:100|unique:assets',
            'assigned_to' => 'nullable|exists:employees,id',
            'assigned_date' => 'nullable|date',
            'return_date' => 'nullable|date',
            'status' => 'required|in:assigned,available,maintenance,retired',
        ]);

        Asset::create($request->all());
        return redirect()->route('assets.index')->with('success', 'Asset added successfully.');
    }

    public function edit(Asset $asset)
    {
        $employees = Employee::all();
        return view('assets.edit', compact('asset', 'employees'));
    }

    public function update(Request $request, Asset $asset)
    {
        $request->validate([
            'asset_name' => 'required|string|max:100',
            'serial_number' => "nullable|string|max:100|unique:assets,serial_number,{$asset->id}",
            'assigned_to' => 'nullable|exists:employees,id',
            'assigned_date' => 'nullable|date',
            'return_date' => 'nullable|date',
            'status' => 'required|in:assigned,available,maintenance,retired',
        ]);

        $asset->update($request->all());
        return redirect()->route('assets.index')->with('success', 'Asset updated successfully.');
    }

    public function destroy(Asset $asset)
    {
        $asset->delete();
        return redirect()->route('assets.index')->with('success', 'Asset deleted successfully.');
    }
}
