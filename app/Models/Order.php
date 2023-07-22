<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Product;
use App\Models\User;

class Order extends Model
{
    use HasFactory;
    protected $fillable = ['id','user_id', 'address', 'citys', 'districts', 'phone', 'email', 'note', 'status' ],
    
    public function users(){
        return $this->hasOne(User::class, 'id', 'user_id');
    }
}
