@extends('customer-layout.Footer.footer')
    <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="{{ URL::asset('css/trangchu.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css"
          integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css"/>
    <title>Trang Chủ</title>
</head>
<body>

@extends('customer-layout.Menu.menu')
@section('content')
    @if (session('checkLogin'))
        <script>
            window.onload = function () {
                // Display the message box
                Swal.fire({
                    text: "{{ session('checkLogin') }}",
                    textColor: 'black',
                    icon: 'error',
                    confirmButtonText: 'OK',
                })
            }
        </script>
    @endif
    <!-- banner -->
    <div class="banner">
        <img src="{{ URL::asset('image/banner.jpg') }}" width="100%" alt="Banner">
        <h2 class="title-banner">Đặt lịch tư vấn</h2>
        <h2 class="title-banner1">sức khỏe ngay tại đây</h2>
        <p class="a1">Đặt lịch hẹn tư vấn với bác sĩ có chuyên môn chuyên nghành cao</p>

        <form action="{{ URL::asset('/datlich') }}">
            <button id="dat-lich" class="csw-btn-button" type="submit">Đặt Lịch</button>
        </form>

        <div class="card" style="width: 18rem;">
            <div class="card-body">
                <h3 class="card-title"><i class="fa-regular fa-calendar-days"></i> Tiết kiệm thời gian và chi phí</h3>
                <p class="card-text" style="font-size: 18px">Bệnh nhân có thể đặt lịch khám mọi lúc, mọi nơi, trên đủ
                    các nền tảng. Thay thế cho việc đến đăng ký trực tiếp, xếp hàng và chờ đợi</p>
            </div>
        </div>

        <div id="card2" class="card" style="width: 18rem;">
            <div class="card-body">
                <h3 class="card-title"><i class="fa-solid fa-user-tie"></i> Bác sĩ chuyên môn cao</h3>
                <p class="card-text" style="font-size: 18px">Được thăm khám, tư vấn bởi bác sỹ có chuyên môn cao đảm bảo
                    chất lượng cho khách hàng</p>
            </div>
        </div>

        <div id="card3" class="card" style="width: 18rem;">
            <div class="card-body">
                <h3 class="card-title"><i class="fa-solid fa-info"></i> Hỗ trợ chu đáo nhiệt tình</h3>
                <p class="card-text">Bệnh nhân được hỗ trợ tận tình, đáp ứng theo khung giờ khám mong muốn</p>
            </div>
        </div>

        <div id="card4" class="card" style="width: 18rem;">
            <div class="card-body">
                <h3 class="card-title"><i class="fa-sharp fa-solid fa-thumbs-up"></i> Uy tín và chất lượng</h3>
                <p class="card-text">Luôn luôn đảm bảo về sự uy tín và chất lượng đối với khách hàng khi đến khám và tư
                    vấn sức khỏe</p>
            </div>
        </div>
    </div>

    <!-- banner vs chứ (2) -->
    <div class="banner2">
        <div class="container">
            <div class="row">
                <div class="col-sm-7">
                    <h1 style="font-size: 55px">Tư vấn chăm sóc sức khỏe</h1> <br>
                    <p style="font-size: 25px">Đặt lịch hẹn tư vấn với bác sĩ có chuyên môn chuyên nghành cao</p> <br>

                    <h3><i class="fa-regular fa-calendar-days"></i> Đặt lịch tư vấn online</h3>
                    <p style="font-size: 20px; margin-left: 35px">Đặt lịch hẹn tư vấn với bác sĩ có chuyên môn chuyên
                        nghành cao</p> <br>

                    <h3><i class="fa-solid fa-money-bill"></i> Giá cả phải chăng</h3>
                    <p style="font-size: 20px; margin-left: 35px">Giá cả hợp lý</p>

                    <h3><i class="fa-sharp fa-solid fa-thumbs-up"></i> Uy tín và chất lượng</h3>
                    <p style="font-size: 20px; margin-left: 35px">Luôn luôn đảm bảo về sự uy tín và chất lượng đối với
                        khách hàng khi đến khám và tư vấn sức khỏe</p>
                </div>

                <div class="col-sm-5">
                    <img class="img-fluid" src="{{ URL::asset('image/banner2.jpg') }}" style="border-radius: 10px"
                         alt="img">
                </div>
            </div>
        </div>
    </div>

    <!-- dịch vụ -->
    <div class="dichvu">
        <h1 class="title-dichvu">Dịch vụ</h1>
        <p class="title-dichvu1">Chủ động đặt lịch hẹn thông minh và được chăm sóc tận tình</p>

        <div id="container-dichvu" class="container">
            <div id="cot-dichvu" class="row">
                <div class="col-sm">
                    <div id="card-dichvu1" class="card" style="width: 18rem;">
                        <img class="card-img-top" src="{{ URL::asset('image/banner3.jpg') }}" alt="Card image cap">
                        <div class="card-body">
                            <h3>Gói tư vấn thông thường</h3>
                            <p class="card-text" style="font-size: 18px">Giá: 100.000đ (Gói tư vấn sức khỏe thông thường
                                + 1 lần khám mắt, tai mũi họng)</p>
                            <a href="{{ URL::asset('/datlich') }}" class="btn btn-primary">Đặt lịch tại đây</a>
                        </div>
                    </div>
                </div>
                <div class="col-sm">
                    <div id="card-dichvu1" class="card" style="width: 18rem;">
                        <img class="card-img-top" src="{{ URL::asset('image/banner3.jpg') }}" alt="Card image cap">
                        <div class="card-body">
                            <h3>Gói tư vấn chuyên sâu</h3>
                            <p class="card-text" style="font-size: 18px">Giá: 200.000đ (Gói tư vấn sức khỏe chuyên sâu +
                                1 lần khám mắt, tai mũi họng)</p>
                            <a href="{{ URL::asset('/datlich') }}" class="btn btn-primary">Đặt lịch tại đây</a>
                        </div>
                    </div>
                </div>
                <div class="col-sm">
                    <div id="card-dichvu1" class="card" style="width: 18rem;">
                        <img class="card-img-top" src="{{ URL::asset('image/banner3.jpg') }}" alt="Card image cap">
                        <div class="card-body">
                            <h3>Gói tư vấn chuyên sâu vip</h3>
                            <p class="card-text" style="font-size: 18px">Giá: 230.000đ (Gói tư vấn sức khỏe chuyên sâu +
                                1 lần khám mắt, tai mũi họng miễn phí)</p>
                            <a href="{{ URL::asset('/datlich') }}" class="btn btn-primary">Đặt lịch tại đây</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @if (session('success'))
        <script>
            window.onload = function () {
                // Display the message box
                Swal.fire({
                    text: "{{ session('success') }}",
                    textColor: 'black',
                    icon: 'success',
                    confirmButtonText: 'OK',
                })
            }
        </script>
    @endif

    @if (session('successLogout'))
        <script>
            window.onload = function () {
                // Display the message box
                Swal.fire({
                    text: "{{ session('successLogout') }}",
                    textColor: 'black',
                    icon: 'success',
                    confirmButtonText: 'OK',
                })
            }
        </script>
    @endif

    @if (session('permissionDenied'))
        <script>
            window.onload = function() {
                // Display the message box
                Swal.fire({
                    text: "{{ session('permissionDenied') }}",
                    textColor: 'red',
                    icon: 'error',
                    confirmButtonText: 'Thoát',
                })
            }
        </script>
    @endif
@endsection

</body>
<script src="https://kit.fontawesome.com/e469ae31fa.js" crossorigin="anonymous"></script>
<!-- Messenger Plugin chat Code -->
<div id="fb-root"></div>

<!-- Your Plugin chat code -->
<div id="fb-customer-chat" class="fb-customerchat">
</div>

<script>
    var chatbox = document.getElementById('fb-customer-chat');
    chatbox.setAttribute("page_id", "113797844541227");
    chatbox.setAttribute("attribution", "biz_inbox");
</script>

<!-- Your SDK code -->
<script>
    window.fbAsyncInit = function () {
        FB.init({
            xfbml: true,
            version: 'v15.0'
        });
    };

    (function (d, s, id) {
        var js, fjs = d.getElementsByTagName(s)[0];
        if (d.getElementById(id)) return;
        js = d.createElement(s);
        js.id = id;
        js.src = 'https://connect.facebook.net/vi_VN/sdk/xfbml.customerchat.js';
        fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));
</script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
</html>
