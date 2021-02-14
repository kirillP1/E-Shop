<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductRequest;
use App\Http\Requests\ProductsFilterRequest;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class MainController extends Controller
{
    public function index(ProductsFilterRequest $request)
    {
        $productsQuery = Product::query();

        if ($request->filled('price_from')) {
            $productsQuery->where('price', '>=', $request->price_from);
        }
        if ($request->filled('price_to')) {
            $productsQuery->where('price', '<=', $request->price_to);
        }
        foreach ([
                     'hit',
                     'recommend',
                     'new',
                 ] as $item) {

            if ($request->has($item)) {
                $productsQuery->where($item, 1);
            }
        }

        $products = $productsQuery->paginate(6)->withPath('?' . $request->getQueryString());

        return view('index', compact('products'));
    }


    public function categories()
    {
        $categories = Category::all();
        return view('categories', compact('categories'));
    }

    public function category($code)
    {
        $category = Category::where('code', $code)->first();
        return view('category', ['category' => $category]);
    }

    public function product($product)
    {
        $product = Product::find($product);
        return view('product', ['product' => $product]);
    }

    public function productCategory($category = null, $product)
    {
        $product = Product::find($product);
        return view('product', ['product' => $product]);
    }
}
