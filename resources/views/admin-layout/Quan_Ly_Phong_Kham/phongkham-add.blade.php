<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thông tin phòng khám</title>

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
        <h2 style="position: relative; right: -270px; top: 15px">Thêm phòng khám</h2>
        <button type="button" style="position: relative; right: -270px; top: 40px" class="btn btn-primary"
                onclick="window.location.href='{{URL::asset('admin/thongtinphongkham')}}';">Quay lại
        </button>

        <form action="{{ URL::asset('admin/thongtinphongkham/add') }}" class="a1" method="POST">
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Loại phòng</label>
                <input type="text" class="form-control" id="type" name="type" aria-describedby="emailHelp"
                       placeholder="Nhập loại phòng khám" required>
                <div class="text">
                </div>
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Tên phòng</label>
                <input type="text" class="form-control" id="room" name="room"
                       placeholder="Nhập tên phòng khám" required>
            </div>

            <button type="submit" class=" btn btn-success" id="add" name="add">Thêm phòng khám</button>
        </form>
    </div>

</body>
<!-- DataTable -->
<script type="text/javascript"
        src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.1.3/js/bootstrap.bundle.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/v/bs5/jq-3.6.0/dt-1.13.1/datatables.min.js"></script>
@endsection
</html>
