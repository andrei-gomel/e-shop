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

   <title>E-shop | Кабинет пользователя</title>
</head>

<body>
@guest
    <div class="alert alert-danger" role="alert">
        <h3>Доступ запрещен</h3>
    </div>

    <a href="{{ route('client-login') }}">Login</a>
@endguest

   <div id="container">
      <nav class="header-nav">

         <!-- <div class="header-nav__logo"><a href="./"><img src="/img/logo.svg" alt=""></a></div> -->

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
               <li class="header-nav__home active">
                  <a href="/client/cabinet">
                     <svg>
                        <use xlink:href="/img/nav.svg#home"></use>
                     </svg>
                     Главная
                  </a>
               </li>
               @if(Auth::user()->role === 1)
               <li class="header-nav__video">
                  <a href="{{ route('manager-product-index') }}">
                     <svg>
                        <use xlink:href="/img/nav.svg#tarif"></use>
                     </svg>
                         Товары
                  </a>
               </li>
               @endif
               <li class="header-nav__setting">
                  <a href="/client/orders">
                     <svg>
                        <use xlink:href="/img/nav.svg#setting"></use>
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
                  <h1 class="page-header__title">{{ __('Личный кабинет') }} ({{ Auth::user()->name }} , {{ \App\Models\User::$roles[Auth::user()->role] }})</h1>

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
                         <!--<a href="{{ route('client-logout') }}">-->
                         <a href="/client/logout">
                             <img src="/img/exit_icon.png" alt="" width="28" height="28">
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

</body>

</html>
