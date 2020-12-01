<div>
    <a href="{{ route('products.show', $product) }}">Back</a>
</div>
<div>
    <a href="{{ route('products.index') }}">Home</a>
</div>
<div>
    <form method="post" action="{{ route('products.update', $product) }}">
        @csrf
        @method('PUT')
        <div>
            <label for="name">Name</label>
            <input type="text" id="name" name="name" value="{{ $product->name }}">
        </div>
        <div>
            <label for="price">Price</label>
            <input type="number" id="price" name="price" value="{{ $product->price }}">
        </div>
        <div>
            <label for="weight">Weight</label>
            <input type="number" id="weight" name="weight" value="{{ $product->weight }}">
        </div>
        <div>
            <label for="size">Size</label>
            <select name="size" id="size">
                <option selected hidden>{{ $product->size }}</option>
                <option value="S">Small</option>
                <option value="M">Medium</option>
                <option value="L">Large</option>
                <option value="XL">Extra Large</option>
            </select>
        </div>
        <div class="form-group">
            <button type="submit" class="btn btn-primary">Update</button>
        </div>
    </form>
</div>
