<hmtl>
    <head>

        <title>Show</title>
    </head>
    <body>
    <div>
        <a href="{{ route('products.index') }}">Back</a>
    </div>
    <div>
        <a href="{{ route('products.edit', $product) }}">Edit</a>
    </div>
    <div>
        <h1>{{ $product->name }}</h1>
        <p>{{ $product->getPrice() }}</p>
        <p>{{ $product->getWeight() }}</p>
        <p>{{ $product->size }}</p>
        @foreach($product->deliveries as $delivery)
            <p>
                <input type="radio" id="delivery" name="operator" value="{{ $delivery->id }}">
                <label for="delivery">{{ $delivery->getName() . ', ' . $delivery->getPrice() }}</label><br>
            </p>
        @endforeach
    </div>
    <a href="{{ route('products.edit', $product) }}">
        Edit
    </a>
    </body>
</hmtl>
