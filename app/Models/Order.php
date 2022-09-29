<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $fillable=['oder_date', 'customer_id'];

    public function customer(){
        return $this->belongsTo(Customer::class);
    }
    public function details(){
        return $this->hasMany(OrderDetail::class);
    }
}