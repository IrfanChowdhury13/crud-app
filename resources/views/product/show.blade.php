<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>{{ config('app.name') }}</title>
    <script src="{{ asset('https://cdn.tailwindcss.com') }}"></script>
    <link href="{{ asset('/css/output.css') }}" rel="stylesheet" />

    <style>
        .product-details ul {
            list-style-type: disc !important;
            /* Use disc for bullet points */
            margin-left: 20px;
            /* Indent the list */
        }
    
        .product-details li {
            margin-bottom: 10px;
            /* Space between list items */
        }
    </style> 
</head>

<body class="bg-gray-100">
    <!-- Single Product Section -->
   <div class="container mx-auto p-6 fixed inset-0 flex justify-center items-center">
        <div class="p-6 grid grid-cols-1 md:grid-cols-2 gap-8 shadow-lg rounded-lg bg-slate-100 border border-slate-300">
            <!-- Product Image -->
            <div class="flex justify-center">
                <img src="{{ asset('uploads/' . $product->product_image) }}" alt="Product Image"
                    class="rounded-lg p-10" />
            </div>

            <!-- Product Details -->
            <div class="flex flex-col justify-center">
                <!-- Product Name -->
                <h1 class="text-4xl font-bold py-10">{{ $product->product_name }}</h1>
                <!-- Price -->
                <div class="text-3xl font-semibold text-green-600 pb-10">${{ $product->product_price }}</div>

                <!-- Product Description -->
                <p class="text-gray-700 mb-6">
                    {{ $product->product_description }}
                </p>
                <h2 class="text-2xl font-bold mb-4">Product Details</h2>
                <ul class="list-disc pl-6 text-gray-700 product-details">
                    {!! $product->product_detail !!}
                </ul>

                <div class="flex justify-end mt-20">
                    <a href="{{ route('home') }}" class="px-5 py-3 bg-blue-800 text-white rounded">Back To Products Page</a>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
