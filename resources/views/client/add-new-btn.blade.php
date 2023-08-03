<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport"
      content="width=device-width, initial-scale=1, maximum-scale=1, minimum-scale=1, user-scalable=no">

   <link rel="icon" href="/Views/img/favicon.png">

   <!-- Фон для сафари -->
   <meta name="msapplication-TileColor" content="#A0D1FB">
   <meta name="theme-color" content="#A0D1FB">

   <!-- Bootstrap -->
   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
      integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

   <!-- Fancybox -->
   <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fancyapps/ui/dist/fancybox.css" />

   <!-- Custom -->
   <link rel="stylesheet" href="{{ asset('/css/style.css') }}">

   <title>Кнопка связи | Добавление конпки | Вау! Список идей</title>
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
                  <a href="/client/video/{{ $client_id }}">
                     <svg>
                        <use xlink:href="/img/nav.svg#video"></use>
                     </svg>
                     Видеоконсультант
                  </a>
               </li>
               <li class="header-nav__btns active">
                  <a href="/client/button/{{ $client_id }}">
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
                  <a href="/admin/ticket/{{ $client_id }}">
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
            <div class="bars"><svg>
                  <use xlink:href="/img/sprite.svg#bars"></use>
               </svg></div>
            <div class="header__logo"><a href="/"><img src="/img/logo.svg" alt=""></a></div>
            <div class="header__actions">
               <a href="#" class="header__action header__action-search"><svg>
                     <use xlink:href="/img/sprite.svg#search-mob"></use>
                  </svg></a>
               <a href="#" class="header__action header__action-mess"><svg>
                     <use xlink:href="/img/sprite.svg#mess"></use>
                  </svg></a>
            </div>
         </div>
      </header>
      <!-- Header -->

      <div id="content">
         <div class="page-header">
            <div class="_container">
               <div class="page-header__body">
                  <h1 class="page-header__title">Кнопка связи</h1>
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
                     <h2 class="add-new__title">Добавление кнопки связи</h2>
                     <div class="add-new__actions">
                        <a href="/btns.html" class="btn add-new__btn add-new__cancel">Отменить</a>

                        <button class="btn btn__main add-new__btn add-new__save" form="add_btn">Создать</button>

                     <!-- <a href="/button/save" class="btn btn__main add-new__btn add-new__save">Создать</a> -->

                     </div>
                  </div>
               </div>
            </div>
            <div class="add-new__body">
               <div class="_container">

               <form action="{{ route('client-button-save') }}" method="post" enctype="multipart/form-data" id="add_btn">
                   @method('POST')
                   @csrf
                   <input type="hidden" name="client_id" value="{{ $client_id }}">

                  <div class="add-new__row-chat">
                     <div class="add-new__form">
                        <div class="add-new__form-group">
                           <input type="text" name="link" class="add-new__form-control form-control" placeholder="Ссылка на домен, на котором будет работать кнопка">
                        </div>
                        <h3 class="add-new__form-title">Выбор мессенджеров</h3>
                        <ul class="add-new__social-list">
                           <li class="social-item" data-label="Viber" data-input="viber">
                              <img src="/img/social/viber.png" alt="">
                              <span class="social-item-remove"><svg><use xlink:href="/img/sprite.svg#close"></use></svg></span>
                           </li>
                           <li class="social-item" data-label="WhatsApp" data-input="whatsapp">
                              <img src="/img/social/whatsapp.png" alt="">
                              <span class="social-item-remove"><svg><use xlink:href="/img/sprite.svg#close"></use></svg></span>
                           </li>
                           <li class="social-item" data-label="Telegram" data-input="tg">
                              <img src="/img/social/tg.png" alt="">
                              <span class="social-item-remove"><svg><use xlink:href="/img/sprite.svg#close"></use></svg></span>
                           </li>
                           <li class="social-item" data-label="Apple messenger" data-input="applemsg">
                              <img src="/img/social/applemsg.png" alt="">
                              <span class="social-item-remove"><svg><use xlink:href="/img/sprite.svg#close"></use></svg></span>
                           </li>
                           <li class="social-item" data-label="Sms" data-input="sms">
                              <img src="/img/social/sms.png" alt="">
                              <span class="social-item-remove"><svg><use xlink:href="/img/sprite.svg#close"></use></svg></span>
                           </li>
                           <li class="social-item" data-label="Messenger" data-input="messenger">
                              <img src="/img/social/messenger.png" alt="">
                              <span class="social-item-remove"><svg><use xlink:href="/img/sprite.svg#close"></use></svg></span>
                           </li>
                           <li class="social-item" data-label="Skype" data-input="skype">
                              <img src="/img/social/skype.png" alt="">
                              <span class="social-item-remove"><svg><use xlink:href="/img/sprite.svg#close"></use></svg></span>
                           </li>
                           <li class="social-item" data-label="Vk" data-input="vk">
                              <img src="/img/social/vk.png" alt="">
                              <span class="social-item-remove"><svg><use xlink:href="/img/sprite.svg#close"></use></svg></span>
                           </li>
                           <li class="social-item" data-label="Facebook" data-input="fb">
                              <img src="/img/social/fb.png" alt="">
                              <span class="social-item-remove"><svg><use xlink:href="/img/sprite.svg#close"></use></svg></span>
                           </li>
                           <li class="social-item" data-label="Instagram" data-input="instagram">
                              <img src="/img/social/instagram.png" alt="">
                              <span class="social-item-remove"><svg><use xlink:href="/img/sprite.svg#close"></use></svg></span>
                           </li>
                           <li class="social-item" data-label="Slack" data-input="slack">
                              <img src="/img/social/slack.png" alt="">
                              <span class="social-item-remove"><svg><use xlink:href="/img/sprite.svg#close"></use></svg></span>
                           </li>
                           <li class="social-item" data-label="Mail" data-input="mail">
                              <img src="/img/social/mail.png" alt="">
                              <span class="social-item-remove"><svg><use xlink:href="/img/sprite.svg#close"></use></svg></span>
                           </li>
                           <li class="social-item" data-label="Twitter" data-input="twitter">
                              <img src="/img/social/twitter.png" alt="">
                              <span class="social-item-remove"><svg><use xlink:href="/img/sprite.svg#close"></use></svg></span>
                           </li>
                           <li class="social-item" data-label="TikTok" data-input="tiktok">
                              <img src="/img/social/tiktok.png" alt="">
                              <span class="social-item-remove"><svg><use xlink:href="/img/sprite.svg#close"></use></svg></span>
                           </li>
                           <li class="social-item" data-label="Phone" data-input="phone">
                              <img src="/img/social/phone.png" alt="">
                              <span class="social-item-remove"><svg><use xlink:href="/img/sprite.svg#close"></use></svg></span>
                           </li>
                           <li class="social-item" data-label="LinkedIn" data-input="linkedin">
                              <img src="/img/social/linkedin.png" alt="">
                              <span class="social-item-remove"><svg><use xlink:href="/img/sprite.svg#close"></use></svg></span>
                           </li>
                           <li class="social-item" data-label="Line" data-input="line">
                              <img src="/img/social/line.png" alt="">
                              <span class="social-item-remove"><svg><use xlink:href="/img/sprite.svg#close"></use></svg></span>
                           </li>
                        </ul>
                        <ul class="add-new__social-active">
                           <li class="social-active" style="display: none;" data-mess="viber">
                              <label for="viber">
                                 <figure><img src="/img/social/viber.png" alt=""></figure>
                                 <span>Viber</span>
                              </label>
                              <div class="social-active-group">
                                 <input type="text" class="add-new__form-control form-control" id="viber" name="viber"
                                    placeholder="Номер телефона">
                                 <button type="button" class="btn social-active-remove" data-input="viber"><svg><use xlink:href="/img/sprite.svg#close"></use></svg></button>
                              </div>
                           </li>
                           <li class="social-active" style="display: none;" data-mess="whatsapp">
                              <label for="whatsapp">
                                 <figure><img src="/img/social/whatsapp.png" alt=""></figure>
                                 <span>WhatsApp</span>
                              </label>
                              <div class="social-active-group">
                                 <input type="text" name="whatsapp" class="add-new__form-control form-control" id="whatsapp"
                                    placeholder="Номер телефона">
                                 <button type="button" class="btn social-active-remove" data-input="whatsapp"><svg>
                                       <use xlink:href="/img/sprite.svg#close"></use>
                                    </svg></button>
                              </div>
                           </li>
                           <li class="social-active" style="display: none;" data-mess="tg">
                              <label for="tg">
                                 <figure><img src="/img/social/tg.png" alt=""></figure>
                                 <span>Telegram</span>
                              </label>
                              <div class="social-active-group">
                                 <input type="text" class="add-new__form-control form-control" id="tg" name="tg"
                                    placeholder="Логин">
                                 <button type="button" class="btn social-active-remove" data-input="tg"><svg>
                                       <use xlink:href="/img/sprite.svg#close"></use>
                                    </svg></button>
                              </div>
                           </li>
                           <li class="social-active" style="display: none;" data-mess="applemsg">
                              <label for="applemsg">
                                 <figure><img src="/img/social/applemsg.png" alt=""></figure>
                                 <span>Apple messenger</span>
                              </label>
                              <div class="social-active-group">
                                 <input type="text" class="add-new__form-control form-control" id="applemsg"
                                    name="applemsg" placeholder="ID клиента">
                                 <button type="button" class="btn social-active-remove" data-input="applemsg"><svg>
                                       <use xlink:href="/img/sprite.svg#close"></use>
                                    </svg></button>
                              </div>
                           </li>
                           <li class="social-active" style="display: none;" data-mess="sms">
                              <label for="sms">
                                 <figure><img src="/img/social/sms.png" alt=""></figure>
                                 <span>Sms</span>
                              </label>
                              <div class="social-active-group">
                                 <input type="text" class="add-new__form-control form-control" id="sms"
                                    name="sms" placeholder="Номер телефона">
                                 <button type="button" class="btn social-active-remove" data-input="sms"><svg>
                                       <use xlink:href="/img/sprite.svg#close"></use>
                                    </svg></button>
                              </div>
                           </li>
                           <li class="social-active" style="display: none;" data-mess="messenger">
                              <label for="messenger">
                                 <figure><img src="/img/social/messenger.png" alt=""></figure>
                                 <span>Messenger</span>
                              </label>
                              <div class="social-active-group">
                                 <input type="text" class="add-new__form-control form-control" id="messenger"
                                    name="messenger" placeholder="Username">
                                 <button type="button" class="btn social-active-remove" data-input="messenger"><svg>
                                       <use xlink:href="/img/sprite.svg#close"></use>
                                    </svg></button>
                              </div>
                           </li>
                           <li class="social-active" style="display: none;" data-mess="skype">
                              <label for="skype">
                                 <figure><img src="/img/social/skype.png" alt=""></figure>
                                 <span>Skype</span>
                              </label>
                              <div class="social-active-group">
                                 <input type="text" class="add-new__form-control form-control" id="skype" name="skype"
                                    placeholder="Username">
                                 <button type="button" class="btn social-active-remove" data-input="skype"><svg>
                                       <use xlink:href="/img/sprite.svg#close"></use>
                                    </svg></button>
                              </div>
                           </li>
                           <li class="social-active" style="display: none;" data-mess="vk">
                              <label for="vk">
                                 <figure><img src="/img/social/vk.png" alt=""></figure>
                                 <span>Vk</span>
                              </label>
                              <div class="social-active-group">
                                 <input type="text" class="add-new__form-control form-control" id="vk" name="vk"
                                    placeholder="ID клиента">
                                 <button type="button" class="btn social-active-remove" data-input="vk"><svg>
                                       <use xlink:href="/img/sprite.svg#close"></use>
                                    </svg></button>
                              </div>
                           </li>
                           <li class="social-active" style="display: none;" data-mess="fb">
                              <label for="fb">
                                 <figure><img src="/img/social/fb.png" alt=""></figure>
                                 <span>Facebook</span>
                              </label>
                              <div class="social-active-group">
                                 <input type="text" class="add-new__form-control form-control" id="fb" name="fb"
                                    placeholder="Адрес страницы">
                                 <button type="button" class="btn social-active-remove" data-input="fb"><svg>
                                       <use xlink:href="/img/sprite.svg#close"></use>
                                    </svg></button>
                              </div>
                           </li>
                           <li class="social-active" style="display: none;" data-mess="instagram">
                              <label for="instagram">
                                 <figure><img src="/img/social/instagram.png" alt=""></figure>
                                 <span>Instagram</span>
                              </label>
                              <div class="social-active-group">
                                 <input type="text" class="add-new__form-control form-control" id="instagram"
                                    name="instagram" placeholder="Логин">
                                 <button type="button" class="btn social-active-remove" data-input="instagram"><svg>
                                       <use xlink:href="/img/sprite.svg#close"></use>
                                    </svg></button>
                              </div>
                           </li>
                           <li class="social-active" style="display: none;" data-mess="slack">
                              <label for="slack">
                                 <figure><img src="/img/social/slack.png" alt=""></figure>
                                 <span>Slack</span>
                              </label>
                              <div class="social-active-group">
                                 <input type="text" class="add-new__form-control form-control" id="slack" name="slack"
                                    placeholder="ID клиента">
                                 <button type="button" class="btn social-active-remove" data-input="slack"><svg>
                                       <use xlink:href="/img/sprite.svg#close"></use>
                                    </svg></button>
                              </div>
                           </li>
                           <li class="social-active" style="display: none;" data-mess="mail">
                              <label for="mail">
                                 <figure><img src="/img/social/mail.png" alt=""></figure>
                                 <span>Mail</span>
                              </label>
                              <div class="social-active-group">
                                 <input type="email" class="add-new__form-control form-control" id="mail" name="mail"
                                    placeholder="E-mail">
                                 <button type="button" class="btn social-active-remove" data-input="mail"><svg>
                                       <use xlink:href="/img/sprite.svg#close"></use>
                                    </svg></button>
                              </div>
                           </li>
                           <li class="social-active" style="display: none;" data-mess="twitter">
                              <label for="twitter-text">
                                 <figure><img src="/img/social/twitter.png" alt=""></figure>
                                 <span>Twitter</span>
                              </label>
                              <div class="social-active-group">
                                 <div class="social-active-group-inputs">
                                    <input type="text" class="add-new__form-control form-control" id="twitter-text" name="twitter-text" placeholder="Текст твита">
                                    <input type="text" class="add-new__form-control form-control" id="twitter-adress" name="twitter-adress" placeholder="Адрес страницы">
                                    <input type="text" class="add-new__form-control form-control" id="twitter-name" name="twitter-name" placeholder="Имя пользователя">
                                 </div>
                                 <button type="button" class="btn social-active-remove" data-input="twitter"><svg>
                                       <use xlink:href="/img/sprite.svg#close"></use>
                                    </svg></button>
                              </div>
                           </li>
                           <li class="social-active" style="display: none;" data-mess="tiktok">
                              <label for="tiktok">
                                 <figure><img src="/img/social/tiktok.png" alt=""></figure>
                                 <span>TikTok</span>
                              </label>
                              <div class="social-active-group">
                                 <input type="text" class="add-new__form-control form-control" id="tiktok" name="tiktok"
                                    placeholder="Имя пользователя">
                                 <button type="button" class="btn social-active-remove" data-input="tiktok"><svg>
                                       <use xlink:href="/img/sprite.svg#close"></use>
                                    </svg></button>
                              </div>
                           </li>
                           <li class="social-active" style="display: none;" data-mess="phone">
                              <label for="phone">
                                 <figure><img src="/img/social/phone.png" alt=""></figure>
                                 <span>Phone</span>
                              </label>
                              <div class="social-active-group">
                                 <input type="tel" class="add-new__form-control form-control" id="phone" name="phone"
                                    placeholder="Номер телефона">
                                 <button type="button" class="btn social-active-remove" data-input="phone"><svg>
                                       <use xlink:href="/img/sprite.svg#close"></use>
                                    </svg></button>
                              </div>
                           </li>
                           <li class="social-active" style="display: none;" data-mess="linkedin">
                              <label for="linkedin">
                                 <figure><img src="/img/social/linkedin.png" alt=""></figure>
                                 <span>LinkedIn</span>
                              </label>
                              <div class="social-active-group">
                                 <div class="social-active-group-inputs">
                                    <input type="text" class="add-new__form-control form-control" id="linkedin-url" name="linkedin-url" placeholder="Url">
                                    <input type="text" class="add-new__form-control form-control" id="linkedin-title" name="linkedin-title" placeholder="Title">
                                    <input type="text" class="add-new__form-control form-control" id="linkedin-summary" name="linkedin-summary" placeholder="Summary">
                                 </div>
                                 <button type="button" class="btn social-active-remove" data-input="linkedin"><svg>
                                       <use xlink:href="/img/sprite.svg#close"></use>
                                    </svg></button>
                              </div>
                           </li>
                           <li class="social-active" style="display: none;" data-mess="line">
                              <label for="line">
                                 <figure><img src="/img/social/line.png" alt=""></figure>
                                 <span>Line</span>
                              </label>
                              <div class="social-active-group">
                                 <input type="text" class="add-new__form-control form-control" id="line" name="line"
                                    placeholder="ID пользователя">
                                 <button type="button" class="btn social-active-remove" data-input="line"><svg>
                                       <use xlink:href="/img/sprite.svg#close"></use>
                                    </svg></button>
                              </div>
                           </li>
                        </ul>
                        <h3 class="add-new__form-title mb-4">Настройка визуала виджета</h3>
                        <div class="add-new__form-group mb-4">
                           <label for="file-logo">Логотип</label>
                           <div class="drop-file drop-zone image">
                              <label class="add-new__drop-zone">
                                 <input type="file" name="file-logo" id="file-logo" class="drop-zone__input"
                                    accept=".png, .jpg, .jpeg" hidden />
                                 <p>Перетащите фото сюда или <span>выберите файл</span></p>
                                 <div class="btn btn__drop">Загрузить</div>
                              </label>
                              <div class="drop-zone__thumb">
                                 <a href="#" class="drop-zone__remove logo-btn"><svg>
                                       <use xlink:href="/img/sprite.svg#close"></use>
                                    </svg></a>
                              </div>
                           </div>
                        </div>
                        <div class="add-new__form-group mb-4">
                           <label for="file-icon">Иконка кнопки</label>
                           <div class="drop-file drop-zone image">
                              <label class="add-new__drop-zone">
                                 <input type="file" name="file-icon" id="file-icon" class="drop-zone__input"
                                    accept=".png, .jpg, .jpeg" hidden />
                                 <p>Перетащите фото сюда или <span>выберите файл</span></p>
                                 <div class="btn btn__drop">Загрузить</div>
                              </label>
                              <div class="drop-zone__thumb">
                                 <a href="#" class="drop-zone__remove icon-btn"><svg>
                                       <use xlink:href="/img/sprite.svg#close"></use>
                                    </svg></a>
                              </div>
                           </div>
                        </div>
                        <div class="add-new__form-group mb-4">
                           <label for="text">Текст сообщение</label>
                           <textarea name="text" id="text" class="add-new__form-control form-control textarea"
                              style="min-height: 100px;" placeholder="Текст сообщение"></textarea>
                        </div>
                        <div class="add-new__form-group mb-4">
                           <label>Положение кнопки</label>
                           <div class="select add-new__select">
                              <button class="btn select__btn add-new__select-btn" type="button">
                                 <span>Правый нижний край</span>
                                 <svg>
                                    <use xlink:href="/img/sprite.svg#drop"></use>
                                 </svg>
                              </button>
                              <ul class="select__list add-new__select-list">
                                 <li class="select__item add-new__select-item active" data-value="right-bottom">Правый
                                    нижний край</li>
                                 <li class="select__item add-new__select-item" data-value="left-bottom">Левый нижний
                                    край</li>
                                 <li class="select__item add-new__select-item" data-value="right-top">Правый верхний
                                    край</li>
                                 <li class="select__item add-new__select-item" data-value="left-top">Левый верхний край
                                 </li>
                              </ul>
                              <input type="text" name="place" class="select__input" value="right-bottom" hidden>
                           </div>
                        </div>
                        <div class="add-new__form-group mb-4">
                           <label>Цвет кнопки</label>
                           <div class="select add-new__select select-color">
                              <button class="btn select__btn add-new__select-btn" type="button">
                                 <span>#FBA0C6</span>
                                 <svg>
                                    <use xlink:href="/img/sprite.svg#drop"></use>
                                 </svg>
                              </button>
                              <ul class="select__list add-new__select-list">
                                 <li class="select__item add-new__select-item active" data-value="#FBA0C6">#FBA0C6</li>
                                 <li class="select__item add-new__select-item" data-value="#000000">#000000</li>
                                 <li class="select__item add-new__select-item" data-value="#131313">#131313</li>
                              </ul>
                              <input type="text" name="color" class="select__input" value="#FBA0C6" hidden>
                           </div>
                        </div>
                        <div class="add-new__form-group">
                           <label>Размер кнопки</label>
                           <div class="select add-new__select select-size">
                              <button class="btn select__btn add-new__select-btn" type="button">
                                 <span>Большой</span>
                                 <svg>
                                    <use xlink:href="/img/sprite.svg#drop"></use>
                                 </svg>
                              </button>
                              <ul class="select__list add-new__select-list">
                                 <li class="select__item add-new__select-item active" data-value="big">Большой</li>
                                 <li class="select__item add-new__select-item" data-value="middle">Средний</li>
                                 <li class="select__item add-new__select-item" data-value="small">Маленький</li>
                              </ul>
                              <input type="text" name="size" class="select__input" value="big" hidden>
                           </div>
                        </div>
                        <div class="setting-widget mt-5">
                           <h3 class="setting-widget__title">&lt;/> Установите виджет на ваш сайт</h3>
                           <ul class="setting-widget__list">
                              <li>Для того, что бы виджет начал работать, вам необходимо установить следующий код на
                                 каждую страницу вашего сайта перед закрывающимся тегом &lt;/body></li>
                           </ul>
                           <input type="text" class="form-control setting-widget__control"
                              value="&lt;script='//app..cc/widget.js?&lt;='//app.restoplace.cc/widget.js?&lt;script='//app.restoplace.cc/.js?"
                              readonly>
                           <div class="setting-widget__actions">
                              <button class="btn setting-widget__btn btn__main">Скопировать код</button>
                              <button class="btn setting-widget__btn btn__more">Скопировать код</button>
                              <button class="btn setting-widget__btn btn__trans">Инструкция</button>
                           </div>
                        </div>
                     </div>
                     <div class="add-new__result">
                        <h4 class="add-new__result-title">Превью</h4>
                        <div class="chat-dialog">
                           <div class="chat-dialog-body">
                              <div class="chat-dialog-close"><svg>
                                    <use xlink:href="/img/sprite.svg#close"></use>
                                 </svg></div>
                              <div class="chat-dialog-mess">
                                 <figure><img src="/img/favicon.png" alt=""></figure>
                                 <p>Добрый день! Напишите нам, мы в сети. Выберите канал для связи</p>
                              </div>
                              <ul class="chat-dialog-social"></ul>
                           </div>
                           <div class="chat-dialog-btn">
                              <button class="btn big">
                                 <img src="" alt="">
                              </button>
                           </div>
                        </div>
                     </div>
                  </div>
                  </form>
               </div>
            </div>
         </div>
         <!-- Add new single -->

         <div class="add-new__btns">
            <a href="./btns.html" class="btn add-new__btn add-new__cancel">Отменить</a>
            <a href="./btns.html" class="btn btn__main add-new__btn add-new__save">Сохранить</a>
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
