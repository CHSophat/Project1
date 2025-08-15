<!DOCTYPE html>
<html>
<head>
    <title>Add Department</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="p-4">

    <div class="container">
        <h2>Add Department</h2>

        <form action="{{ route('departments.store') }}" method="POST">
            @csrf
            <div class="form-group mb-2">
                <label>Department Name</label>
                <input type="text" name="name" class="form-control" required>
            </div>

            <div class="form-group mb-2">
                <label>Description</label>
                <input type="text" name="description" class="form-control">
            </div>

            <button type="submit" class="btn btn-success">Save</button>
            <a href="{{ route('departments.index') }}" class="btn btn-secondary">Cancel</a>
        </form>
    </div>

</body>
</html>
