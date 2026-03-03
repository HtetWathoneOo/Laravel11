<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Products</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: linear-gradient(135deg, #f5f7fa, #e4ecf7);
            margin: 0;
            padding: 20px;
        }

        .page-container {
            max-width: 1100px;
            margin: 0 auto;
            animation: fadeIn 0.5s ease-out forwards;
            opacity: 0;
            transform: translateY(10px);
        }

        .page-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
        }

        .page-title {
            font-size: 28px;
            color: #333;
            margin: 0;
        }

        .btn-primary {
            background-color: #007bff;
            color: #fff;
            padding: 10px 16px;
            border-radius: 6px;
            text-decoration: none;
            font-weight: bold;
            font-size: 14px;
            box-shadow: 0 3px 8px rgba(0, 123, 255, 0.3);
            transition: transform 0.15s ease, box-shadow 0.15s ease, background-color 0.15s ease;
        }

        .btn-primary:hover {
            background-color: #0062cc;
            transform: translateY(-1px);
            box-shadow: 0 6px 14px rgba(0, 123, 255, 0.4);
        }

        .product-grid {
            display: grid;
            grid-template-columns: 60px 1.5fr 1fr 1fr 2fr 200px;
            gap: 10px;
            background-color: #ffffff;
            padding: 16px;
            border-radius: 10px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.05);
        }

        .grid-header, .grid-item {
            padding: 8px;
            border-radius: 6px;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .grid-header {
            font-weight: bold;
            background-color: #f0f2f5;
            color: #555;
        }

        .grid-item {
            background-color: #fff;
            border: 1px solid #e3e6ec;
        }

        .row-animate {
            animation: slideUp 0.35s ease-out forwards;
            opacity: 0;
            transform: translateY(6px);
        }

        .row-animate:nth-child(6n + 1) { animation-delay: 0.02s; }
        .row-animate:nth-child(6n + 2) { animation-delay: 0.04s; }
        .row-animate:nth-child(6n + 3) { animation-delay: 0.06s; }
        .row-animate:nth-child(6n + 4) { animation-delay: 0.08s; }
        .row-animate:nth-child(6n + 5) { animation-delay: 0.10s; }
        .row-animate:nth-child(6n + 6) { animation-delay: 0.12s; }

        .action-buttons {
            display: flex;
            justify-content: center;
            gap: 8px;
        }

        .btn-edit, .btn-danger {
            width: 80px;
            padding: 8px 0;
            text-align: center;
            border: none;
            border-radius: 6px;
            font-size: 13px;
            font-weight: 600;
            cursor: pointer;
            color: #fff;
            transition: transform 0.15s ease, box-shadow 0.15s ease, opacity 0.15s ease, background-color 0.15s ease;
        }

        .btn-edit {
            background-color: #28a745;
            box-shadow: 0 2px 6px rgba(40, 167, 69, 0.4);
        }

        .btn-edit:hover {
            background-color: #218838;
            transform: translateY(-1px);
            box-shadow: 0 4px 10px rgba(40, 167, 69, 0.5);
        }

        .btn-danger {
            background-color: #dc3545;
            box-shadow: 0 2px 6px rgba(220, 53, 69, 0.4);
        }

        .btn-danger:hover {
            background-color: #c82333;
            transform: translateY(-1px);
            box-shadow: 0 4px 10px rgba(220, 53, 69, 0.5);
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(10px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        @keyframes slideUp {
            from {
                opacity: 0;
                transform: translateY(6px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
    </style>
</head>
<body>
    <div class="page-container">
        <div class="page-header">
            <h1 class="page-title">Products</h1>
            <a href="{{ route('product.create') }}" class="btn-primary">+ New Product</a>
        </div>

        <div class="product-grid">
            <div class="grid-header">ID</div>
            <div class="grid-header">Name</div>
            <div class="grid-header">Qty</div>
            <div class="grid-header">Price</div>
            <div class="grid-header">Description</div>
            <div class="grid-header">Actions</div>

            @foreach ($products as $p)
                <div class="grid-item row-animate">{{ $p->id }}</div>
                <div class="grid-item row-animate">{{ $p->name }}</div>
                <div class="grid-item row-animate">{{ $p->qty }}</div>
                <div class="grid-item row-animate">{{ $p->price }}</div>
                <div class="grid-item row-animate">{{ $p->description }}</div>
                <div class="grid-item action-buttons row-animate">
                    <form action="{{ route('product.edit', $p->id) }}" method="GET">
                        <button type="submit" class="btn-edit">Edit</button>
                    </form>

                    <form action="{{ route('product.destroy', $p->id) }}" method="POST" onsubmit="return confirm('Delete this item?');">
                        @csrf
                        @method('DELETE')
                        <button class="btn-danger">Delete</button>
                    </form>
                </div>
            @endforeach
        </div>
    </div>
</body>
</html>
