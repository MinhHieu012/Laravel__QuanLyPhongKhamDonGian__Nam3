<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đăng kí</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css"/>
</head>

<style>
    /*@import url("https://fonts.googleapis.com/css?family=Lato:400,700");*/
    @import url('https://fonts.googleapis.com/css2?family=Source+Sans+Pro&display=swap');

    * {
        text-decoration: none;
        color: black;
    }

    body {
        /*font-family: 'Lato', sans-serif;*/
        font-family: 'Source Sans Pro', sans-serif;
        color: #4A4A4A;
        display: flex;
        justify-content: center;
        align-items: center;
        min-height: 100vh;
        overflow: hidden;
        margin: 0;
        padding: 0;
    }

    form {
        width: 350px;
        position: relative;
    }
    form .form-field::before {
        font-size: 20px;
        position: absolute;
        left: 15px;
        top: 17px;
        color: #888888;
        content: " ";
        display: block;
        background-size: cover;
        background-repeat: no-repeat;
    }
    form .form-field:nth-child(1)::before {
        background-image: url('{{URL::asset('image/user-icon.png')}}');
        width: 20px;
        height: 20px;
        top: 15px;
    }
    form .form-field:nth-child(2)::before {
        background-image: url('{{URL::asset('image/user-icon.png')}}');
        width: 22px;
        height: 22px;
    }

    form .form-field:nth-child(3)::before {
        background-image: url('{{URL::asset('image/lock-icon.png')}}');
        width: 20px;
        height: 20px;
    }

    form .form-field:nth-child(4)::before {
        background-image: url('{{URL::asset('image/lock-icon.png')}}');
        width: 20px;
        height: 20px;
    }

    form .form-field {
        display: -webkit-box;
        display: -ms-flexbox;
        display: flex;
        -webkit-box-pack: justify;
        -ms-flex-pack: justify;
        justify-content: space-between;
        -webkit-box-align: center;
        -ms-flex-align: center;
        align-items: center;
        margin-bottom: 1rem;
        position: relative;
    }

    form input {
        font-family: inherit;
        width: 100%;
        outline: none;
        background-color: #fff;
        border-radius: 4px;
        border: none;
        display: block;
        padding: 0.9rem 0.7rem;
        box-shadow: 0px 3px 6px rgba(0, 0, 0, 0.16);
        font-size: 17px;
        color: #4A4A4A;
        text-indent: 40px;
    }

    form .btn {
        outline: none;
        border: none;
        cursor: pointer;
        display: inline-block;
        margin: auto;
        margin-top: 10px;
        padding: 0.9rem 2.5rem;
        text-align: center;
        background-color: white;
        color: black;
        border-radius: 4px;
        box-shadow: 0px 3px 6px rgba(0, 0, 0, 0.16);
        font-size: 17px;
    }

    .login-here {
        position: relative;
        margin-top: 20px;
        font-size: 18px;
        text-align: center;
    }

    .register-here {
        position: relative;
        margin-top: 20px;
        font-size: 18px;
        text-align: center;
    }

</style>

<body style="background: #EAECEE">
<div class="log-form">

    @if(session()->has('fails'))
        <div style="color: #641E16; font-size: 20px; width: 100%; height: 45px; background: #F5B7B1; padding-top: 22px; border-radius: 5px;">
            <span style="margin-left: 20px"><i class="fa-sharp fa-solid fa-circle-exclamation" style="margin-right: 13px"></i>{{ session()->get('fails') }}</span>
        </div>
    @endif
    <h2 style="color: black; font-size: 20px;"><a href="{{url('/')}}"> < Về trang chủ</a></h2>

    <h2 style="color: black">Đăng kí</h2>

    <form action="{{URL::asset('/register')}}" method="POST">

        <!-- tên -->
        <div class="form-field">
            <input type="text" placeholder="Nhập họ và tên" name="name" required/>
        </div>

        <!-- email -->
        <div class="form-field">
            <input type="text" placeholder="Nhập tên đăng nhập" name="username" required/>
        </div>

        <!-- password -->
        <div class="form-field">
            <input type="password" placeholder="Nhập mật khẩu" name="password" required/>
        </div>

        <!-- confirm password -->
        <div class="form-field">
            <input type="password" placeholder="Nhập xác nhận mật khẩu" id="confirm_password" name="confirm_password" required/>
        </div>

        <div class="text">
            @error('username')
            <li style="color: red; font-size: 17px; padding-bottom: 5px">Tên đăng nhập bạn đăng kí đã tồn tại!</li>
            <li style="color: red; font-size: 17px; padding-bottom: 5px">Hoặc yêu cầu tối thiểu 4 kí tự và tối đa 30 kí tự!</li>
            @enderror
        </div>

        @error('password')
        <p style="color: red; font-size: 17px;">Mật khẩu phải có 10 kí tự bao gồm ít nhất:
            <li style="color: red; font-size: 17px; padding-bottom: 5px">1 chữ thường</li>
            <li style="color: red; font-size: 17px;padding-bottom: 5px">1 chữ in hoa</li>
            <li style="color: red; font-size: 17px;padding-bottom: 5px">Số 0-9</li>
            <li style="color: red; font-size: 17px;padding-bottom: 5px">Kí tự đặc biệt (@, !, ...)</li>
        </p>
        @enderror

        @error('confirm_password')
        <p style="color: red; font-size: 17px; margin-top: 10px; font-weight: 500">Mật khẩu xác nhận phải trùng khớp với mật khẩu ở trên!</p>
        @enderror

        @if (session('checkLogin'))
            <script>
                window.onload = function() {
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

        <!-- Login button -->
        <div class="form-field">
            <button class="btn" type="submit" name="action">Đăng kí</button>
        </div>
    </form>

    <!-- Login button -->
    <div class="login-here">
        <p>Đã có tài khoản, <a href="{{url('/login')}}" style="color: red">Đăng nhập tại đây</a></p>
    </div>

</div>
</body>
<script src="https://kit.fontawesome.com/e469ae31fa.js" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>

</html>
