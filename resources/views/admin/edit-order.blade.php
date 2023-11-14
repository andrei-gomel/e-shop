
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

    <title>E-shop | Админка | Редактирование заказа</title>
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
                    <li class="header-nav__list">
                        <a href="{{ route('admin-clients') }}">
                            <svg>
                                <use xlink:href="/img/nav.svg#referal"></use>
                            </svg>
                            Клиенты
                        </a>
                    </li>
                    <li class="header-nav__math active">
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
                        <h1 class="page-header__title">{{ __('Админка / Заказы') }}</h1>
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
                            <h3 class="add-new__title">{{ __('Редактирование заказа №') }} {{ $order[0]->id }}</h3>
                            <div class="add-new__actions">
                                <a href="javascript:history.back()" class="btn add-new__btn add-new__cancel">Отменить</a>

                                <button class="btn btn__main add-new__btn add-new__save" form="edit-cat">Сохранить</button>

                            </div>
                        </div>
                    </div>
                </div>
                <div class="add-new__body">
                    <div class="_container">
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

                                <form action="{{ route('order-update', $order[0]->id) }}" method="post" id="edit-cat">
                                @method('PUT')
                                @csrf
                                        <div class="add-new__form">
                                            <div class="add-new__form-group">
                                                {{--<input type="hidden" name="id_user" value="{{ $id }}">--}}
                                                <input type="text" name="name" class="add-new__form-control form-control" placeholder="Имя" value="{{ old('name', $order[0]->user_name) }}">
                                            </div>

                                            <div class="add-new__form-group">
                                                <input type="text" name="phone" id="phone" class="add-new__form-control form-control" placeholder="Телефон" value="{{ old('phone', $order[0]->user_phone) }}">
                                            </div>

                                            <div class="add-new__form-group">
                                                <input type="text" name="created_at" class="add-new__form-control form-control" placeholder="Дата создания" value="{{ old('created_at', $order[0]->created_at) }}">
                                            </div>

                                            <div class="add-new__form-group">
                                                <input type="text" name="address" class="add-new__form-control form-control" placeholder="Адрес" value="{{ old('email', $order[0]->address) }}">
                                            </div>

                                            <div class="add-new__form-group">
                                                <div class="select add-new__select">
                                                    <button class="btn select__btn add-new__select-btn" type="button">
                                                        <span>

                                                            @foreach(\App\Models\Order::$delivery as $key => $value)
                                                                @if($key == $order[0]->delivery) {{ $value}} @endif
                                                            @endforeach

                                                        </span>
                                                        <svg><use xlink:href="/Views/img/sprite.svg#drop"></use></svg>
                                                    </button>
                                                    <ul class="select__list add-new__select-list">

                                                        @foreach(\App\Models\Order::$delivery as $key => $value)
                                                            <li class="select__item add-new__select-item" data-value="{{ $key }}">{{ $value }}</li>
                                                        @endforeach

                                                    </ul>
                                                    <input type="text" name="delivery" class="select__input" value="

                                                    @foreach(\App\Models\Order::$delivery as $key => $value)
                                                    @if($key == $order[0]->delivery) {{ $key}} @endif
                                                    @endforeach
                                                        " hidden/>
                                                </div>
                                            </div>

                                            <div class="add-new__form-group">
                                                <input type="text" name="comment" class="add-new__form-control form-control" placeholder="Комментарий" value="{{ old('email', $order[0]->comment) }}">
                                            </div>

                                            <div class="add-new__form-group">
                                                <div class="select add-new__select">
                                                    <button class="btn select__btn add-new__select-btn" type="button">
                                                        <span>

                                                            @foreach(\App\Models\Order::$status as $key => $value)
                                                               @if($key == $order[0]->status) {{ $value}} @endif
                                                            @endforeach

                                                        </span>
                                                        <svg><use xlink:href="/Views/img/sprite.svg#drop"></use></svg>
                                                    </button>
                                                    <ul class="select__list add-new__select-list">

                                                        @foreach(\App\Models\Order::$status as $key => $value)
                                                            <li class="select__item add-new__select-item" data-value="{{ $key }}">{{ $value }}</li>
                                                        @endforeach

                                                    </ul>
                                                    <input type="text" name="status" class="select__input" value="

                                                    @foreach(\App\Models\Order::$status as $key => $value)
                                                    @if($key == $order[0]->status) {{ $key}} @endif
                                                    @endforeach
                                                 " hidden/>
                                                </div>
                                            </div>

                                            <div class="add-new__form-group">
                                                <input type="text" name="manager" class="add-new__form-control form-control" placeholder="Менеджер" value="{{ old('email', $order[0]->manager) }}">
                                            </div>

                                            <div class="add-new__form-group">
                                                <input type="hidden" name="user_id" class="add-new__form-control form-control" value="{{ Auth::user()->id }}">
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
