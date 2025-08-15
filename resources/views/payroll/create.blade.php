<!DOCTYPE html>
<html>
<head><title>Create Payroll</title></head>
<body>
<h1>Add Payroll</h1>
<form action="{{ route('payroll.store') }}" method="POST">
    @csrf
    <p>Employee:
        <select name="employee_id" required>
            @foreach($employees as $emp)
                <option value="{{ $emp->id }}">{{ $emp->first_name }} {{ $emp->last_name }}</option>
            @endforeach
        </select>
    </p>
    <p>Month: <input type="month" name="month" required></p>
    <p>Salary: <input type="number" step="0.01" name="salary" required></p>
    <p>Bonuses: <input type="number" step="0.01" name="bonuses" value="0.00"></p>
    <p>Deductions: <input type="number" step="0.01" name="deductions" value="0.00"></p>
    <p>Paid Date: <input type="date" name="paid_date"></p>
    <button type="submit">Save</button>
</form>
<a href="{{ route('payroll.index') }}">Back</a>
</body>
</html>
