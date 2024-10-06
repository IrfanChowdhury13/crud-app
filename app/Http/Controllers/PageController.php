<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function home(){
        $products = Product::paginate(10);
        return view('product.index', compact('products'));
    }
    public function create(){
        return view('product.create');
    }
    public function edit(){
        return view('product.edit');
    }
    public function update(){
        return view('product.edit');
    }

}
