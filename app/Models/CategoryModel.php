<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CategoryModel extends Model
{
    use HasFactory;

    protected $table = 'categories';
    protected $fillable = ['name', 'slug', 'status', 'is_delete', 'meta_title', 'meta_description', 'meta_keywords'];
}
