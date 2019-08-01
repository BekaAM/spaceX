<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Team extends Model
{
    protected $fillable = [
        'id', 'name','lastname','description','profession','cover_images',
        
        'url_facebook','url_twitter','url_gmail','order', 'status',
    ];
}
