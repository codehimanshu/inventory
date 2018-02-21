<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = [
       'id', 'subcategory','category_id'
    ];

    protected $table = 'categories';
}
