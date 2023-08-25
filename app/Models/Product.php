<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Product extends Model
{
    use HasFactory, SoftDeletes ;
    protected $fillable = [	'name'	,'price',	'sale_price'	,'status'	,'description'	,'image'	,'author_id', 'quantity','classify_id' ];
    
    public function author()
    {
        return $this->hasOne(Author::class, 'id', 'author_id');
    }
    
    public function classifies()
    {
        return $this->hasOne(Classify::class, 'id', 'classify_id');
    }

    // them localScope
    public function scopeSearch($query) {
        if($key = request()->key){
            $query = $query->where('name', 'like', '%'.$key.'%');
        }
        return $query;
    }

    public function scopeFilter($query)
    {
        if (request()->order) {
            $order = request()->order;
            $order_arr = explode('-', $order);
            $query = $query->orderBy($order_arr[0], $order_arr[1]);
        }
        return $query;
    }
}

