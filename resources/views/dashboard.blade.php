<!DOCTYPE html>
<html>
<head><title>Halcon - Dashboard</title></head>
<body>
<h1>Dashboard</h1>
<p>Welcome, {{ auth()->user()->name }} ({{ auth()->user()->role }})</p>
<nav>
    <a href="{{ route('users.index') }}">Users</a> |
    <a href="{{ route('orders.index') }}">Orders</a> |
    <a href="{{ route('orders.archived') }}">Archived Orders</a> |
    <form method="POST" action="{{ route('logout') }}" style="display:inline">
        @csrf
        <button type="submit">Logout</button>
    </form>
</nav>
</body>
</html>