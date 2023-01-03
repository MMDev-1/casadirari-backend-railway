<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Section extends Model
{
    public $timestamps = false;
    use HasFactory;
    protected $fillable = ['block_title','status','slug','row_order','products_ids','category_id','block_type'];
    protected $hidden = ['primary_key'];
    
    public static function getNewInProducts($ids=null)
    {
        if($ids==null){
            $products = Product::where('is_new',1)->get();
        }
        else
        {
              $products = Product::whereIn('category_id',$ids)->where('is_new',1)->get();
        }

        foreach($products as $product){
            $product["category_name"]=Section::getCategoryNamebyId($product->category_id);
        }
        return $products;
    }

    public static function getOnSaleProducts($ids=null)
    {

         if($ids==null){
            $products = Product::where('sale_price','>',0.00)->get();
        }
        else
        {
              $products = Product::whereIn('category_id',$ids)->where('sale_price','>',0.00)->get();
              
        }
        foreach ($products as $product){
            $product["category_name"]=Section::getCategoryNamebyId($product->category_id);
          }
        return $products;
    }
    public static function getTopRatedProducts($ids=null)
    {
        if($ids==null){
            $products = Product::where('rating',">=" ,DB::table('products')->max('rating')-1)->get();
        }
        else
        {
              $products = Product::whereIn('category_id',$ids)->where('rating',">=" ,DB::table('products')->max('rating')-1)->get();
              
        }
        foreach($products as $product){
            $product["category_name"]=Section::getCategoryNamebyId($product->category_id);
        }
        return $products;
    }
    public static function getProductsBySkus($skus=null)
    {
        if($skus==null){
            return 1;
        }
        $products = Product::whereIn('sku',$skus)->get();
       
        return $products;
    }

    public static function getCategoryNamebyId($id){
        $category = Category::find($id);
        $catName=$category->name;
        return $catName;
    }
    }
