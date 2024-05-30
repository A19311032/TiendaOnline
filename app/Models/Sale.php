<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Product;
use App\Models\User;
use App\Models\Detail;

class Sale extends Model
{
    use HasFactory;
    protected $fillable = [
        'customer_id',
        'method'
    ];

    public function products(){

        return $this->belongsToMany(Product::class);
    }

    public function user() {

        return $this->belongsTo(User::class);
    }

    public function details() {

        return $this->belongsToMany(Detail::class);
    }

    public function customer() {

        return $this->belongsTo(User::class, 'customer_id');
    }
}
