<div>
    <a href="/products/create" class="button">Add product</a>
    <table>
        <thead>
        <tr>
            <th>Name</th>
            <th>Price</th>
            <th>Weight</th>
            <th>Size</th>
        </tr>
        </thead>
        <tbody>
        @foreach($products as $product)
            <tr>
                <td>
                    <a href="{{ route('products.show', $product) }}">
                        {{ $product->name }}
                    </a>
                </td>
                <td>{{ $product->getPrice() }}</td>
                <td>{{ $product->getWeight() }}</td>
                <td>{{ $product->size }}</td>
                <td>
                    <form method="post" action="{{ route('products.destroy', $product) }}">
                        @csrf
                        @method('DELETE')
                        <button type="submit" onclick="return confirm('Are you sure?')">
                            Delete
                        </button>
                    </form>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
