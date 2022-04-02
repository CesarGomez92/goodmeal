<?php

namespace App\Models\Products;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = ['name', 'price', 'type', 'code', 'sku', 'brand', 'date_elaboration', 'due_date',];

    protected $dates = ['created_at', 'updated_at', 'due_date', 'date_elaboration'];

    protected $hidden = ['created_at', 'updated_at'];
}
