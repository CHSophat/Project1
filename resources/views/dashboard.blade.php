<!DOCTYPE html>
<html>
<head>
    <title>Dashboard</title>
</head>
<body>
<h1>Dashboard</h1>

<p>Welcome, {{ auth()->user()->name }} | 
    <form action="{{ route('logout') }}" method="POST" style="display:inline;">
        @csrf
        <button type="submit">Logout</button>
    </form>
</p>

<h2>Statistics</h2>
<ul>
    <li>Total Employees: {{ $totalEmployees }}</li>
    <li>Total Admins: {{ $totalAdmins }}</li>
    <li>Total Payroll: ${{ number_format($totalPayroll, 2) }}</li>
</ul>

<h2>Quick Links</h2>
<ul>
    <li><a href="{{ route('employees.index') }}">Employees</a></li>
    <li><a href="{{ route('payroll.index') }}">Payroll</a></li>
    <li><a href="{{ route('assets.index') }}">Assets</a></li>
    <li><a href="{{ route('benefits.index') }}">Benefits</a></li>
    <li><a href="{{ route('reviews.index') }}">Performance Reviews</a></li>
</ul>

</body>
</html>
