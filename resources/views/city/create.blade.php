<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Create City</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 p-8">

<div class="max-w-xl mx-auto bg-white shadow rounded-lg p-6">
    <h1 class="text-2xl font-bold mb-4">Create City</h1>

    <form method="POST" action="{{ route('city.store') }}" class="space-y-4">
        @csrf

        <div>
            <label class="block text-sm font-medium">Name</label>
            <input
                name="name"
                class="w-full px-3 py-2 border rounded focus:ring"
                required
            >
        </div>
        <div>
            <label class="block text-sm font-medium">Country</label>
            <input
                name="country"
                class="w-full px-3 py-2 border rounded focus:ring"
                required
            >
        </div>
        <div>
            <label class="block text-sm font-medium">State</label>
            <input
                name="state"
                class="w-full px-3 py-2 border rounded focus:ring"
                required
            >
        </div>
        <div>
            <label class="block text-sm font-medium">Region</label>
            <input
                name="region"
                class="w-full px-3 py-2 border rounded focus:ring"
                required
            >
        </div>
        <div>
            <label class="block text-sm font-medium">Is Capital</label>
            <input
                name="is_capital"
                type="checkbox"
                class="w-full px-3 py-2 border rounded focus:ring"
            >
        </div>
        <div>
            <label class="block text-sm font-medium">Population</label>
            <input
                name="population"
                type="number"
                step="0.01"
                class="w-full px-3 py-2 border rounded focus:ring"
                required
            >
        </div>

        <div class="flex justify-between">
            <a href="{{ route('city.index') }}"
               class="text-gray-600 hover:underline">
                Cancel
            </a>

            <button
                class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">
                Save
            </button>
        </div>
    </form>
</div>

</body>
</html>

