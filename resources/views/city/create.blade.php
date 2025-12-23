<h1>Create Product</h1>

<form method="POST" action="{{ route('city.store') }}">
    @csrf
    <input name="name" placeholder="Name">
    <input name="price" placeholder="Price">
    <button type="submit">Save</button>
</form>
