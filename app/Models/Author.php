<?php

namespace App\Models;
use App\Models\Classify;
use App\Models\Product;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Author extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'status','description','classify_id'];
    
    public function classifies()
    {
        return $this->hasOne(Classify::class, 'id', 'classify_id');
    }

    // public function products(){
    //     return $this->hasMany(Product::class, 'author_id', 'id');
    // }


    public function product()
    {
        return $this->hasMany(Model::class, 'author_id', 'author_id');
    }
}
