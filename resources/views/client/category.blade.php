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
    <script src="js/default/html5shiv.js"></script>
    <script src="js/respond.min.js"></script>
    <![endif]-->

    <link rel="shortcut icon" href="img/default/ico/favicon.ico">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="images/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="images/ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="images/ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="images/ico/apple-touch-icon-57-precomposed.png">
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
                            <li><a href="#"><i class="fa fa-phone"></i> +375 29 357 64 78</a></li>
                            <li><a href="#"><i class="fa fa-envelope"></i> andr_vol@mail.ru</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="social-icons pull-right">
                        <ul class="nav navbar-nav">
                            <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                            <li><a href="#"><i class="fa fa-instagram"></i></a></li>
                            <li><a href="#"><i class="fa fa-vk"></i></a></li>
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
                            <li><a href="{{ route('showcart') }}">
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
                                    <li><a href="#">Каталог товаров</a></li>
                                    <li><a href="#">Корзина</a></li>
                                </ul>
                            </li>
                            <li><a href="#">Блог</a></li>
                            <li><a href="#">О магазине</a></li>
                            <li><a href="#">Контакты</a></li>
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
                    <div class="panel-group category-products">
                        @foreach($categories as $item)
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h4 class="panel-title">
                                        <a href="{{ route('category-view', $item->id) }}"
                                           @if($item->title == $category->title)
                                           class="active"
                                            @endif
                                        >{{ $item->title }}</a></h4>
                                </div>
                            </div>
                        @endforeach

                    </div>
                </div>
            </div>

            <div class="col-sm-9 padding-right">
                <div class="features_items"><!--features_items-->
                    <h2 class="title text-center">ТОВАРЫ КАТЕГОРИИ {{ $category->title }}</h2>

                    @foreach($products as $item)
                        <div class="col-sm-4">
                            <div class="product-image-wrapper">
                                <div class="single-products">
                                    <div class="productinfo text-center">

                                        <img src="/img/default/home/product1.jpg" alt="" />
                                        <h2>{{ $item->price }}р</h2>

                                        <a href="/product/{{ $item->id }}">
                                            {{ $item->name }}</a>

                                        <p></p>

                                        <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>В корзину</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach

                </div><!--features_items-->

                <div class="recommended_items"><!--recommended_items-->
                    <h2 class="title text-center">Рекомендуемые товары</h2>

                    <div id="recommended-item-carousel" class="carousel slide" data-ride="carousel">
                        <div class="carousel-inner">
                            <div class="item active">
                                <div class="col-sm-4">
                                    <div class="product-image-wrapper">
                                        <div class="single-products">
                                            <div class="productinfo text-center">
                                                <img src="img/default/home/recommend1.jpg" alt="" />
                                                <h2>$56</h2>
                                                <p>Easy Polo Black Edition</p>
                                                <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>В корзину</a>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="product-image-wrapper">
                                        <div class="single-products">
                                            <div class="productinfo text-center">
                                                <img src="img/default/home/recommend2.jpg" alt="" />
                                                <h2>$56</h2>
                                                <p>Easy Polo Black Edition</p>
                                                <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>В корзину</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="product-image-wrapper">
                                        <div class="single-products">
                                            <div class="productinfo text-center">
                                                <img src="img/default/home/recommend3.jpg" alt="" />
                                                <h2>$56</h2>
                                                <p>Easy Polo Black Edition</p>
                                                <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>В корзину</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="item">
                                <div class="col-sm-4">
                                    <div class="product-image-wrapper">
                                        <div class="single-products">
                                            <div class="productinfo text-center">
                                                <img src="img/default/home/recommend1.jpg" alt="" />
                                                <h2>$56</h2>
                                                <p>Easy Polo Black Edition</p>
                                                <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>В корзину</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="product-image-wrapper">
                                        <div class="single-products">
                                            <div class="productinfo text-center">
                                                <img src="img/default/home/recommend2.jpg" alt="" />
                                                <h2>$56</h2>
                                                <p>Easy Polo Black Edition</p>
                                                <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>В корзину</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="product-image-wrapper">
                                        <div class="single-products">
                                            <div class="productinfo text-center">
                                                <img src="img/default/home/recommend3.jpg" alt="" />
                                                <h2>$56</h2>
                                                <p>Easy Polo Black Edition</p>
                                                <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>В корзину</a>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <a class="left recommended-item-control" href="#recommended-item-carousel" data-slide="prev">
                            <i class="fa fa-angle-left"></i>
                        </a>
                        <a class="right recommended-item-control" href="#recommended-item-carousel" data-slide="next">
                            <i class="fa fa-angle-right"></i>
                        </a>
                    </div>
                </div><!--/recommended_items-->

            </div>
        </div>
    </div>
</section>

<footer id="footer"><!--Footer-->
    <div class="footer-bottom">
        <div class="container">
            <div class="row">
                <p class="pull-left">Copyright © 2023</p>
                <p class="pull-right">E-shop.by</p>
            </div>
        </div>
    </div>
</footer><!--/Footer-->

<script src="js/default/jquery.js"></script>
<script src="js/default/bootstrap.min.js"></script>
<script src="js/default/jquery.scrollUp.min.js"></script>
<script src="js/default/price-range.js"></script>
<script src="js/default/jquery.prettyPhoto.js"></script>
<script src="js/default/main.js"></script>
<?php
$end_time = microtime();

$end_array = explode(" ",$end_time);

$end_time = $end_array[1] + $end_array[0];

// вычитаем из конечного времени начальное
$time = $end_time - $start_time;

// выводим в выходной поток (броузер) время генерации страницы
printf("Страница сгенерирована за %f секунд",$time);
?>
</body>
</html>

