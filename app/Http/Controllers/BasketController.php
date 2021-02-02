<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;

class BasketController extends Controller
{
    public function basket(){
        $orderId = session('orderId');
        if (!is_null($orderId)){
            $order = Order::find($orderId);
        }else{
            $order = '';
        }

        /*$totalPrice = 0;

        foreach ($order->products as $product){
            $totalPrice = $totalPrice + $product->price;
        }*/

        return view('basket', compact('order', 'totalPrice'));
    }

    public function basketAdd($id){
        $orderId = session('orderId');
        if(is_null($orderId)){
            $order = Order::create();
            session(['orderId' => $order->id]);
        }else{
            $order = Order::find($orderId);
        }

        $order->products()->attach($id);

        return view('basket', compact('order'));
    }

    public function order(){
        return view('order');
    }

}
