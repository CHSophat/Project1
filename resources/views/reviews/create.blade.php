<!DOCTYPE html>
<html>
<head><title>Add Review</title></head>
<body>
<h1>Add Performance Review</h1>
<form action="{{ route('reviews.store') }}" method="POST">
    @csrf
    <p>Employee:
        <select name="employee_id" required>
            @foreach($employees as $emp)
                <option value="{{ $emp->id }}">{{ $emp->first_name }} {{ $emp->last_name }}</option>
            @endforeach
        </select>
    </p>
    <p>Review Date: <input type="date" name="review_date" required></p>
    <p>Reviewer: <input type="text" name="reviewer"></p>
    <p>Rating (1-5): <input type="number" name="rating" min="1" max="5" required></p>
    <p>Comments: <textarea name="comments"></textarea></p>
    <button type="submit">Save</button>
</form>
<a href="{{ route('reviews.index') }}">Back</a>
</body>
</html>
