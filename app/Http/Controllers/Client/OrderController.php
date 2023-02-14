<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Order;
use App\Models\Product;
use App\Models\User;
use App\Notifications\OrderCreateNotification;
use App\Notifications\UserOrderNotification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Arr;

class OrderController extends Controller
{
    public function index()
    {
        $user_id = Auth::id();

        $orders = Order::whereUser_id($user_id)->get();

        //dd($orders);

        return view('client.orders', compact('orders'));
    }

    public function view($id)
    {
        $order = Order::select('orders.id', 'orders.user_id', 'orders.address', 'orders.delivery', 'orders.comment', 'orders.status', 'order_product.count', 'orders.total_price', 'orders.manager_id', 'orders.created_at', 'users.phone as user_phone', 'users.name as user_name', 'products.name as product_name', 'products.price as product_price', 'products.code as code')
            ->join('users', 'users.id', '=', 'orders.user_id')
            ->join('order_product', 'orders.id', '=', 'order_product.order_id')
            ->join('products', 'order_product.product_id', '=', 'products.id')
            ->where('orders.id', $id)
            ->whereNull('orders.deleted_at')
            ->get();

        //dd($order);

        // Получаем менеджера, который управляет заказом
        $manager = User::select('name')->find($order[0]->manager_id);

        $order[0]->manager = $manager->name;

        return view('client.order-view', compact('order'));
    }


    /**
     * @param Request $request
     * @return \App\Models\Order
     */

    public function store(Request $request)
    {
        $array_product = session('products');

        $data = $request->except('_token');

        $array_data = [];
        //dd($array_product);

        foreach ($array_product as $key => $value)
        {
            $array_data[$key] = ['count' => $value];
        }

        $totalPrice = session('totalPrice');

        $user_id = Auth::id();

        $order = (new Order())->create([
            'user_id' => $user_id,
            'comment' => $data['comment'],
            'address' => $data['address'],
            'total_price' => $totalPrice,
            'delivery' => $data['delivery']
        ]);

        if ($order)
        {
            $result = $order->products()->sync($array_data);

            /*for ($i = 0; $i < $n; $i++)
            {
                $res = $order->products()->attach($keys[$i], ['count' => $values[$i]]);
            }*/
        }

        $categories = Category::where('parent_id', 1)->get();

        if($result)
        {
            $user = Auth::user();

            $user->notify(new UserOrderNotification($order));

            $notification = [
                'message' => 'Ваш заказ успешно оформлен!',
                'alert-type' => 'success',
            ];
            session()->forget('products');
            return view('client.checkout', compact('result', 'order', 'categories', 'notification'));
        }
        else
        {
            $notification = [
                'message' => 'Ошибка оформления заказа',
                'alert-type' => 'warning',
            ];

            return back()->with($notification)
                ->withInput();
        }
    }

    public function destroy($id)
    {
        $result = Order::find($id)->delete();

        // Полное удаление из БД.
        //$result = Order::find($id)->forceDelete();

        if ($result)
        {
            $notification = [
                'message' => "Заказ №$id успешно удален!",
                'alert-type' => 'success',
            ];

            return redirect()->route('client-orders')
                ->with($notification);
        }
        else {
            $notification = [
                'message' => "Ошибка удаления",
                'alert-type' => 'success',
            ];

            return back()->with($notification)
                ->withInput();
        }
    }
}
