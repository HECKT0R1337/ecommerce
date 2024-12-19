<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $table = 'products';

    protected $fillable = [
        'title',
        'slug',
        'category_id',
        'sub_category_id',
        'brand_id',  
        'old_price',
        'price',
        'short_description',
        'description',
        'additional_information',
        'shipping_returns',
        'status',
        'is_delete',
    ];


    public function productColor(){
        return $this->hasMany(ProductColor::class);
    }

    public function color(){
        return $this->hasMany(Color::class);
    }

    public function productSize(){
        return $this->hasMany(ProductSize::class);
    }

    public function productImage(){
        return $this->hasMany(ProductImage::class);
    }


    static function checkSlug($slug){
        return Product::where('slug', $slug)->count();
    }
    
    // return self::where('slug', $slug)->count();


    static function getSingleProduct($id){
       return self::where('id',$id)->first();
    }
}
