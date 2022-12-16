<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Doctor</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<style>
    .a4 {
        font-family: arial, sans-serif;
        border-collapse: collapse;
    }

    .a4 {
        position: relative;
        top: 60px;
        left: 270px;
        width: 1400px;
    }
</style>
<body>
@extends('doctor-layout/menu-doctor')
@section('content2')
    <div>
        <h2 style="position: relative; right: -270px; top: 15px">Sửa tình trạng tư vấn, khám</h2>
        <button type="button" style="position: relative; right: -270px; top: 40px" class="btn btn-primary" onclick="window.location.href='{{URL::asset('doctor/lichhen')}}';">Quay lại</button>

        <form class="a4">
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Họ tên</label>
                <input type="text" class="form-control" id="fullname" aria-describedby="emailHelp">
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Số điện thoại</label>
                <input type="password" class="form-control" id="phone">
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Thời gian hẹn</label>
                <input type="text" class="form-control" id="time">
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Gói giá</label>
                <input type="phone" class="form-control" id="price">
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Tình trạng tư vấn</label>
                <input type="phone" class="form-control" id="new-consulting-status" placeholder="Tình trạng tư vấn mới">
            </div>

            <button type="submit" class=" btn btn-warning" id="edit-consulting-status">Sửa</button>
        </form>
    </div>
@endsection
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</html>
