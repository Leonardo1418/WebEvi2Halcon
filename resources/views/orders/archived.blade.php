<!DOCTYPE html>
<html>
<head><title>Archived Orders</title></head>
<body>
<h1>Archived Orders</h1>
<table border="1">
    <tr><th>Invoice #</th><th>Customer</th><th>Status</th><th>Actions</th></tr>
    @foreach($orders as $order)
    <tr>
        <td>{{ $order->invoice_number }}</td>
        <td>{{ $order->customer_name }}</td>
        <td>{{ $order->status }}</td>
        <td>
            <form method="POST" action="{{ route('orders.restore', $order->id) }}">
                @csrf @method('PATCH')
                <button type="submit">Restore</button>
            </form>
        </td>
    </tr>
    @endforeach
</table>
<a href="{{ route('dashboard') }}">← Dashboard</a>
</body>
</html>