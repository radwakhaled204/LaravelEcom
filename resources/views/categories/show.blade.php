<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Show Category</title>
    <link rel="stylesheet" href="{{ asset('css/index.css') }}">
</head>

<body>

    <header>
        <h1>Category Details</h1>
        <a href="{{ route('categories.index') }}">Back to Categories</a>
    </header>

    <div class="container">
        @if(session('error'))
            <div class="alert alert-danger">
                {{ session('error') }}
            </div>
        @endif

        <!-- Display category details -->
        <div class="category-details">
            <h2>{{ $category->name }}</h2> <!-- Display category name -->

            <!-- Check if the category has an image and display it -->
            @if($category->image)
                <div class="category-image">
                    <img src="{{ asset('upload/categories/' . $category->image) }}" alt="{{ $category->name }}" width="200">
                </div>
            @else
                <p>No image available for this category.</p>
            @endif

            <!-- You can add more details if necessary -->
            <div class="category-actions">
                <a href="{{ route('categories.edit', $category->id) }}">Edit</a>
                <form action="{{ route('categories.destroy', $category->id) }}" method="POST"
                    style="display:inline-block;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="delete-btn">Delete</button>
                </form>
            </div>
        </div>
    </div>

</body>

</html>