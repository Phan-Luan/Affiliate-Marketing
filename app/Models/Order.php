<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $fillable = ['user_id', 'name', 'phone', 'address', 'status', 'total_money', 'pro_type', 'progress', 'note', 'payment_method', 'voucher', 'time_confirm', 'bill', 'gift_money', 'pro_star'];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }


    // public function product(){
    //     return $this->belongsTo(Product::class,'user_id');
    // }

    public function order_detail()
    {
        return $this->hasMany(OrderDetail::class, 'order_id');
    }
}
