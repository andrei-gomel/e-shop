
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
    <style>
        body {
            margin: 0;
            font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, "Helvetica Neue", Arial, "Noto Sans", sans-serif, "Apple Color Emoji", "Segoe UI Emoji", "Segoe UI Symbol", "Noto Color Emoji";
            font-size: 1rem;
            font-weight: 400;
            line-height: 1.5;
            color: #212529;
            text-align: left;
            background-color: #fff;
        }

        *,
        *::before,
        *::after {
            box-sizing: border-box;
        }
    </style>

    <link href="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css" rel="stylesheet">
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.0.3/jquery.min.js"></script>

    <script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>


    <link rel="stylesheet" href="{{ asset('/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('/css/toast.min.css') }}">

    <script src="/js/toast.min.js"></script>

    <title>E-shop | Админка | Редактирование категории</title>
</head>

<body>
@cannot('view-protected-part')
    <h4>Доступ запрещен</h4>
@endcan
@can('view-protected-part')
    <div id="container">

        <nav class="header-nav">
            <div style="margin-top:20px; height: 50px; width: 250px; vertical-align: middle; padding-left: 20px;">
                <div style="float: left; width: 70px;">
                    <a href="/admin">
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
                    <li class="header-nav__home">
                        <a href="/admin">
                            <svg>
                                <use xlink:href="/img/nav.svg#home"></use>
                            </svg>
                            Главная
                        </a>
                    </li>
                    <li class="header-nav__list">
                        <a href="{{ route('admin-clients') }}">
                            <svg>
                                <use xlink:href="/img/nav.svg#referal"></use>
                            </svg>
                            Клиенты
                        </a>
                    </li>
                    <li class="header-nav__math active">
                        <a href="{{ route('product-index') }}">
                            <svg>
                                <use xlink:href="/img/nav.svg#tarif"></use>
                            </svg>
                            Товары
                        </a>
                    </li>
                    <li class="header-nav__support">
                        <a href="{{ route('category-index') }}">
                            <svg>
                                <use xlink:href="/img/nav.svg#docs"></use>
                            </svg>
                            Категории
                        </a>
                    </li>
                    <li class="header-nav__setting">
                        <a href="/admin/orders">
                            <svg>
                                <use xlink:href="/img/nav.svg#setting"></use>
                            </svg>
                            Заказы
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
                    <li class="header-nav__setting">
                        <a href="{{ route('client-logout') }}">
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
                <div class="header__logo"><a href="/"><img src="/img/logo.svg" alt=""></a></div>
                <div class="header__actions">
                    <a href="#" class="header__action header__action-search"><svg><use xlink:href="/img/sprite.svg#search-mob"></use></svg></a>
                    <a href="#" class="header__action header__action-mess"><svg><use xlink:href="/img/sprite.svg#mess"></use></svg></a>
                </div>
            </div>
        </header>
        <!-- Header -->

        <script>
                @if(Session::has('message'))
            var type="{{Session::get('alert-type','info')}}"

            switch(type)
            {
                case 'info':
                    toastr.info("{{ Session::get('message') }}");
                    break;
                case 'success':
                    toastr.success("{{ Session::get('message') }}");
                    break;
                case 'warning':
                    toastr.warning("{{ Session::get('message') }}");
                    break;
                case 'error':
                    toastr.error("{{ Session::get('message') }}");
                    break;
            }
            @endif
        </script>
        <div id="content">
            <div class="page-header">
                <div class="_container">
                    <div class="page-header__body">
                        <h1 class="page-header__title">{{ __('Товары') }}</h1>
                        <div class="page-header__actions">
                            <div class="page-header__list">
                                <!--<div class="page-header__lang">
                                    RU
                                    <svg>
                                        <use xlink:href="/img/sprite.svg#drop"></use>
                                    </svg>
                                    <ul class="page-header__lang-list">
                                        <li><a href="#">eng</a></li>
                                        <li class="active"><a href="#">ru</a></li>
                                    </ul>
                                </div>-->
                                <a href="./search.html" class="page-header__search">
                                    <svg>
                                        <use xlink:href="/img/sprite.svg#search"></use>
                                    </svg>
                                </a>
                                <!--<a href="./mess.html" class="page-header__mess">
                                    <svg>
                                        <use xlink:href="/img/sprite.svg#messpc"></use>
                                    </svg>
                                </a>-->
                                <a href="{{ route('client-logout') }}">
                                    <img src="/img/exit_icon.png" alt="Exit" width="28" height="28">
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
                            @if($product->exists)
                                <h3 class="add-new__title">{{ __('Редактирование товара') }}</h3>
                            @else
                                <h3 class="add-new__title">{{ __('Добавление товара') }}</h3>
                            @endif
                            <div class="add-new__actions">
                                <a href="javascript:history.back()" class="btn add-new__btn add-new__cancel">Отменить</a>

                                <button class="btn btn__main add-new__btn add-new__save" form="edit-cat">Сохранить</button>

                            </div>
                        </div>
                    </div>
                </div>
                <div class="add-new__body">
                    <div class="_container">
                        {{--           @if($errors->any())
                                      <div class="row justify-content-center">
                                          <div class="col-md-11">
                                              <div class="alert alert-danger" role="alert">
                                                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                      <span aria-hidden="true">x</span>
                                                  </button>
                                                  {{ $errors->first() }}
                                              </div>
                                          </div>
                                      </div>
                                  @endif--}}

                        @if($product->exists)
                            <form action="{{ route('product-update', $product->id) }}" method="post" id="edit-cat">
                                @method('put')
                                @else
                                    <form action="{{ route('product-save') }}" method="post" id="edit-cat">
                                        @endif
                                        @csrf
                                        <div class="add-new__form">
                                            <div class="add-new__form-group">
                                                {{--<input type="hidden" name="id_user" value="{{ $id }}">--}}
                                                <input type="text" name="name" class="add-new__form-control form-control" placeholder="Название" value="{{ old('name', $product->name) }}">

                                            </div>

                                            <div class="add-new__form-group">
                                                <div class="select add-new__select">
                                                    <button class="btn select__btn add-new__select-btn" type="button">
                                                        <span>

                                                            @if($product->exists)
                                                                @foreach($categoryList as $categoryOption)
                                                                    @if($categoryOption->id == $product->category_id) {{ $categoryOption->id_title}} @endif
                                                                @endforeach
                                                            @else
                                                                Выберите категорию
                                                            @endif

                                                        </span>
                                                        <svg><use xlink:href="/Views/img/sprite.svg#drop"></use></svg>
                                                    </button>
                                                    <ul class="select__list add-new__select-list">

                                                        @foreach($categoryList as $categoryOption)
                                                            <li class="select__item add-new__select-item" data-value="{{ $categoryOption->id }}">{{ $categoryOption->id_title }}</li>
                                                        @endforeach

                                                    </ul>
                                                    <input type="text" name="category_id" class="select__input" value="
                                                    @if($product->exists)
                                                    @foreach($categoryList as $categoryOption)
                                                    @if($categoryOption->id == $product->category_id) {{ $categoryOption->id}} @endif
                                                    @endforeach
                                                    @endif
" hidden/>
                                                </div>
                                            </div>

                                            <div class="add-new__form-group">
                                                <input type="text" name="brand" class="add-new__form-control form-control" placeholder="Бренд" value="{{ old('brand', $product->brand) }}">
                                            </div>

                                            <div class="add-new__form-group">
                                                <input type="text" name="code" class="add-new__form-control form-control" placeholder="Код товара" value="{{ old('code', $product->code) }}">
                                            </div>

                                            <div class="add-new__form-group">
                                                <input type="text" name="price" class="add-new__form-control form-control" placeholder="Цена" value="{{ old('price', $product->price) }}">
                                            </div>

                                            <div class="add-new__form-group">
                                                <input type="text" name="color" class="add-new__form-control form-control" placeholder="Цвет" value="{{ old('quantity', $product->color) }}">
                                            </div>

                                            <div class="add-new__form-group mb-4">

                                            <textarea name="description" id="text" class="add-new__form-control form-control textarea"
                                            style="min-height: 100px;" placeholder="Описание">{{ old('description', $product->description) }}</textarea>
                                            </div>
                                            @if($product->exists)
                                                <div class="add-new__form-group">
                                                    <input type="text" name="created_at" class="add-new__form-control form-control" value="{{ $product->created_at }}">
                                                </div>
                                                <div class="add-new__form-group">
                                                    <input type="text" name="updated_at" class="add-new__form-control form-control" value="{{ $product->updated_at }}">
                                                </div>
                                            @endif

                                            <div class="add-new__form-group">
                                                <input type="hidden" name="user_id" class="add-new__form-control form-control" value="{{ Auth::user()->id }}">
                                            </div>

                                            <div class="add-new__form-group">
                                                <input type="hidden" name="status" class="add-new__form-control form-control" value="1">
                                            </div>

                                        </div>

                                    </form>
                    </div>
                </div>
            </div>
            <!-- Add new single -->

            <div class="add-new__btns">
                <a href="/video.html" class="btn add-new__btn add-new__cancel">Отменить</a>
                <a href="./video.html" class="btn btn__main add-new__btn add-new__save">Сохранить</a>
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
