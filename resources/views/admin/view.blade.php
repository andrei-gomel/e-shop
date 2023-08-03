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

    <!-- Custom -->
    <link rel="stylesheet" href="{{ asset('/css/style.css') }}">

    <title>Главная | Вау! Список идей</title>
</head>

<body>
@cannot('view-protected-part')
    <h4>Тупиковая страница!!!;)</h4>
@endcan
@can('view-protected-part')

<div id="container">
    <nav class="header-nav">
        <div class="header-nav__logo"><a href="/admin"><img src="/img/logo.svg" alt=""></a></div>
        <div class="header-nav__body">

            <ul class="header-nav__menu">
                <li class="header-nav__home active">
                    <a href="/admin">
                        <svg>
                            <use xlink:href="/img/nav.svg#home"></use>
                        </svg>
                        Главная
                    </a>
                </li>
                <li class="header-nav__video">
                    <a href="/admin/video/show/{{ $client->id }}">
                        <svg>
                            <use xlink:href="/img/nav.svg#video"></use>
                        </svg>
                        Видеоконсультант
                    </a>
                </li>

                <li class="header-nav__btns">

                    <a href="/admin/button/{{ $client->id }}">
                        <svg>
                            <use xlink:href="/img/nav.svg#info"></use>
                        </svg>
                        Кнопка связи
                    </a>
                </li>

                <li class="header-nav__list">
                    <a href="./ideas.html">
                        <svg>
                            <use xlink:href="/img/nav.svg#list"></use>
                        </svg>
                        Список идей
                    </a>
                </li>
                <li class="header-nav__setting">
                    <a href="./setting.html">
                        <svg>
                            <use xlink:href="/img/nav.svg#setting"></use>
                        </svg>
                        Настройки
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
                <li class="header-nav__support">
                    <a href="/admin/ticket/view/{{ $client->id }}">
                        <svg>
                            <use xlink:href="/img/nav.svg#faq"></use>
                        </svg>
                        Поддержка
                    </a>
                </li>
                <li class="header-nav__referal">
                    <a href="./referals.html">
                        <svg>
                            <use xlink:href="/img/nav.svg#referal"></use>
                        </svg>
                        Реферальная система
                    </a>
                </li>
                <li class="header-nav__docs">
                    <a href="./docs.html">
                        <svg>
                            <use xlink:href="/img/nav.svg#docs"></use>
                        </svg>
                        Документы
                    </a>
                </li>
                <li class="header-nav__tarif">
                    <a href="./tarif.html">
                        <svg>
                            <use xlink:href="/img/nav.svg#tarif"></use>
                        </svg>
                        Тарифы
                    </a>
                </li>
                <li class="header-nav__dir">
                    <a href="./director.html">
                        <svg>
                            <use xlink:href="/img/nav.svg#info"></use>
                        </svg>
                        Руководство
                    </a>
                </li>
            </ul>

            <div class="header-nav__mytarif">
                <span>Тариф Пробный</span>
                <a href="#" class="btn header-nav__mytarif-btn">Продлить тариф</a>
                <p>Ваш пробный период истечет через 7 дней</p>
            </div>
        </div>
    </nav>
    <!-- Navigation -->

    <header class="header" id="header">
        <div class="header__body">
            <div class="bars"><svg><use xlink:href="/img/sprite.svg#bars"></use></svg></div>
            <div class="header__logo"><a href="./"><img src="/img/logo.svg" alt=""></a></div>
            <div class="header__actions">
                <a href="#" class="header__action header__action-search"><svg><use xlink:href="/img/sprite.svg#search-mob"></use></svg></a>
                <a href="#" class="header__action header__action-mess"><svg><use xlink:href="/img/sprite.svg#mess"></use></svg></a>
            </div>
        </div>
    </header>
    <!-- Header -->

    <div id="content">
        <div class="page-header">
            <div class="_container">
                <div class="page-header__body">
                    <h1 class="page-header__title">Главная (
                        {{ Auth::user()->name }} )</h1>

                    <div class="page-header__actions">
                        <div class="page-header__list">
                            <div class="page-header__lang">
                                RU
                                <svg>
                                    <use xlink:href="/img/sprite.svg#drop"></use>
                                </svg>
                                <ul class="page-header__lang-list">
                                    <li><a href="#">eng</a></li>
                                    <li class="active"><a href="#">ru</a></li>
                                </ul>
                            </div>
                            <a href="./search.html" class="page-header__search">
                                <svg>
                                    <use xlink:href="/img/sprite.svg#search"></use>
                                </svg>
                            </a>
                            <a href="./mess.html" class="page-header__mess">
                                <svg>
                                    <use xlink:href="/mg/sprite.svg#messpc"></use>
                                </svg>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Page header -->

        <div class="filter">
            <div class="_container">
                <div class="filter__body">
                    <div class="filter-drops">
                        <div class="select filter-select">
                            <button class="btn select__btn filter-select__btn">
                                <span>Дата начала периода</span>
                                <svg><use xlink:href="/img/sprite.svg#drop"></use></svg>
                            </button>
                            <ul class="select__list filter-select__list">
                                <li class="select__item filter-select__item">Дата начала периода 1</li>
                                <li class="select__item filter-select__item">Дата начала периода 2</li>
                                <li class="select__item filter-select__item">Дата начала периода 3</li>
                            </ul>
                        </div>
                        <div class="select filter-select">
                            <button class="btn select__btn filter-select__btn">
                                <span>Дата конца периода</span>
                                <svg><use xlink:href="/img/sprite.svg#drop"></use></svg>
                            </button>
                            <ul class="select__list filter-select__list">
                                <li class="select__item filter-select__item">Дата конца периода 1</li>
                                <li class="select__item filter-select__item">Дата конца периода 2</li>
                                <li class="select__item filter-select__item">Дата конца периода 3</li>
                            </ul>
                        </div>
                    </div>
                    <div class="filter-act">
                        <div class="filter-actions">
                            <button class="btn filter-reset"><svg><use xlink:href="/img/sprite.svg#close"></use></svg>Сбросить</button>
                            <button class="btn btn__main filter-submit"><svg><use xlink:href="/img/sprite.svg#check"></use></svg>Применить</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Filter -->

        <div class="statistic">
            <div class="_container">
                <div class="row">
                    <div class="col-lg-4 col-md-4 col-sm-6">
                        <div class="tile tile-primary">
                            <div class="tile-heading">Общее количество категорий</div>
                            <div class="tile-body">
                                <div class="percent _up">+12%</div>
                                <h2 class="pull-right">145</h2>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-6">
                        <div class="tile tile-primary">
                            <div class="tile-heading">Общее количество идей</div>
                            <div class="tile-body">
                                <div class="percent _up">+25%</div>
                                <h2 class="pull-right">997</h2>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-6">
                        <div class="tile tile-primary">
                            <div class="tile-heading">Общее количество лайков</div>
                            <div class="tile-body">
                                <div class="percent _up">+25%</div>
                                <h2 class="pull-right">10470</h2>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-6">
                        <div class="tile tile-primary">
                            <div class="tile-heading">Общее количество видео </div>
                            <div class="tile-body">
                                <div class="percent _down">-12%</div>
                                <h2 class="pull-right">100</h2>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-6">
                        <div class="tile tile-primary">
                            <div class="tile-heading">Выбранный тариф</div>
                            <div class="tile-body">
                                <div class="percent">до 10.10.2022</div>
                                <h2 class="pull-right _small">Видеоконсультант</h2>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Statistic -->

        <div class="page-table">
            <div class="table-responsive">
                <table class="table with-btn">
                    <thead>
                    <tr>
                        <td>Домен</td>
                        <td>Количество видео</td>
                        <td>
                            <button class="btn btn__main">Добавить домен</button>
                        </td>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td>https://www.google.com/</td>
                        <td>3</td>
                        <td></td>
                    </tr>
                    <tr>
                        <td>https://www.google.com/</td>
                        <td>29</td>
                        <td></td>
                    </tr>
                    <tr>
                        <td>https://www.google.com/</td>
                        <td>121</td>
                        <td></td>
                    </tr>
                    <tr>
                        <td>https://www.google.com/</td>
                        <td>409</td>
                        <td></td>
                    </tr>
                    </tbody>
                </table>
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
@endcan
</body>

</html>
