<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MainController extends Controller
{
    public function index()
    {
        //products = Product::all();

        $products = \Cache::remember('products', 300, function(){
            return Product::all();
        });

        $categories = Category::where('parent_id', 1)->get();

        return view('client.home', compact('categories', 'products'));
    }

    public function viewCategory($slug)
    {
        $products = Category::where('slug', $slug)
            ->select('categories.title', 'products.id', 'products.name', 'products.price')
            ->join('products', 'categories.id', '=', 'products.category_id')
            ->get();

        $category = Category::where('slug', $slug)->first();

        $categories = Category::where('parent_id', 1)->get();

        return view('client.category', compact('products', 'categories', 'category'));
    }
}
