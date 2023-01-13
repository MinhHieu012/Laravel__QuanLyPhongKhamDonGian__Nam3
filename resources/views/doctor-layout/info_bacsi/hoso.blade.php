<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hồ sơ</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<style>
    #p1 {
        position: relative;
        right: -270px;
        top: 65px;
        font-size: 18px;
    }
</style>
<body>
@extends('doctor-layout.menu.DoctorMenu.AdminLTE.menu')
@section('content2')
    <div>
        <h2 style="position: relative; right: -270px; top: 15px">Thông tin cá nhân</h2>
        @if (session('editDone'))
            <script>
                window.onload = function () {
                    // Display the message box
                    Swal.fire({
                        text: "{{ session('editDone') }}",
                        textColor: 'black',
                        icon: 'success',
                        confirmButtonText: 'OK',
                    })
                }
            </script>
        @endif
        <button type="button" style="position: relative; right: -270px; top: 40px; font-size: 18px"
                class="btn btn-primary">Thông tin cá nhân
        </button>

        <p id="p1">ID: {{ Auth::user()->id }}</p>
        <p id="p1">Họ tên: {{Auth::user()->name}}</p>
        <p id="p1">Số điện thoại: {{ $accounts_details ? $accounts_details->phones : '' }}</p>
        <p id="p1">Ngày sinh: {{ $accounts_details ? date('d/m/Y', strtotime( $accounts_details->date_of_births )) : '' }}</p>
        <p id="p1">Giới tính: {{ $accounts_details ? $accounts_details->genders : '' }}</p>
        <p id="p1">Địa chỉ: {{ $accounts_details ? $accounts_details->address : '' }}</p>
        <p id="p1">Lĩnh vực, ngành khám: {{ Auth::user()->specialty }}</p>


        <form id="p1" action="{{ url('/doctor/hoso/edit') }}" method="GET">
            <button type="submit" class="btn btn-success">Sửa thông tin</button>
        </form>
    </div>
@endsection
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
        crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
</html>
