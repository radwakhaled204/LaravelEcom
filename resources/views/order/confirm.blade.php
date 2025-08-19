<!DOCTYPE html>
<!--order by Radwa Khaled-->
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Order Confirmation</title>
</head>
<body>

    <h1>Invoice</h1>
    <p>User Name: {{ $user->name }}</p>
    <p>Email: {{ $user->email }}</p>

    <h2>Products</h2>
    <ul>
        @foreach ($cart->items as $item)
            <li>
                Product Name: {{ $item->product->name }}<br>
                Quantity: {{ $item->quantity_to_purchase }}<br>
                Price: {{ $item->product->price }}<br>
              
                Total Price: {{ $item->quantity_to_purchase * $item->product->price }}
              
            </li>
        @endforeach
    </ul>
    <h3> Total Quantity: {{ $cart->total_quantity }}</h3>
    <h3>Total Price: {{ $totalPrice }}</h3>

    <form action="{{ route('order.place') }}" method="POST">
        @csrf
        <button type="submit">Place Order</button>
       
    </form>

</body>
</html>
