@extends('customer-layout.Footer.footer')
    <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đặt lịch</title>
    <link href="{{ URL::asset('css/datlich.css') }}" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <!-- DataTable -->
    <link rel="stylesheet" type="text/css"
          href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.1.3/css/bootstrap.min.css"/>
    <link rel="stylesheet" type="text/css"
          href="https://cdn.datatables.net/v/bs5/jq-3.6.0/dt-1.13.1/datatables.min.css"/>

    <style>
        table {
            font-family: arial, sans-serif;
            border-collapse: collapse;
        }

        td, th {
            border: 1px solid #dddddd;
            text-align: left;
            padding: 8px;
        }

        tr:nth-child(even) {
            background-color: #dddddd;
        }

        h2 {
            position: relative;
            top: 70px;
            display: flex;
            justify-content: center;

        }

        .a3 {
            font-family: arial, sans-serif;
            border-collapse: collapse;
        }

        .a3 {
            position: relative;
            margin-left: auto;
            margin-right: auto;
            width: 700px;

        }
    </style>
<body>
@extends('customer-layout.Menu.menu')
@section('content')
    <div>
        <h2 style="position: relative; top: 15px">Sửa lịch hẹn</h2>
        <button type="button" style="position: relative; right: -492px; top: -28px" class="btn btn-primary"
                onclick="window.location.href='{{URL::asset('/datlich')}}';">Quay lại
        </button>

        <form method="POST" class="a3">
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Họ tên</label>
                <input type="text" class="form-control" id="name" name="name" aria-describedby="emailHelp"
                       value="{{$datlich->names}}" required>
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Số điện thoại</label>
                <input type="phone" class="form-control" id="phone" name="phone" value="{{$datlich->phones}}" required>
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Ngày hẹn</label>
                <input type="date" class="form-control" id="date" name="date" value="{{$datlich->dates}}" required>
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Thời gian hẹn</label>
                {{--<select style="position: relative; top:4px; margin-bottom: 10px; width: 700px; height: 40px; border-radius: 3px" name="time" id="time">
                    <optgroup label="Sáng">
                        <option value="Sáng 8:00 giờ - 9:00 giờ">Sáng 08:00 giờ đến 09:00 giờ</option>
                        <option value="Sáng 9:00 giờ đến 10:00 giờ">Sáng 09:00 giờ đến 10:00 giờ</option>
                        <option value="Sáng 10:00 giờ đến 11:00 giờ">Sáng 10:00 giờ đến 11:00 giờ</option>
                    </optgroup>
                    <optgroup label="Chiều">
                        <option value="Chiều 01:00 giờ đến 02:00 giờ">Chiều 01:00 giờ đến 02:00 giờ</option>
                        <option value="Chiều 02:00 giờ đến 03:00 giờ">Chiều 02:00 giờ đến 03:00 giờ</option>
                        <option value="Chiều 03:00 giờ đến 04:00 giờ">Chiều 03:00 giờ đến 04:00 giờ</option>
                        <option value="Chiều 04:00 giờ đến 05:00 giờ">Chiều 04:00 giờ đến 05:00 giờ</option>
                        <option value="Chiều 05:00 giờ đến 06:00 giờ">Chiều 05:00 giờ đến 06:00 giờ</option>
                    </optgroup>
                </select>--}}

                <select style="position: relative; top:4px; margin-bottom: 10px; width: 700px; height: 40px; border-radius: 3px" name="time" id="time">
                    @foreach($grouped_packages_times as $type => $times)
                        <optgroup label="{{ $type }}">
                            @foreach($times as $time)
                                <option value="{{ $time->id }}">{{ $time->times }}</option>
                            @endforeach
                        </optgroup>
                    @endforeach
                </select>

            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Gói khám</label>
                <select style="position: relative; top:4px; margin-bottom: 10px; width: 700px; height: 40px; border-radius: 3px" name="price" id="price">
                    @foreach ($grouped_packages as $type => $packages)
                        <optgroup label="{{ $type }}">
                            @foreach ($packages as $package)
                                <option value="{{ $package->id }}">{{ $package->names }} - Giá: {{ $package->prices }}</option>
                            @endforeach
                        </optgroup>
                    @endforeach
                </select>

            </div>
            <button type="submit" class="btn btn-warning" id="edit" name="edit">Sửa</button>
        </form>
    </div>
@endsection
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
        crossorigin="anonymous"></script>

<!-- DataTable -->
<script type="text/javascript"
        src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.1.3/js/bootstrap.bundle.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/v/bs5/jq-3.6.0/dt-1.13.1/datatables.min.js"></script>

<script>
    $(document).ready(function () {
        $('#lich_da_hen').DataTable();
    });
</script>
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

    // Ko cho ng dùng chọn ngày trong quá khứ
    window.onload = function () {
        const dateInput = document.getElementById('date');
        const currentDate = new Date().toISOString().split('T')[0];
        dateInput.min = currentDate;
    }
</script>
</html>


