<!DOCTYPE html>
<html>
<head><title>Edit Order</title></head>
<body>
<h1>Edit Order: {{ $order->invoice_number }}</h1>
<form method="POST" action="{{ route('orders.update', $order) }}">
    @csrf @method('PUT')
    <label>Customer Name:
        <input type="text" name="customer_name" value="{{ $order->customer_name }}" required>
    </label><br>
    <label>Delivery Address:
        <textarea name="delivery_address" required>{{ $order->delivery_address }}</textarea>
    </label><br>
    <label>Notes:
        <textarea name="notes">{{ $order->notes }}</textarea>
    </label><br>
    <label>Status:
        <select name="status">
            @foreach(['Ordered','In process','In route','Delivered'] as $status)
                <option value="{{ $status }}" {{ $order->status === $status ? 'selected' : '' }}>
                    {{ $status }}
                </option>
            @endforeach
        </select>
    </label><br>
    <button type="submit">Save Changes</button>
</form>

{{-- Photo upload: only when In route or Delivered --}}
@if(in_array($order->status, ['In route', 'Delivered']))
<hr>
<h3>Upload Evidence Photo</h3>
<form method="POST" action="{{ route('orders.photos.store', $order) }}"
      enctype="multipart/form-data">
    @csrf
    <input type="hidden" name="photo_type"
           value="{{ $order->status === 'In route' ? 'Route' : 'Delivery' }}">
    <input type="file" name="photo" accept="image/*" required>
    <button type="submit">Upload Photo</button>
</form>
@endif

<a href="{{ route('orders.show', $order) }}">← Back</a>
</body>
</html>