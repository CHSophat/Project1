<!DOCTYPE html>
<html>
<head><title>Employees</title></head>
<body>
    <h1>Employees</h1>
    <a href="{{ route('employees.create') }}">Add Employee</a>

    @if(session('success'))
        <p style="color: green;">{{ session('success') }}</p>
    @endif

    <table border="1" cellpadding="5">
        <tr>
            <th>ID</th><th>Name</th><th>Email</th><th>Department</th><th>Manager</th><th>Actions</th>
        </tr>
        @foreach ($employees as $employee)
        <tr>
            <td>{{ $employee->id }}</td>
            <td>{{ $employee->first_name }} {{ $employee->last_name }}</td>
            <td>{{ $employee->email }}</td>
            <td>{{ $employee->department->name ?? '-' }}</td>
            <td>{{ $employee->manager->first_name ?? '-' }}</td>
            <td>
                <a href="{{ route('employees.show', $employee->id) }}">View</a> |
                <a href="{{ route('employees.edit', $employee->id) }}">Edit</a> |
                <form action="{{ route('employees.destroy', $employee->id) }}" method="POST" style="display:inline;">
                    @csrf @method('DELETE')
                    <button type="submit" onclick="return confirm('Delete this employee?')">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>
</body>
</html>
