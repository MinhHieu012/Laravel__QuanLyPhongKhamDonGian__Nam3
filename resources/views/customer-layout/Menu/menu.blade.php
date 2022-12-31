<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="{{ URL::asset('css/trangchu.css') }}" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css"/>
    <title>Trang Chủ</title>
</head>
<body>
@section('navbar')
<nav class="navbar sticky-top navbar-expand-lg navbar-light bg-light">
    <!-- logo -->
    <a class="navbar-brand" href="{{URL::asset('/')}}">
        <img id="image1" src="{{ URL::asset('image/logo.png') }}" width="175" height="122" alt="Logo">
    </a>

    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <!-- phần tử Menu -->
    <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" href="{{ URL::asset('/') }}">Trang Chủ</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ URL::asset('/introduce') }}">Giới Thiệu</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ URL::asset('/datlich') }}">Đặt lịch</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ URL::asset('/lienhe') }}">Liên Hệ</a>
            </li>

            @if (Auth::check())
                <!-- <div class="collapse navbar-collapse" id="navbarNavDarkDropdown">
                    <ul class="navbar-nav">
                        <div class="dropdown" style="position: relative; left: 500px;">
                            <button class="btn btn-light dropdown-toggle" style="width: 50px; height: 50px; inline-size: auto; border: 2px black solid;" type="button" id="dropdownMenu2" data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="fa-solid fa-user" style="margin-right: 7px;"></i> <span>Xin chào, bạn</span>
                            </button>
                            <span class="caret"></span></button>
                            <ul class="dropdown-Menu">
                                <form action="http://localhost/Project2Final/public/logout" method="POST">
                                    <li><button class="dropdown-item" type="submit">Đăng xuất</button></li>
                                </form>
                            </ul>
                        </div>
                    </ul>
                </div> -->

                <div class="btn-group" style="position: relative; left: 480px;">
                    <button type="button" class="btn btn-light dropdown-toggle" style="border: 2px solid black" data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="fa-solid fa-user" style="margin-right: 7px"></i> Xin chào, bạn {{Auth::user()->name}}
                    </button>
                    <ul class="dropdown-menu dropdown-menu-end">
                        <li>
                            <form action="{{URL::asset('/user/changepassword')}}" method="GET">
                                <button class="dropdown-item" type="submit">Đổi mật khẩu</button>
                            </form>
                        </li>
                        <li>
                            <form action="{{URL::asset('/logout')}}" method="POST">
                                <button class="dropdown-item" type="submit">Đăng xuất</button>
                            </form>
                        </li>
                    </ul>
                </div>
            @else
                <form action="{{URL::asset('/register')}}">
                    <button class="csw-btn-button" style="background: white; color: black; position: relative; left: 450px; border: 2px black solid" type="submit" style="position: relative; left: 450px">Đăng kí</button>
                </form>
                <form action="{{URL::asset('/login')}}">
                    <button class="csw-btn-button" type="submit" style="position: relative; left: 450px; background: white; color: black; border: 2px black solid">Đăng nhập</button>
                </form>
            @endif
        </ul>
    </div>
</nav>
@show
@yield('content')
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
<script src="https://kit.fontawesome.com/e469ae31fa.js" crossorigin="anonymous"></script>
</html>
