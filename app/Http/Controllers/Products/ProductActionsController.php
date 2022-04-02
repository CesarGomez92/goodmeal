<?php

namespace App\Http\Controllers\Products;

use Illuminate\Http\Request;
use App\Models\Products\Product;
use App\Http\Controllers\Controller;

class ProductActionsController extends Controller
{
    public function findProduct(Product $product){
        if($product){
            return $product;
        }else{
            return 500;
        }
    }
}
