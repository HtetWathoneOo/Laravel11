<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Product</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="center-page">
    <div class="form-container">
        <h1>Edit Product</h1>

        <form method="POST" action="{{ route('product.update', $product->id) }}">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label>Name</label>
                <input type="text" name="name" value="{{ old('name', $product->name) }}" placeholder="Enter Product Name" required>
            </div>

            <div class="form-group">
                <label>Quantity</label>
                <input type="text" name="qty" value="{{ old('qty', $product->qty) }}" placeholder="Enter Quantity" required>
            </div>

            <div class="form-group">
                <label>Price</label>
                <input type="text" name="price" value="{{ old('price', $product->price) }}" placeholder="Enter Price" required>
            </div>

            <div class="form-group">
                <label>Description</label>
                <input type="text" name="description" value="{{ old('description', $product->description) }}" placeholder="Optional Description">
            </div>

            <input type="submit" value="Update Product" class="edit-submit">
            <a href="{{ route('product.index') }}" class="btn-back">Back to Products</a>
        </form>
    </div>
</body>
</html>

