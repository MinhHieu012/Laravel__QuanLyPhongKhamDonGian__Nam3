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

    @if($errors->any())
        <h5 style="color: red; font-size: 17px; text-align: center">{{$errors->first()}}</h5>
    @endif

    @if(session()->has('success'))
        <div class="alert alert-success" style="color: #74D15D; font-size: 17px; text-align: center">
            {{ session()->get('success') }}
        </div>
    @endif

</div>
</body>
</html>
