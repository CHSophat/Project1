<!DOCTYPE html>
<html>
<head><title>Payroll</title></head>
<body>
<h1>Payroll Records</h1>
<a href="{{ route('payroll.create') }}">Add Payroll</a>

@if(session('success'))
    <p style="color: green;">{{ session('success') }}</p>
@endif

<table border="1" cellpadding="5">
<tr>
    <th>ID</th>
    <th>Employee</th>
    <th>Month</th>
    <th>Salary</th>
    <th>Bonuses</th>
    <th>Deductions</th>
    <th>Net Pay</th>
    <th>Paid Date</th>
    <th>Actions</th>
</tr>
@foreach($payrolls as $p)
<tr>
    <td>{{ $p->id }}</td>
    <td>{{ $p->employee->first_name }} {{ $p->employee->last_name }}</td>
    <td>{{ $p->month }}</td>
    <td>{{ $p->salary }}</td>
    <td>{{ $p->bonuses }}</td>
    <td>{{ $p->deductions }}</td>
    <td>{{ $p->net_pay }}</td>
    <td>{{ $p->paid_date ?? '-' }}</td>
    <td>
        <a href="{{ route('payroll.edit', $p->id) }}">Edit</a> |
        <form action="{{ route('payroll.destroy', $p->id) }}" method="POST" style="display:inline;">
            @csrf @method('DELETE')
            <button onclick="return confirm('Delete?')">Delete</button>
        </form>
    </td>
</tr>
@endforeach
</table>
</body>
</html>
