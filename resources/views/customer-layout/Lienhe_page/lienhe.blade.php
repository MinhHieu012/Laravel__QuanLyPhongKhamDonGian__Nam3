@extends('customer-layout.Footer.footer')
    <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liên hệ</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<style>
    .row .col {
        position: relative;
        top: 100px;
    }
</style>
<body>
@extends('customer-layout.Menu.menu')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col">
                <h2>Liên Hệ và Hỗ Trợ</h2> <br>
                <p style="font-size: 18px">Địa Chỉ: 306 - Nguyễn Trãi - Hà Nội</p>
                <p style="font-size: 18px">Phone Number: 0967710509</p>
                <p style="font-size: 18px">Email: 0967710509hieu@gmail.com</p>

                {{--<p style="font-size: 18px">Thông tin chuyển khoản thanh toán: 1401205172948 Agribank Lê Minh Hiếu</p>--}}

                {{--<p style="font-size: 18px">Thông tin chuyển khoản thanh toán: 1401205172948 Agribank Lê Minh Hiếu</p>

                <p style="font-size: 18px">Nội dung chuyển khoản 'Họ tên + số điện thoại + thời gian hẹn + gói giá'</p>
                <p style="font-size: 18px">Ví dụ: Lê Minh Hiếu + 0967710509 + 12/10/2022 - 14h30 + Gói 200.000đ</p>
                <img src="{{ URL::asset('image/QRPay.jpg') }}" width="70%" alt="QRPayImage">
                <br> <br>
                <p style="font-size: 18px">Nếu thanh toán online sau khi chuyển khoản liên hệ đến <a

                        href="https://www.facebook.com/lehieu911">FB: Minh Hiếu Lê</a></p>

                        href="https://www.facebook.com/lehieu911">FB: Minh Hiếu Lê</a></p> --}}

            </div>
            <div class="col">
                <iframe
                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3725.145505945185!2d105.79392215060834!3d20.98680368595258!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3135acc7adc9194d%3A0x9ff0d1ad1d95951a!2zMzA2IMSQLiBOZ3V54buFbiBUcsOjaSwgUC4gVsSDbiBRdcOhbiwgSMOgIMSQw7RuZywgSMOgIE7hu5lpLCBWaeG7h3QgTmFt!5e0!3m2!1svi!2s!4v1669812862206!5m2!1svi!2s"
                    width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"
                    referrerpolicy="no-referrer-when-downgrade"></iframe>
            </div>
        </div>
    </div>
@endsection
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
        crossorigin="anonymous"></script>
<!-- Messenger Plugin chat Code -->
<div id="fb-root"></div>

<!-- Your Plugin chat code -->
<div id="fb-customer-chat" class="fb-customerchat">
</div>

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


