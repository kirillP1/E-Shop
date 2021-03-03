<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Carrency extends Model
{
    use HasFactory;

    public function scopeByCode($query, $code){
        return $query->where('code', $code);
    }
}
