<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductCategory extends Model
{
    use HasFactory;
    protected $fillable = ['name','slug','description','image','position'];

    public function product_homes ($category_id) {
        return Product::orderBy('id','DESC')->where('display',1)->where('category_id',$category_id)->take(8)->get();
    }
}
