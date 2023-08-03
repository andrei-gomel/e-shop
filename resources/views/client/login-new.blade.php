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
    <link rel="stylesheet" href="{{ asset('css/main-e.css') }}">

    <title>Авторизация | Видеоконсультант</title>
</head>
<body>

<div class="wrapper">

    <main class="main">

        <section class="sign">
            <div class="_container">
                <div class="sign-body">
                    <h1 class="sign-title">Добро пожаловать!</h1>
                    <p class="sign-desc">Введите Ваши данные для входа</p>
                    <form action="/client/login" method="POST" class="sign-form needs-validation" novalidate>
                        @method('POST')
                        @csrf
                        <div class="swiper">
                            <div class="swiper-wrapper">
                                <div class="swiper-slide">
                                    <div class="sign-form-step">

                                        <div class="sign-form-group"><input type="email" class="form-control" name="email" placeholder="Email" required/></div>

                                        <div class="sign-form-group"><input type="password" class="form-control" name="password" placeholder="Пароль" required/></div>
                                        <div class="sign-form-group"><button class="btn btn__black" id="next-step" type="button">Далее</button></div>
                                    </div>
                                </div>
                                <div class="swiper-slide">
                                    <div class="sign-form-step">

                                        <div class="sign-form-group"><button class="btn btn__black" type="submit">Зарегистрироваться</button></div>
                                    </div>
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

