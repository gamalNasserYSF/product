<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title', 'description',
    ];


    /**
     * Each product has many categories.
     */
    public function categories()
    {
        return $this->belongsToMany(Category::class, 'product_category');
    }


    public function attributes()
    {
        return $this->hasMany(Attribute::class, 'product_id');
    }
}
