<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\product;

class cart extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'product_id',
    ];
    public function prod()
    {
        return $this->hasOne(product::class, 'id','product_id');
    }
}
