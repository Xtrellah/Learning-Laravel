<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    public function getAllProducts()
    {
        $products = Product::all()->makeHidden(['description', 'stock', 'created_at', 'updated_at']);

        return $products;
    }

    public function getSingleProduct(int $id)
    {
        $product = product::find($id);

        return $product;
    }
}
