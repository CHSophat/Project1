<!DOCTYPE html>
<html>
<head><title>Edit Asset</title></head>
<body>
<h1>Edit Asset</h1>
<form action="{{ route('assets.update', $asset->id) }}" method="POST">
    @csrf @method('PUT')
    <p>Asset Name: <input type="text" name="asset_name" value="{{ $asset->asset_name }}" required></p>
    <p>Serial Number: <input type="text" name="serial_number" value="{{ $asset->serial_number }}"></p>
    <p>Assign To:
        <select name="assigned_to">
            <option value="">-- None --</option>
            @foreach($employees as $emp)
                <option value="{{ $emp->id }}" {{ $asset->assigned_to==$emp->id?'selected':'' }}>
                    {{ $emp->first_name }} {{ $emp->last_name }}
                </option>
            @endforeach
        </select>
    </p>
    <p>Assigned Date: <input type="date" name="assigned_date" value="{{ $asset->assigned_date }}"></p>
    <p>Return Date: <input type="date" name="return_date" value="{{ $asset->return_date }}"></p>
    <p>Status:
        <select name="status">
            <option value="available" {{ $asset->status=='available'?'selected':'' }}>Available</option>
            <option value="assigned" {{ $asset->status=='assigned'?'selected':'' }}>Assigned</option>
            <option value="maintenance" {{ $asset->status=='maintenance'?'selected':'' }}>Maintenance</option>
            <option value="retired" {{ $asset->status=='retired'?'selected':'' }}>Retired</option>
        </select>
    </p>
    <button type="submit">Update</button>
</form>
<a href="{{ route('assets.index') }}">Back</a>
</body>
</html>
