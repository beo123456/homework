<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table = 'product';
    public $timestamps = false;
    
    // quan hê 1-1
    public function category()
    {
        return $this->belongsTo('App\models\Category', 'category_id', 'id'); // lket model category, khóa ngoại product?, khóa chính 
    }
    
}
