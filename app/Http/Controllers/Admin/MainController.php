<?php


namespace App\Http\Controllers\Admin;


use App\Http\Controllers\Controller;
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

        $orders = Order::all();
        $countOrders = count($orders);

        $user = Auth::user();

        return view('admin.index', compact('countCategory', 'countOrders', 'countProducts', 'countUsers'));
    }
}
