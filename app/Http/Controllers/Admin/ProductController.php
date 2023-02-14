<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProductCreateRequest;
use App\Models\Category;
use App\Models\Product;
use App\Models\User;
use App\Repositories\CategoryRepository;
use App\Repositories\ProductRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    private $categoryRepository;
    private $productRepository;

    public function __construct()
    {

        $this->productRepository = app(ProductRepository::class);
        $this->categoryRepository = app(CategoryRepository::class);

    }

    public function index()
    {
        //$paginator = $this->productRepository->getAllWithPaginate();
        //dd($paginator);

        //$products = Product::all()->paginate(25);
        //$products = Product::all();

        $products = DB::table('products')
            ->select('products.id', 'products.name', 'products.category_id', 'products.brand', 'products.code', 'products.price', 'products.color', 'products.status', 'products.user_id', 'products.created_at', 'categories.title as cat_name', 'users.name as user_name')
            ->join('categories', 'categories.id', '=', 'products.category_id')
            ->join('users', 'users.id', '=', 'products.user_id')
            ->get();

        //dd($products);

        return view('admin.product', compact('products'));
    }

    public function show()
    {
        /*$country = User::find($id)->country;

        $products->category = $country->name;*/
    }

    public function create(CategoryRepository $categoryRepository)
    {
        $product = new Product();

        $categoryList = $this->categoryRepository->getForComboBox();

        //$categories = Category::all();

        return view('admin.add-product', compact('categoryList', 'product'));
        //return view('admin.add-new-btn', compact('categoryList', 'product', 'client_id'));
    }

    public function edit($id, CategoryRepository $categoryRepository)
    {
        $categoryList = $this->categoryRepository->getForComboBox();

        //$product = Product::find($id);
        $product = $this->productRepository->getEdit($id);

        if (empty($product)) {
            $notification = [
                'message' => 'Запись id='.$id.' не найдена',
                'alert-type' => 'warning',
            ];

            return back()->with($notification)
                ->withInput();
        }

        //dd($product);

        // Получаем категорию продукта
        $category = Product::find($id)->category;

        $product->category = $category->title;

        // Получаем юзера, создавшего продукт
        $user = Product::find($id)->user;

        $product->user_name = $user->name;

        //dd($product);

        if (empty($product)) {
            abort(404);
        }

        return view('admin.add-product', compact('product', 'categoryList'));
    }

    public function store(ProductCreateRequest $request)
    {
        $data = $request->input();
        //dd($data);

        $item = (new Product())->create($data);

        if($item) {
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

    public function update(ProductCreateRequest $request, $id)
    {
        $item = $this->productRepository->getEdit($id);

        if (empty($item)) {
            return back()
                ->withErrors(['msg'=>"Запись id=[{$id}] не найдена."])
                ->withInput();
        }

        $data = $request->all();

        $result = $item->update($data);

        if ($result) {
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

    public function destroy()
    {

    }
}
