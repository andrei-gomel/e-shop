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
   <link rel="stylesheet" href="{{ asset('/css/style.css') }}">

   <title>Настройки | Данные организации | Вау! Список идей</title>
</head>

<body>
@can('view-protected-part')
   <div id="container">

      <nav class="header-nav">
         <div class="header-nav__logo"><a href="/"><img src="/img/logo.svg" alt=""></a></div>
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
                  <a href="/admin/video/show/{{ $id }}">
                     <svg>
                        <use xlink:href="/img/nav.svg#video"></use>
                     </svg>
                     Видеоконсультант
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
                  <a href="/admin/ticket">
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
                  <h1 class="page-header__title">Настройки</h1>
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
                  <ul class="page-header__nav">
                     <li class="page-header__nav-item"><a href="./setting.html">Список идей</a></li>
                     <li class="page-header__nav-item"><a href="./setting-video.html">Видеоконсультант</a></li>
                     <li class="page-header__nav-item active"><a href="./setting-data.html">Данные организации</a></li>
                  </ul>
               </div>
            </div>
         </div>
         <!-- Page header -->

         <div class="add-new">
            <div class="add-new__header">
               <div class="_container">
                  <div class="add-new__header-body">
                     <div class="add-new__header-l">
                        <h2 class="add-new__title">Данные организации</h2>

                        {{--<div class="add-new__header-tab__nav nav">
                           <button class="btn add-new__header-btn
                        @if ($client->type == 1)
                           active
                        @endif " id="ur-tab" data-bs-toggle="tab" data-bs-target="#ur" type="button" role="tab" aria-controls="ur">Юридическое лицо</button>
                           <button class="btn add-new__header-btn
                        @if ($client->type == 0)
                           active
                        @endif " id="phys-tab" data-bs-toggle="tab" data-bs-target="#phys" type="button" role="tab" aria-controls="phys">Физическое лицо</button>
                        </div>--}}
                     </div>
                     <div class="add-new__actions">

                        <button class="btn btn__main add-new__btn add-new__save" form="add_client">Сохранить</button>

                        <!-- <a href="#" class="btn btn__main add-new__btn add-new__save">Сохранить</a> -->
                     </div>
                  </div>
               </div>
            </div>
@if(isset($client))
         <!-- BEGIN ADD NEW BODY DIV -->
            <div class="add-new__body">
               <div class="_container">
                  <form action="/admin/client/update" method="POST" enctype="multipart/form-data" id="add_client">
                  @method('POST')
                  @csrf

                      <input type="hidden" name="client_id" value="{{ $id }}">
                      <div class="tab-content">
                     <div class="add-new__form tab-pane fade
                     @if($client->type > 0)
                           show active
                        @endif " id="ur">
                        <h3 class="add-new__form-title">Личные данные</h3>
                        <div class="add-new__form-group">
                           <input type="text" name="name_jur" class="add-new__form-control form-control" placeholder="Название организации" value="@if($client->type > 0) {{ $client->name }} @endif">

                        </div>
                        <div class="add-new__form-group">
                           <input type="text" name="email_jur" class="add-new__form-control form-control" placeholder="Email" value="@if($client->type > 0) {{ $client->email }} @endif">
                        </div>
                        <div class="add-new__form-group">
                           <input type="text" name="phone_jur" class="add-new__form-control form-control" placeholder="Телефон" value="@if($client->type > 0) {{ $client->phone }} @endif">
                        </div>
                        <div class="add-new__form-group">
                            <input type="hidden" name="country_id" value="{{ $client->country_id }}">

                            {{--<input type="text" name="country_jur" class="add-new__form-control form-control" placeholder="Страна" value="@if($client->type == 1) {{ $client->country }} @endif">--}}

                        <!--  Стало -->
                            <div class="select add-new__select">
                                <button class="btn select__btn add-new__select-btn" type="button">
                                    <span>{{ $client->country }}</span>
                                    <svg><use xlink:href="/Views/img/sprite.svg#drop"></use></svg>
                                </button>
                                <ul class="select__list add-new__select-list">
                                    @if(isset($countryList))
                                        @foreach($countryList as $item)
                                            <li class="select__item add-new__select-item" data-value="{{ $item->id }}">{{ $item->name }}</li>
                                    @endforeach
                                @endif
                                <!--<li class="select__item add-new__select-item" data-value="{{ $client->country_id }}">{{ $client->country }}</li>-->
                                </ul>
                                <input type="text" name="country_jur" class="select__input" value="" hidden/>
                            </div>
                            <!--  Стало -->


                        </div>
                        <div class="add-new__form-group">
                           <input type="text" name="city_jur" class="add-new__form-control form-control" placeholder="Город" value="@if($client->type > 0) {{ $client->city }} @endif">
                        </div>
                        <div class="add-new__form-group">
                           <div class="select add-new__select">
                              <button class="btn select__btn add-new__select-btn" type="button">
                                 <span>Валюта</span>
                                 <svg><use xlink:href="/img/sprite.svg#drop"></use></svg>
                              </button>
                              <ul class="select__list add-new__select-list">
                                 <li class="select__item add-new__select-item">Валюта 1</li>
                                 <li class="select__item add-new__select-item">Валюта 2</li>
                              </ul>
                           </div>
                        </div>
                        <h3 class="add-new__form-title">Юридические данные</h3>
                        <div class="add-new__form-group">
                           <input type="text" name="legal_address" class="add-new__form-control form-control" placeholder="Юридический адрес" value="@if($client->type > 0) {{ $client->legal_address }} @endif">
                        </div>
                        <div class="add-new__form-group">
                           <input type="text" name="ynp" class="add-new__form-control form-control" placeholder="УНП" value="@if($client->type > 0) {{ $client->ynp }} @endif">
                        </div>
                        <div class="add-new__form-group">
                           <input type="text" name="iban" class="add-new__form-control form-control" placeholder="IBAN" value="@if($client->type > 0) {{ $client->iban }} @endif">
                        </div>
                        <div class="add-new__form-group">
                           <input type="text" name="bik" class="add-new__form-control form-control" placeholder="БИК банка" value="@if($client->type > 0) {{ $client->bik }} @endif">
                        </div>
                        <div class="add-new__form-group">
                           <input type="text" name="address_bank" class="add-new__form-control form-control" placeholder="Адрес банка" value="@if($client->type > 0) {{ $client->address_bank }} @endif">
                        </div>
                        <div class="add-new__form-group">
                           <input type="text" name="payment_account" class="add-new__form-control form-control" placeholder="Номер расчетного счета" value="@if($client->type > 0) {{ $client->payment_account }} @endif">
                        </div>
                        <h3 class="add-new__form-title">Данные для входа</h3>
                        <div class="add-new__form-group">
                           <input type="password" name="password1_jur" class="add-new__form-control form-control" placeholder="Новый пароль">
                        </div>
                        <div class="add-new__form-group">
                           <input type="password" name="password2_jur" class="add-new__form-control form-control" placeholder="Повторите пароль">
                        </div>
                        <h3 class="add-new__form-title">Логотип</h3>
                        <div class="add-new__form-group">
                           <label class="add-new__drop-zone drop-zone">
                              <input type="file" name="file" id="file" class="drop-zone__input" accept=".png, .jpg, .jpeg" hidden/>
                              <p>Перетащите фото сюда или <span>выберите файл</span></p>
                              <div class="btn btn__drop">Загрузить</div>
                           </label>
                           <div class="drop-zone__thumb">
                              <a class="drop-zone__zoom" data-fancybox="dropfile"><svg><use xlink:href="/img/sprite.svg#arrow"></use></svg></a>
                              <a href="#"><svg><use xlink:href="/img/sprite.svg#close"></use></svg></a>
                           </div>
                        </div>
                     </div>
                     <div class="add-new__form tab-pane fade
                     @if($client->type == 0) show active @endif" id="phys">
                        <h3 class="add-new__form-title">Личные данные</h3>
                        <div class="add-new__form-group">
                           <input type="text" name="name_phiz" class="add-new__form-control form-control" placeholder="Название организации"
                           value="@if($client->type == 0) {{ $client->name }} @endif">
                            <input type="hidden" name="client_id" value="{{ $id }}">
                        </div>
                        <div class="add-new__form-group">
                           <input type="text" name="email_phiz" class="add-new__form-control form-control" placeholder="Email" value="@if($client->type == 0) {{ $client->email }} @endif">
                        </div>
                        <div class="add-new__form-group">
                           <input type="text" name="phone_phiz" class="add-new__form-control form-control" placeholder="Телефон" value="@if($client->type == 0) {{ $client->phone }} @endif">
                        </div>
                        <div class="add-new__form-group">
                           <input type="text" name="country_phiz" class="add-new__form-control form-control" placeholder="Страна" value="@if($client->type == 0) {{ $client->country }} @endif">
                        </div>
                        <div class="add-new__form-group">
                           <input type="text" name="city_phiz" class="add-new__form-control form-control" placeholder="Город" value="@if($client->type == 0) {{ $client->city }} @endif">
                        </div>
                        <div class="add-new__form-group">
                           <div class="select add-new__select">
                              <button class="btn select__btn add-new__select-btn" type="button">
                                 <span>Валюта</span>
                                 <svg><use xlink:href="/img/sprite.svg#drop"></use></svg>
                              </button>
                              <ul class="select__list add-new__select-list">
                                 <li class="select__item add-new__select-item">Валюта 1</li>
                                 <li class="select__item add-new__select-item">Валюта 2</li>
                              </ul>
                           </div>
                        </div>
                        <h3 class="add-new__form-title">Данные для входа</h3>
                        <div class="add-new__form-group">
                           <input type="password" name="password1_phiz" class="add-new__form-control form-control" placeholder="Новый пароль">
                        </div>
                        <div class="add-new__form-group">
                           <input type="password" name="password2_phiz" class="add-new__form-control form-control" placeholder="Повторите пароль">
                        </div>
                        <h3 class="add-new__form-title">Логотип</h3>
                        <div class="add-new__form-group">
                           <label class="add-new__drop-zone drop-zone">
                              <input type="file" name="file" id="file" class="drop-zone__input" accept=".png, .jpg, .jpeg" hidden/>
                              <p>Перетащите фото сюда или <span>выберите файл</span></p>
                              <div class="btn btn__drop">Загрузить</div>
                           </label>
                           <div class="drop-zone__thumb">
                              <a class="drop-zone__zoom" data-fancybox="dropfile"><svg><use xlink:href="/img/sprite.svg#arrow"></use></svg></a>
                              <a href="#"><svg><use xlink:href="/img/sprite.svg#close"></use></svg></a>
                           </div>
                        </div>
                     </div>
                  </div>
               </form>
               </div>
            </div>

      @endif
            <!-- END ADD NEW BODY DIV -->

         </div>
         <!-- Add new single -->

         <div class="add-new__btns">
            <a href="#" class="btn btn__main add-new__btn add-new__save">Сохранить</a>
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
@endcan
</body>

</html>
