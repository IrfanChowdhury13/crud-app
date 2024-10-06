<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Product::paginate(10);
        return view('product.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('product.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {   
       $request->validate([
            'product_name' => 'required|string|not_in:admin,Admin',
            'product_price' => 'required|numeric',
            'product_description' => 'required|string',
            'product_detail' => 'required|string',
            'product_image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $file = $request->file('product_image');
        $imageName = $file->getClientOriginalName();
        $file->move(public_path('uploads'), $imageName);

        Product::create([
            'product_name' => $request->product_name,
            'product_price' => $request->product_price,
            'product_description' => $request->product_description,
            'product_detail' => $request->product_detail,
            'product_image' => $imageName,
        ]);

        return redirect()->route('home');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $product = Product::find($id);
        return view('product.show', compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $product = Product::find($id);
        return view('product.edit', compact('product'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'product_name' => 'required|string|not_in:admin,Admin',
            'product_price' => 'required|numeric',
            'product_description' => 'required|string',
            'product_detail' => 'nullable|string',
            'product_image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $product = Product::find($id);

        $product->product_name = $request->input('product_name');
        $product->product_price = $request->input('product_price');
        $product->product_description = $request->input('product_description');
        $product->product_detail = $request->input('product_detail');

        if ($request->hasFile('product_image')) {
            $oldPath = public_path('uploads/' . $product->product_image);

            if (File::exists($oldPath)) {
                File::delete($oldPath);
            }
            $file = $request->file('product_image');
            $newImageName = $file->getClientOriginalName();
            $file->move(public_path('uploads'), $newImageName);

            $product->product_image = $newImageName;
        }

        $product->save();
        return redirect()->route('home');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $product = Product::find($id);
        $product->delete();
        $oldPath = public_path('uploads/' . $product->product_image);

        if (File::exists($oldPath)) {
            File::delete($oldPath);
        }

        return redirect()->back();
    }
}
