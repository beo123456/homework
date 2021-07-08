<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table = 'category';
    public $timestamps = false;

    
    public function prd()
    {
        return $this->hasMany(Product::class, 'category_id', 'id'); /// lấy những bản ghi có category_id(product) = id(category)
    }
    
}
