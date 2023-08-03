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

   <!-- Custom  -->

<link rel="stylesheet" href="{{ asset('/css/style.css') }}">

   <title>Поддержка | Вау! Список идей</title>
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
         <div class="header-nav__logo"><a href="/client/cabinet"><img src="/img/logo.svg" alt=""></a></div>
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
                 <li class="header-nav__video">
                     <a href="/client/video/{{ Auth::user()->id }}">
                         <svg>
                             <use xlink:href="/img/nav.svg#video"></use>
                         </svg>
                         Видеоконсультант
                     </a>
                 </li>

                 <li class="header-nav__btns">

                     <a href="/client/button/{{ Auth::user()->id }}">
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
                 <li class="header-nav__support active">
                     <a href="/client/ticket/{{ Auth::user()->id }}">
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
                  <h1 class="page-header__title">Поддержка</h1>
                  <div class="page-header__actions">

                     <a href="/client/ticket/create/{{ Auth::user()->id }}" class="btn btn__main">Добавить тикет</a>
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
                              <use xlink:href="/img/sprite.svg#messpc"></use>
                           </svg>
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
                        <td>№ заявки</td>
                        <td>Тема</td>
                        <td>Статус</td>
                        <td>Дата добавления</td>
                        <td>Дата изменения</td>
                        <td>Действие</td>
                     </tr>
                  </thead>
                  <tbody>

@if(count($ticketList) > 0)
    @foreach($ticketList as $item)

                     <tr>
                        <td>{{$item->id}}</td>
                        <td>{{$item->nomer_zayavki}}</td>
                        <td>{{$item->tema}}</td>
                        <td>{{\App\Models\Ticket::$status[$item->status_id]}}</td>
                        <td>{{$item->created_at}}</td>
                        <td>{{$item->updated_at}}</td>
                        <td>
                           <div>
                              <a href="/client/ticket/show/{{$item->id}}">
                                 <svg><use xlink:href="/img/sprite.svg#arrow"></use></svg></a>
                              <a href="#"><svg><use xlink:href="/img/sprite.svg#close"></use></svg></a>
                           </div>
                        </td>
                     </tr>
    @endforeach
@else
   <tr>
      <td></td>
      <td></td>
      <td></td>
      <td></td>
      <td>У Вас нет тикетов</td>
      <td></td>
      <td></td>
   </tr>
@endif

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
