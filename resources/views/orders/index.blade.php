<!DOCTYPE html>
<html>
<head><title>Orders</title></head>
<body>
<h1>Orders</h1>
<a href="{{ route('orders.create') }}">+ New Order</a>
<table border="1">
    <tr><th>Invoice #</th><th>Customer</th><th>Status</th><th>Date</th><th>Actions</th></tr>
    @foreach($orders as $order)
    <tr>
        <td>{{ $order->invoice_number }}</td>
        <td>{{ $order->customer_name }}</td>
        <td>{{ $order->status }}</td>
        <td>{{ $order->order_date->format('d/m/Y') }}</td>
        <td>
            <a href="{{ route('orders.show', $order) }}">View</a>
            <a href="{{ route('orders.edit', $order) }}">Edit</a>
            <form method="POST" action="{{ route('orders.destroy', $order) }}" style="display:inline">
                @csrf @method('DELETE')
                <button onclick="return confirm('Archive this order?')">Archive</button>
            </form>
        </td>
    </tr>
    @endforeach
</table>
<a href="{{ route('dashboard') }}">← Dashboard</a>
</body>
</html>