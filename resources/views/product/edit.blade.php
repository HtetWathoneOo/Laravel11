<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Product</title>

    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .form-container {
            background-color: white;
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0 4px 12px rgba(0,0,0,0.1);
            width: 400px;
        }

        h1 {
            text-align: center;
            margin-bottom: 20px;
            color: #333;
        }

        .form-group {
            display: flex;
            flex-direction: column;
            margin-bottom: 15px;
        }

        label {
            margin-bottom: 5px;
            font-weight: bold;
            color: #555;
        }

        input[type="text"] {
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
            outline: none;
            transition: 0.3s;
        }

        input[type="text"]:focus {
            border-color: #007BFF;
            box-shadow: 0 0 5px rgba(0,123,255,0.5);
        }

        input[type="submit"] {
            background-color: #007BFF;
            color: white;
            padding: 10px;
            border: none;
            border-radius: 4px;
            font-size: 16px;
            cursor: pointer;
            width: 100%;
            transition: 0.3s;
        }

        input[type="submit"]:hover {
            background-color: #0056b3;
        }

        .btn-back {
            display: block;
            text-align: center;
            margin-top: 10px;
            color: #555;
            text-decoration: none;
            font-size: 14px;
        }

        .btn-back:hover {
            color: #007BFF;
        }
    </style>
</head>

<body>
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

            <input type="submit" value="Update Product">
            <a href="{{ route('product.index') }}" class="btn-back">Back to Products</a>
        </form>
    </div>
</body>
</html>
