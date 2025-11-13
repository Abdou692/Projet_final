<div class="product-card">
    <a href="{{ route('products.show', $product) }}">
        <img src="{{ $product->image_url ?? 'https://via.placeholder.com/300' }}" alt="{{ $product->name }}" class="product-image">
    </a>
    <div class="card-body">
        @if($product->category)
            <p class="product-category">{{ $product->category->name }}</p>
        @endif
        <h3 class="product-title">
            <a href="{{ route('products.show', $product) }}">{{ $product->name }}</a>
        </h3>
        <p class="product-price">{{ number_format($product->price, 2, ',', ' ') }} €</p>
        <div class="mt-4">
            <a href="{{ route('products.show', $product) }}" class="btn btn-accent w-full text-center">
                Voir le produit
            </a>
        </div>
    </div>
</div>