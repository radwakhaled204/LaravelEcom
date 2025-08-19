<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>All Carts</title>
    <link rel="stylesheet" href="{{ asset('css/index.css') }}">
    <!-- Add Bootstrap or custom CSS to style the cart like the Waggy template -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://themewagon.github.io/waggy/css/style.css" rel="stylesheet">
    <!-- Custom styles to adjust cart container -->
    <style>
        body{
            background:#F9F3EC;
        }
        .cart-container {
            margin-top: 50px;
            padding: 30px;
        }
        .cart-item {
            border-bottom: 1px solid #ddd;
            padding-bottom: 20px;
            margin-bottom: 20px;
        }
        .cart-item img {
            max-width: 100px;
            margin-right: 20px;
        }
        .cart-item .product-info {
            display: inline-block;
            vertical-align: top;
            width: calc(100% - 120px);
        }
        .cart-item .product-info h5 {
            font-size: 18px;
            font-weight: bold;
        }
        .cart-item .product-info p {
            font-size: 14px;
            color: #888;
        }
        .cart-summary {
            background-color: #f9f9f9;
            padding: 20px;
            margin-top: 40px;
            border-radius: 5px;
            box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.1);
        }
        .cart-summary .total {
            font-size: 20px;
            font-weight: bold;
            margin-top: 10px;
        }
        .cart-summary button {
            width: 100%;
            background-color: #F9F3EC;
            color: black;
            padding: 15px;
            border: 10px;
            border-radius: 5px;
            font-size: 26px;
        }
        .cart-summary button:hover {
            color: white;
            background-color: #41403E;
        }
    </style>
</head>
<body>

<div class="container cart-container">

    <h1>All Items in The Cart</h1>

    @if ($cart && $cart->items->isNotEmpty())
        <div class="cart-items">
            @foreach ($cart->items as $item)
                <div class="cart-item d-flex">
                    <img src="{{ $item->product->image_url }}" alt="{{ $item->product->name }}">

                    <div class="product-info">
                        <h5>{{ $item->product->name }}</h5>
                        <p>{{ $item->product->description }}</p>
                        <p><strong>Quantity:</strong> {{ $item->quantity_to_purchase }}</p>
                        <p><strong>Total Price:</strong> ${{ $item->total_item_price }}</p>
                        
                        <!-- Update Item Quantity Form -->
                        <form action="{{ route('cart-items.update', $item->id) }}" method="POST" class="d-inline">
                            @csrf
                            @method('PUT')
                            <div class="input-group">
                                <input type="number" name="quantity_to_purchase" value="{{ $item->quantity_to_purchase }}" class="form-control" min="1" style="width: 50px;">
                                <button class="btn btn-warning" style="background-color: #DEAD6F;display:flex " type="submit">Update</button>
                            </div>
                        </form>

                        <!-- Remove Item Form -->
                        <form action="{{ route('cart-items.destroy', $item->id) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger" style="display:flex" type="submit">Remove</button>
                        </form>
                    </div>
                </div>
            @endforeach
        </div>

        <!-- Cart Summary -->
        <div class="cart-summary">
            <h4>Cart Summary</h4>
            <div class="total">
                <span>Total (USD): </span><strong>${{ $cart->items->sum('total_item_price') }}</strong>
            </div>
            <form action="{{ route('confirm.order') }}" method="GET">
                <button type="submit">Proceed to Checkout</button>
            </form>
        </div>

    @else
        <p>No items found in the cart.</p>
    @endif

</div>

<!-- Bootstrap JS and optional custom JS -->
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js"></script>
</body>
</html>
