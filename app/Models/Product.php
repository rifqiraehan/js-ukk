<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'detail',
        'harga',
        'stok',
        'foto',
        'user_id',
        'product_category_id',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    function carts()
    {
        return $this->hasMany(Cart::class);
    }

    function orderItems()
    {
        return $this->hasMany(OrderItem::class);
    }

    public function productCategory()
    {
        return $this->belongsTo(ProductCategory::class);
    }
}
