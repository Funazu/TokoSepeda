<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    
    protected $table = 'products';
    protected $primaryKey = 'id';

    protected $fillable = [
        'category_id', 'name', 'price', 'image', 'qty'
    ];

    public function category() {
        return $this->belongsTo(Category::class);
    }

    public function TransactionDetail() {
        return $this->hasMany(TransactionDetail::class);
    }

    public function Cart() {
        return $this->hasMany(Cart::class);
    }
}
