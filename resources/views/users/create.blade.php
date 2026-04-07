<!DOCTYPE html>
<html>
<head><title>Create User</title></head>
<body>
<h1>Create User</h1>
<form method="POST" action="{{ route('users.store') }}">
    @csrf
    <label>Name: <input type="text" name="name" required></label><br>
    <label>Email: <input type="email" name="email" required></label><br>
    <label>Password: <input type="password" name="password" required></label><br>
    <label>Role:
        <select name="role">
            @foreach(['Admin','Sales','Purchasing','Warehouse','Route'] as $role)
                <option value="{{ $role }}">{{ $role }}</option>
            @endforeach
        </select>
    </label><br>
    <button type="submit">Create</button>
</form>
<a href="{{ route('users.index') }}">← Back</a>
</body>
</html>