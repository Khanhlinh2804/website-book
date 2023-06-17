<?php

namespace App\Models;
use App\Models\Classify;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'status','description','classify_id'];
    public function classifies()
    {
        return $this->hasOne(Classify::class, 'id', 'classify_id');
    }
}
