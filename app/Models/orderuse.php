<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\product;

class orderuse extends Model
{
    use HasFactory;
    protected $fillable=[
        'user_id',
        'order_id',
        'count',
        'product_id',
        'status',
        'discription'
    ];

    public function prod()
    {
        return $this->hasOne(product::class, 'id','product_id');
    }
}
