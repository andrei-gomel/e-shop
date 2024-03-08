<!DOCTYPE html>
<html lang="ru">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, minimum-scale=1, user-scalable=no">
   <link rel="icon" href="./img/favicon.png">

   <!-- Фон для сафари -->
   <meta name="msapplication-TileColor" content="#fff">
   <meta name="theme-color" content="#fff">

   <link rel="stylesheet" href="//code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css">

   <!-- Bootstrap -->
   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

   <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.css"/>

   <!-- Custom -->
   <link rel="stylesheet" href="{{ asset('css/main.css') }}">

    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.0.3/jquery.min.js"></script>

    <script src="/js/jquery.maskedinput.js"></script>

   <title>E-shop | Регистрация</title>

    <style>
        a {
            text-decoration: none;
        }
        a:hover {
            text-decoration: underline;
        }
    </style>

</head>
<body>

<?php
$country = [
    '1' => 'Беларусь',
    '2' => 'Россия',
];
?>

   <div class="wrapper">
      <main class="main">
         <section class="sign">
            <div class="_container">
               <div class="sign-body">
                  <h1 class="sign-title">Добро пожаловать на E-shop!</h1>
                  <p class="sign-desc">Введите Ваши данные для регистрации</p>
                   @if ($errors->any())
                       <div class="alert alert-danger">
                           <ul>
                               @foreach ($errors->all() as $error)
                                   <li>{{ $error }}</li>
                               @endforeach
                           </ul>
                       </div>
                   @endif
                  <form action="{{ route('client-register') }}" method="POST" class="sign-form needs-validation" novalidate>
                      @csrf
                      <div class="swiper">
                        <div class="swiper-wrapper">
                           <div class="swiper-slide">
                              <div class="sign-form-step">

                                  <div class="sign-form-group">
                                      <input type="text" class="form-control" name="name" placeholder="Имя" value="{{ old("name") }}" required/>
                                  </div>

                                 <div class="sign-form-group">
                                    <select name="country_id" class="form-control form-select" id="country_id" value="{{ old("country_id") }}" required/>
                                       {{-- @if(old("country_id"))
                                            <option value="{{ old("country_id") }}">{{ old("value") }}</option>
                                        @else
                                            <option value="">Страна</option>
                                        @endif

                                       @foreach($country as $key => $value)
                                           <option value="{{ $key }}">{{ $value }}</option>
                                       @endforeach --}}

                                     <option value="">Страна</option>
                                     <option value="1">Беларусь</option>
                                     <option value="2">Россия</option>

                                    </select>
                                 </div>

                                 <div class="sign-form-group">
                                     <input type="text" class="form-control" name="city" placeholder="Город" value="{{ old("city") }}" required/>
                                 </div>

                                 <div class="sign-form-group">
                                     <input type="email" class="form-control" name="email" placeholder="Email" value="{{ old("email") }}" required/>
                                 </div>

                                 <div class="sign-form-group">
                                     <input type="text" id="phone" class="form-control" name="phone" placeholder="Телефон" value="{{ old("phone") }}" required/>
                                 </div>

                                  <div class="sign-form-group">
                                      <input type="password" class="form-control" name="password" id="password" placeholder="Пароль" required/>
                                  </div>

                                  <div class="sign-form-group">
                                      <input type="password" class="form-control" name="password_confirmation" placeholder="Повтор пароля" required/>
                                  </div>

                                  <div class="sign-form-group">
                                      <button class="btn btn__black" type="submit">Зарегистрироваться</button>
                                  </div>

                                  <input type="hidden" name="role" value="2">

                              </div><br>
                               <p style="font-size: 18px;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                Уже зарегистрирован? <a href="/client/login">Войти</a>
                               </p>

                           </div>

                        </div>
                      </div>
                  </form>
               </div>
            </div>
         </section>
         <!-- Sign -->
      </main>
      <!-- Main -->
   </div>

   <script>
       $("#date").mask("99.99.9999"); //дата рождения
       $.mask.definitions['h'] = "[2|3|4]"
       $.mask.definitions['t'] = "[3|5|4|9]"
       $("#phone").mask("+375(ht)-999-99-99"); //номер телефона
       $("#art").mask("goods-99990"); //index
   </script>

   <!-- JQuery -->
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

   <script src="https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.js"></script>

   <!-- Bootstrap -->
   <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
   </script>

   <!-- Custom -->
   <script src="{{ asset('js/consult.js') }}"></script>

</body>
</html>
