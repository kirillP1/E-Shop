<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class MainController extends Controller
{
    public function index(){
        return view('index');
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
        dump($product);
        return view('product', ['product' => $product]);
    }

    public function basket(){
        return view('basket');
    }

    public function order(){
        return view('order');
    }
}
