<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>FootPrints：将来の理想を可視化するツール</title>
  @yield('styles')
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.3.0/Chart.bundle.js"></script>

  <link rel="stylesheet" href="/css/style.css">
</head>
<body>
<header>

  <nav class="navbar navbar-light pt-3 pb-3 ">
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation" style="background-color: white;">
      <span class="navbar-toggler-icon"></span>
  </button>
  <div class="navbar-brand">
  <img src="image/footwhite.png" width="30" height="30" alt="">
  <a class="my-navbar-brand" href="/">FootPrints</a>
  </div>  
  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav ml-auto">
      @if(Auth::check())
      <li class="nav-item">
        <a class="nav-link" href="{{ route('futures.index') }}" style="color: white;">ゴールまでの足跡</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#" id="logout" style="color: white;">ログアウト</a>
        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
          @csrf
        </form>
      </li>
      @else
      <li class="nav-item">
        <a class="nav-link" href="{{ route('login') }}" style="color: white;">ログイン</a>
      </li>
      <li class="nav-item active">
        <a class="nav-link" href="{{ route('register') }}" style="color: white;">会員登録</a>
      </li>
      @endif
      <li class="nav-item">
        <a class="nav-link" href="#" style="color: white;">問合せ</a>
      </li>
    </ul>
  </div>
  </nav>

</header>

<main role="main">
  @yield('content')
</main>
@if(Auth::check())
  <script>
    document.getElementById('logout').addEventListener('click',function(event){
      event.preventDefault();
      document.getElementById('logout-form').submit();
    });
  </script>
@endif
@yield('scripts')
</body>

<footer>
  <p>Copyright(C) FootPrints ALL RIGHTS RESERVED.</p>
</footer>
</html>