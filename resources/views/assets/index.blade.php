<!DOCTYPE html>
<html>
<head><title>Assets</title></head>
<body>
<h1>Assets</h1>
<a href="{{ route('assets.create') }}">Add Asset</a>

@if(session('success'))
    <p style="color: green;">{{ session('success') }}</p>
@endif

<table border="1" cellpadding="5">
<tr>
    <th>ID</th>
    <th>Asset Name</th>
    <th>Serial Number</th>
    <th>Assigned To</th>
    <th>Assigned Date</th>
    <th>Return Date</th>
    <th>Status</th>
    <th>Actions</th>
</tr>
@foreach($assets as $a)
<tr>
    <td>{{ $a->id }}</td>
    <td>{{ $a->asset_name }}</td>
    <td>{{ $a->serial_number ?? '-' }}</td>
    <td>{{ $a->employee ? $a->employee->first_name.' '.$a->employee->last_name : '-' }}</td>
    <td>{{ $a->assigned_date ?? '-' }}</td>
    <td>{{ $a->return_date ?? '-' }}</td>
    <td>{{ $a->status }}</td>
    <td>
        <a href="{{ route('assets.edit', $a->id) }}">Edit</a> |
        <form action="{{ route('assets.destroy', $a->id) }}" method="POST" style="display:inline;">
            @csrf @method('DELETE')
            <button onclick="return confirm('Delete?')">Delete</button>
        </form>
    </td>
</tr>
@endforeach
</table>
</body>
</html>
