<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Edit Product</title>
    <link rel="stylesheet" href="{{ asset('css/createproduct.css') }}">
</head>

<body>
    @php
        $categories = App\Models\Category::all();
    @endphp
    <div class="container">
        <h1>Edit Product: {{ $product->name }}</h1>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form method="post" action="{{ route('products.update', $product->id) }}" enctype="multipart/form-data"
            class="form">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="image">Product Image:</label>
                <!-- Display current image if it exists -->
                @if($product->product_image)
                    <div class="current-image">
                        <img src="{{ asset('upload/products/' . $product->product_image) }}" alt="{{ $product->name }}"
                            width="150">
                    </div>
                @else
                    <p>No image available</p>
                @endif
                <input type="file" name="image[]" id="image" multiple accept="image/*" required>
            </div>

            <div class="form-group">
                <label for="name">Name:</label>
                <input name="name" id="name" type="text" value="{{ $product->name }}" required>
            </div>

            <div class="form-group">
                <label for="description">Description:</label>
                <textarea name="description" id="description" rows="5" required>{{ $product->description }}</textarea>
            </div>

            <div class="form-group">
                <label for="price">Price:</label>
                <input name="price" id="price" type="number" step="0.01" value="{{ $product->price }}" required>
            </div>
            
            <div class="form-group">
                  <label for="inventory">Inventory:</label>
                 <input name="inventory" id="inventory" type="number" min="0" required>
            </div>

            <div class="form-group">
                <label for="category">Category:</label>
                <select name="category" id="category" required>
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}" {{ $category->id == $product->category_id ? 'selected' : '' }}>
                            {{ $category->name }}</option>
                    @endforeach
                </select>
            </div>

            <button type="submit" class="btn-submit">Update</button>
        </form>
    </div>
</body>

</html>