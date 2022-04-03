<?php

namespace App\Http\Controllers\ProductsFound;

use Illuminate\Http\Request;
use App\Models\Rounds\Round;
use App\Http\Controllers\Controller;

class ProductsFoundController extends Controller
{
    public function store(Round $round){
        request()->validate([
            'product_id' => 'required',
        ]);

        $id_product = request()->get('product_id');

        $round->products()->attach($id_product);

        return 200;
    }
}
