<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quản lý bác sĩ</title>

    <!-- DataTable -->
    <link rel="stylesheet" type="text/css"
          href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.1.3/css/bootstrap.min.css"/>
    <link rel="stylesheet" type="text/css"
          href="https://cdn.datatables.net/v/bs5/jq-3.6.0/dt-1.13.1/datatables.min.css"/>

</head>

<style>
    .a1 {
        font-family: arial, sans-serif;
        border-collapse: collapse;
    }

    .a1 {
        position: relative;
        top: 60px;
        left: 270px;
        width: 1400px;
    }

</style>

<body>
@extends('admin-layout.menu.AdminMenu.AdminLTE.menu')
@section('content2')
    <div>
        <h2 style="position: relative; right: -270px; top: 15px">Thêm hồ sơ bác sĩ</h2>
        <button type="button" style="position: relative; right: -270px; top: 40px" class="btn btn-primary"
                onclick="window.location.href='{{URL::asset('admin/quanlybacsi')}}';">Quay lại
        </button>

        <form action="{{ URL::asset('admin/quanlybacsi/add') }}" class="a1" method="POST">
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Họ và tên</label>
                <input type="text" class="form-control" id="name" name="name" placeholder="Nhập họ tên của bác sĩ"
                       required>
            </div>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Tên đăng nhập</label>
                <input type="text" class="form-control" id="username" name="username" aria-describedby="emailHelp"
                       placeholder="Nhập tên đăng nhập của bác sĩ" required>
                <div class="text">
                    @error('username')
                    <li style="color: red; font-size: 17px; padding-bottom: 5px">Tên đăng nhập bạn đăng kí đã tồn tại!
                        Hoặc yêu cầu tối thiểu 4 kí tự và tối đa 30 kí tự
                    </li>
                    @enderror
                </div>
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Mật khẩu</label>
                <input type="password" class="form-control" id="passoword" name="password"
                       placeholder="Nhập mật khẩu của bác sĩ" required>
                @error('password')
                <p style="color: red; font-size: 17px;margin-top: 5px">Mật khẩu phải có 10 kí tự bao gồm ít nhất:
                <li style="color: red; font-size: 17px; padding-bottom: 5px;margin-top: 5px">1 chữ thường</li>
                <li style="color: red; font-size: 17px;padding-bottom: 5px;margin-top: 5px">1 chữ in hoa</li>
                <li style="color: red; font-size: 17px;padding-bottom: 5px;margin-top: 5px">Số 0-9</li>
                <li style="color: red; font-size: 17px;padding-bottom: 5px;margin-top: 5px">Kí tự đặc biệt (@, !, ...)
                </li>
                </p>
                @enderror
            </div>

            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Lĩnh vực khám</label>
                <input type="text" class="form-control" id="doctor_specialty" name="doctor_specialty" placeholder="Nhập lĩnh vực, ngành khám của bác sĩ" required>
            </div>
            <button type="submit" class=" btn btn-success" id="add" name="add">Thêm
                bác sĩ
            </button>
        </form>
    </div>

</body>
<!-- DataTable -->
<script type="text/javascript"
        src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.1.3/js/bootstrap.bundle.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/v/bs5/jq-3.6.0/dt-1.13.1/datatables.min.js"></script>
@endsection
</html>
