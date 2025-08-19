@extends('layouts.app')

@section('content')
    <h1>Your Orders</h1>

    @foreach ($orders as $order)
        <div>
            <h3>Order ID: {{ $order->id }}</h3>
            <p>Total Price: ${{ $order->total_price }}</p>
            <p>Items:</p>
            <ul>
                @foreach ($order->orderItems as $item)
                    <li>
                        {{ $item->product->name }} - Quantity: {{ $item->quantity_to_purchase }} - Total: ${{ $item->total_item_price }}
                    </li>
                @endforeach
            </ul>
            <a href="{{ route('orders.show', $order->id) }}">View Order Details</a>
        </div>
    @endforeach
@endsection
