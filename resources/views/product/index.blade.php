<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Products</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
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
