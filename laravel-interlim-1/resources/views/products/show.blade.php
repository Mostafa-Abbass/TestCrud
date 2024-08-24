<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product Details</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h1>Product Details</h1>
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">{{ $product->name }}</h5>
                <p class="card-text"><strong>Description:</strong> {{ $product->description }}</p>
                <p class="card-text"><strong>Price:</strong> ${{ $product->price }}</p>
                <p class="card-text"><strong>Quantity:</strong> {{ $product->quantity }}</p>
                <a href="{{ route('products.index') }}" class="btn btn-primary">Back to Products</a>
                <a href="{{ route('products.edit', $product->id) }}" class="btn btn-warning">Edit Product</a>
                <form action="{{ route('products.destroy', $product->id) }}" method="POST" style="display:inline-block;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Delete Product</button>
                </form>
            </div>
        </div>
    </div>
</body>
</html>
