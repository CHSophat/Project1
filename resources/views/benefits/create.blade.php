<!DOCTYPE html>
<html>
<head><title>Add Benefit</title></head>
<body>
<h1>Add Benefit</h1>
<form action="{{ route('benefits.store') }}" method="POST">
    @csrf
    <p>Employee:
        <select name="employee_id" required>
            @foreach($employees as $emp)
                <option value="{{ $emp->id }}">{{ $emp->first_name }} {{ $emp->last_name }}</option>
            @endforeach
        </select>
    </p>
    <p>Benefit Type:
        <select name="benefit_type" required>
            <option value="insurance">Insurance</option>
            <option value="loan">Loan</option>
            <option value="allowance">Allowance</option>
            <option value="bonus">Bonus</option>
            <option value="other">Other</option>
        </select>
    </p>
    <p>Description: <input type="text" name="description"></p>
    <p>Amount: <input type="number" step="0.01" name="amount"></p>
    <p>Start Date: <input type="date" name="start_date"></p>
    <p>End Date: <input type="date" name="end_date"></p>
    <button type="submit">Save</button>
</form>
<a href="{{ route('benefits.index') }}">Back</a>
</body>
</html>
