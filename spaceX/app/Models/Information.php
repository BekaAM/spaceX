<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Information extends Model
{
    protected $fillable = [
        'id', 'category','content','order', 'status',
    ];
}
