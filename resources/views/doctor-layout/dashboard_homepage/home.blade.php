<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Doctor</title>
    <!-- DataTable -->
    <link rel="stylesheet" type="text/css"
          href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.1.3/css/bootstrap.min.css"/>
    <link rel="stylesheet" type="text/css"
          href="https://cdn.datatables.net/v/bs5/jq-3.6.0/dt-1.13.1/datatables.min.css"/>

    <style>
        table {
            font-family: arial, sans-serif;
            border-collapse: collapse;
        }

        .table1 {
            position: relative;
            top: 60px;
            left: 270px;
            width: 1400px;
        }

        td, th {
            border: 1px solid #dddddd;
            text-align: left;
            padding: 8px;
        }

        tr:nth-child(even) {
            background-color: #dddddd;
        }
    </style>
<body>
@extends('doctor-layout.menu.menu')
@section('content2')
    <div>
        <h2 style="position: relative; right: -270px; top: 15px">Dashboard</h2>
        <br>
        <div>
            <h3 style="position: relative; right: -270px; top: 35px;">Thông tin cá nhân</h3>
            <p style="position: relative; right: -270px; top: 45px; font-size: 18px">ID: {{Auth::user()->id}}</p>
            <p style="position: relative; right: -270px; top: 45px; font-size: 18px">Họ tên: {{Auth::user()->name}}</p>
            <p style="position: relative; right: -270px; top: 45px; font-size: 18px">Số điện
                thoại: {{Auth::user()->phones}}</p>
            <p style="position: relative; right: -270px; top: 45px; font-size: 18px">Ngày
                sinh: {{ date('d/m/Y', strtotime(Auth::user()->date_of_births))}}</p>
            <p style="position: relative; right: -270px; top: 45px; font-size: 18px">Giới
                tính: {{Auth::user()->genders}}</p>
            <p>Địa chỉ: {{Auth::user()->address}}</p>
        </div>
    </div>

    @if (session('success'))
        <script>
            window.onload = function () {
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
@endsection
</body>
<!-- DataTable -->
<script type="text/javascript"
        src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.1.3/js/bootstrap.bundle.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/v/bs5/jq-3.6.0/dt-1.13.1/datatables.min.js"></script>

<script>
    $(document).ready(function () {
        $('#lich-hen-chua-kham').DataTable();
    });
</script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
</html>
