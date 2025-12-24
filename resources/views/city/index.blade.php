<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>City</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 p-8">

<div class="max-w-6xl mx-auto bg-white shadow rounded-lg p-6">
    <div class="flex justify-between items-center mb-4">
        <h1 class="text-2xl font-bold">City Data</h1>
        <a href="{{ route('city.create') }}"
           class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">
            + Add City
        </a>
    </div>

    <!-- Search -->
    <input
        type="text"
        id="searchInput"
        placeholder="Search products..."
        class="w-full mb-4 px-3 py-2 border rounded focus:outline-none focus:ring"
        onkeyup="filterTable()"
    >

    <!-- Table -->
    <div class="overflow-x-auto">
        <table class="w-full border border-gray-200" id="cityTable">
            <thead class="bg-gray-100">
                <tr>
                    <th class="p-3 text-left border">Name</th>
                    <th class="p-3 text-left border">Country</th>
                    <th class="p-3 text-left border">State</th>
                    <th class="p-3 text-left border">Captial</th>
                    <th class="p-3 text-left border">Population</th>
                    <th class="p-3 text-left border">Actions</th>
                </tr>
            </thead>
            <tbody>
            @forelse($products as $product)
                <tr class="hover:bg-gray-50">
                    <td class="p-3 border">{{ $product['name'] }}</td>
                    <td class="p-3 border">{{ $product['country'] }}</td>
                    <td class="p-3 border">{{ $product['state'] }}</td>
                    <td class="p-3 border">{{ $product['is_capital']===true?'Yes':'No' }}</td>
                    <td class="p-3 border">{{ $product['population'] }}</td>
                    <td class="p-3 border flex gap-2">
                        <a href="{{ route('city.edit', $product['id']) }}"
                           class="text-blue-600 hover:underline">
                            Edit
                        </a>

                        <form method="POST"
                              action="{{ route('city.destroy', $product['id']) }}"
                              onsubmit="return confirm('Delete this product?')">
                            @csrf
                            @method('DELETE')
                            <button class="text-red-600 hover:underline">
                                Delete
                            </button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="3" class="p-4 text-center text-gray-500">
                        No products found
                    </td>
                </tr>
            @endforelse
            </tbody>
        </table>
    </div>
</div>

<!-- Search Script -->
<script>
function filterTable() {
    const input = document.getElementById('searchInput').value.toLowerCase();
    const rows = document.querySelectorAll('#cityTable tbody tr');

    rows.forEach(row => {
        const text = row.innerText.toLowerCase();
        row.style.display = text.includes(input) ? '' : 'none';
    });
}
</script>

</body>
</html>
