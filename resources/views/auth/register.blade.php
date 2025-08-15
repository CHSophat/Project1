<!DOCTYPE html>
<html>
<head><title>Register</title></head>
<body>
<h1>Register</h1>

@if(session('success'))
    <p style="color: green">{{ session('success') }}</p>
@endif

<form action="{{ route('register') }}" method="POST">
    @csrf
    <p>Name: <input type="text" name="name" value="{{ old('name') }}"></p>
    <p>Email: <input type="email" name="email" value="{{ old('email') }}"></p>
    <p>Password: <input type="password" name="password"></p>
    <p>Confirm Password: <input type="password" name="password_confirmation"></p>
    <button type="submit">Register</button>
</form>
<a href="{{ route('login.form') }}">Already have an account? Login</a>
</body>
</html>
