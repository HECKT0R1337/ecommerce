<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubCategory extends Model
{
    use HasFactory;

    protected $table = 'sub_categories';

    protected $fillable = [
        'category_id',
        'name',
        'slug',
        'meta_title',
        'meta_description',
        'meta_keywords',
        'created_by',
        'status',
        'is_delete',
    ];

    static function getSingleSubCategory($id)
    {
        return self::findOrFail($id);
    }

    public function userCategory()
    {
        return $this->belongsTo(User::class, 'created_by', 'id');
    }



    public function Category()
    {
        return $this->belongsTo(CategoryModel::class, 'category_id', 'id');
    }

    static public function getRecord()
    {
        return self::select('sub_category.*', 'users.name as created_by_name', 'category.name as category_name')
            ->join('category', 'category.id', '=', 'sub_category.category_id')
            ->join('users', 'users.id', '=', 'sub_category.created_by')
            ->where('sub_category.is_delete', '=', 0)
            ->orderBy('sub_category.id', 'desc')
            ->paginate(20);
    }
}
