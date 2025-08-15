<!DOCTYPE html>
<html>
<head><title>Edit Employee</title></head>
<body>
    <h1>Edit Employee</h1>
    <form action="{{ route('employees.update', $employee->id) }}" method="POST">
        @csrf @method('PUT')
        <p>First Name: <input type="text" name="first_name" value="{{ old('first_name', $employee->first_name) }}"></p>
        <p>Last Name: <input type="text" name="last_name" value="{{ old('last_name', $employee->last_name) }}"></p>
        <p>Email: <input type="email" name="email" value="{{ old('email', $employee->email) }}"></p>
        <p>Phone: <input type="text" name="phone" value="{{ old('phone', $employee->phone) }}"></p>
        <p>Address: <input type="text" name="address" value="{{ old('address', $employee->address) }}"></p>
        <p>Date of Birth: <input type="date" name="date_of_birth" value="{{ old('date_of_birth', $employee->date_of_birth) }}"></p>
        <p>Hire Date: <input type="date" name="hire_date" value="{{ old('hire_date', $employee->hire_date) }}"></p>
        <p>Job Title: <input type="text" name="job_title" value="{{ old('job_title', $employee->job_title) }}"></p>
        <p>Salary: <input type="number" step="0.01" name="salary" value="{{ old('salary', $employee->salary) }}"></p>

        <p>Employment Status: 
            <select name="employment_status">
                <option value="active" {{ $employee->employment_status == 'active' ? 'selected' : '' }}>Active</option>
                <option value="terminated" {{ $employee->employment_status == 'terminated' ? 'selected' : '' }}>Terminated</option>
                <option value="resigned" {{ $employee->employment_status == 'resigned' ? 'selected' : '' }}>Resigned</option>
                <option value="on_leave" {{ $employee->employment_status == 'on_leave' ? 'selected' : '' }}>On Leave</option>
            </select>
        </p>

        <p>Department: 
            <select name="department_id">
                <option value="">None</option>
                @foreach ($departments as $department)
                    <option value="{{ $department->id }}" {{ $employee->department_id == $department->id ? 'selected' : '' }}>
                        {{ $department->name }}
                    </option>
                @endforeach
            </select>
        </p>

        <p>Manager: 
            <select name="manager_id">
                <option value="">None</option>
                @foreach ($managers as $manager)
                    <option value="{{ $manager->id }}" {{ $employee->manager_id == $manager->id ? 'selected' : '' }}>
                        {{ $manager->first_name }} {{ $manager->last_name }}
                    </option>
                @endforeach
            </select>
        </p>

        <button type="submit">Update</button>
    </form>
</body>
</html>
