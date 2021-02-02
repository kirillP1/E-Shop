<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class MainController extends Controller
{
    public function index(){
        $products = Product::get();
        return view('index', compact('products'));
    }

    public function categories(){
        $categories = Category::all();
        return view('categories', compact('categories'));
    }

    public function category($code){
        $category = Category::where('code', $code)->first();
        return view('category', ['category' => $category]);
    }

    public function product($product){
        $product = Product::find($product);
        return view('product', ['product' => $product]);
    }

    public function productCategory($category = null, $product){
        $product = Product::find($product);
        return view('product', ['product' => $product]);
    }
}
