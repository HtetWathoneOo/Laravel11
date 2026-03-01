<style>
    .product-grid {
        display: grid;
        grid-template-columns: 60px 1fr 1fr 1fr 2fr 200px; /* Last column is for buttons */
        gap: 10px;
        background-color: #f4f4f4;
        padding: 10px;
        border-radius: 8px;
    }


    .grid-header, .grid-item {
        padding: 8px;
        background-color: #fff;
        border: 1px solid #ddd;
        border-radius: 4px;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .grid-header {
        font-weight: bold;
        background-color: #e1e1e1;
    }

    .action-buttons {
        display: flex;
        justify-content: center;
        gap: 8px; /* spacing between buttons */
    }

    /* Same size buttons */
    .btn-edit, .btn-danger {
        width: 80px;         /* equal width */
        padding: 8px 0;      /* same vertical padding */
        text-align: center;  /* center text */
        border: none;
        border-radius: 6px;
        font-size: 14px;
        font-weight: bold;
        cursor: pointer;
        display: inline-block;
        color: white;
    }

    /* Edit Button Style */
    .btn-edit {
        background-color: #28a745; /* Green */
    }
    .btn-edit:hover {
        background-color: #1e7e34;
        opacity: 0.9;
    }

    /* Delete Button Style */
    .btn-danger {
        background-color: #dc3545; /* Red */
    }
    .btn-danger:hover {
        background-color: #c82333;
        opacity: 0.9;
    }
</style>


<div class="product-grid">
    <!-- Header row -->
    <div class="grid-header">ID</div>
    <div class="grid-header">Name</div>
    <div class="grid-header">Qty</div>
    <div class="grid-header">Price</div>
    <div class="grid-header">Description</div>
    <div class="grid-header">Actions</div>

    <!-- Loop data -->
    @foreach ($products as $p)
        <div class="grid-item">{{ $p->id }}</div>
        <div class="grid-item">{{ $p->name }}</div>
        <div class="grid-item">{{ $p->qty }}</div>
        <div class="grid-item">{{ $p->price }}</div>
        <div class="grid-item">{{ $p->description }}</div>
        <div class="grid-item action-buttons">
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
