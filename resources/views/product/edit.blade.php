<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Product</title>
<<<<<<< HEAD
=======

>>>>>>> 2b8f57bac853718526ceaa2c5b0b5815ac3f3395
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
<<<<<<< HEAD
            background-color: #fff;
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
=======
            background-color: white;
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0 4px 12px rgba(0,0,0,0.1);
>>>>>>> 2b8f57bac853718526ceaa2c5b0b5815ac3f3395
            width: 400px;
        }

        h1 {
            text-align: center;
<<<<<<< HEAD
            color: #333;
            margin-bottom: 20px;
        }

        label {
            font-weight: bold;
            display: block;
            margin-bottom: 6px;
            color: #555;
        }

        input[type="text"],
        textarea {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 4px;
            font-size: 14px;
            box-sizing: border-box;
        }

        textarea {
            height: 80px;
            resize: vertical;
        }

        button {
            width: 100%;
            background-color: #007bff;
            color: white;
            padding: 10px;
            border: none;
            font-size: 16px;
            border-radius: 4px;
            cursor: pointer;
        }

        button:hover {
            background-color: #0056b3;
        }

        .status-message {
            color: green;
            text-align: center;
            margin-bottom: 15px;
        }
    </style>
</head>
=======
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

>>>>>>> 2b8f57bac853718526ceaa2c5b0b5815ac3f3395
<body>
    <div class="form-container">
        <h1>Edit Product</h1>

<<<<<<< HEAD
        <!-- @if(session('status'))
            <div class="status-message">{{ session('status') }}</div>
        @endif -->

        <form action="{{ route('product.update', $product->id) }}" method="POST">
            @csrf
            @method('PUT')

            <label>Name:</label>
            <input type="text" name="name" value="{{ $product->name }}" required>

            <label>Quantity:</label>
            <input type="text" name="qty" value="{{ $product->qty }}" required>

            <label>Price:</label>
            <input type="text" name="price" value="{{ $product->price }}" required>

            <label>Description:</label>
            <textarea name="description">{{ $product->description }}</textarea>

            <button type="submit">Update Product</button>
=======
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
>>>>>>> 2b8f57bac853718526ceaa2c5b0b5815ac3f3395
        </form>
    </div>
</body>
</html>
