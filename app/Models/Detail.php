<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Product;
use App\Models\User;

class Detail extends Model
{
    use HasFactory;

    protected $table = 'sales_details';
    protected $fillable = [
        'sale_id',
        'amount',
        'product_id',
        'price',
    ];

    public function sale(){
        return $this->belongsTo(User::class, 'sale_id');
    }

    public function product() {
        return $this->belongsTo(Product::class);
    }
}
