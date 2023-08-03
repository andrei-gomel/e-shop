<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    public function index()
    {
        //$orders = Order::all();

        $orders = Order::where('orders.status', '<', 3)
            ->select('orders.id', 'orders.user_id', 'orders.address', 'orders.delivery', 'orders.comment', 'orders.status', 'orders.total_price', 'orders.created_at', 'users.phone as users_phone', 'users.name as users_name')
            ->join('users', 'users.id', '=', 'orders.user_id')
            ->whereNull('orders.deleted_at')
            ->orderBy('id', 'desc')
            ->get();

        return view('admin.orders', compact('orders'));
    }

    public function edit($id)
    {
        //$orderProducts = $order->products;  // вернет все продукты для заказа

        $order = Order::select('orders.id', 'orders.user_id', 'orders.address', 'orders.delivery', 'orders.comment', 'orders.status', 'order_product.count', 'orders.total_price', 'orders.manager_id', 'orders.created_at', 'users.phone as user_phone', 'users.email as user_email', 'users.name as user_name', 'products.name as product_name', 'products.price as product_price')
            ->join('users', 'users.id', '=', 'orders.user_id')
            ->join('order_product', 'orders.id', '=', 'order_product.order_id')
            ->join('products', 'order_product.product_id', '=', 'products.id')
            ->where('orders.id', $id)
            //->where('orders.status', 0)
            ->whereNull('orders.deleted_at')
            ->get();

        // Получаем менеджера, который управляет заказом
        $manager = User::select('name')->find($order[0]->manager_id);

        $order[0]->manager = $manager->name;

        return view('admin.edit-order',  compact('order'));
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

        // Получаем менеджера, который управляет заказом
        $manager = User::select('name')->find($order[0]->manager_id);

        $order[0]->manager = $manager->name;

        return view('admin.order-view',  compact('order'));
    }

    public function update(Request $request, $id)
    {
        $id = intval($id);

        $data = $request->only('address', 'comment', 'delivery', 'status');
        //dd($data);

        $order = Order::whereId($id)->first();

        $data['manager_id'] = Auth::user()->id;

        if(empty($order)) {
            $notification = [
                'message' => 'Запись не найдена',
                'alert-type' => 'warning',
            ];

            return redirect()
                ->route('orders-index')
                ->with($notification);
        }

        $result = $order->update($data);

        if ($result) {
            $notification = [
                'message' => 'Изменения сохранены',
                'alert-type' => 'success',
            ];

            return redirect()
                ->route('orders-index')
                ->with($notification);
        }
        else {
            $notification = [
                'message' => 'Ошибка сохранения',
                'alert-type' => 'warning',
            ];

            return back()
                ->with($notification)
                ->withInput();
        }
    }

    public function filterByOption(Request $request)
    {
        $data = $request->all();
        //dd($data);

        $num_status = $data['status'];

        if ($num_status !== null)
        {
            $orders = Order::where('orders.status', $num_status)
                ->select('orders.id', 'orders.user_id', 'orders.address', 'orders.delivery', 'orders.comment', 'orders.status', 'orders.total_price', 'orders.created_at', 'users.phone as users_phone', 'users.name as users_name')
                ->join('users', 'users.id', '=', 'orders.user_id')
                ->whereNull('orders.deleted_at')
                ->orderBy('id', 'desc')
                ->get();

            return view('admin.orders', compact('orders', 'num_status'));
        }
    }

    public function destroy($id)
    {
        $result = Order::find($id)->delete();

        /* Полное удаление из БД.
        $order = Order::find($id);
        $order->products()->detach();
        $result = $order->forceDelete();*/

        if ($result)
        {
            $notification = [
                'message' => "Заказ №$id успешно удален!",
                'alert-type' => 'success',
            ];

            return redirect()->route('orders-index')
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
