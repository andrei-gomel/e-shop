<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>E-shop | Оформление заказа</title>

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

    <link rel="stylesheet" href="{{ asset('css/toast.min.css') }}">

    <script src="/js/toast.min.js"></script>

    <link rel="stylesheet" href="{{ asset('css/default/main.css') }}">
    <link rel="stylesheet" href="{{ asset('css/default/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/default/font-awesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/default/prettyPhoto.css') }}">
    <link rel="stylesheet" href="{{ asset('css/default/price-range.css') }}">
    <link rel="stylesheet" href="{{ asset('css/default/animate.css') }}">
    <link rel="stylesheet" href="{{ asset('css/default/responsive.css') }}">

<!--[if lt IE 9]>
    <script src="{{ asset('js/default/html5shiv.js') }}"></script>
    <script src="{{ asset('js/respond.min.js') }}"></script>
    <![endif]-->

    <link rel="shortcut icon" href="img/default/ico/favicon.ico">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="images/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="images/ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="images/ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="images/ico/apple-touch-icon-57-precomposed.png">

    <script src="{{ asset('js/default/jquery.js') }}"></script>
    <script src="{{ asset('js/default/bootstrap.min.js') }}"></script>
    <script src="{{ asset('js/default/jquery.scrollUp.min.js') }}"></script>
    <script src="{{ asset('js/default/price-range.js') }}"></script>
    <script src="{{ asset('js/default/jquery.prettyPhoto.js') }}"></script>
    <script src="{{ asset('js/default/main.js') }}"></script>
    <script src="/js/jquery.maskedinput.js"></script>

</head><!--/head-->

<body>
<?php
$start_time = microtime();

// разделяем секунды и миллисекунды (становятся значениями начальных ключей массива-списка)

$start_array = explode(" ",$start_time);

// это и есть стартовое время

$start_time = $start_array[1] + $start_array[0];
?>

<header id="header"><!--header-->
    <div class="header_top"><!--header_top-->
        <div class="container">
            <div class="row">
                <div class="col-sm-6">
                    <div class="contactinfo">
                        <ul class="nav nav-pills">
                            <li><a href="#"><i class="fa fa-phone fa-lg"></i> +375 29 357 64 78</a></li>
                            <li><a href="/contact/"><i class="fa fa-envelope fa-lg"></i> andr_vol@mail.ru</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="social-icons pull-right">
                        <ul class="nav navbar-nav">
                            <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                            <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div><!--/header_top-->

    <div class="header-middle"><!--header-middle-->
        <div class="container">
            <div class="row">
                <div class="col-sm-4">
                    <div class="logo pull-left">
                        <a href="/"><img src="/img/default/home/logo.png" alt="" /></a>
                    </div>
                </div>
                <div class="col-sm-8">
                    <div class="shop-menu pull-right">
                        <ul class="nav navbar-nav">
                            <li><a href="/cart/">
                                    <i class="fa fa-shopping-cart fa-lg"></i> Корзина (<span id="cart-count">@if(session('products') !== null) {{ count(session('products')) }} @else 0 @endif</span>)</a></li>
                            @if (Auth::check())
                                <li><a href="/client/cabinet/"><i class="fa fa-user fa-lg"></i> Аккаунт</a></li>
                                <li><a href="/client/logout/"><i class="fa fa-unlock fa-lg"></i> Выход</a></li>

                            @else
                                <li><a href="/client/login/"><i class="fa fa-lock fa-lg"></i> Вход</a></li>
                            @endif
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div><!--/header-middle-->

    <div class="header-bottom"><!--header-bottom-->
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                    </div>
                    <div class="mainmenu pull-left">
                        <ul class="nav navbar-nav collapse navbar-collapse">
                            <li><a href="/">Главная</a></li>
                            <li class="dropdown"><a href="#">Магазин<i class="fa fa-angle-down"></i></a>
                                <ul role="menu" class="sub-menu">
                                    <li><a href="/catalog/">Каталог товаров</a></li>
                                    <li><a href="/cart/">Корзина</a></li>
                                </ul>
                            </li>
                            <li><a href="#">Блог</a></li>
                            <li><a href="#">О магазине</a></li>
                            <li><a href="/contact/">Контакты</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div><!--/header-bottom-->

</header><!--/header-->

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

<section>
    <div class="container">
        <div class="row">
            <div class="col-sm-3">
                <div class="left-sidebar">
                    <h2>Каталог</h2>
                    <div class="panel-group category-products" id="accordian"><!--category-productsr-->

                        @foreach($categories as $item)
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h4 class="panel-title">
                                        <a href="{{ route('category-view', $item->id) }}"

                                        >{{ $item->title }}</a></h4>
                                </div>
                            </div>
                        @endforeach

                    </div><!--/category-products-->

                </div>
            </div>

            <div class="col-sm-9 padding-right">
                <div class="features_items"><!--features_items-->
                    <h2 class="title text-center">Оформление заказа</h2>

                    @if ($result !== null)

                    <h4 font color="red">Ваш заказ № {{ $order->id }} оформлен. Наш менеджер Вам перезвонит.</h4>

                    @else

                    <h4>Выбрано товаров: {{ $totalQuantity }}, на сумму: {{ $totalPrice }} р</h4><br>

                        @if (isset($products))

                            <table class="table-bordered table-striped table" id="cartTable">
                                    <tr>
                                        <th>Код товара</th>
                                        <th>Название</th>
                                        <th>Цена, р</th>
                                        <th>Колич., шт</th>
                                        <th>Стоимость, р</th>
                                    </tr>
                                    <tbody>
                                    @foreach ($products as $product)
                                        <tr class="t-row">
                                            <td>{{ $product->code }}</td>
                                            <td>
                                                <a href="/product/{{ $product->id }}">{{ $product->name }}</a>
                                            </td>
                                            <td>
                                <span id="productPrice_{{ $product->id }}" value="{{ $product->price }}">
                                    {{ $product->price }}</span>
                                            </td>
                                            <td class="mat_count">
                                                {{ $productsInCart[$product->id] }}
                                            </td>
                                            <td class="price">
                                <span id="productRealPrice_{{ $product->id }}" value="{{ $productsInCart[$product->id] * $product->price }}">
                                    {{ $productsInCart[$product->id] * $product->price }}</span>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                    <tr>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td><b>Итого:</b></td>
                                        <td id="total"><b>{{ $totalPrice }}р</b></td>
                                    </tr>
                            </table>
                            <br>
                        @endif

                    <div class="col-md-6">
                        @if (isset($errors) && is_array($errors))
                        <ul>
                            @foreach ($errors as $error)
                            <li>- <?=$error ?></li>
                            @endforeach
                        </ul>
                        @endif

                            <p>Для оформления заказа заполните форму. Наш менеджер свяжется с Вами.</p>

                                <div class="login-form">
                                    <form action="/order/save" method="POST">
                                        @csrf

                                        @if(! Auth::check())

                                        <p>Ваше имя:</p>
                                        <input type="text" name="name" placeholder="Ваше имя" value="{{-- old('name', $name) --}}">

                                        <p>Email:</p>
                                        <input type="email" name="email" id="email" placeholder="Email" value="{{-- old('email', $email) --}}">

                                        <p>Номер телефона:</p>
                                        <input type="tel" name="phone" id="phone" placeholder="Номер телефона" value="{{-- old('phone', $phone) --}}">

                                        @endif

                                <p>Адрес доставки:</p>
                                <input type="text" name="address" placeholder="Адрес доставки" value="{{-- old('address', $address) --}}">
                                <br>

                                <p>Тип доставки:</p>
                                <select name="delivery" class="form-select" aria-label="Default select example">
                                    <option selected>Ваш выбор</option>
                                    <option value="1">Самовывоз из нашего пункта</option>
                                    <option value="2">Курьером (с 10:00 до 18:00)</option>
                                    <option value="3">Почтой</option>
                                </select><br><br>
                                <!--
                                <div class="form-check">
                                <input class="form-check-input" name="delivery" type="radio" value="1" checked> Самовывоз из нашего пункта
                                <input class="form-check-input" name="delivery" type="radio" value="2"> Курьером (с 10:00 до 18:00)
                                <input class="form-check-input" name="delivery" type="radio" value="3"> Почтой
                                </div>-->

                                <p>Комментарий к заказу:</p>
                                <input type="text" name="comment" placeholder="Комментарий" value="{{-- old('comment', $comment) --}}">

                                <button type="submit" name="submit" class="btn btn-default add-to-cart">Оформить</button>
                            </form>
                        </div>

                    </div>

                </div>
                @endif
            </div>
        </div>
    </div>
</section>

<br/>
<br/>
<footer id="footer"><!--Footer-->
    <div class="footer-bottom">
        <div class="container">
            <div class="row">
                <p class="pull-left">Copyright © 2022</p>
                <p class="pull-right">Computer-shop</p>
            </div>
        </div>
    </div>
</footer><!--/Footer-->
<?php
$end_time = microtime();

$end_array = explode(" ",$end_time);

$end_time = $end_array[1] + $end_array[0];

// вычитаем из конечного времени начальное

$time = $end_time - $start_time;

// выводим в выходной поток (броузер) время генерации страницы

printf("Страница сгенерирована за %f секунд",$time);
?>

<script>
    $("#date").mask("99.99.9999"); //дата рождения
    $.mask.definitions['h'] = "[2|3|4]"
    $.mask.definitions['t'] = "[3|5|4|9]"
    $("#phone").mask("+375(ht)-999-99-99"); //номер телефона
    $("#art").mask("goods-99990"); //index
</script>
</body>
</html>


