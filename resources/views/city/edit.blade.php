<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Edit City</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 p-8">

<div class="max-w-xl mx-auto bg-white shadow rounded-lg p-6">
    <h1 class="text-2xl font-bold mb-4">Edit City</h1>

    <form method="POST"
          action="{{ route('city.update', $city['id']) }}"
          class="space-y-4">
        @csrf
        @method('PUT')

        <div>
            <label class="block text-sm font-medium">Name</label>
            <input
                name="name"
                value="{{ $city['name'] }}"
                class="w-full px-3 py-2 border rounded focus:ring"
                required
            >
        </div>

        <div>
            <label class="block text-sm font-medium">Country</label>
            <input
                name="country"
                value="{{ $city['country'] }}"
                class="w-full px-3 py-2 border rounded focus:ring"
                required
            >
        </div>

        <div>
            <label class="block text-sm font-medium">State</label>
            <input
                name="state"
                value="{{ $city['state'] }}"
                class="w-full px-3 py-2 border rounded focus:ring"
                required
            >
        </div>
        <div>
            <label class="block text-sm font-medium">Region</label>
            <input
                name="region"
                value="{{ $city['region'] }}"
                class="w-full px-3 py-2 border rounded focus:ring"
                required
            >
        </div>
        <div>
            <label class="block text-sm font-medium">Is Capital</label>
            <input
                name="is_capital"
                type="checkbox"
                {{ $city['is_capital'] ? 'checked' : '' }}
                class="w-full px-3 py-2 border rounded focus:ring"
            >
        </div>
        <div>
            <label class="block text-sm font-medium">Population</label>
            <input
                name="population"
                type="number"
                step="0.01"
                value="{{ $city['population'] }}"
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
                class="bg-green-600 text-white px-4 py-2 rounded hover:bg-green-700">
                Update
            </button>
        </div>
    </form>
</div>

</body>
</html>
