<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Stock extends Model
{
    protected $fillable = [
       'id', 'category', 'costing', 'quantty', 'comment', 'dated'
    ];

    protected $table = 'stock';
}
