<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport"
      content="width=device-width, initial-scale=1, maximum-scale=1, minimum-scale=1, user-scalable=no">

   <link rel="icon" href="Views/img/favicon.png">

   <!-- Фон для сафари -->
   <meta name="msapplication-TileColor" content="#A0D1FB">
   <meta name="theme-color" content="#A0D1FB">

   <!-- Bootstrap -->
   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
      integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

   <!-- Fancybox -->
   <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fancyapps/ui/dist/fancybox.css"/>

   <!-- Custom -->
   <link rel="stylesheet" href="{{ asset('/css/style.css') }}">

   <title>Список идей | Добавление идеи | Вау! Список идей</title>
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
                  <h1 class="page-header__title">Поддержка
                  </h1>
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
                              <use xlink:href="/img/sprite.svg#messpc"></use>
                           </svg>
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
                     <h2 class="add-new__title">
@if(isset($ticket))

                        Просмотр тикета № {{ $ticket->nomer_zayavki }}
@else
                     Ошибка тикета

@endif

</h2>
                     <div class="add-new__actions">
                        <a href="./support.html" class="btn add-new__btn add-new__cancel">Назад</a>
                     </div>
                  </div>
               </div>
            </div>
            <div class="chat">
               <div class="_container">
                  <div class="chat-wrapper">
                     <div class="chat-elem">
                        <div class="chat-body">
   @if (isset($chats))
   <? //$n = count($chats);?>
   @foreach($chats as $item)
   @if(Auth::user()->name != $item->name)
                           <div class="chat-item d-flex flex-column align-items-start">
                              <label class="chat-item__label">от
{{ $item->name }}, ( {{ $item->created_at }} )
                              </label>
                              <p class="chat-item__text">
                                 {{ $item->text }}
                              </p>
                           </div>
   @else
                           <div class="chat-item d-flex flex-column align-items-end">
                              <label class="chat-item__label">от
                                  {{ $item->name }}, ( {{ $item->created_at }} )
                              </label>
                              <p class="chat-item__text">
                                  {{ $item->text }}
                              </p>
                           </div>
@endif
@endforeach
@endif
                        </div>
                        <div class="chat-form">
                           <form action="/client/ticket/addMess" method="POST">
                               @method('POST')
                               @csrf
                           <input type="hidden" name="ticket_id" value="
@if (isset($ticket)) {{ $ticket->id }} @endif ">
                               <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
                           <div class="chat-form__group">
                              <textarea name="text" id="text" class="add-new__form-control chat-form__control form-control textarea" placeholder="Сообщение..."></textarea>
                              <button class="btn btn__main">Отправить</button>
                           </div>
                           </form>
                        </div>
                     </div>

                     <div class="chat-info">
                        <h4 class="chat-info__title">
@if (isset($ticket))
                        Просмотр тикета № {{ $ticket->nomer_zayavki }}
@else     Ошибка тикета
@endif
                  </h4>
                        <div class="table-responsive">
                           <table class="chat-info__table table">
                              <tbody>
                                 <tr>
                                    <td>Тикет
                                    </td>
                                    <td>
                                        @if (isset($ticket))
                                            {{ $ticket->tema }} @endif
                                    </td>
                                 </tr>
                                 <tr>
                                    <td>Описание</td>
                                    <td>@if (isset($ticket))
                                        {{ $ticket->description }} @endif
                                    </td>
                                 </tr>
                                 <tr>
                                    <td>Прикрепленный файл</td>
                                    <td>
                                       <a href="https://placehold.co/600x400" data-fancybox="screen">
                                          <span>
   @if (isset($ticket))
      {{ $ticket->file_name }}
   @endif
                                          </span>
                                          <svg width="8" height="8" viewBox="0 0 8 8" fill="none" xmlns="http://www.w3.org/2000/svg">
                                             <path d="M8 0V7.2H6.76105V2.3L0.876066 8L0 7.15147L6.14462 1.2L0.979312 1.2L0.979312 0H8Z" fill="#9A9898"/>
                                          </svg>
                                       </a>
                                    </td>
                                 </tr>
                                 <tr>
                                    <td>Статус</td>
                                    <td>
                                       <div class="select filter-select">
                                          <button class="btn select__btn filter-select__btn">
                                             <span>

      {{ $status[$ticket->status_id] }}

                                         </span>
                                             <svg><use xlink:href="/img/sprite.svg#drop"></use></svg>
                                          </button>
                                          <ul class="select__list filter-select__list">

@if (isset($statusList))
   @foreach($statusList as $item)
<li class="select__item filter-select__item">
{{ $item }}
</li>
      @endforeach
      @endif

                                          </ul>
                                       </div>
                                    </td>
                                 </tr>
                              </tbody>
                           </table>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
         <!-- Add new single -->

         <div class="add-new__btns">
            <a href="./support.html" class="btn add-new__btn add-new__cancel">Назад</a>
            <button class="btn btn__main add-new__btn add-new__save">Отправить</button>
         </div>

      </div>
      <!-- Content -->

   </div>

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
</body>
</html>
