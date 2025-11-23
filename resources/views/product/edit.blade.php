<x-layout>
    <x-slot:title>
        Edit product {{$product->name}}
    </x-slot:title>
    <form action="/product/{{$product->id}}" method="POST">
        @csrf
        @method('patch')
        
        <div class="form-group">
            <label for="category">Product Category</label>
            @php
                $categories = ['Table', 'Chair', 'Sofa', 'Bed', 'Cabinet', 'Desk', 'Shelf'];
            @endphp

            <select id="category" name="category">
                <option value="" disabled>Select a category</option>

                @foreach($categories as $cat)
                    <option value="{{ $cat }}" {{ $product->category == $cat ? 'selected' : '' }}>
                        {{ $cat }}
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
            <input type="text" id="name" name="name" placeholder="Enter product name" value="{{$product->name}}">
        </div>
        @error('name')
        <div>
            <p class="err">{{$message}}</p>
        </div>
        @endif

        <div class="form-group">
            <label for="price">Price ($)</label>
            <input type="number" id="price" name="price" step="0.01" placeholder="Enter price" value="{{$product->price}}">
        </div>
        @error('price')
        <div>
            <p class="err">{{$message}}</p>
        </div>
        @endif

        <button type="submit" class="btn">Update Product</button>
        <a href="/products/{{$product->id}}" class="btn delete-btn">Cancel</a>
    </form>
</x-layout>