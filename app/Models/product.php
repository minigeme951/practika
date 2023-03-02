<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class product extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'img_url',
        'price',
        'year_of_production',
        'country_of_origin',
        'category',
        'model',
        'count'
    ];
}
