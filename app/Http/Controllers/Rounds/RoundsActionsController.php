<?php

namespace App\Http\Controllers\Rounds;

use Illuminate\Http\Request;
use App\Models\Rounds\Round;
use App\Http\Controllers\Controller;
use App\Models\ProductsFound\ProductFound;

class RoundsActionsController extends Controller
{
    public function getRoundsList()
    {
        $rounds = Round::all();

        return $rounds;
    }

    public function getProductsFoundWthoutGroups(Round $round)
    {
        $products = $round->productsFound()->whereDoesntHave('groups')->with('product')->get();

        return $products;

    }
}
