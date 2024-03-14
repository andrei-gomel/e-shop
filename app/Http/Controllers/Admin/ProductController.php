<?php

namespace App\Http\Controllers\Admin;

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
use Illuminate\Support\Facades\Gate;

class ProductController extends BaseController
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

        //dd($products);

        /*$products = DB::table('products')
            ->select('products.id', 'products.name', 'products.category_id', 'products.brand', 'products.code', 'products.price', 'products.color', 'products.status', 'products.user_id', 'products.created_at', 'categories.title as cat_name', 'users.name as user_name')
            ->join('categories', 'categories.id', '=', 'products.category_id')
            ->join('users', 'users.id', '=', 'products.user_id')
            ->orderBy('price', 'ASC')
            ->get();*/

        //dd($products);

        return view('admin.product', compact('products'));
    }

    /**
     * @param int $id
     * @return string
     */
    public function show(int $id)
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

        return view('admin.add-product', compact('categoryList', 'product'));
    }

    /**
     * @param int $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\RedirectResponse
     */
    public function edit(int $id)
    {
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

        return view('admin.add-product', compact('product', 'categoryList'));
    }

    public function store(ProductCreateRequest $request)
    {
        $data = $request->input();

        $res = (new Product())->create($data);

        if($res)
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

            return redirect()->route('product-index')
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

    /**
     * @param ProductCreateRequest $request
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(ProductCreateRequest $request, int $id)
    {
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
                ->route('product-index')
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

    /**
     * @param int $id
     * @return string
     */
    public function destroy(int $id)
    {
        if (! Gate::allows('view-protected-part'))
        {
            abort(403);
        }

        return 'Удаление товара ID=' . $id;

        //$result = Product::find($id)->delete();

        //return route('product-index');
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

            case '5':
                $products = $defaultQuery
                    ->orderBy('id', 'ASC')
                    ->get();
                break;

            default:
                $products = $defaultQuery->get();
                break;
        }

        return view('admin.product', compact('products'));
    }

    private function storeProductInCache()
    {
        if (\Cache::has('products')) {
            \Cache::forget('products');
        }

        \Cache::rememberForever('products', function () {
            return Product::all();
        });
    }
}
