<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $product->name }} - Product Details</title>
    <link rel="stylesheet" href="{{ asset('css/details.css') }}">
</head>

<body>
    <div class="product-detail-container">
        <h1>{{ $product->name }}</h1>

        <!-- Product Images -->
        <div class="product-images">
            @if ($product->images->isNotEmpty())
                @foreach ($product->images as $image)
                    <img src="{{ asset('upload/products/' . $image->image_name) }}" alt="{{ $product->name }}"
                        class="product-detail-image" />
                @endforeach
            @else
                <img src="{{ asset('upload/products/default.png') }}" alt="Default Image" class="product-detail-image" />
            @endif
        </div>

        <!-- Product Description -->
        <p class="product-description">{{ $product->description }}</p>

        <!-- Product Price -->
        @if ($product->price)
            <p class="product-price">Price: ${{ number_format($product->price, 2) }}</p>
        @endif

        <!-- Back to Products Button -->

        <a href="{{ route('products.welcome') }}" class="back-button">Back to Products</a>
    </div>
</body>

</html>