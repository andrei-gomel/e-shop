<?php


namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ClientCreateRequest;
use App\Http\Requests\UserStoreRequest;
use App\Models\Country;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class ClientController extends Controller
{
    /**
     * Отображение списка клиентов
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $clientList = User::where('role', '>', 0)
            ->select('users.id', 'users.name', 'users.country_id', 'users.city', 'users.email', 'users.phone', 'users.created_at', 'users.role', 'users.status', 'country.name as country_name')
            ->join('country', 'country.id', '=', 'users.country_id')
            ->whereNull('deleted_at')
            ->get();

        return view('admin.clients', compact('clientList'));
    }

     /**
     *  Просмотр данных клиента
     * @param $id
     */
    public function view($id)
    {
        $id = intval($id);

        $user = DB::table('users')->where('id', $id)->first();
        //$user = User::find($id);

        if (empty($user)) {
            $notification = [
                'message' => 'Клиент id='.$id.' не найден',
                'alert-type' => 'warning',
            ];

            return back()->with($notification)
                ->withInput();
        }

        // Получение страны юзера
        $country = User::find($id)->country;
        $user->country = $country->name;

        //$countryList = Country::all();
        //$countryList = DB::table('country')->get();

        //dd($user);

        $order = [];

        return view('admin.view-user', compact('user', 'order'));
    }

    public function create()
    {
        $countries = Country::all();

        $user = new User();

        $roles = User::$roles;

        return view('admin.add-client', compact('countries', 'user', 'roles'));
    }

    public function edit($id)
    {
        $id = intval($id);

        $user = User::find($id);

        if ($user === null) {
            $notification = [
                'message' => 'Клиент id='.$id.' не найден',
                'alert-type' => 'warning',
            ];

            return back()->with($notification)
                ->withInput();
        }

        // Получаем страну пользователя
        $country = User::find($id)->country;

        //$user->country = $country->name;

        $roles = User::$roles;

        $countries = Country::all();

        if (empty($user)) {
            abort(404);
        }

        return view('admin.add-client', compact('user', 'countries', 'roles'));
    }

    public function store(ClientCreateRequest $request)
    {
        $data = $request->validated();

        //$data['password'] = Hash::make($data['password']);

        $user = (new User())->create($data);

        if (isset($user)) {
            $notification = [
                'message' => 'Пользователь добавлен',
                'alert-type' => 'success',
            ];

            return redirect()->route('admin-clients')
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

    public function destroy($id)
    {
        $id = intval($id);

        $result = User::destroy($id);

        if ($result)
        {
            $notification = [
                'message' => 'Пользователь ID='.$id.' удален',
                'alert-type' => 'success',
                ];

            return redirect()->route('admin-clients')
                ->with($notification);
        }
        else
        {
            $notification = [
                'message' => 'Ошибка удаления',
                'alert-type' => 'error',
            ];

            return redirect()->route('admin-clients')
                ->with($notification);
        }
    }

    public function update(ClientCreateRequest $request, $id)
    {
        $id = intval($id);

        $user = User::findOrFail($id);

        $data = $request->all();

        if($data['password'] !== null)
        {
            $pass = $data['password'];
            $data['password'] = Hash::make($pass);
        }
        else
        {
            unset($data['password']);
            unset($data['password_confirmation']);
        }

        $result = $user->update($data);

        if ($result)
        {
            $notification = [
                'message' => 'Изменения сохранены',
                'alert-type' => 'success',
            ];

            return redirect()
                ->route('admin-clients')
                ->with($notification);
        }
        else
            {
                $notification = [
                    'message' => 'Ошибка сохранения',
                    'alert-type' => 'error',
                ];

                return back()->with($notification)
                    ->withInput();

                /*return redirect()
                    ->route('client-index')
                    ->with($notification);*/
            }
    }
}
