<x-layout>
    <x-slot:title>
        create product
    </x-slot:title>
    <form action="/products" method="POST">
        @csrf
        
        <div class="form-group">
            <label for="category">Product Category</label>
        {{-- <div class="form-group">
            <label for="category">Product Category</label>
            <select id="category" name="category">
                <option value="" disabled selected>Select a category</option>
                <option value="Table">Table</option>
                <option value="Chair">Chair</option>
                <option value="Sofa">Sofa</option>
                <option value="Bed">Bed</option>
                <option value="Cabinet">Cabinet</option>
                <option value="Desk">Desk</option>
                <option value="Shelf">Shelf</option>
            </select>
        </div> --}}
        @php
        $categories = ['Table', 'Chair', 'Sofa', 'Bed', 'Cabinet', 'Desk', 'Shelf'];
        @endphp

        <select name="category">
            <option value="" disabled selected>Select a category</option>
            @foreach ($categories as $c)
                <option value="{{ $c }}" 
                    {{ old('category', $product->category ?? '') == $c ? 'selected' : '' }}>
                    {{ $c }}
                </option>
            @endforeach
        </select>
        </div>

        @error('category')
        <div>
            <p class="err">{{$message}}</p>
        </div>
        @endif


        <div class="form-group">
            <label for="name">Product Name</label>
            <input type="text" id="name" name="name" placeholder="Enter product name" value="{{ old('name') }}">
        </div>
        @error('name')
        <div>
            <p class="err">{{$message}}</p>
        </div>
        @endif

        <div class="form-group">
            <label for="price">Price ($)</label>
            <input type="number" id="price" name="price" step="0.01" placeholder="Enter price" value="old('price')">
        </div>
        @error('price')
        <div>
            <p class="err">{{$message}}</p>
        </div>
        @endif

        <button type="submit">Add Product</button>
    </form>
</x-layout>