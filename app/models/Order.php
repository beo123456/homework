<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $table = 'order';
    // public $timestamps = false;
    
    public function Product_Order()
    {
        return $this->hasMany(ProductOrder::class, 'order_id', 'id'); /// model order lket vs model product_order. model lket, khóa ngoại product_order?, khóa chính product_order
    }
    
}
