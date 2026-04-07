<!DOCTYPE html>
<html>
<head><title>Halcon - Track Order</title></head>
<body>
<h1>Track Your Order</h1>

<form method="POST" action="{{ route('home.search') }}">
    @csrf
    <label>Invoice Number:</label>
    <input type="text" name="invoice_number" required>
    <button type="submit">Search</button>
</form>

@if(isset($order))
    <hr>
    <h2>Order: {{ $order->invoice_number }}</h2>
    <p><strong>Customer:</strong> {{ $order->customer_name }}</p>
    <p><strong>Status:</strong> {{ $order->status }}</p>

    @if($order->status === 'Delivered')
        <h3>Delivery Photos:</h3>
        @foreach($order->photoEvidences->where('photo_type','Delivery') as $photo)
            <img src="{{ asset('storage/'.$photo->file_path) }}" width="300">
        @endforeach

    @else
        <p><strong>Last update:</strong> {{ $order->updated_at->format('d/m/Y H:i') }}</p>
    @endif

@elseif(request()->isMethod('post'))
    <p>No order found with that invoice number.</p>
@endif
</body>
</html>