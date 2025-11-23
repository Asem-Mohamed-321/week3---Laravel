<x-layout>
    <x-slot:title>
        All Products
    </x-slot:title>

    <div class="product-list">
        @foreach ($products as $product)
            <a href="/products/{{ $product['id'] }}" class="product-item">
                <h3>{{ $product['name'] }}</h3>
                <p>Price: ${{ $product['price'] }}</p>
            </a>
        @endforeach
    </div>
</x-layout>
