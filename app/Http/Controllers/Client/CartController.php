<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    public function addToCart($id)
    {
        //dd($id);

        // Добавляем товар в корзину
        //dd(self::addProduct($id));

        $productInCart = self::addProduct($id);

        //dd($productInCart);
        //dd(session('products'));

        // Возвращаем пользователя на страницу

        //$_SERVER['HTTP_REFERER'];

        return redirect()
            ->route('product', $id);

        //return view('client.product', compact('productInCart'));

    }

    public function addAjax($id)
    {
        // Добавляем товар в корзину
        self::addProduct($id);
        return true;
    }

    public static function addProduct($id)
    {
        $id = intval($id);

        // Пустой массив для товаров в корзине
        $productsInCart = [];

        // Если в корзине уже есть товары (они хранятся в сессии)
        if (session('products') !== null)
        {
            // То заполним ими массив товарами
            $productsInCart = session('products');
        }

        // Если товар есть в корзине, но был добавлен еще раз, увеличим кол-во.
        if (array_key_exists($id, $productsInCart))
        {
            $productsInCart[$id]++;
        }
        else
        {
            // Добавляем новый товар в корзину
            $productsInCart[$id] = 1;
        }

        session(['products' => $productsInCart]);
//dd(session('products'));

        return self::countItems();
    }

    /**
     * Подсчет количества товаров в корзине(в сессии)
     * @return int
     */
    public static function countItems()
    {
        if (session('products') !== null)
        {
            $count = 0;

            foreach (session('products') as $id => $quantity)
            {
                $count = $count + $quantity;
            }

            return $count;
        }
        else{
            return 0;
        }
    }

    public static function getProducts()
    {
        if(session('products') !== null)
        {
            return session('products');
        }

        return false;
    }

    public static function getTotalPrice($products)
    {
        $productsInCart = self::getProducts();

        //dd($productsInCart);

        $productsIds = array_keys($productsInCart);

        $products = Product::find($productsIds);

        if ($productsInCart)
        {
            $total = 0;

            foreach ($products as $item)
            {
                $total += $item['price'] * $productsInCart[$item['id']];
            }
        }

        return $total;
    }

    /**
     *  Очищаем корзину
     */
    public static function clear()
    {
        if (session('products') !== null) {
            Session::forget('products');
        }
    }

    public static function deleteProduct($id)
    {

        $productsInCart = [];
        $productsInCart = self::getProducts();

        //echo '<pre>';
        //print_r($productsInCart);

        //echo 'ID продукта '.$id;
        //
        //echo 'ID продукта '.$productsInCart[$id];
        //die();

        unset($productsInCart[$id]);

        //
        session(['products' => $productsInCart]);
    }

    public function showCart()
    {
        $categories = null;
        $categories = Category::where('parent_id', 1)->get();

        $productsInCart = null;

        $products = null;

        $totalPrice = null;

        // Получение данных о товарах из корзины
        $productsInCart = self::getProducts();

        if ($productsInCart)
        {
            // Получаем полную информацию о товарах для списка
            $productsIds = array_keys($productsInCart);

            $products = Product::find($productsIds);

            //dd($products);

            // Получаем общую стоимость товаров
            $totalPrice = self::getTotalPrice($products);
        }

        return view('client.cart', compact('products', 'totalPrice', 'categories', 'productsInCart'));
    }

    public static function getProductsForCart($productsInCart)
    {
        // Получаем полную информацию о товарах для списка
        $productsIds = array_keys($productsInCart);

        $products = Product::find($productsIds);

        //dd($products);

        // Получаем общую стоимость товаров
        $totalPrice = self::getTotalPrice($products);
    }

    public function checkout(Request $request)
    {
        //dd(Auth::check());
        $data = $request->collect()->except('_token');

        self::updateCart($data);

        $result = null;

        $totalQuantity = self::countItems();

        $productsInCart = self::getProducts();

        $products = [];

        // Получаем полную информацию о товарах для списка
        $productsIds = array_keys($productsInCart);

        $products = Product::find($productsIds);

        //dd($products);

        $totalPrice = self::getTotalPrice($products);

        session(['totalPrice' => $totalPrice]);
        //dd(session('totalPrice'));

        $categories = [];
        $categories = Category::where('parent_id', 1)->get();

        return view('client.checkout', compact('categories', 'result', 'products', 'totalPrice', 'productsInCart', 'totalQuantity'));
    }

    public static function updateCart($data)
    {
        $productsInCart = session('products');

        foreach ($data as $key => $value)
        {
            $keys_paths = explode('_', $key);
            $productsInCart[$keys_paths[1]] = $value;
        }
        session(['products' => $productsInCart]);
    }
}
