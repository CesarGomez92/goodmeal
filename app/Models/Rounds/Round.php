<?php

namespace App\Models\Rounds;

use App\Models\Products\Product;
use Illuminate\Database\Eloquent\Model;
use App\Models\ProductsFound\ProductFound;

class Round extends Model
{
    protected $fillable = ['employee_name', 'round_date'];

    protected $dates = ['created_at', 'updated_at', 'round_date',];

    protected $hidden = ['created_at', 'updated_at'];

    public function products()
    {
        return $this->belongsToMany(Product::class, 'products_found', 'round_id')->withTimestamps();
    }

    public function productsFound()
    {
        return $this->hasMany(ProductFound::class);
    }
}
