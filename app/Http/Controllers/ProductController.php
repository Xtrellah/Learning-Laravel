<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function getAll(Request $request)
    {
        // Preparing a query - this is basically the same as doing Product::all()
        $productsQuery = Product::query();

        // If there is a search, add a whereAny onto the query
        if ($request->search) {
            $productsQuery = $productsQuery->whereAny(['name', 'description'], 'LIKE', "%{$request->search}%");
        }

        // If there is instock, add a where onto the query
        if ($request->instock) {
            $productsQuery = $productsQuery->where('stock', '>', 0);
        }

        // Execute the query with get() and hide the fields we need to
        $products = $productsQuery->get()->makeHidden(['description', 'stock', 'created_at', 'updated_at']);
        // Return the products as a HTTP response
        return $products;
    }

    public function getSingle(int $id)
    {
        $product = Product::find($id);
        return $product;
    }
}
