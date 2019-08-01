<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    public static function scopeSearch($query, $searchTerm)
    {
        return $query->where('title', 'like', '%' .$searchTerm. '%')
                     ->orWhere('content', 'like', '%' .$searchTerm. '%');
    }
}
