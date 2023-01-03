<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    public $timestamps = true;
    use HasFactory;
    protected $fillable = [
        'name',
        'type',
        'category_id',
        'seller_id',
        'attribute_set_id',
        'sku',
        'price',
        'sale_price',
        'quantity',
        'salable_quantity',
        'status',
        'image',
        'manafacturer',
        'color',
        'size',
        'step_size',
        'minimum_order_qty',
        'maximum_order_qty',
        'is_new',
        'is_returnable',
        'is_cancelable',
        'is_deliverable',
        'cancelable_period',
        'warranty_period',
        'guarante_period',
        'rating',
        'number_of_ratings',
        'short_description',
        'row_order'
    ];
    public function products()
    {
        return $this->belongsTo(Category::class);
    }
    public function categoryProducts()
{
    return $this->belongsToMany(Section::class);
}

}
