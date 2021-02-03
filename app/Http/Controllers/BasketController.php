<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;

class BasketController extends Controller
{
    public function basket()
    {
        $orderId = session('orderId');
        if (!is_null($orderId)) {
            $order = Order::find($orderId);
        } else {
            $order = '';
        }



        return view('basket', compact('order'));
    }

    public function basketAdd($id)
    {
        $orderId = session('orderId');
        if (is_null($orderId)) {
            $order = Order::create();
            session(['orderId' => $order->id]);
        } else {
            $order = Order::find($orderId);
        }

        if ($order->products->contains($id)){
            $pivotRow = $order->products()->where('product_id', $id)->first()->pivot;
            $pivotRow->count++;
            $pivotRow->update();
        }else{
            $order->products()->attach($id);
        }

        return redirect()->route('basket', compact('order'));
    }

    public function basketRemove($id){
        $orderId = session('orderId');
        if (!is_null($orderId)) {
            $order = Order::find($orderId);

            if ($order->products->contains($id)){
                $pivotRow = $order->products()->where('product_id', $id)->first()->pivot;
                if ($pivotRow->count < 2){
                    $order->products()->detach($id);
                }else{
                    $pivotRow->count--;
                    $pivotRow->update();
                }
            }
        }

        return redirect()->route('basket', compact('order'));
    }

    public function order()
    {
        return view('order');
    }

}
