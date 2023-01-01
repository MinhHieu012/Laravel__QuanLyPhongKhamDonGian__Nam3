<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="{{ URL::asset('css/admin-layout/style.css') }}" rel="stylesheet">
    <title>Đăng nhập</title>
</head>
<style>
    form .form-field:nth-child(1)::before {
        background-image: url('{{URL::asset('image/user-icon.png')}}');
        width: 20px;
        height: 20px;
        top: 15px;
    }
    form .form-field:nth-child(2)::before {
        background-image: url('{{URL::asset('image/lock-icon.png')}}');
        width: 20px;
        height: 20px;
    }
</style>
<body style="background: #EAECEE">
<div class="log-form">

    <h2 style="color: black; font-size: 20px"><a href="{{url('/')}}"> < Về trang chủ</a></h2>

    <h2 style="color: black">Đăng nhập</h2>

    <form action="{{URL::asset('/login')}}" method="POST">

        <!-- email -->
        <div class="form-field">
            <input type="text" placeholder="Nhập tên đăng nhập của bạn" name="username" required/>
        </div>

        <!-- password -->
        <div class="form-field">
            <input type="password" placeholder="Nhập mật khẩu của bạn" name="password" required/>
        </div>

        <!-- Login button -->
        <div class="form-field">
            <button class="btn" type="submit" name="login">Đăng nhập</button>
        </div>

        <div class="register-here">
            <p>Chưa có tài khoản, <a href="{{url('/register')}}" style="color: red">đăng kí tại đây</a></p>
        </div>
    </form>

    {{--@if($errors->any())
        <h5 style="color: red; font-size: 17px; text-align: center">{{$errors->first()}}</h5>
    @endif--}}

    @if (session('error'))
        <script>
            window.onload = function() {
                // Display the message box
                Swal.fire({
                    text: "{{ session('error') }}",
                    textColor: 'black',
                    icon: 'error',
                    confirmButtonText: 'OK',
                })
            }
        </script>
    @endif

    @if (session('errorKhoa'))
        <script>
            window.onload = function() {
                // Display the message box
                Swal.fire({
                    text: "{{ session('errorKhoa') }}",
                    textColor: 'black',
                    icon: 'error',
                    confirmButtonText: 'OK',
                })
            }
        </script>
    @endif

    @if (session('success'))
        <script>
            window.onload = function() {
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

    @if (session('checkLogin'))
        <script>
            window.onload = function() {
                // Display the message box
                Swal.fire({
                    text: "{{ session('checkLogin') }}",
                    textColor: 'black',
                    icon: 'warning',
                    confirmButtonText: 'OK',
                })
            }
        </script>
    @endif
</div>
</body>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
</html>
