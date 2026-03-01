<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product List</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            padding: 20px;
        }

        h1 {
            text-align: center;
            margin-bottom: 20px;
            color: #333;
        }

        .grid-container {
            display: grid;
            grid-template-columns: 50px 1fr 1fr 1fr 2fr;  /* 5 columns */
            gap: 10px;
            background-color: #fff;
            padding: 15px;
            border-radius: 8px;
            box-shadow: 0 4px 12px rgba(0,0,0,0.1);
        }

        .grid-header {
            font-weight: bold;
            background-color: #f0f0f0;
            text-align: center;
            padding: 10px;
            border-radius: 4px;
        }

        .grid-item {
            padding: 8px;
            text-align: center;
            border-bottom: 1px solid #ddd;
        }

        .no-data {
            grid-column: 1 / -1; /* span all columns */
            text-align: center;
            color: #666;
            padding: 15px;
            background-color: #fafafa;
            border-radius: 5px;
        }
    </style>
</head>
<body>

<h1>Product List</h1>
<form action="{{ route('product.list') }}" method="GET" style="margin-bottom: 20px;">
    <input type="text" name="search" value="{{ request('search') }}" placeholder="Search by name">
    <button type="submit">Search</button>
</form>


<div class="grid-container">

    <div class="grid-header">ID</div>
    <div class="grid-header">Name</div>
    <div class="grid-header">Qty</div>
    <div class="grid-header">Price</div>
    <div class="grid-header">Description</div>


    @forelse ($products as $p)
        <div class="grid-item">{{ $p->id }}</div>
        <div class="grid-item">{{ $p->name }}</div>
        <div class="grid-item">{{ $p->qty }}</div>
        <div class="grid-item">{{ $p->price }}</div>
        <div class="grid-item">{{ $p->description }}</div>
    @empty
        <div class="no-data">No products found.</div>
    @endforelse
</div>

</body>
</html>
