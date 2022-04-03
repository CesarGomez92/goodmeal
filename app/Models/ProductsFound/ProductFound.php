<?php

namespace App\Models\ProductsFound;

use App\Models\Groups\Group;
use App\Models\Products\Product;
use Illuminate\Database\Eloquent\Model;

class ProductFound extends Model
{
    protected $table = 'products_found';

    protected $fillable = ['product_id', 'round_id'];

    protected $dates = ['created_at', 'updated_at',];

    protected $hidden = ['created_at', 'updated_at'];

    public function groups()
    {
        return $this->belongsToMany(Group::class, 'grouped_products', 'group_id')->withTimestamps();
    }

    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
