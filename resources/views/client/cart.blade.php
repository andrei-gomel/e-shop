<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Главная</title>

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

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
    <script src="{{ asset('js/default/jquery.js') }}"></script>
    <script src="{{ asset('js/default/jquery.js') }}"></script>
    <script src="{{ asset('js/default/bootstrap.min.js') }}"></script>
    <script src="{{ asset('js/default/jquery.scrollUp.min.js') }}"></script>
    <script src="{{ asset('js/default/price-range.js') }}"></script>
    <script src="{{ asset('js/default/jquery.prettyPhoto.js') }}"></script>
    <script src="{{ asset('js/default/main.js') }}"></script>

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
                    <h2 class="title text-center">Корзина</h2>

                    @if (isset($products))
                    <h4>Вы добавили следующие товары:</h4>

                    <table class="table-bordered table-striped table" id="cartTable">
                        <form method="post" action="/cart/checkout" id="checkout">
                            @csrf
                        <tr>
                            <th>Код товара</th>
                            <th>Название</th>
                            <th>Цена, р</th>
                            <th>Колич., шт</th>
                            <th>Стоимость, р</th>
                            <th>Удалить</th>
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
                                <input name="productCnt_{{ $product->id }}" id="productCnt_{{ $product->id }}" size="4" type="number" min="1" max="10" data-price="{{ $product->price }}" value="<?=$productsInCart[$product['id']]?>" onchange="conversionPrice(<?=$product['id']?>);">
                            </td>
                            <td class="price">
                                <span id="productRealPrice_{{ $product->id }}" value="{{ $product->price }}">
                                    {{ $product->price }}</span>
                            </td>
                            <td>
                                <a href="/cart/delete/{{ $product->id }}"><img src="/img/default/cart/cancel.png" width=20 height=20 border=0 title="Удалить из корзины" alt="Удалить из корзины"></a>
                            </td>
                        </tr>
                        @endforeach
                        </tbody>
                        <tr>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td><b>Итого:</b></td>
                            <td><b><span id="total">{{ $totalPrice }}</span></b></td>
                            <td></td>
                        </tr>

                        </form>
                    </table>
                        <button form="checkout">
                            <i class="fa fa-shopping-cart"></i> Оформить
                        </button>

                    @else<br><br><br><h3>В Вашей корзине нет товаров</h3>
                    @endif

                </div>
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
                <p class="pull-right">Fashion-shop</p>
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

    function conversionPrice(id){

        let valTotalPrice = 0;

        var newCnt = $('#productCnt_' + id).val();
        var itemPrice = $('#productPrice_' + id).attr('value');

        var productRealPrice = document.getElementById('productRealPrice_' + id);

        var newProductRealPrice = newCnt * itemPrice;

        var sumPrice = $('#valTotalPrice').attr('value');

        $('#productRealPrice_' + id).html(newProductRealPrice);
        var newTotalPrice = sumPrice - productRealPrice;

        valTotalPrice.innerHTML = sumPrice - productRealPrice;

        calc_total();
    }

    function calc_total(){
        var sum = 0;
        $(".price").each(function(){
            sum += parseFloat($(this).text());
        });
        $('#total').text(sum);
    }

</script>
</body>
</html>

