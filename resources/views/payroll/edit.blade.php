<!DOCTYPE html>
<html>
<head><title>Edit Payroll</title></head>
<body>
<h1>Edit Payroll</h1>
<form action="{{ route('payroll.update', $payroll->id) }}" method="POST">
    @csrf @method('PUT')
    <p>Employee:
        <select name="employee_id" required>
            @foreach($employees as $emp)
                <option value="{{ $emp->id }}" {{ $payroll->employee_id==$emp->id?'selected':'' }}>
                    {{ $emp->first_name }} {{ $emp->last_name }}
                </option>
            @endforeach
        </select>
    </p>
    <p>Month: <input type="month" name="month" value="{{ \Carbon\Carbon::parse($payroll->month)->format('Y-m') }}" required></p>
    <p>Salary: <input type="number" step="0.01" name="salary" value="{{ $payroll->salary }}" required></p>
    <p>Bonuses: <input type="number" step="0.01" name="bonuses" value="{{ $payroll->bonuses }}"></p>
    <p>Deductions: <input type="number" step="0.01" name="deductions" value="{{ $payroll->deductions }}"></p>
    <p>Paid Date: <input type="date" name="paid_date" value="{{ $payroll->paid_date }}"></p>
    <button type="submit">Update</button>
</form>
<a href="{{ route('payroll.index') }}">Back</a>
</body>
</html>
