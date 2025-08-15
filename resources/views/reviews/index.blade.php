<!DOCTYPE html>
<html>
<head><title>Performance Reviews</title></head>
<body>
<h1>Performance Reviews</h1>
<a href="{{ route('reviews.create') }}">Add Review</a>

@if(session('success'))
    <p style="color: green;">{{ session('success') }}</p>
@endif

<table border="1" cellpadding="5">
<tr>
    <th>ID</th>
    <th>Employee</th>
    <th>Review Date</th>
    <th>Reviewer</th>
    <th>Rating</th>
    <th>Comments</th>
    <th>Actions</th>
</tr>
@foreach($reviews as $r)
<tr>
    <td>{{ $r->id }}</td>
    <td>{{ $r->employee->first_name }} {{ $r->employee->last_name }}</td>
    <td>{{ $r->review_date }}</td>
    <td>{{ $r->reviewer ?? '-' }}</td>
    <td>{{ $r->rating }}</td>
    <td>{{ $r->comments }}</td>
    <td>
        <a href="{{ route('reviews.edit', $r->id) }}">Edit</a> |
        <form action="{{ route('reviews.destroy', $r->id) }}" method="POST" style="display:inline;">
            @csrf @method('DELETE')
            <button onclick="return confirm('Delete?')">Delete</button>
        </form>
    </td>
</tr>
@endforeach
</table>
</body>
</html>
