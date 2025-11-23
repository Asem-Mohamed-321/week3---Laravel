<x-layout>
    <x-slot:title>
        {{$product['name']}}
    </x-slot:title>

    <div class="product-card">
        <h2>{{ $product['name'] }}</h2>

        <p><strong>Category:</strong> {{ $product['category'] }}</p>
        <p><strong>Price:</strong> ${{ $product['price'] }}</p>

    <!-- put this on the left -->
    <div class="btn-group">
            <a href="/products/{{ $product['id'] }}/edit" class="btn">Edit</a>

            <button form="delete-form" type="submit" class="btn delete-btn">
                Delete
            </button>

            <form action="/products/{{ $product->id }}" method="POST" hidden id="delete-form">
                @csrf
                @method('DELETE')
            </form>
        </div>
    </div>
</x-layout>