<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Stock extends Model
{
    protected $fillable = [
       'id', 'category', 'costing', 'quantty', 'tosite'
    ];

    protected $table = 'stock';
}
