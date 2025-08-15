<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Employee;
use App\Models\User; // Assuming admin users are stored here
use App\Models\Payroll;

class DashboardController extends Controller
{
    public function index()
    {
        $totalEmployees = Employee::count();
        $totalAdmins = User::where('role', 'admin')->count(); // adjust 'role' column if exists
        $totalPayroll = Payroll::sum('net_pay');
        $totalAdmins = User::where('role', 'admin')->count();
        $totalAdmins = User::count();



        return view('dashboard', compact('totalEmployees', 'totalAdmins', 'totalPayroll'));
    }
}
