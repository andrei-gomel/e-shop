<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CategoryCreateRequest;
use App\Http\Requests\CategoryUpdateRequest;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Repositories\CategoryRepository;

/**
 * Управление категориями блога
 * Class CategoryController
 * @package App\Http\Controllers\Admin
 */

class CategoryController extends Controller
{
    /**
     * @var CategoryRepository
     */

    private $categoryRepository;

    public function __construct()
    {
        //parent::__construct();
        $this->categoryRepository = app(CategoryRepository::class);
    }

    public function index()
    {
        //$category = Category::all();
        //dd($category);
        //$paginator = Category::paginate(5);

        $paginator = $this->categoryRepository->getAllWithPaginate(25);
        //dd($paginator);
        return view('admin.category', compact('paginator'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create(CategoryRepository $categoryRepository)
    {
        //$item = new BlogCategory();
        //$categoryList = BlogCategory::all();
        //dd($item);

        $item = new Category();
        $categoryList = $this->categoryRepository->getForComboBox();

        return view('admin.edit-category', compact('item', 'categoryList'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CategoryCreateRequest $request)
    {
        $data = $request->input();

/*
        //  Ушло в обсервер:

        if(empty($data['slug'])) {
            $data['slug'] = Str::slug($data['title']);
        }
*/

        // Создаст объект и добавит в БД
         $item = (new Category())->create($data);

        //$item = new Category($data);

         //$item->save();

         // Второй вариант
         //$item = (new Category())->create($data);

         if($item) {
             $notification = [
                 'message' => 'Категория создана',
                 'alert-type' => 'success',
             ];

             return redirect()->route('category-index')
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
      * Display the specified resource.
      *
      * @param  int  $id
      * @return \Illuminate\Http\Response
      */


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @param CategoryRepository $categoryRepository
     * @return \Illuminate\Http\Response
     */
    public function edit($id, CategoryRepository $categoryRepository)
    {
        $id = intval($id);

        //$item = Category::findOrFail($id);
        //$item = Category::first();
        //dd($item);

        //$categoryList = Category::all();

        $item = $this->categoryRepository->getEdit($id);

        if (empty($item)) {
            $notification = [
                'message' => 'Запись id='.$id.' не найдена',
                'alert-type' => 'warning',
            ];

            return back()->with($notification)
                ->withInput();
        }

        //$item = $categoryRepository->getEdit($id);
        if (empty($item)) {
            abort(404);
        }

        $categoryList = $this->categoryRepository->getForComboBox();
        //$categoryList = $categoryRepository->getForComboBox();

        return view('admin.edit-category', compact('item','categoryList'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  CategoryUpdateRequest $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CategoryUpdateRequest $request, $id)
    {
        $id = intval($id);
        
        $item = $this->categoryRepository->getEdit($id);

        /*$validator = \Validator::make($request->all(), $rules);
        $validateData[] = $validator->passes();
        $validateData[] = $validator->validate();
        $validateData[] = $validator->valid();
        $validateData[] = $validator->failed();
        $validateData[] = $validator->errors();
        $validateData[] = $validator->fails();

        //$validateData = $this->validate($request, $rules);
        //$validateData = $request->validate($rules);
        dd($validateData);*/

        //$item = Category::find($id);

        if(empty($item)) {

            return back()
                ->withErrors(['msg' => 'Запись id=[{$id}] не найдена.'])
                ->withInput();
        }
        $data = $request->all();

        // Ушло в обсервер:

        /*if(empty($data['slug'])) {
            $data['slug'] = Str::slug($data['title']);
        }*/

        $result = $item->fill($data)->save();
        //$result = $item->update($data);

        if ($result) {
            $notification = [
                'message' => 'Изменения сохранены',
                'alert-type' => 'success',
            ];

            return redirect()
                ->route('category-index')
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
}
