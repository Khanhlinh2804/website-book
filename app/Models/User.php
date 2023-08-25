<?php

namespace App\Models;
use App\Models\Order;
use App\Models\Roles;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\SoftDeletes;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'phone',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function orders()
    {
        return $this->hasMany(Order::class, 'user_id', 'id');
    }

    public function permissions()  
    {
        return $this->hasMany(Roles::class, 'id', 'role');
    }

    
    public function hasPermission($route){
        $routes = $this->routes();
        // dd ($routes);
        return in_array($route, $routes) ? true : false;
        // return true;
    }


    public function routes(){
        $roles = $this->getRoles;
        // dd($roles);
        $data = [];
        foreach ($roles as $role) {
            $permission = json_decode($role->permissions);
            // dd ($permission);
            foreach ($permission as $per) {
                if(!in_array($per,$data)){
                    $data[] = $per;
                }
            }
            // dd($role->permissions);
        }
        // dd($data);
        return $data;
    }
    
    /**
     * The roles that belong to the User
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function getRoles()
    {
        return $this->belongsToMany(Roles::class, 'user_roles', 'user_id', 'role_id');
    }


}
