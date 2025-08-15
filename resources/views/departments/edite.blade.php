<!DOCTYPE html>
<html>
<head>
    <title>Edit Department</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="p-4">

    <div class="container">
        <h2>Edit Department</h2>

        <form action="{{ route('departments.update', $department->id) }}" method="POST">
            @csrf @method('PUT')

            <div class="form-group mb-2">
                <label>Department Name</label>
                <input type="text" name="name" value="{{ $department->name }}" class="form-control" required>
            </div>

            <div class="form-group mb-2">
                <label>Description</label>
                <input type="text" name="description" value="{{ $department->description }}" class="form-control">
            </div>

            <button type="submit" class="btn btn-primary">Update</button>
            <a href="{{ route('departments.index') }}" class="btn btn-secondary">Cancel</a>
        </form>
    </div>

</body>
</html>
