
<h1>Edit Product</h1>

<form method="POST" action="{{ route('city.update', $city['id']) }}">
    @csrf
    @method('PUT')

    <input name="name" value="{{ $city['name'] }}">
    <input name="price" value="{{ $city['price'] }}">

    <button type="submit">Update</button>
</form>
