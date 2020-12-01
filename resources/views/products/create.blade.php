<div>
    <a href="{{ route('products.index') }}">
        Home
    </a>
    <form method="post" action="{{ route('products.store') }}">
        @csrf
        <div>
            <label for="name">Name</label>
            <input type="text" id="name" name="name" placeholder="Your product name">
        </div>
        <div>
            <label for="price">Price</label>
            <input type="number" id="price" name="price" placeholder="Your product price in cents">
        </div>
        <div>
            <label for="weight">Weight</label>
            <input type="number" id="weight" name="weight" placeholder="Your product weight in grams">
        </div>
        <div>
            <label for="size">Size</label>
            <select name="size" id="size">
                <option value="S">S</option>
                <option value="M">M</option>
                <option value="L">L</option>
                <option value="XL">XL</option>
            </select>
        </div>
        <div>
            <button type="submit">Create</button>
        </div>
    </form>
</div>
