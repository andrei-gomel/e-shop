<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
	<meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

	<title>Вау!</title>
</head>
<body background="/img/background_cell.jpg">

<div style="width: 1100px; height: 600px;">

@if(isset($loginError))
<div class="alert alert-danger" role="alert">
{{ $loginError }}
</div>
@endif

<div style="width: 350px; height: 300px; padding: 10px; border-radius: 9px; float: left; margin: 85px 0px 0px 500px; background: lightgrey">

  <h3>Вход в админпанель</h3><br>

<form action="{{ route('admin-login')  }}" method="post" name="form_login">
    @method("POST")
    @csrf
  <div class="mb-3">
    <label for="InputLogin" class="form-label">Email</label>
      @error('email')
      <div class="alert alert-danger">
          {{ $message }}
      </div>
      @enderror
    <input type="text" name="email" class="form-control" id="InputLogin" placeholder="Email"
    value="{{ old('email') }}">
  </div>

  <div class="mb-3">
    <label for="InputPassword" class="form-label">Пароль</label>
      @error('password')
      <div class="alert alert-danger">
          {{ $message }}
      </div>
      @enderror
    <input type="password" name="password" class="form-control" id="InputPassword" placeholder="Ваш пароль"
    value="{{ old('password') }}">
  </div>

  <button type="submit" class="btn btn-primary" name="submit" value="accept">Войти</button>
</form>

</div>

</div>

</body>
</html>
