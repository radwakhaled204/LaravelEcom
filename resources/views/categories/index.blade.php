<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>All Categories</title>
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

    <!-- Create Category button -->
    <div class="create-button">
        <a href="{{ route('categories.create') }}" class="create-btn">Create New Category</a>
    </div>

    <!-- Categories Table -->
    <div class="container">
        <table>
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Image</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($categories as $category)
                    <tr>
                        <td>{{ $category->name }}</td>
                        <td>
                            @if($category->image)
                                <img src="{{ asset('upload/categories/' . $category->image) }}" alt="{{ $category->name }}"
                                    width="100">
                            @else
                                No Image Available
                            @endif
                        </td>
                        <td class="actions">
                            <a href="{{ route('categories.edit', $category) }}">Edit</a>

                            <form method="POST" action="{{ route('categories.destroy', $category) }}"
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