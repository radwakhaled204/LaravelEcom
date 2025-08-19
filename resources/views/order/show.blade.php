@extends('layouts.app')

@section('content')
    <h1>Order Details</h1>

    <p>Order ID: {{ $order->id }}</p>
    <p>Total Price: ${{ $order->total_price }}</p>

    <h3>Order Items</h3>
    <ul>
        @foreach ($order->orderItems as $item)
            <li>
                Product: {{ $item->product->name }} <br>
                Quantity: {{ $item->quantity_to_purchase }} <br>
                Price per Item: ${{ $item->price }} <br>
                Total Item Price: ${{ $item->total_item_price }}
                
                <!-- Update Order Item Form -->
                <form action="{{ route('order-items.update', $item->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <label>Update Quantity:</label>
                    <input type="number" name="quantity_to_purchase" value="{{ $item->quantity_to_purchase }}" min="1">
                    <button type="submit">Update</button>
                </form>

                <!-- Delete Order Item -->
                <form action="{{ route('order-items.destroy', $item->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this item?');">
                    @csrf
                    @method('DELETE')
                    <button type="submit">Delete Item</button>
                </form>
            </li>
        @endforeach
    </ul>
@endsection
