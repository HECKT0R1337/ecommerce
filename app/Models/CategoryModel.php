<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CategoryModel extends Model
{
    use HasFactory;

    protected $table = 'categories';
    protected $fillable = ['name', 'slug', 'status', 'is_delete', 'meta_title', 'meta_description', 'meta_keywords', 'created_by'];


    public function userCategory()
    {
        return $this->belongsTo(User::class, 'created_by', 'id');
    }

    public static function getRecord()
    {
        return self::select('category.*', 'user.name as user_name')
            ->leftJoin('users', 'user.id', '=', 'category.created_by')
            ->orderBy('category.id', 'desc')
            ->get();
    }


    public static function getSingle($id){
        return self::findOrFail($id);
    }




}
