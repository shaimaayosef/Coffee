<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Beverage extends Model
{
    use HasFactory;
    protected $fillable = [
        'category_id',
        'title',
        'content',
        'price',
        'published',
        'is_special',
        'image',
    ];
}
