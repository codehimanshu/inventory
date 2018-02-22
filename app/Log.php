<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Log extends Model
{
    protected $fillable = [
       'id', 'subcategory_id', 'to', 'qty', 'costing', 'amount', 'comment'
    ];

    public function subcategory(){
        return $this->hasOne('App\SubCategory','id','subcategory_id');
    }

    protected $table = 'logs';
}
