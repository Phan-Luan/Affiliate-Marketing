<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LogTransaction extends Model
{
    use HasFactory;
    protected $table = 'log_transactions';
    protected $fillable = ['user_id','before','money','after','status','type','add','wallet','note','user_gift','reason'];

    public function user(){
        return $this->belongsTo(User::class,'user_id');
    }
    public function user_receive(){
        return $this->belongsTo(User::class,'user_gift');
    }
}
