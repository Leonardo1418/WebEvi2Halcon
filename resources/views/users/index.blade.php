<!DOCTYPE html>
<html>
<head><title>Users</title></head>
<body>
<h1>Users</h1>
<a href="{{ route('users.create') }}">+ New User</a>
<table border="1">
    <tr><th>Name</th><th>Email</th><th>Role</th><th>Active</th><th>Actions</th></tr>
    @foreach($users as $user)
    <tr>
        <td>{{ $user->name }}</td>
        <td>{{ $user->email }}</td>
        <td>{{ $user->role }}</td>
        <td>{{ $user->active ? 'Yes' : 'No' }}</td>
        <td>
            <a href="{{ route('users.edit', $user) }}">Edit</a>
        </td>
    </tr>
    @endforeach
</table>
<a href="{{ route('dashboard') }}">← Dashboard</a>
</body>
</html>