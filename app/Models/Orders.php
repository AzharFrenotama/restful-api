<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Orders extends Model
{
    protected $fillable=['product_id', 'customer_id', 'quantity', 'total_price'];
}
