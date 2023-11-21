<?php

namespace App\Http\Controllers\Manager;

use App\Http\Controllers\Admin\BaseController;
use App\Http\Requests\ProductCreateRequest;
use App\Models\Category;
use App\Models\Product;
use App\Models\User;
use App\Repositories\CategoryRepository;
use App\Repositories\ProductRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class ProductController extends \App\Http\Controllers\Admin\BaseController
{
    private $categoryRepository;
    private $productRepository;
    //private $sortOption = ['order by brand', 'order by category', 'order by price ASC'];

    public function __construct()
    {
        $this->productRepository = app(ProductRepository::class);

        $this->categoryRepository = app(CategoryRepository::class);

        parent::__construct();
    }

    public function index()
    {
        //$paginator = $this->productRepository->getAllWithPaginate();
        //dd($paginator);

        //$products = Product::all()->paginate(25);

        $products = Product::select('products.id', 'products.name', 'products.category_id', 'products.brand',
            'products.code', 'products.price', 'products.color', 'products.status', 'products.user_id',
            'products.created_at', 'categories.title as cat_name', 'users.name as user_name')
            ->join('categories', 'categories.id', '=', 'products.category_id')
            ->join('users', 'users.id', '=', 'products.user_id')
            ->orderBy('id', 'desc')
            ->get();

        return view('manager.product', compact('products'));
    }

    public function show($id)
    {
        $product = $this->productRepository->getEdit($id);

        /*$country = User::find($id)->country;

        $products->category = $country->name;*/

        // Получаем категорию продукта
        $category = Product::find($id)->category;

        $product->category = $category->title;

        // Получаем юзера, создавшего продукт
        $user = Product::find($id)->user;

        $product->user_name = $user->name;

        dd($product);

        return 'Просмотр товара ID=' . $id;
    }

    public function create(CategoryRepository $categoryRepository)
    {
        $product = new Product();

        $categoryList = $this->categoryRepository->getForComboBox();

        //$categories = Category::all();

        return view('manager.add-product', compact('categoryList', 'product'));
    }

    public function edit($id)
    {
        $id = intval($id);

        //$product = Product::findOrFail($id);
        $product = $this->productRepository->getEdit($id);

        if ($product == null) {
            $notification = [
                'message' => 'Товар ID='.$id.' не найден',
                'alert-type' => 'warning',
            ];

            return back()->with($notification)
                ->withInput();
        }

        $categoryList = $this->categoryRepository->getForComboBox();

        // Получаем категорию продукта
        $category = Product::find($id)->category;

        $product->category = $category->title;

        // Получаем юзера, создавшего продукт
        $user = Product::find($id)->user;

        $product->user_name = $user->name;

        //$url = Storage::url($product->photo);

        return view('manager.add-product', compact('product', 'categoryList'));
    }

    public function store(ProductCreateRequest $request)
    {
        $data = $request->input();

        $product = (new Product())->create($data);

        if($product)
        {
            if ($request->hasFile('photo'))
            {
                $imageData = $request->file('photo');

                $path = $this->service->storeImage($imageData);

                $data['photo'] = $path;
            }

            $this->storeProductInCache();

            $notification = [
                'message' => 'Товар добавлен',
                'alert-type' => 'success',
            ];

            return redirect()->route('manager-product-index')
                ->with($notification);
        }
        else {
            $notification = [
                'message' => 'Ошибка сохранения',
                'alert-type' => 'warning',
            ];

            return back()->with($notification)
                ->withInput();
        }
    }

    public function update(ProductCreateRequest $request, $id)
    {
        $id = intval($id);

        $product = $this->productRepository->getEdit($id);

        if (empty($product)) {
            return back()
                ->withErrors(['msg'=>"Запись ID={$id} не найдена."])
                ->withInput();
        }

        $data = $request->input();

        $result = $product->update($data);

        if ($result)
        {
            if ($request->hasFile('photo'))
                {
                    $imageData = $request->file('photo');

                    $path = $this->service->storeImage($imageData);

                    $data['photo'] = $path;
                }

            $this->storeProductInCache();

            $notification = [
                'message' => 'Изменения сохранены',
                'alert-type' => 'success',
            ];

            return redirect()
                ->route('manager-product-index')
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

    public function destroy($id)
    {
        return 'Удаление товара ID=' . $id;
    }

    public function filterbyoption(Request $request)
    {
        $defaultQuery = DB::table('products')
        ->select('products.id', 'products.name', 'products.category_id', 'products.brand', 'products.code', 'products.price', 'products.color', 'products.status', 'products.user_id', 'products.created_at', 'categories.title as cat_name', 'users.name as user_name')
        ->join('categories', 'categories.id', '=', 'products.category_id')
        ->join('users', 'users.id', '=', 'products.user_id');

        $value = $request->input('sort_by');

        switch ($value) {
            case '0':
                $products = $defaultQuery
                    ->orderByRaw('brand')
                    ->get();
                break;

            case '1':
                $products = $defaultQuery
                    ->orderBy('cat_name')
                    ->get();
                break;

            case '2':
                $products = $defaultQuery
                    ->orderBy('price', 'ASC')
                    ->get();
                break;

            case '3':
                $products = $defaultQuery
                    ->orderBy('price', 'DESC')
                    ->get();
                break;

            case '4':
                $products = $defaultQuery
                    ->orderBy('id', 'DESC')
                    ->get();
                break;

            case '4':
                $products = $defaultQuery
                    ->orderBy('id', 'ASC')
                    ->get();
                break;

            default:
                $products = $defaultQuery->get();
                break;
        }

        return view('manager.product', compact('products'));
    }

    public function storeProductInCache()
    {
        if (\Cache::has('products')) {
            \Cache::forget('products');
        }

        \Cache::rememberForever('products', function () {
            return Product::all();
        });
    }
}
