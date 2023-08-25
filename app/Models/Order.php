<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Product;
use App\Models\User;
use App\Models\City;
use App\Models\District;
use App\Models\OrderDetail;
use Illuminate\Database\Eloquent\SoftDeletes;

class Order extends Model
{
    use HasFactory, SoftDeletes;
    protected $fillable = ['id', 'name', 'user_id', 'address', 'city', 'districts', 'phone', 'email', 'note', 'status' ];

    public function users(){
        return $this->belongsTo(User::class, 'id', 'user_id');
    }

    public function cityData(){
        return $this->hasOne(City::class, 'id', 'city');
    }
    public function districtData(){
        return $this->hasOne(District::class, 'id', 'districts');
    }

    public function order_detail()
    {
        return $this->hasMany(OrderDetail::class);
    }
    public function scopeSearch($query) {
        if($key = request()->key){
            $query = $query->where('name', 'like', '%'.$key.'%');
        }
        return $query;
    }
}
