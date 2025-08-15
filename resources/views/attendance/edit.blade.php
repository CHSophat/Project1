<!DOCTYPE html>
<html>
<head><title>Edit Attendance</title></head>
<body>
<h1>Edit Attendance</h1>
<form action="{{ route('attendance.update', $attendance->id) }}" method="POST">
    @csrf @method('PUT')
    <p>Employee: 
        <select name="employee_id" required>
            @foreach($employees as $emp)
                <option value="{{ $emp->id }}" {{ $attendance->employee_id == $emp->id ? 'selected' : '' }}>
                    {{ $emp->first_name }} {{ $emp->last_name }}
                </option>
            @endforeach
        </select>
    </p>
    <p>Date: <input type="date" name="date" value="{{ $attendance->date }}" required></p>
    <p>Check In: <input type="time" name="check_in" value="{{ $attendance->check_in }}"></p>
    <p>Check Out: <input type="time" name="check_out" value="{{ $attendance->check_out }}"></p>
    <p>Status: 
        <select name="status">
            <option value="present" {{ $attendance->status=='present' ? 'selected':'' }}>Present</option>
            <option value="absent" {{ $attendance->status=='absent' ? 'selected':'' }}>Absent</option>
            <option value="late" {{ $attendance->status=='late' ? 'selected':'' }}>Late</option>
            <option value="leave" {{ $attendance->status=='leave' ? 'selected':'' }}>Leave</option>
        </select>
    </p>
    <button type="submit">Update</button>
</form>
<a href="{{ route('attendance.index') }}">Back</a>
</body>
</html>
