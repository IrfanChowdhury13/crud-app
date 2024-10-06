<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>{{ config('app.name') }}</title>
    <link href="{{ asset('https://cdn.quilljs.com/1.3.6/quill.snow.css') }}" rel="stylesheet">
    <script src="{{ asset('https://cdn.quilljs.com/1.3.6/quill.js') }}"></script>
    <script src="{{ asset('https://cdn.tailwindcss.com') }}"></script>
    <link href="{{ asset('/css/output.css') }}" rel="stylesheet" />
</head>

<body class="bg-gray-100">
    <style>
        /* Set the height of the Quill editor */
        .quill {
            height: 200px;
        }
    </style>
    </head>

    <body class="bg-gray-100">

        <div class="container mx-auto mt-10 p-6 bg-white shadow-lg rounded-lg max-w-3xl">
            <h1 class="text-3xl font-bold mb-6 text-center">Create Product</h1>

            @if ($errors->any())
                @foreach ($errors->all() as $error)
                    <div>{{ $error }}</div>
                @endforeach
            @endif

            <!-- Form starts here -->
            <form action="{{ route('products.store') }}" method="POST" class="space-y-6" enctype="multipart/form-data">
                @csrf
                <!-- Product Name -->
                <div>
                    <label for="productName" class="block text-lg font-medium text-gray-700">Product Name</label>
                    <input type="text" id="productName" name="product_name"
                        class="mt-1 block w-full p-3 border border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500"
                        placeholder="Enter Product Name">
                </div>

                <!-- Price -->
                <div>
                    <label for="price" class="block text-lg font-medium text-gray-700">Price</label>
                    <input type="text" id="price" name="product_price"
                        class="mt-1 block w-full p-3 border border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500"
                        placeholder="Enter Price">
                </div>

                <!-- Description -->
                <div>
                    <label for="description" class="block text-lg font-medium text-gray-700">Description</label>
                    <textarea id="description" name="product_description" rows="3"
                        class="mt-1 block w-full p-3 border border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500"
                        placeholder="Enter Product Description"></textarea>
                </div>

                <!-- Product Details (Quill Editor) -->
                <div>
                    <label class="block text-lg font-medium text-gray-700">Product Details</label>
                    <div id="editor" class="quill border border-gray-300 rounded-lg"></div>
                    <textarea rows="3" class="mb-3" style="display: none" name="product_detail" id="quill-editor-area"></textarea>
                </div>

                <!-- Image Upload -->
                <div>
                    <label for="image" class="block text-lg font-medium text-gray-700">Upload Product Image</label>
                    <input type="file" id="image" name="product_image"
                        class="mt-1 block w-full text-gray-700 p-2 bg-white border border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500">
                </div>

                <!-- Submit Button -->
                <div>
                    <button type="submit"
                        class="w-full bg-blue-500 text-white py-3 rounded-lg hover:bg-blue-600 transition-all duration-300">Create
                        Product</button>
                </div>
                <div class="flex justify-center mt-20">
                    <a href="{{ route('home') }}" class="px-5 py-3 bg-blue-800 text-white rounded">Back To Products Page</a>
                </div>
            </form>
            <!-- Form ends here -->
        </div>

        <script type="text/javascript">
            document.addEventListener('DOMContentLoaded', function() {
                if (document.getElementById('quill-editor-area')) {
                    var editor = new Quill('#editor', {
                        theme: 'snow',
                        modules: {
                            toolbar: [
                                [{
                                    'header': [1, 2, false]
                                }], // Header options
                                ['bold', 'italic', 'underline'], // Bold, italic, underline options
                                [{
                                    'list': 'ordered'
                                }, {
                                    'list': 'bullet'
                                }], // List options: ordered & bullet
                                ['clean'] // Option to remove formatting
                            ]
                        }
                    });
                    var quillEditor = document.getElementById('quill-editor-area');
                    editor.on('text-change', function() {
                        quillEditor.value = editor.root.innerHTML;
                    });

                    quillEditor.addEventListener('input', function() {
                        editor.root.innerHTML = quillEditor.value;
                    });
                }
            });
        </script>
    </body>

</html>
