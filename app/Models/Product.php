<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $fillable = [	'name'	,'price',	'sale_price'	,'status'	,'description'	,'image'	,'author_id', 'quantity','classify_id' ];
    
    public function authours()
    {
        return $this->hasOne(Author::class, 'id', 'authour_id');
    }
    //khóa ngoại
    public function classifies()
    {
        return $this->hasOne(Classify::class, 'id', 'classify_id');
    }

    // join 1- n
    public function cat() {
        return $this->hasOne(Author::class, 'id', 'author_id');
    } 
    // them localScope
    public function scopeSearch($query) {
        if($key = request()->key){
            $query = $query->where('name', 'like', '%'.$key.'%');
        }
        return $query;
    }

    // loc 
    public function author()
    {
        return $this->belongsTo(Author::class, 'author_id', 'author_id');
    }
}

