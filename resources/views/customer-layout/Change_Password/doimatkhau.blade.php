@extends('customer-layout.Footer.footer')
    <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đổi mật khẩu</title>
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
</style>
<body>
@extends('customer-layout.Menu.menu')
@section('content')
    <div>
        <h2 style="text-align: center; margin-top: 40px">Đổi mật khẩu</h2>
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
        <form action="{{ URL::asset('user/changepassword') }}"
              style="position: relative; top: 60px; left: 600px; width: 500px;" method="POST">
            <div class="mb-3">
                <label for="exampleInputPassword1" style="font-size: 20px" class="form-label">Tên đăng nhập</label>
                <input type="text" class="form-control" value="{{Auth::user()->username}}" disabled>
            </div>

            <div class="mb-3">
                <label for="exampleInputPassword1" style="font-size: 20px" class="form-label">Mật khẩu</label>
                <input type="password" class="form-control" id="password" name="password"
                       placeholder="Nhập mật khẩu mới" required>
                @error('password')
                <p style="color: red; font-size: 17px; margin-top: 10px; font-weight: 500">Mật khẩu phải có 10 kí tự bao
                    gồm ít nhất:
                <li style="color: red; font-size: 17px; margin-top: 10px; font-weight: 500">1 chữ thường</li>
                <li style="color: red; font-size: 17px; margin-top: 10px; font-weight: 500">1 chữ in hoa</li>
                <li style="color: red; font-size: 17px; margin-top: 10px; font-weight: 500">Số 0-9</li>
                <li style="color: red; font-size: 17px; margin-top: 10px; font-weight: 500">Kí tự đặc biệt (@, !, ...)
                </li>
                </p>
                @enderror
            </div>

            <div class="mb-3">
                <label for="exampleInputPassword1" style="font-size: 20px" class="form-label">Xác nhận mật khẩu</label>
                <input type="password" class="form-control" id="confirm_password" name="confirm_password"
                       placeholder="Nhập lại mật khẩu mới" required>
                @error('confirm_password')
                <p style="color: red; font-size: 17px; margin-top: 10px; font-weight: 500">Mật khẩu xác nhận phải trùng
                    khớp với mật khẩu ở trên!</p>
                @enderror
            </div>

            <button type="submit" onclick="confirm('Bạn hãy chắc chắn muốn đổi mật khẩu?')" class=" btn btn-success"
                    id="changepassword" name="changepassword">Đổi mật khẩu
            </button>
        </form>
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


