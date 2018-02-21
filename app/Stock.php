<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Stock extends Model
{
    protected $fillable = [
       'id', 'subcategory_id', 'stock_qty', 'stock_amt', 'site1_qty', 'site1_amt', 'site2_qty','site2_amt','dated','comment'
    ];

    public function subcategory(){
        return $this->hasOne('App\SubCategory','id','subcategory_id');    	
    }

    protected $table = 'stock';
}
