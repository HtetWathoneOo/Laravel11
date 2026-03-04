<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product List</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>

<h1>Product List</h1>
<form action="{{ route('product.list') }}" method="GET" style="margin-bottom: 20px;">
    <input type="text" name="search" value="{{ request('search') }}" placeholder="Search by name">
    <button type="submit">Search</button>
</form>


<div class="grid-container">

    <div class="grid-header-simple">ID</div>
    <div class="grid-header-simple">Name</div>
    <div class="grid-header-simple">Qty</div>
    <div class="grid-header-simple">Price</div>
    <div class="grid-header-simple">Description</div>


    @forelse ($products as $p)
        <div class="grid-item-simple">{{ $p->id }}</div>
        <div class="grid-item-simple">{{ $p->name }}</div>
        <div class="grid-item-simple">{{ $p->qty }}</div>
        <div class="grid-item-simple">{{ $p->price }}</div>
        <div class="grid-item-simple">{{ $p->description }}</div>
    @empty
        <div class="no-data">No products found.</div>
    @endforelse
</div>

</body>
</html>
