<!DOCTYPE html>
<html>
<head><title>Login</title></head>
<body>
<h1>Login</h1>

@if($errors->any())
    <p style="color: red">{{ $errors->first() }}</p>
@endif

<form action="{{ route('login') }}" method="POST">
    @csrf
    <p>Email: <input type="email" name="email" value="{{ old('email') }}"></p>
    <p>Password: <input type="password" name="password"></p>
    <button type="submit">Login</button>
</form>

<a href="{{ route('register.form') }}">Don't have an account? Register</a>
</body>
</html>
