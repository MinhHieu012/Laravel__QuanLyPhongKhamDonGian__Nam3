<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hồ sơ</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
    <style>
        p {
            position: relative;
            right: -270px;
            top: 65px;
            font-size: 18px;
        }
    </style>
<body>
@extends('doctor-layout/menu-doctor')
@section('content2')
    <div>
        <h2 style="position: relative; right: -270px; top: 15px">Thông tin cá nhân</h2>
        <button type="button" style="position: relative; right: -270px; top: 40px; font-size: 18px" class="btn btn-primary">Thông tin cá nhân</button>
        <p>ID: {{Auth::user()->id}}</p>
        <p>Họ tên: {{Auth::user()->name}}</p>
        <p>Số điện thoại: {{Auth::user()->phones}}</p>
        <p>Ngày sinh: {{ date('d/m/Y', strtotime(Auth::user()->date_of_births))}}</p>
        <p>Giới tính: {{Auth::user()->genders}}</p>
        <p>Địa chỉ: {{Auth::user()->address}}</p>
    </div>
@endsection
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</html>
