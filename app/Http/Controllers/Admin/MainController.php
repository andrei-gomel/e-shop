<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use App\Models\Category;
use App\Models\Order;
use App\Models\Product;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class MainController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        $countCategory = count($categories);

        $products = Product::all();
        $countProducts = count($products);

        $users = User::all();
        $countUsers = count($users);

        $countOrders = count(DB::table('orders')->get());

        $summ = DB::table('orders')->sum('total_price');

        $user = Auth::user();

        return view('admin.index', compact('countCategory', 'countOrders', 'countProducts', 'countUsers', 'summ'));
    }
}
