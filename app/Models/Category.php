<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    protected $fillable = ['category_name'];

    /**
     * Get the beverages for the category.
     */
    public function beverages()
    {
        return $this->hasMany(Beverage::class);
    }
}
