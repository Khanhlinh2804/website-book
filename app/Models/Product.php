<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $fillable = [	'name'	,'price',	'sale_price'	,'status'	,'description'	,'image'	,'category_id'];
    public function categories()
    {
        return $this->hasOne(Category::class, 'id', 'category_id');
    }
}
