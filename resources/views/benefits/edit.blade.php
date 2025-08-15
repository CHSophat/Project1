<!DOCTYPE html>
<html>
<head><title>Edit Benefit</title></head>
<body>
<h1>Edit Benefit</h1>
<form action="{{ route('benefits.update', $benefit->id) }}" method="POST">
    @csrf @method('PUT')
    <p>Employee:
        <select name="employee_id" required>
            @foreach($employees as $emp)
                <option value="{{ $emp->id }}" {{ $benefit->employee_id==$emp->id?'selected':'' }}>
                    {{ $emp->first_name }} {{ $emp->last_name }}
                </option>
            @endforeach
        </select>
    </p>
    <p>Benefit Type:
        <select name="benefit_type" required>
            <option value="insurance" {{ $benefit->benefit_type=='insurance'?'selected':'' }}>Insurance</option>
            <option value="loan" {{ $benefit->benefit_type=='loan'?'selected':'' }}>Loan</option>
            <option value="allowance" {{ $benefit->benefit_type=='allowance'?'selected':'' }}>Allowance</option>
            <option value="bonus" {{ $benefit->benefit_type=='bonus'?'selected':'' }}>Bonus</option>
            <option value="other" {{ $benefit->benefit_type=='other'?'selected':'' }}>Other</option>
        </select>
    </p>
    <p>Description: <input type="text" name="description" value="{{ $benefit->description }}"></p>
    <p>Amount: <input type="number" step="0.01" name="amount" value="{{ $benefit->amount }}"></p>
    <p>Start Date: <input type="date" name="start_date" value="{{ $benefit->start_date }}"></p>
    <p>End Date: <input type="date" name="end_date" value="{{ $benefit->end_date }}"></p>
    <button type="submit">Update</button>
</form>
<a href="{{ route('benefits.index') }}">Back</a>
</body>
</html>
