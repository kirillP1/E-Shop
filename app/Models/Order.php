<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Order extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function products()
    {
        return $this->belongsToMany(Product::class)->withPivot('count')->withTimestamps();
    }

    public function scopeActive($query)
    {
        return $query->where('status', 1);
    }

    public function totalPrice()
    {
        $totalPrice = 0;
        foreach ($this->products()->withTrashed()->get() as $product) {
            $totalPrice = $totalPrice + $product->getPriceForCount();
        }
        return $totalPrice;
    }

    public static function changeFullSum($changeSum)
    {
        $sum = self::getFullPrice() + $changeSum;
        session(['full_order_sum' => $sum]);
    }

    public static function getFullPrice()
    {
        return session('full_order_sum', 0);
    }

    public static function eraseFullSum()
    {
        session()->forget('full_order_sum');
    }

    public function saveOrder($name, $phone)
    {
        if ($this->status == 0) {
            $this->name = $name;
            $this->phone = $phone;
            $this->user_id = Auth::user()->id;
            $this->status = 1;
            $this->save();
            session()->forget('orderId');
            return true;
        } else {
            return false;
        }
    }

}
