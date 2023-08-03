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
        //$products = Product::all();

        $products1 = Product::select('name')->whereIn('id', [1,2,4])->get();

        dd($products1->pluck('name')->join(', '));

        $categories = Category::where('parent_id', 1)->get();

        return view('client.home', compact('categories', 'products'));
    }

    public function viewCategory($id)
    {
        $products = Product::where('category_id', $id)->get();

        $category = Category::where('id', $id)->first();

        $categories = Category::where('parent_id', 1)->get();

        return view('client.category', compact('products', 'categories', 'category'));
    }
}
