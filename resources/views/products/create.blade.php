<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Create Product</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" 
          integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">

    <!-- Custom Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500&display=swap" rel="stylesheet">

    <!-- Custom CSS -->
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <style>
        body {
            font-family: 'arial', sans-serif;
            background:#F9F3EC;
        }
        .container {
            background-color: #ffffff;
            /* padding:10px; */
            width:100%;
            border-radius: 8px;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
        }
        h1 {
            font-size: 2.5rem;
            color: #333;
            text-align: center;
            margin-bottom:40px;
        }
        .form-group {
            margin-bottom: 20px;
        }
        label {
            font-size: 1.1rem;
            color: #333;
        }
        input[type="text"], input[type="number"], input[type="file"], select, textarea {
            width: 100%;
            padding: 10px;
            border-radius: 5px;
            border: 1px solid #ccc;
            font-size: 1rem;
            margin-top: 5px;
        }
        .btn-submit {
            width: 100%;
            padding: 12px;
            background-color: #F9F3EC;
            color: black;
            font-size: 1.1rem;
            border: 1px solid #583e3e;
            border-radius: 5px;
            cursor: pointer;
        }
        .btn-submit:hover {
            background-color: #DEAD6F;
        }
    </style>
</head>

<body>
    @php
            $categories = App\Models\Category::all();
        @endphp
    <div class="container">
        <h1 style="color:#dead6f">Create Product</h1>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form method="POST" action="{{ route('products.store') }}" enctype="multipart/form-data">
            @csrf
            <!-- Product Image -->
            <div class="form-group">
                <label for="image">Product Image:</label>
                <input type="file" name="images[]" id="image" multiple accept="image/*" required>
            </div>

            <!-- Product Name -->
            <div class="form-group">
                <label for="name">Product Name:</label>
                <input name="name" id="name" type="text" required placeholder="Enter product name">
            </div>

            <!-- Product Description -->
            <div class="form-group">
                <label for="description">Description:</label>
                <textarea name="description" id="description" rows="5" required placeholder="Enter product description"></textarea>
            </div>

            <!-- Product Price -->
            <div class="form-group">
                <label for="price">Price:</label>
                <input name="price" id="price" type="number" step="0.01" required placeholder="Enter product price">
            </div>

            <!-- Product Inventory -->
            <div class="form-group">
                <label for="inventory">Inventory:</label>
                <input name="inventory" id="inventory" type="number" min="0" required placeholder="Enter product inventory">
            </div>

            <!-- Product Category -->
            <div class="form-group">
                <label for="category">Category:</label>
                <select name="category" id="category" required>
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                    @endforeach
                </select>
            </div>

            <button type="submit" class="btn-submit">Create</button>
        </form>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
</body>

</html>
