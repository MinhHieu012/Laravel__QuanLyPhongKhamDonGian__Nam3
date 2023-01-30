@extends('customer-layout.Footer.footer')
    <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chi tiết lịch hẹn</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
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

    label {
        font-size: 20px;
    }
</style>
<body>
@extends('customer-layout.Menu.menu')
@section('content')
    <div>
        <h2 style="text-align: center; margin-top: 40px">Chi tiết lịch hẹn</h2>
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
        <div style="position: relative; top: 30px; left: 600px; width: 500px;">

            <form action="{{ url('/datlich')}}">
                <button type="submit" style="margin-bottom: 20px" class="btn btn-outline-primary">Quay lại</button>
            </form>

            <div class="mb-3">
                <label>ID Lịch hẹn: {{$lichhen->id}}</label>
            </div>

            <div class="mb-3">
                <label>Họ tên: {{$lichhen->names}}</label>
            </div>

            <div class="mb-3">
                <label>Ngày hẹn: {{ date('d/m/Y', strtotime($lichhen->dates)) }}</label>
            </div>

            <div class="mb-3">
                <label>Thời gian: {{ $lichhen->appointment_times->times }}</label>
            </div>

            <div class="mb-3">
                <label>Gói khám: {{ $lichhen->health_checkup_packages->names }}</label>
            </div>

            <div class="mb-3">
                <label>Giá: {{ $lichhen->health_checkup_packages->prices }}</label>
            </div>

            <div class="mb-3">
                <label>Bác sĩ khám:
                    @if (isset($lichhen->doctor_examines))
                        <span style="color: blue">{{ $lichhen->doctor_examines }}</span>
                    @else
                        <span style="color:red;">Đang cập nhật</span>
                    @endif
                </label>
            </div>

            <div class="mb-3">
                <label>Phòng khám:
                    @if ($lichhen->rooms->rooms !== "Chưa có")
                        <span style="color: blue">{{ $lichhen->rooms->rooms }}</span>
                    @else
                        <span style="color:red;">Đang cập nhật</span>
                    @endif
                </label>
            </div>

            <div class="mb-3">
                <label>Trạng thái lịch hẹn:
                    @if ($lichhen->status == 1)
                        <span style="color: blue">Đã xác nhận</span>
                    @elseif ($lichhen->status == 0)
                        <span style="color: red">Chưa xác nhận</span>
                    @endif
                </label>
            </div>

            <div class="mb-3">
                <label>Trạng thái khám:
                    @if ($lichhen->appointment_status_id == 1)
                        <span style="color: red">Chưa khám</span>
                    @elseif ($lichhen->appointment_status_id == 2)
                        <span style="color: blue">Đang khám</span>
                    @elseif ($lichhen->appointment_status_id == 3)
                        <span style="color: green">Đã khám xong</span>
                    @endif
                </label>
            </div>

            <div class="mb-3">
                <label>Trạng thái thanh toán:
                    @if ($lichhen->payment_status_id == 1)
                        <span style="color: red">Chưa thanh toán</span>
                    @elseif ($lichhen->payment_status_id == 2)
                        <span style="color: blue">Đã thanh toán</span>
                    @endif
                </label>
            </div>

            <div class="mb-3">
                <label>Ngày đặt lịch: {{ date('d/m/Y, H:i', strtotime($lichhen->created_at)) }}</label>
            </div>

        </div>
    </div>
@endsection
</body>

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


