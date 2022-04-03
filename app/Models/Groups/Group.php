<?php

namespace App\Models\Groups;

use Illuminate\Database\Eloquent\Model;
use App\Models\ProducstFound\ProductFound;

class group extends Model
{
    protected $fillable = ['group_number', 'assigned'];

    protected $dates = ['created_at', 'updated_at',];

    protected $hidden = ['created_at', 'updated_at'];

    public function products_found()
    {
        return $this->belongsToMany(Product::class, 'products_found', 'round_id')->withTimestamps();
    }
}
