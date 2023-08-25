<?php

namespace App\Models;
use App\Models\Product;
use App\Models\Order;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderDetail extends Model
{
    use HasFactory;
    protected $fillable = [	'order_id',	'product_id'	,'price',	'quantity',	'created_at'	,'updated_at'];

    public function products(){
        return $this->hasOne(Product::class, 'id', 'product_id');
    }
    public function order(){
        return $this->hasMany(Order::class, 'id', 'order_id');
    }

    
}
