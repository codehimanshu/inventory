<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Site1 extends Model
{
    protected $fillable = [
       'id', 'category', 'costing', 'quantty', 'tosite'
    ];

    protected $table = 'site1';
}
