<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
    use HasFactory;

    protected $table = 'brands';
    protected $fillable =
    [
        'name',
        'slug',
        'status',
        'is_delete',
        'meta_title',
        'meta_description',
        'meta_keywords',
        'created_by'
    ];



    static function getSingleBrand($id)
    {
        return self::where('id', $id)->firstOrFail();
    }
}
