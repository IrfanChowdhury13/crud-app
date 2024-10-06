<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>{{ config('app.name') }}</title>
    <script src="{{ asset('https://cdn.tailwindcss.com') }}"></script>
    <link href="{{ asset('css/output.css') }}" rel="stylesheet" />
</head>

<body class="bg-gray-100">
    <div class="container mx-auto mt-10 p-6 bg-white shadow-lg rounded-lg">
        <h1 class="text-3xl font-bold mb-6 text-center">Product CRUD Dashboard</h1>

        <!-- Add New Product Button -->
        <div class="mb-4 text-right">
            <a href="{{ route('create') }}"
                class="inline-block bg-blue-500 text-white py-2 px-4 rounded hover:bg-blue-600 transition duration-300">Add
                New Product</a>
        </div>

        <!-- Product Table -->
        <table class="min-w-full bg-white border border-gray-300 text-center">
            <thead>
                <tr class="bg-gray-200 text-gray-700">
                    <th class="py-2 px-4 border">Product Name</th>
                    <th class="py-2 px-4 border">Price</th>
                    <th class="py-2 px-4 border">Image</th>
                    <th class="py-2 px-4 border">Actions</th>
                </tr>
            </thead>
            <tbody>


                @forelse ($products as $product)
                    <tr class="hover:bg-gray-100 gap-5">
                        <td>{{ $product->product_name }}</td>
                        <td>{{ $product->product_price }}</td>
                        <td class="flex justify-center">
                            <img src="{{ asset('uploads/' . $product->product_image) }}" alt="" width="90">

                        <td>
                            <div class="flex gap-2 justify-center">
                                <a href="{{ route('products.show', $product->id) }}"
                                    class="px-5 py-1 bg-green-800 text-white rounded">View</a>
                                <a href="{{ route('products.edit', $product->id) }}"
                                    class="px-5 py-1 bg-blue-800 text-white rounded">Edit</a>

                                <form action="{{ route('products.destroy', $product->id) }}" method="POST"
                                    enctype="multipart/form-data">
                                    @csrf
                                    @method('DELETE')

                                    <button type="submit"
                                        onclick="return confirm('Are you sure, you want to delete this?')"
                                        class="px-5 py-1 bg-red-800 text-white rounded">Delete</button>
                                </form>
                            </div>
                        </td>
                    </tr>

                @empty

                    <tr>

                        <td class="text-center py-5" colspan="9">
                            No Data Found.
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>

        {{ $products->links() }}

    </div>
</body>

</html>
