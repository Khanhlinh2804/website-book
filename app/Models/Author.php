<?php

namespace App\Models;
use App\Models\Classify;
use App\Models\Product;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Author extends Model
{
    use HasFactory,SoftDeletes;
    protected $fillable = ['name', 'status','description','classify_id'];
    
    public function classifies()
    {
        return $this->hasOne(Classify::class, 'id', 'classify_id');
    }

    public function products()
    {
        return $this->hasMany(Product::class, 'author_id', 'author_id');
    }
}
