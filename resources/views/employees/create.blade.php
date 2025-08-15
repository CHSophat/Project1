<!DOCTYPE html>
<html>
<head><title>Create Employee</title></head>
<body>
    <h1>Create Employee</h1>
    <form action="{{ route('employees.store') }}" method="POST">
        @csrf
        <p>First Name: <input type="text" name="first_name" value="{{ old('first_name') }}"></p>
        <p>Last Name: <input type="text" name="last_name" value="{{ old('last_name') }}"></p>
        <p>Email: <input type="email" name="email" value="{{ old('email') }}"></p>
        <p>Phone: <input type="text" name="phone" value="{{ old('phone') }}"></p>
        <p>Address: <input type="text" name="address" value="{{ old('address') }}"></p>
        <p>Date of Birth: <input type="date" name="date_of_birth" value="{{ old('date_of_birth') }}"></p>
        <p>Hire Date: <input type="date" name="hire_date" value="{{ old('hire_date') }}"></p>
        <p>Job Title: <input type="text" name="job_title" value="{{ old('job_title') }}"></p>
        <p>Salary: <input type="number" step="0.01" name="salary" value="{{ old('salary') }}"></p>

        <p>Employment Status: 
            <select name="employment_status">
                <option value="active">Active</option>
                <option value="terminated">Terminated</option>
                <option value="resigned">Resigned</option>
                <option value="on_leave">On Leave</option>
            </select>
        </p>

        <p>Department: 
            <select name="department_id">
                <option value="">None</option>
                @foreach ($departments as $department)
                    <option value="{{ $department->id }}">{{ $department->name }}</option>
                @endforeach
            </select>
        </p>

        <p>Manager: 
            <select name="manager_id">
                <option value="">None</option>
                @foreach ($managers as $manager)
                    <option value="{{ $manager->id }}">{{ $manager->first_name }} {{ $manager->last_name }}</option>
                @endforeach
            </select>
        </p>

        <button type="submit">Save</button>
    </form>
</body>
</html>
