<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index($id)
    {
        $product = Product::where('id', $id)->first();

        $categories = Category::where('parent_id', 1)->get();

        $productInCart = CartController::getProducts();

        return view('client.product', compact('product', 'categories', 'productInCart'));
    }
}
