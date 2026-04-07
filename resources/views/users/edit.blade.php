<!DOCTYPE html>
<html>
<head><title>Edit User</title></head>
<body>
<h1>Edit User</h1>
<form method="POST" action="{{ route('users.update', $user) }}">
    @csrf @method('PUT')
    <label>Name: <input type="text" name="name" value="{{ $user->name }}" required></label><br>
    <label>Email: <input type="email" name="email" value="{{ $user->email }}" required></label><br>
    <label>Role:
        <select name="role">
            @foreach(['Admin','Sales','Purchasing','Warehouse','Route'] as $role)
                <option value="{{ $role }}" {{ $user->role === $role ? 'selected' : '' }}>
                    {{ $role }}
                </option>
            @endforeach
        </select>
    </label><br>
    <label>Active:
        <select name="active">
            <option value="1" {{ $user->active ? 'selected' : '' }}>Yes</option>
            <option value="0" {{ !$user->active ? 'selected' : '' }}>No</option>
        </select>
    </label><br>
    <button type="submit">Save Changes</button>
</form>
<a href="{{ route('users.index') }}">← Back</a>
</body>
</html>