<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>All Products</title>
    <link rel="stylesheet" href="{{ asset('css/index.css') }}">
</head>

<body style="background:#F9F3EC">

    <!-- Navigation bar -->
    <nav>
        <div class="left-nav">
            <a class="nav-text" href="{{ route('categories.index') }}">Manage Categories</a>
            <a class="nav-text" href="{{ route('products.index') }}">Manage Products</a>
        </div>
        <div class="right-nav">
            <form method="POST" action="{{ route('admin.logout') }}">
                @csrf
                <button type="submit" style="color:white; background-color:#e0b178">Logout</button>
            </form>
        </div>
    </nav>

    <!-- Create Product button -->
    <div class="create-button">
        <a href="{{ route('products.create') }}" style="background-color:#e0b178" class="create-btn">Create New Product</a>
    </div>

    <!-- Products Table -->
    <div class="container">
        <table>
            <thead>
                <tr>
                    <th>Images</th>
                    <th>Name</th>
                    <th>Description</th>
                    <th>Price</th>
                    <th>Number in Inventory</th>
                    <th>Category</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($products as $product)
                    <tr>
                        <td>
                            @forelse($product->images as $image)
                                <img src="{{ asset('upload/products/' . $image->image_name) }}" alt="{{ $product->name }}"
                                    width="100" style="margin-right: 5px;">
                            @empty
                                No Images Available
                            @endforelse
                        </td>
                        <td>{{ $product->name }}</td>
                        <td>{{ $product->description }}</td>
                        <td>${{ $product->price }}</td>
                        <td>{{ $product->inventory }}</td>
                        <td>{{ $product->category->name }}</td>
                        <td class="actions">
                            <a href="{{ route('products.edit', $product->id) }}">Edit</a>
                            <form method="POST" action="{{ route('products.destroy', $product) }}"
                                style="display:inline-block;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="delete-btn">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

</body>

</html>