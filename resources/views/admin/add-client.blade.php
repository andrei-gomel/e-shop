<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport"
          content="width=device-width, initial-scale=1, maximum-scale=1, minimum-scale=1, user-scalable=no">

    <link rel="icon" href="./img/favicon.png">

    <!-- Фон для сафари -->
    <meta name="msapplication-TileColor" content="#A0D1FB">
    <meta name="theme-color" content="#A0D1FB">

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <!-- Fancybox -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fancyapps/ui/dist/fancybox.css"/>

    <!-- Custom -->
    <style>
        body {
            margin: 0;
            font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, "Helvetica Neue", Arial, "Noto Sans", sans-serif, "Apple Color Emoji", "Segoe UI Emoji", "Segoe UI Symbol", "Noto Color Emoji";
            font-size: 1rem;
            font-weight: 400;
            line-height: 1.5;
            color: #212529;
            text-align: left;
            background-color: #fff;
        }

        *,
        *::before,
        *::after {
            box-sizing: border-box;
        }
    </style>

    <link href="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css" rel="stylesheet">
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.0.3/jquery.min.js"></script>

    <script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>

    <link rel="stylesheet" href="{{ asset('/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('/css/toast.min.css') }}">

    <script src="/js/toast.min.js"></script>
    <script src="/js/jquery.maskedinput.js"></script>

    <title>E-shop | Админка | Добавление нового пользователя</title>
</head>

<body>

@cannot('view-protected-part')
    <h4>Доступ запрещен</h4>
@endcan

@can('view-protected-part')

    <div id="container">

        <nav class="header-nav">
            <div style="margin-top:20px; height: 50px; width: 250px; vertical-align: middle; padding-left: 20px;">
                <div style="float: left; width: 70px;">
                    <a href="/admin">
                        <img src="/img/Letter_E_blue.png" alt="E-shop" width="50" height="50">
                    </a>
                </div>
                <div style="float: left; padding-top: 8px;">
                    <h2 style="color: #5aafff">E-shop</h2>
                    <!-- <a href="/"><img src="img/logo.svg" alt=""></a> -->
                </div>
            </div>
            <div class="header-nav__logo"></div>
            <div class="header-nav__body">

                <ul class="header-nav__menu">
                    <li class="header-nav__home">
                        <a href="/admin">
                            <svg>
                                <use xlink:href="/img/nav.svg#home"></use>
                            </svg>
                            Главная
                        </a>
                    </li>
                    <li class="header-nav__list active">
                        <a href="{{ route('admin-clients') }}">
                            <svg>
                                <use xlink:href="/img/nav.svg#referal"></use>
                            </svg>
                            Клиенты
                        </a>
                    </li>
                    <li class="header-nav__math">
                        <a href="{{ route('product-index') }}">
                            <svg>
                                <use xlink:href="/img/nav.svg#tarif"></use>
                            </svg>
                            Товары
                        </a>
                    </li>
                    <li class="header-nav__support">
                        <a href="{{ route('category-index') }}">
                            <svg>
                                <use xlink:href="/img/nav.svg#docs"></use>
                            </svg>
                            Категории
                        </a>
                    </li>
                    <li class="header-nav__setting">
                        <a href="/admin/orders">
                            <svg>
                                <use xlink:href="/img/nav.svg#setting"></use>
                            </svg>
                            Заказы
                        </a>
                    </li>
                    <li class="header-nav__math">
                        <a href="./math.html">
                            <svg>
                                <use xlink:href="/img/nav.svg#math"></use>
                            </svg>
                            Отчеты
                        </a>
                    </li>
                    <li class="header-nav__setting">
                        <a href="{{ route('client-logout') }}">
                            <img src="/img/icons/exit.svg">
                            Выход
                        </a>
                    </li>
                </ul>
            </div>
        </nav>
        <!-- Navigation -->

        <header class="header" id="header">
            <div class="header__body">
                <div class="bars"><svg><use xlink:href="/img/sprite.svg#bars"></use></svg></div>
                <div class="header__logo"><a href="/"><img src="/img/logo.svg" alt=""></a></div>
                <div class="header__actions">
                    <a href="#" class="header__action header__action-search"><svg><use xlink:href="/img/sprite.svg#search-mob"></use></svg></a>
                    <a href="#" class="header__action header__action-mess"><svg><use xlink:href="/img/sprite.svg#mess"></use></svg></a>
                </div>
            </div>
        </header>
        <!-- Header -->

        <script>
            @if(Session::has('message'))
            var type="{{Session::get('alert-type','info')}}"

            switch(type)
            {
                case 'info':
                    toastr.info("{{ Session::get('message') }}");
                    break;
                case 'success':
                    toastr.success("{{ Session::get('message') }}");
                    break;
                case 'warning':
                    toastr.warning("{{ Session::get('message') }}");
                    break;
                case 'error':
                    toastr.error("{{ Session::get('message') }}");
                    break;
            }
            @endif
        </script>
        <div id="content">
            <div class="page-header">
                <div class="_container">
                    <div class="page-header__body">
                        <h1 class="page-header__title">{{ __('Админка / Клиенты') }}</h1>
                        <div class="page-header__actions">
                            <div class="page-header__list">
                                <!--<div class="page-header__lang">
                                    RU
                                    <svg>
                                        <use xlink:href="/img/sprite.svg#drop"></use>
                                    </svg>
                                    <ul class="page-header__lang-list">
                                        <li><a href="#">eng</a></li>
                                        <li class="active"><a href="#">ru</a></li>
                                    </ul>
                                </div>-->
                                <a href="./search.html" class="page-header__search">
                                    <svg>
                                        <use xlink:href="/img/sprite.svg#search"></use>
                                    </svg>
                                </a>
                                <!--<a href="./mess.html" class="page-header__mess">
                                    <svg>
                                        <use xlink:href="/img/sprite.svg#messpc"></use>
                                    </svg>
                                </a>-->
                                <a href="{{ route('client-logout') }}">
                                    <img src="/img/exit_icon.png" alt="Exit" width="28" height="28">
                                </a>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
            <!-- Page header -->

            <div class="add-new">
                <div class="add-new__header">
                    <div class="_container">
                        <div class="add-new__header-body">
                            @if($user->exists)
                                <h3 class="add-new__title">{{ __('Редактирование данных пользователя') }}</h3>
                            @else
                                <h3 class="add-new__title">{{ __('Добавление нового пользователя') }}</h3>
                            @endif
                            <div class="add-new__actions">
                                <a href="{{ route('admin-clients') }}" class="btn add-new__btn add-new__cancel">Отменить</a>

                                <button class="btn btn__main add-new__btn add-new__save" form="edit-cat">Сохранить</button>

                            </div>
                        </div>
                    </div>
                </div>
                <div class="add-new__body">
                    <div class="_container">
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                     <li>{{ $errors->first() }}</li>
                                </ul>
                            </div>
                        @endif

                        {{--           @if($errors->any())
                                      <div class="row justify-content-center">
                                          <div class="col-md-11">
                                              <div class="alert alert-danger" role="alert">
                                                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                      <span aria-hidden="true">x</span>
                                                  </button>
                                                  {{ $errors->first() }}
                                              </div>
                                          </div>
                                      </div>
                                  @endif--}}

                        @if($user->exists)
                            <form action="{{ route('client-update', $user->id) }}" method="post" id="edit-cat">
                                @method('put')
                                @else
                                    <form action="{{ route('client-save') }}" method="post" id="edit-cat">
                                        @endif
                                        @csrf
                                        <div class="add-new__form">
                                            <div class="add-new__form-group">
                                                {{--<input type="hidden" name="id_user" value="{{ $id }}">--}}
                                                <input type="text" name="name" class="add-new__form-control form-control" placeholder="Имя" value="{{ old('name', $user->name) }}">
                                            </div>

                                            <div class="add-new__form-group">
                                                <div class="select add-new__select">
                                                    <button class="btn select__btn add-new__select-btn" type="button">
                                                        <span>
                                                            @if($user->exists)
                                                                @foreach($countries as $country)
                                                                    @if($country->id == $user->country_id) {{ $country->name }} @endif
                                                                @endforeach
                                                            @else
                                                                Выберите страну
                                                            @endif
                                                        </span>
                                                        <svg><use xlink:href="/Views/img/sprite.svg#drop"></use></svg>
                                                    </button>
                                                    <ul class="select__list add-new__select-list">

                                                        @foreach($countries as $country)
                                                            <li class="select__item add-new__select-item
                                                            @if ($user->country_id == $country->id)
                                                                active
                                                            @endif

                                                            " data-value="{{ $country->id }}">{{ $country->name }}</li>
                                                        @endforeach

                                                    </ul>
                                                    <input type="text" name="country_id" class="select__input" value="
                                                    @if($user->exists)
                                                    @foreach($countries as $country)
                                                    @if($country->id == $user->country_id) {{ $country->id }} @endif
                                                    @endforeach
                                                    @endif " hidden/>
                                                </div>
                                            </div>

                                            <div class="add-new__form-group">
                                                <input type="text" name="city" class="add-new__form-control form-control" placeholder="Город" value="{{ old('city', $user->city) }}">
                                            </div>

                                            <div class="add-new__form-group">
                                                <input type="text" name="email" class="add-new__form-control form-control" placeholder="Email" value="{{ old('email', $user->email) }}">
                                            </div>

                                            <div class="add-new__form-group">
                                                <input type="text" name="phone" id="phone" class="add-new__form-control form-control" placeholder="Телефон" value="{{ old('phone', $user->phone) }}">
                                            </div>

                                            <div class="add-new__form-group">
                                                <div class="select add-new__select">
                                                    <button class="btn select__btn add-new__select-btn" type="button">
                                                        <span>
                                                            @if($user->exists)
                                                                @foreach($roles as $key => $value)
                                                                    @if($key == $user->role) {{ $value }} @endif
                                                                @endforeach
                                                            @else
                                                                Выберите роль
                                                            @endif
                                                        </span>
                                                        <svg><use xlink:href="/Views/img/sprite.svg#drop"></use></svg>
                                                    </button>
                                                    <ul class="select__list add-new__select-list">

                                                        @foreach($roles as $key => $value)
                                                            <li class="select__item add-new__select-item
                                                            @if ($key == $user->role)
                                                                active
                                                            @endif
                                                            " data-value="{{ $key }}">{{ $value }}</li>
                                                        @endforeach

                                                    </ul>
                                                    <input type="text" name="role" class="select__input" value="
                                                    @if($user->exists)
                                                    @foreach($roles as $key => $value)
                                                    @if($key == $user->role) {{ $user->role }} @endif
                                                    @endforeach
                                                    @endif" hidden/>
                                                </div>
                                            </div>

                                            <!-- <div class="add-new__form-group">
                                                <input type="text" name="role" class="add-new__form-control form-control" placeholder="Роль" value="{{ old('role', $user->role) }}">
                                            </div> -->

                                            @if (@isset($permissions))

                                            <div class="add-new__form-group mb-4">
                                                <label for="file-logo">{{ __('Выберите разрешения') }}</label>
                                                <div class="drop-file drop-zone image">

                                                @foreach ($permissions as $permission)

                                                <div class="checkbox">
                                                    <input class="custom-checkbox" type="checkbox" id="{{ $permission->slug }}" name="permission[]" value="{{ $permission->id }}"
                                                    @if (@isset($user_permissions))
                                                        @foreach ($user_permissions as $user_permission)
                                                            @if ($permission->id == $user_permission->id)
                                                                checked
                                                            @endif
                                                        @endforeach
                                                    @endif
                                                    >
                                                    <label for="{{ $permission->slug }}">{{ $permission->name }}</label>
                                                </div>

                                                @endforeach

                                                </div>
                                            </div>
                                            @endif

                                            <div class="add-new__form-group">
                                                <input type="password" name="password" class="add-new__form-control form-control" placeholder="Пароль" value="">
                                            </div>
                                            <div class="add-new__form-group">
                                                <input type="password" name="password_confirmation" class="add-new__form-control form-control" placeholder="Повтор пароля" value="">
                                            </div>

                                            <div class="add-new__form-group mb-4">
                                                <label for="file-logo">{{ __('Аватарка') }}</label>
                                                <div class="drop-file drop-zone image">
                                                    <label class="add-new__drop-zone">
                                                        <input type="file" name="file-logo" id="file-logo" class="drop-zone__input"
                                                               accept=".png, .jpg, .jpeg" hidden />
                                                        <p>Перетащите фото сюда или <span>выберите файл</span></p>
                                                        <div class="btn btn__drop">Загрузить</div>
                                                    </label>
                                                    <div class="drop-zone__thumb">
                                                        <a href="#" class="drop-zone__remove logo-btn"><svg>
                                                                <use xlink:href="/img/sprite.svg#close"></use>
                                                            </svg></a>
                                                    </div>
                                                </div>
                                            </div>

                                            @if($user->exists)
                                                <div class="add-new__form-group">
                                                    <input type="text" name="created_at" class="add-new__form-control form-control" value="{{ $user->created_at }}">
                                                </div>
                                                <div class="add-new__form-group">
                                                    <input type="text" name="updated_at" class="add-new__form-control form-control" value="{{ $user->updated_at }}">
                                                </div>
                                            @endif

                                            <div class="add-new__form-group">
                                                <input type="hidden" name="user_id" class="add-new__form-control form-control" value="{{ Auth::user()->id }}">
                                            </div>

                                            <div class="add-new__form-group">
                                                <input type="hidden" name="status" class="add-new__form-control form-control" value="1">
                                            </div>

                                        </div>

                                    </form>
                    </div>
                </div>
            </div>
            <!-- Add new single -->

            <div class="add-new__btns">
                <a href="/video.html" class="btn add-new__btn add-new__cancel">Отменить</a>
                <a href="./video.html" class="btn btn__main add-new__btn add-new__save">Сохранить</a>
            </div>

        </div>
        <!-- Content -->

    </div>
    <script>
        $("#date").mask("99.99.9999"); //дата рождения
        $.mask.definitions['h'] = "[2|3|4]"
        $.mask.definitions['t'] = "[3|5|4|9]"
        $("#phone").mask("+375(ht)-999-99-99"); //номер телефона
        $("#art").mask("goods-99990"); //index
    </script>
    <!-- JQuery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

    <!-- Bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>

    <!-- Fancybox -->
    <script src="https://cdn.jsdelivr.net/npm/@fancyapps/ui@4.0/dist/fancybox.umd.js"></script>

    <!-- Custom -->
    <script src="/js/main.js"></script>
@endcan
</body>
</html>
