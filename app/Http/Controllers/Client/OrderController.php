<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Order;
use App\Models\Product;
use App\Models\User;
//use App\Notifications\OrderCreateNotification;
use App\Notifications\UserOrderNotification;
use App\Jobs\OrderNotificationJob;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\DB;

class OrderController extends Controller
{
    public function index()
    {
        $user_id = Auth::id();

        if (Auth::user()->role === 2)
            $orders = Order::whereUser_id($user_id)->get();

        if (Auth::user()->role === 1)
            $orders = Order::whereNull('orders.deleted_at')->get();

        return view('client.orders', compact('orders'));
    }

    public function edit($id)
    {
        $id = intval($id);

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
        $this->getManager($order);

        return view('client.edit-order',  compact('order'));
    }

    public function view($id)
    {
        $id = intval($id);

        if (Auth::user()->role === 2)
        {
            $order = Order::select('orders.id', 'orders.user_id', 'orders.address', 'orders.delivery', 'orders.comment', 'orders.status', 'order_product.count', 'orders.total_price', 'orders.manager_id', 'orders.created_at', 'users.phone as user_phone', 'users.name as user_name', 'products.name as product_name', 'products.price as product_price', 'products.code as code')
                ->join('users', 'users.id', '=', 'orders.user_id')
                ->join('order_product', 'orders.id', '=', 'order_product.order_id')
                ->join('products', 'order_product.product_id', '=', 'products.id')
                ->where('orders.id', $id)
                ->whereNull('orders.deleted_at')
                ->get();

            // Получаем менеджера, который управляет заказом
            $this->getManager($order);
        }

        if (Auth::user()->role === 1)
        {
            $order = Order::select('orders.id', 'orders.user_id', 'orders.address', 'orders.delivery', 'orders.comment', 'orders.status', 'order_product.count', 'orders.total_price', 'orders.manager_id', 'orders.created_at', 'users.phone as user_phone', 'users.name as user_name', 'products.name as product_name', 'products.price as product_price', 'products.code as code')
                ->join('users', 'users.id', '=', 'orders.user_id')
                ->join('order_product', 'orders.id', '=', 'order_product.order_id')
                ->join('products', 'order_product.product_id', '=', 'products.id')
                ->where('orders.id', $id)
                ->get();

            // Получаем менеджера, который управляет заказом
            $this->getManager($order);

        }

        return view('client.order-view', compact('order'));
    }

    /**
     * @param Request $request
     * @return \App\Models\Order
     */

    public function store(Request $request)
    {
        if(!$user = Auth::user())
        {
            /**
             *  Здесь надо зарегистрировать пользователя!!!!!
             *
             */

            die('Вы не авторизованы!');
        }

        $array_product = session('products');

        $data = $request->except('_token');

        $array_data = [];

        $result = null;

        $products = Product::select('name')->whereIn('id', array_keys($array_product))->get();

        /*
        $products = DB::table('products')
            ->select('name')
            ->whereIn('id', array_keys($array_product))
            ->get();
*/

        $products_name = $products->pluck('name')->join(', ');

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
        }

        $categories = Category::where('parent_id', 1)->get();

        if($result)
        {
            //$user = Auth::user();

            //$user->notify(new UserOrderNotification($order, $products_name));

            // Отправляем в Jobs(Queue) отправку пользователю емайла о заказе
            dispatch(new OrderNotificationJob($order, $products_name));

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
        $id = intval($id);

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

    public function update(Request $request, $id)
    {
        $id = intval($id);

        $data = $request->only('address', 'comment', 'delivery', 'status');

        $order = Order::whereId($id)->first();

        $data['manager_id'] = Auth::user()->id;

        if(empty($order))
        {
            $notification = [
                'message' => 'Запись не найдена',
                'alert-type' => 'warning',
            ];

            return redirect()
                    ->route('orders-index')
                    ->with($notification);
        }

        $result = $order->update($data);

        if ($result)
        {
            $notification = [
                'message' => 'Изменения сохранены',
                'alert-type' => 'success',
            ];

            return redirect()
                    ->route('client-orders')
                    ->with($notification);
        }
        else
        {
            $notification = [
                'message' => 'Ошибка сохранения',
                'alert-type' => 'warning',
            ];

            return back()
                    ->with($notification)
                    ->withInput();
        }
    }

    public function getManager($order)
    {
        if($order[0]->manager_id === Null)
        {
            $order[0]->manager = 'Anonimus';
        }
        else
        {
            $manager = User::select('name')->find($order[0]->manager_id);
            $order[0]->manager = $manager->name;
        }
    }
}
