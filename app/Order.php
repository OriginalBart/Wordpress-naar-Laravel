<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = [
        'first_name', 'last_name', 'address','location','band_id', 'assigned_ticket', 'quantity'
    ];
}
