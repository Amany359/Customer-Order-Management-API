<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Sanctum\HasApiTokens;
class Customer extends Model
{
    use HasFactory,HasApiTokens;

    protected $fillable = ['name', 'email', 'phone'];

    public function orders()
    {
        return $this->hasMany(Order::class);
    }
}

