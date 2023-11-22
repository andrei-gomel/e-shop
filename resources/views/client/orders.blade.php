
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport"
          content="width=device-width, initial-scale=1, maximum-scale=1, minimum-scale=1, user-scalable=no">

    <link rel="icon" href="/img/favicon.png">

    <!-- Фон для сафари -->
    <meta name="msapplication-TileColor" content="#A0D1FB">
    <meta name="theme-color" content="#A0D1FB">

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <!-- Custom  -->

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

    <title>E-shop | Кабинет пользователя | Мои заказы</title>
</head>
<body>
@guest()
    <h4>Доступ запрещен</h4>
@endguest
    <div id="container">

        <nav class="header-nav">

            <div style="margin-top:20px; height: 50px; width: 250px; vertical-align: middle; padding-left: 20px;">
                <div style="float: left; width: 70px;">
                    <a href="/">
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
                        <a href="/client/cabinet">
                            <svg>
                                <use xlink:href="/img/nav.svg#home"></use>
                            </svg>
                            Главная
                        </a>
                    </li>
                    <li class="header-nav__setting">
                        <a href="/client/setting">
                            <svg>
                                <use xlink:href="/img/nav.svg#setting"></use>
                            </svg>
                            Мои данные
                        </a>
                    </li>
                    <li class="header-nav__video active">
                        <a href="/client/orders">
                            <svg>
                                <use xlink:href="/img/nav.svg#tarif"></use>
                            </svg>
                            @if(Auth::user()->role === 1)
                                Заказы
                            @elseif(Auth::user()->role === 2)
                                Мои заказы
                            @endif
                        </a>
                    </li>
                    <li class="header-nav__math">
                        <a href="/client/statistic">
                            <svg>
                                <use xlink:href="/img/nav.svg#math"></use>
                            </svg>
                            Статистика
                        </a>
                    </li>
                    <li class="header-nav__support">
                        <a href="/client/support/">
                            <svg>
                                <use xlink:href="/img/nav.svg#faq"></use>
                            </svg>
                            Поддержка
                        </a>
                    </li>
                    <!--<li class="header-nav__referal">
                       <a href="./referals.html">
                          <svg>
                             <use xlink:href="/img/nav.svg#referal"></use>
                          </svg>
                          Реферальная система
                       </a>
                    </li>-->
                    <li class="header-nav__setting">
                    <!--<a href="{{ route('client-logout') }}">-->
                        <a href="/client/logout">
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
                <div class="header__logo"><a href=".."><img src="/img/logo.svg" alt=""></a></div>
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
                        <h1 class="page-header__title">
                            @if(Auth::user()->role === 1)
                                {{ __('Личный кабинет / Заказы') }}
                            @elseif(Auth::user()->role === 2)
                                {{ __('Личный кабинет / Мои заказы') }}
                            @endif
                        </h1>
                        <div class="page-header__actions">

                        <!-- <a href="{{ route('client-create') }}" class="btn btn__main">{{ __('Добавить клиента') }}</a> -->
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
                                <a href="{{ route('client-logout') }}">
                                    <img src="/img/exit_icon.png" alt="" width="28" height="28">
                                </a>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Page header -->

            <div class="page-table mt-3">
                <div class="table-responsive">
                    <table class="table with-action">
                        <thead>
                        <tr>
                            <td>#</td>
                            <td>Дата созд.</td>
                            <td>Адрес дост.</td>
                            <td>Статус</td>
                            <td>Стоимость</td>
                            <td>Доставка</td>
                            <td>Действие</td>
                        </tr>
                        </thead>
                        <tbody>

                        @if(count($orders) > 0)
                            @foreach ($orders as $item)
                                <tr>
                                    <td>{{ $item->id }}</td>
                                    <td>{{ $item->created_at }}</td>
                                    <td>{{ $item->address }}</td>
                                    <td>{{ \App\Models\Order::$status[$item->status] }}</td>
                                    <td>{{ $item->total_price }}</td>

                                    <td>{{ \App\Models\Order::$delivery[$item->delivery] }}</td>
                                    <td>
                                        <div>
                                            <a href="{{ route('client-orders-edit', $item->id) }}">
                                                <svg><use xlink:href="/img/sprite.svg#arrow"></use></svg></a>
                                            <a href="{{ route('client-order-delete', $item->id) }}"><svg><use xlink:href="/img/sprite.svg#close"></use></svg></a>
                                            <a href="{{ route('client-orders-view', $item->id) }}"><svg><use xlink:href="/img/sprite.svg#home"></use></svg></a>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        @endif

                        </tbody>
                    </table>
                    <br>
                </div>

            </div>
            <!-- Page table -->

        </div>
        <!-- Content -->

    </div>

    <!-- JQuery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

    <!-- Bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>

    <!-- Custom -->
    <script src="/js/main.js"></script>

</body>
</html>
