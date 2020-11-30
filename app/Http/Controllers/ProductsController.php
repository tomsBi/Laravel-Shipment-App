<?php

namespace App\Http\Controllers;

use App\Models\Delivery;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductsController extends Controller
{

    public function show(Product $product)
    {
        $product->load('deliveries');

        return view('show', [
            'product' => $product
        ]);
    }
}
