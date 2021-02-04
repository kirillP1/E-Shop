<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    public function products()
    {
        return $this->belongsToMany(Product::class)->withPivot('count')->withTimestamps();
    }

    public function totalPrice()
    {
        $totalPrice = 0;
        foreach ($this->products as $product) {
            $totalPrice = $totalPrice + $product->getPriceForCount();
        }
        return $totalPrice;
    }

    public function saveOrder($name, $phone){
        if ($this->status == 0){
            $this->name = $name;
            $this->phone = $phone;
            $this->status = 1;
            $this->save();
            session()->forget('orderId');
            return true;
        }else{
            return false;
        }
    }

}
