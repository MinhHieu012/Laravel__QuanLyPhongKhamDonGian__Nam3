<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sửa thông tin gói khám</title>
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
        <h2 style="position: relative; right: -270px; top: 15px">Sửa thông tin gói khám</h2>
        <button type="button" style="position: relative; right: -270px; top: 40px" class="btn btn-primary"
                onclick="window.location.href='{{URL::asset('admin/quanlygoikham/')}}';">Quay lại
        </button>

        <form method="POST" class="a2">
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Loại gói khám</label>
                <input type="text" class="form-control" id="type" name="type" aria-describedby="emailHelp"
                       placeholder="Nhập loại gói khám" value="{{$goikham->types}}" required>
                <div class="text">
                </div>
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Tên gói khám</label>
                <input type="text" class="form-control" id="name" name="name"
                       placeholder="Nhập tên gói khám" value="{{$goikham->names}}" required>
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Giá gói khám</label>
                <input type="text" class="form-control" id="price" name="price" placeholder="Nhập giá gói khám"
                       value="{{$goikham->prices}}" required>
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Mô tả gói khám</label>
                <textarea type="text" class="form-control" id="description" name="description" placeholder="Nhập mô tả gói khám" required></textarea>
            </div>
            <button type="submit" class=" btn btn-success" name="edit" id="edit"><i class="fa-solid fa-user-pen"></i>Sửa
            </button>
        </form>
    </div>

</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
        crossorigin="anonymous"></script>
@endsection
</html>

