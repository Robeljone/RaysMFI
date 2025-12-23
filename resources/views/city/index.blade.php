<h1>Products</h1>

<a href="{{ route('city.create') }}">Create Product</a>

<ul>
@foreach($products as $product)
    <li>
        {{ $product['name'] }} - ${{ $product['price'] }}
        <a href="{{ route('city.edit', $product['id']) }}">Edit</a>

        <form method="POST" action="{{ route('city.destroy', $product['id']) }}">
            @csrf
            @method('DELETE')
            <button type="submit">Delete</button>
        </form>
    </li>
@endforeach
</ul>
