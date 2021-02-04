<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Product;
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

        if ($order->products->contains($id)) {
            $pivotRow = $order->products()->where('product_id', $id)->first()->pivot;
            $pivotRow->count++;
            $pivotRow->update();
        } else {
            $order->products()->attach($id);
        }

        $product = Product::find($id);

        session()->flash('success', 'Добавлен товар '. $product->name .'!');

        return redirect()->route('basket', compact('order'));
    }

    public function basketRemove($id)
    {
        $orderId = session('orderId');
        if (!is_null($orderId)) {
            $order = Order::find($orderId);

            if ($order->products->contains($id)) {
                $pivotRow = $order->products()->where('product_id', $id)->first()->pivot;
                if ($pivotRow->count < 2) {
                    $order->products()->detach($id);
                } else {
                    $pivotRow->count--;
                    $pivotRow->update();
                }
            }
        }

        $product = Product::find($id);

        session()->flash('warning', 'Удален товар '. $product->name .'!');

        return redirect()->route('basket', compact('order'));
    }

    public function order()
    {
        $orderId = session('orderId');
        if (is_null($orderId)) {
            return redirect()->route('index');
        } else {
            $order = Order::find($orderId);
            return view('order', compact('order'));
        }
    }

    public function basketConfirm(Request $request)
    {

        $orderId = session('orderId');
        if (is_null($orderId)) {
            return redirect()->route('index');
        }else{
            $order = Order::find($orderId);
            $success = $order->saveOrder($request->name, $request->phone);

            if ($success){
                session()->flash('success', 'Ваш заказ принят в обработку!');
            }else{
                session()->flash('warning', 'Случилась ошибка!');
            }


            return redirect()->route('index');
        }
    }

}
