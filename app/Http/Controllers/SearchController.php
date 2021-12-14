<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class SearchController extends Controller
{
    public function search(Request $request)
    {
        $products = Product::where('name', 'LIKE','%'.$request->keywords.'%')->get();
        return response()->json($products);
    }
}
