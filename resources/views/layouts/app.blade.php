<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>chohoaqua.com</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- Bootstrap -->
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    <link href="{{ asset('css/font-awesome.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/customize.css') }}" rel="stylesheet">

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
  </head>
  <body>
    <nav class="navbar navbar-inverse navbar-fixed-top nav-primary">
      <div class="container wrap">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
        </div>
        <div id="navbar" class="collapse navbar-collapse">
          <ul id="menu-top-menu" class="nav navbar-nav menu">
          @if (Auth::guest())
            <li><a href="{{ url('/') }}">Trang chủ</a></li>
            <li><a href="{{ url('/gioithieu') }}">Giới thiệu</a></li>
            <li><a href="{{ url('/tintuc') }}">Tin tức</a></li>
            <li><a href="{{ url('/muatructuyen') }}">Mua trực tuyến</a></li>
            <li><a href="{{ url('/phanhoi') }}">Phản hồi</a></li>
            <li><a href="{{ url('/lienhe') }}">Liên hệ</a></li>
            <li><a href="{{ route('login') }}">Login</a></li>
          @else
            <li><a href="{{ url('/gioithieu/edit') }}">Giới thiệu</a></li>
            <li><a href="{{ url('/news/admin') }}">Tin tức</a></li>
            <li><a href="{{ url('/dathang') }}">Đặt hàng</a></li>
            <li><a href="{{ url('/phanhoi') }}">Liên hệ</a></li>
            <li><a href="{{ url('/category') }}">Danh mục</a></li>
            <li><a href="{{ url('/product') }}">Sản phẩm</a></li>
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                  {{ Auth::user()->name }}
              </a>

              <ul class="dropdown-menu" role="menu">
                  <li>
                      <a href="{{ route('logout') }}"
                          onclick="event.preventDefault();
                                   document.getElementById('logout-form').submit();">
                          Logout
                      </a>

                      <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                          {{ csrf_field() }}
                      </form>
                  </li>
              </ul>
          </li>
          @endif
          </ul>
        </div>
      </div>
    </nav>
    <div id="banner-content" class="container">
      <img class="banner-image" src="{{ url('/') }}/images/banner-img.jpg">
    </div>
    <div id="main-content" class="container">
      <div class="row">
        <div class="col-md-3">
          <ul class="nav nav-pills nav-stacked">
            <li role="presentation" class="active"><a href="#" onclick="return false;"><span class="glyphicon glyphicon-th-list" aria-hidden="true"></span> Danh mục sản phẩm</a></li>
            {{ Widget::run('categoryWidget') }}
          </ul>
          
          <ul class="nav nav-pills nav-stacked">
            <li role="presentation" class="active"><a href="#" onclick="return false;"><span class="glyphicon glyphicon-th-list" aria-hidden="true"></span> Hỗ trợ trực tuyến</a></li>
            <li role="presentation"><img class="supporter-image" src="{{ url('/') }}/images/bg-support02.png"></li>
            <li role="presentation"><a class="supporter" href="#"><i class="fa fa-mobile" aria-hidden="true"></i>097.361.93.98</a></li>
            <li role="presentation"><a class="supporter" href="#"><i class="fa fa-mobile" aria-hidden="true"></i>094.701.90.55</a></li>
          </ul>
        </div>
        <div class="col-md-9">
            @yield('content')
        </div>
      </div>
    </div>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>
  </body>
</html>