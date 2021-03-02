<?php

namespace App\Models;

use App\Models\Traits\Translatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    use Translatable;

    protected $guarded = [
        '_token',
        '_method',
    ];

    public function products()
    {
        return $this->hasMany(Product::class);
    }
}
