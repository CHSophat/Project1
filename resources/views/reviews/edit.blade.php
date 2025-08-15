<!DOCTYPE html>
<html>
<head><title>Edit Review</title></head>
<body>
<h1>Edit Performance Review</h1>
<form action="{{ route('reviews.update', $review->id) }}" method="POST">
    @csrf @method('PUT')
    <p>Employee:
        <select name="employee_id" required>
            @foreach($employees as $emp)
                <option value="{{ $emp->id }}" {{ $review->employee_id==$emp->id?'selected':'' }}>
                    {{ $emp->first_name }} {{ $emp->last_name }}
                </option>
            @endforeach
        </select>
    </p>
    <p>Review Date: <input type="date" name="review_date" value="{{ $review->review_date }}" required></p>
    <p>Reviewer: <input type="text" name="reviewer" value="{{ $review->reviewer }}"></p>
    <p>Rating (1-5): <input type="number" name="rating" min="1" max="5" value="{{ $review->rating }}" required></p>
    <p>Comments: <textarea name="comments">{{ $review->comments }}</textarea></p>
    <button type="submit">Update</button>
</form>
<a href="{{ route('reviews.index') }}">Back</a>
</body>
</html>
