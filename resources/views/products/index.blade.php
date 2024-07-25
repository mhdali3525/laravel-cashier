<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Products</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        .product-grid {
            display: flex;
            flex-wrap: wrap;
        }
        .product-item {
            flex: 1 0 21%; /* Adjust the percentage to control the number of columns */
            margin: 1%;
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 5px;
            text-align: center;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1 class="my-4">Products</h1>
        
        <!-- Display error message -->
        @if (session('error'))
            <div class="alert alert-danger">
                {{ session('error') }}
            </div>
        @endif

        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>  
        @endif
        
        <div class="product-grid">
            @foreach($products as $product)
                <div class="product-item">
                    <h2>{{ $product->name }}</h2>
                    <p>${{ number_format($product->price, 2) }}</p>
                    <a href="{{ route('products.show', $product->id) }}" class="btn btn-primary">Buy Now</a>                    
                </div>
            @endforeach
        </div>
    </div>
</body>
</html>
