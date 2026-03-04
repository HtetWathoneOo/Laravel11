<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <script src="https://cdn.tailwindcss.com"></script>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>
    <header class="navbar">
        <div class="navbar-brand">My Dashboard</div>
        <nav class="nav-links">
            <a href="{{ url('/') }}" class="nav-link nav-link-active">Dashboard</a>
            <a href="{{ route('product.index') }}" class="nav-link">Products</a>
        </nav>
    </header>

    <main class="content">
        <section class="products-section">
            <div class="products-header">
                <h2 class="products-title">Your Products</h2>
                <a href="{{ route('product.index') }}" class="btn-primary" style="padding: 6px 12px; font-size: 12px;">
                    View in table
                </a>
            </div>

            @if(isset($products) && $products->count())
                <div class="products-carousel">
                    <button class="products-arrow products-arrow-left" data-direction="left">&#8249;</button>
                    <div class="products-grid" id="productsCarouselTrack">
                        @foreach ($products as $p)
                            <div class="product-card">
                                <div class="product-name">{{ $p->name }}</div>
                                <div class="product-meta">Qty: {{ $p->qty }}</div>
                                <div class="product-price">${{ number_format($p->price, 2) }}</div>
                                @if($p->description)
                                    <div class="product-meta">{{ $p->description }}</div>
                                @endif

                                <div class="product-actions">
                                    <form action="{{ route('product.edit', $p->id) }}" method="GET">
                                        <button type="submit" class="btn-small btn-edit">Edit</button>
                                    </form>
                                    <form action="{{ route('product.destroy', $p->id) }}" method="POST" onsubmit="return confirm('Delete this item?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn-small btn-delete">Delete</button>
                                    </form>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    <button class="products-arrow products-arrow-right" data-direction="right">&#8250;</button>
                </div>
            @else
                <p style="color:#6b7280; font-size: 14px; margin-top: 8px;">
                    No products yet. Use "Create Product" to add your first one.
                </p>
            @endif
        </section>
    </main>

    <div class="welcome-overlay" id="welcomeOverlay">
        <div class="welcome-card">
            <h2 class="welcome-title">Welcome to your dashboard</h2>
            <p class="welcome-text">
                This is your starting page. Click OK to hide this message and view your products.
            </p>
            <button class="welcome-btn" id="welcomeOkBtn">OK</button>
        </div>
    </div>
</body>
</html>

