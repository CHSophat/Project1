<!DOCTYPE html>
<html>
<head><title>Add Attendance</title></head>
<body>
<h1>Add Attendance</h1>
<form action="{{ route('attendance.store') }}" method="POST">
    @csrf
    <p>Employee: 
        <select name="employee_id" required>
            @foreach($employees as $emp)
                <option value="{{ $emp->id }}">{{ $emp->first_name }} {{ $emp->last_name }}</option>
            @endforeach
        </select>
    </p>
    <p>Date: <input type="date" name="date" required></p>
    <p>Check In: <input type="time" name="check_in"></p>
    <p>Check Out: <input type="time" name="check_out"></p>
    <p>Status: 
        <select name="status">
            <option value="present">Present</option>
            <option value="absent">Absent</option>
            <option value="late">Late</option>
            <option value="leave">Leave</option>
        </select>
    </p>
    <button type="submit">Save</button>
</form>
<a href="{{ route('attendance.index') }}">Back</a>
</body>
</html>
