<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sửa thông tin phòng khám</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<style>
    .a2 {
        font-family: arial, sans-serif;
        border-collapse: collapse;
    }

    .a2 {
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
        <h2 style="position: relative; right: -270px; top: 15px">Sửa thông tin phòng khám</h2>
        <button type="button" style="position: relative; right: -270px; top: 40px" class="btn btn-primary"
                onclick="window.location.href='{{URL::asset('admin/thongtinphongkham/')}}';">Quay lại
        </button>

        <form method="POST" class="a2">
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Loại phòng</label>
                <input type="text" class="form-control" id="type" name="type" aria-describedby="emailHelp"
                       value="{{$room->types}}" required>
                <div class="text">
                </div>
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Tên phòng</label>
                <input type="text" class="form-control" id="room" name="room"
                       value="{{$room->rooms}}" required>
            </div>

            <button type="submit" class=" btn btn-success" name="edit" id="edit"><i class="fa-solid fa-user-pen"></i>Sửa</button>
        </form>
    </div>

</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
        crossorigin="anonymous"></script>
@endsection
</html>

