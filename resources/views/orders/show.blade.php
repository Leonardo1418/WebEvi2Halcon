<!DOCTYPE html>
<html>
<head><title>Order Detail</title></head>
<body>
<h1>Order: {{ $order->invoice_number }}</h1>
<p><strong>Customer:</strong> {{ $order->customer_name }}</p>
<p><strong>Customer #:</strong> {{ $order->customer_number }}</p>
<p><strong>Fiscal Data:</strong> {{ $order->fiscal_data }}</p>
<p><strong>Date:</strong> {{ $order->order_date->format('d/m/Y H:i') }}</p>
<p><strong>Address:</strong> {{ $order->delivery_address }}</p>
<p><strong>Notes:</strong> {{ $order->notes }}</p>
<p><strong>Status:</strong> {{ $order->status }}</p>
<p><strong>Created by:</strong> {{ $order->user->name }}</p>

@if($order->photoEvidences->count())
<h3>Evidence Photos:</h3>
@foreach($order->photoEvidences as $photo)
    <p>{{ $photo->photo_type }} — {{ $photo->upload_date->format('d/m/Y H:i') }}</p>
    <img src="{{ asset('storage/'.$photo->file_path) }}" width="300"><br>
@endforeach
@endif

<a href="{{ route('orders.edit', $order) }}">Edit</a> |
<a href="{{ route('orders.index') }}">← Back</a>
</body>
</html>