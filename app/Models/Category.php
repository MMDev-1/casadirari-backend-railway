<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $fillable = ['name', 'slug', 'parent_id','status','is_homepage'];

// One level parent
public function parent() {
    return $this->belongsTo(\App\Models\Category::class, 'parent_id')->withCount('products');
}

// Recursive parents
public function parents() {
    return $this->belongsTo(\App\Models\Category::class, 'parent_id')->with('parent');
}

public function products() {
    return $this->hasManyThrough(\App\Models\Product::class,\App\Models\Category::class,'id','category_id','id','id')->with('product_count');
}
public function total() {
    return $this->hasManyThrough(\App\Models\Product::class,\App\Models\Category::class,'parent_id','category_id','id','id');
}

public function categoryProducts()
{
    return $this->hasMany(Product::class);
}

public function children()
{
    return $this->hasMany(Category::class, 'parent_id')->with('children')->withCount('products');
}


}
