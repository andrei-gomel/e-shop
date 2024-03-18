<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Главная</title>

    <style>
        del {
	        text-decoration: line-through;
	        text-decoration-color: red;
        }
    </style>

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
                            <li>
                                <a href="{{ route('showcart') }}">
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
                                    <a href="{{ route('category-view', $item->slug) }}"
                                        @if($item->id == $product->category_id)
                                            class="active"
                                        @endif
                                        >{{ $item->title }}</a></h4>
                                </div>
                            </div>
                        @endforeach
                    </div><!--/category-products-->
                </div>
            </div>

            <div class="col-sm-9 padding-right">
                <div class="product-details"><!--product-details-->
                    <div class="row">
                        <div class="col-sm-5">
                            <div class="view-product">
                            <!-- <img src="<? echo Instruments::getImage($product['id'])?>" width="100"> -->
                            <img src="/img/default/home/product1.jpg" width="100">
                            </div>
                            {{--<? if ($product['is_new'] == 1):
                            echo '<img src="/template/images/home/new.jpg" class="new" alt="">';
                            endif; ?>--}}
                        </div>
                    <div class="col-sm-7">
                <div class="product-information"><!--/product-information-->

                    <h2>{{ $product->name }}</h2>
                    <p><b>Код товара:</b> {{ $product->code }}</p>

                    <span>
                    @if ($product->new_price)
                        <h3><del>{{ $product->price }}р</del></h3>
                        <span>{{ $product->new_price }}р</span>
                        <label>Скидка {{ $product->skidka }}%</label>
                    @else
                        <span>{{ $product->price }}р</span>
                    @endif

                    <br><br>
                    <label>Количество:</label>
                    <input type="text" value="1" /><br><br>

                    <!-- <button type="button" class="btn btn-fefault cart">
                    <i class="fa fa-shopping-cart"></i> В корзину</button> -->

                    <a href="/addtocart/{{ $product->id }}" data-id="{{ $product->id }}" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>В корзину</a>

                    </span>
                    <p><b>Наличие:</b> На складе</p>
                    <p><b>Цвет:</b> {{ $product->color }}</p>
                    <p><b>Производитель:</b> {{ $product->brand }}</p>
                </div><!--/product-information-->
            </div>
        </div>

        <div class="row">
            <div class="col-sm-12">
                <h3>Описание товара</h3>
                <p>{{ $product->description }}</p>
            </div>
        </div>
    </div><!--/product-details-->
</section>

<br>
<br>
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


</script>
</body>
</html>
