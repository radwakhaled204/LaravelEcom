@extends('layouts.app')

@section('content')
    <h1>All Orders</h1>

    <table >
        <thead>
            <tr>
                <th>Order ID</th>
                <th>User</th>
                <th>Total Price</th>
                <th>Order Items</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($orders as $order)
                <tr>
                    <td>{{ $order->id }}</td>
                    <td>{{ $order->user->name }}</td>
                    <td>{{ $order->total_price }}</td>
                    <td>
                        <ul>
                            @foreach ($order->orderItems as $item)
                                <li>
                                    {{ $item->product->name }} ({{ $item->quantity_to_purchase }}) - ${{ $item->total_item_price }}
                                </li>
                            @endforeach
                        </ul>
                    </td>
                    <td>
                        <!-- Delete Order -->
                        <form action="{{ route('admin.orders.destroy', $order->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this order?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
