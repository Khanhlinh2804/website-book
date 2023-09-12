<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\softDeletes;

class Blog extends Model
{
    use HasFactory, softDeletes;
    
    protected $fillable = ['name',	'image',	'title',	'content',	'status'];
    
    public function scopeSearch($query){
        if($key = request()->key){
            $query = $query->where('name','like','%'.$key.'%');
        }
        return $query;
    }
    
}
