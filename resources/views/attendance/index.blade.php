<!DOCTYPE html>
<html>
<head><title>Attendance</title></head>
<body>
<h1>Attendance Records</h1>
<a href="{{ route('attendance.create') }}">Add Attendance</a>

@if(session('success'))
    <p style="color: green;">{{ session('success') }}</p>
@endif

<table border="1" cellpadding="5">
<tr>
    <th>ID</th>
    <th>Employee</th>
    <th>Date</th>
    <th>Check In</th>
    <th>Check Out</th>
    <th>Status</th>
    <th>Actions</th>
</tr>
@foreach($attendances as $att)
<tr>
    <td>{{ $att->id }}</td>
    <td>{{ $att->employee->first_name }} {{ $att->employee->last_name }}</td>
    <td>{{ $att->date }}</td>
    <td>{{ $att->check_in }}</td>
    <td>{{ $att->check_out }}</td>
    <td>{{ $att->status }}</td>
    <td>
        <a href="{{ route('attendance.edit', $att->id) }}">Edit</a> |
        <form action="{{ route('attendance.destroy', $att->id) }}" method="POST" style="display:inline;">
            @csrf @method('DELETE')
            <button onclick="return confirm('Delete?')">Delete</button>
        </form>
    </td>
</tr>
@endforeach
</table>
</body>
</html>
