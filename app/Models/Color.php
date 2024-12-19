<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Color extends Model
{
    use HasFactory;


    
    protected $table = 'colors';
    protected $fillable =
    [
        'name',
        'code',
        'status',
        'is_delete',
        'created_by'
    ];


    static function getSingleColor($id)
    {
        return self::where('id', $id)->firstOrFail();
    }
}
