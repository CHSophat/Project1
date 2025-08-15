<!DOCTYPE html>
<html>
<head><title>Benefits</title></head>
<body>
<h1>Employee Benefits</h1>
<a href="{{ route('benefits.create') }}">Add Benefit</a>

@if(session('success'))
    <p style="color: green;">{{ session('success') }}</p>
@endif

<table border="1" cellpadding="5">
<tr>
    <th>ID</th>
    <th>Employee</th>
    <th>Type</th>
    <th>Description</th>
    <th>Amount</th>
    <th>Start Date</th>
    <th>End Date</th>
    <th>Actions</th>
</tr>
@foreach($benefits as $b)
<tr>
    <td>{{ $b->id }}</td>
    <td>{{ $b->employee->first_name }} {{ $b->employee->last_name }}</td>
    <td>{{ $b->benefit_type }}</td>
    <td>{{ $b->description ?? '-' }}</td>
    <td>{{ $b->amount ?? '-' }}</td>
    <td>{{ $b->start_date ?? '-' }}</td>
    <td>{{ $b->end_date ?? '-' }}</td>
    <td>
        <a href="{{ route('benefits.edit', $b->id) }}">Edit</a> |
        <form action="{{ route('benefits.destroy', $b->id) }}" method="POST" style="display:inline;">
            @csrf @method('DELETE')
            <button onclick="return confirm('Delete?')">Delete</button>
        </form>
    </td>
</tr>
@endforeach
</table>
</body>
</html>
