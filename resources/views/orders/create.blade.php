<!DOCTYPE html>
<html>
<head><title>New Order</title></head>
<body>
<h1>Create Order</h1>
<form method="POST" action="{{ route('orders.store') }}">
    @csrf
    <label>Invoice #: <input type="text" name="invoice_number" required></label><br>
    <label>Customer Name: <input type="text" name="customer_name" required></label><br>
    <label>Customer Number: <input type="text" name="customer_number" required></label><br>
    <label>Fiscal Data: <textarea name="fiscal_data"></textarea></label><br>
    <label>Order Date: <input type="datetime-local" name="order_date" required></label><br>
    <label>Delivery Address: <textarea name="delivery_address" required></textarea></label><br>
    <label>Notes: <textarea name="notes"></textarea></label><br>
    <button type="submit">Create Order</button>
</form>
<a href="{{ route('orders.index') }}">← Back</a>
</body>
</html>