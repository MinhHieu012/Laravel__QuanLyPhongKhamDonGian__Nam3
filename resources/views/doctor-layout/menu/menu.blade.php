<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bác sĩ</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css"/>
</head>
<style>
    .ul1 {
        list-style-type: none;
        margin: 0;
        padding: 0;
        width: 15%;
        background-color: #f1f1f1;
        position: fixed;
        height: 100%;
        overflow: auto;
    }

    .li1 #a1 {
        display: block;
        color: #000;
        padding: 8px 16px;
        text-decoration: none;

    }

    .li1 #a1:hover:not(.active) {
        background-color: #555;
        color: white;
    }
    i {
        margin-right: 15px;
        font-size: 20px;
    }
    #span1 {
        font-size: 18px;
        text-align: center;
        justify-content: center;
    }

</style>
<body>
@section('navbaradmin')
    <!-- Head -->
    <nav class="navbar sticky-top navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
            <a class="navbar-brand" href="{{URL::asset('/doctor/home')}}"><span style="position: relative; left: 50px; font-size: 20px">HEALTH CARE</span></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDarkDropdown" aria-controls="navbarNavDarkDropdown" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <!-- <div class="collapse navbar-collapse" id="navbarNavDarkDropdown">
                <ul class="navbar-nav">
                    <div class="dropdown" style="position: relative; left: 1445px">
                        <button class="btn btn-light dropdown-toggle" style="position: relative; right: 210px; width: 150px; border: 2px black solid; inline-size: auto" type="button" id="dropdownMenu2" data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="fa-solid fa-user" style="margin-right: 7px"></i> Xin chào, bác sĩ {{Auth::user()->name}}
                        </button>
                        <ul class="dropdown-Menu dropdown-Menu-light" aria-labelledby="dropdownMenu2">
                            <li>
                                <form action="http://localhost/Project2Final/public/logout" method="POST">
                                <button class="dropdown-item" type="submit">Đăng xuất</button>
                                </form>
                            </li>
                        </ul>
                    </div>
                </ul>
            </div> -->

            <div class="btn-group">
                <button type="button" class="btn btn-light dropdown-toggle" style="border: 2px solid black" data-bs-toggle="dropdown" aria-expanded="false">
                    <i class="fa-solid fa-user" style="margin-right: 7px"></i> Xin chào, Bác sĩ {{Auth::user()->name}}
                </button>
                <ul class="dropdown-menu dropdown-menu-end">
                    <li>
                        <form action="{{URL::asset('/doctor/changepassword')}}" method="GET">
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

        </div>
    </nav>

    <!-- Menu dọc -->
    <ul class="ul1">
        <li class="li1"><a href="{{URL::asset('/doctor/home')}}" id="a1"><i class="fa-solid fa-house"></i> <span id="span1">Dashboard</span></a></li>
        <li class="li1"><a href="{{URL::asset('/doctor/hoso')}}" id="a1"><i class="fa-solid fa-user-doctor"></i> <span id="span1">Hồ sơ cá nhân</span></a></li>
        <li class="li1"><a href="{{URL::asset('/doctor/lichhenchuakham')}}" id="a1"><i class="fa-solid fa-calendar"></i> <span id="span1">Lịch hẹn chưa khám</span></a></li>
        <li class="li1"><a href="{{URL::asset('/doctor/lichhendangkham')}}" id="a1"><i class="fa-solid fa-calendar"></i> <span id="span1">Lịch hẹn đang khám</span></a></li>
        <li class="li1"><a href="{{URL::asset('/doctor/lichhendakham')}}" id="a1"><i class="fa-solid fa-calendar"></i> <span id="span1">Lịch hẹn đã khám</span></a></li>
    </ul>

@show
@yield('content2')
</body>
<script src="https://kit.fontawesome.com/e469ae31fa.js" crossorigin="anonymous"></script>
</html>
