<div class="card">
    <img class="card-img-top" src="{{ asset($product->images->first()->path) }}" height="500">
    <div class="card-body">
        <h4 class="text-right"><strong>${{ $product->price }}</strong></h4>
        <h5 class="card-title">{{ $product->title }}</h5>
        <p class="card-text">{{ $product->description }}</p>
        <p class="card-text"><strong>{{ $product->stock }} left</strong></p>

        @if (isset($cart))
            <p class="card-text">
                {{ $product->pivot->quantity }} in your cart
                <strong>(${{ $product->total }})</strong>
            </p>

            <form
                class="d-inline"
                method="POST"
                action="{{ route('products.carts.destroy', ['product' => $product->id, 'cart' => $cart->id]) }}"
            >
                @csrf
                @method('DELETE')
                <button class="btn btn-warning" type="submit">Remove From Cart</button>
            </form>
        @else
            <form
                class="d-inline"
                method="POST"
                action="{{ route('products.carts.store', ['product' => $product->id]) }}"
            >
                @csrf
                <button class="btn btn-success" type="submit">Add to Cart</button>
            </form>
        @endif
    </div>
</div>
