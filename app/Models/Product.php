<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'slug', 'user_id', 'unit', 'category_id', 'price', 'price_sale', 'image', 'description', 'content', 'type', 'hot', 'display', 'user_connect', 'origin', 'sale1k', 'origin', 'point_buy'];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
    public function category()
    {
        return $this->belongsTo(ProductCategory::class, 'category_id');
    }
    public function connect_user()
    {
        return $this->belongsTo(User::class, 'user_connect');
    }
}
