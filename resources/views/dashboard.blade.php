<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <style>
        body {
            margin: 0;
            font-family: Arial, sans-serif;
            background: linear-gradient(135deg, #f5f7fa, #e4ecf7);
        }

        .navbar {
            background-color: #1f2933;
            color: #fff;
            padding: 12px 24px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            box-shadow: 0 2px 8px rgba(0,0,0,0.25);
        }

        .navbar-brand {
            font-size: 20px;
            font-weight: bold;
        }

        .nav-links {
            display: flex;
            gap: 18px;
        }

        .nav-link {
            color: #e5e7eb;
            text-decoration: none;
            font-size: 14px;
            font-weight: 500;
            padding-bottom: 2px;
            border-bottom: 2px solid transparent;
            transition: color 0.15s ease, border-color 0.15s ease;
        }

        .nav-link:hover {
            color: #ffffff;
            border-color: #3b82f6;
        }

        .nav-link-active {
            color: #ffffff;
            border-color: #3b82f6;
        }

        .content {
            max-width: 900px;
            margin: 40px auto;
            background: #ffffff;
            border-radius: 12px;
            padding: 32px;
            box-shadow: 0 8px 24px rgba(15, 23, 42, 0.12);
            animation: fadeIn 0.45s ease-out forwards;
            opacity: 0;
            transform: translateY(10px);
        }

        h1 {
            margin-top: 0;
            margin-bottom: 10px;
            color: #111827;
        }

        p {
            margin-top: 0;
            color: #4b5563;
        }

        .primary-actions {
            margin-top: 24px;
            display: flex;
            gap: 12px;
        }

        .btn-primary {
            background-color: #3b82f6;
            color: #fff;
            border-radius: 8px;
            padding: 10px 18px;
            text-decoration: none;
            font-weight: 600;
            font-size: 14px;
            box-shadow: 0 3px 10px rgba(59, 130, 246, 0.4);
            transition: transform 0.15s ease, box-shadow 0.15s ease, background-color 0.15s ease;
        }

        .btn-primary:hover {
            background-color: #2563eb;
            transform: translateY(-1px);
            box-shadow: 0 6px 14px rgba(59, 130, 246, 0.55);
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
    </style>
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
        <h1>Welcome to your dashboard</h1>
        <p>
            This is the first page you see when you open the project.
            Use the menu bar at the top to navigate to different sections.
        </p>

        <div class="primary-actions">
            <a href="{{ route('product.index') }}" class="btn-primary">Go to Products</a>
            <a href="{{ route('product.create') }}" class="btn-primary">Create Product</a>
        </div>
    </main>
</body>
</html>

