<?php

namespace App\Http\Controllers\Products;

use Illuminate\Http\Request;
use App\Models\Products\Product;
use App\Http\Controllers\Controller;

class ProductsController extends Controller
{
    public function store(){
        request()->validate([
            'name' => 'required',
            'price' => 'required|numeric',
            'type' => 'required',
            'code' => 'required|numeric|unique:products',
            'sku' => 'required|unique:products',
            'brand' => 'required',
            'date_elaboration' => 'required',
            'due_date' => 'required',
        ]);

        $data = request()->all();

        $product = Product::create($data);

        return $product;
    }
}
