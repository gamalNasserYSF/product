<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title', 'description', 'image'
    ];


    /**
     * Each category belongs to many products.
     */
    public function products()
    {
        return $this->belongsToMany(Product::class, 'product_category');
    }
}
