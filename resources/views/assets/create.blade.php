<!DOCTYPE html>
<html>
<head><title>Add Asset</title></head>
<body>
<h1>Add Asset</h1>
<form action="{{ route('assets.store') }}" method="POST">
    @csrf
    <p>Asset Name: <input type="text" name="asset_name" required></p>
    <p>Serial Number: <input type="text" name="serial_number"></p>
    <p>Assign To:
        <select name="assigned_to">
            <option value="">-- None --</option>
            @foreach($employees as $emp)
                <option value="{{ $emp->id }}">{{ $emp->first_name }} {{ $emp->last_name }}</option>
            @endforeach
        </select>
    </p>
    <p>Assigned Date: <input type="date" name="assigned_date"></p>
    <p>Return Date: <input type="date" name="return_date"></p>
    <p>Status:
        <select name="status">
            <option value="available">Available</option>
            <option value="assigned">Assigned</option>
            <option value="maintenance">Maintenance</option>
            <option value="retired">Retired</option>
        </select>
    </p>
    <button type="submit">Save</button>
</form>
<a href="{{ route('assets.index') }}">Back</a>
</body>
</html>
