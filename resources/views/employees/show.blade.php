<!DOCTYPE html>
<html>
<head><title>Employee Details</title></head>
<body>
    <h1>Employee Details</h1>
    <p><strong>Name:</strong> {{ $employee->first_name }} {{ $employee->last_name }}</p>
    <p><strong>Email:</strong> {{ $employee->email }}</p>
    <p><strong>Phone:</strong> {{ $employee->phone }}</p>
    <p><strong>Address:</strong> {{ $employee->address }}</p>
    <p><strong>Job Title:</strong> {{ $employee->job_title }}</p>
    <p><strong>Department:</strong> {{ $employee->department->name ?? '-' }}</p>
    <p><strong>Manager:</strong> {{ $employee->manager->first_name ?? '-' }}</p>
    <p><strong>Status:</strong> {{ $employee->employment_status }}</p>

    <a href="{{ route('employees.index') }}">Back</a>
</body>
</html>
