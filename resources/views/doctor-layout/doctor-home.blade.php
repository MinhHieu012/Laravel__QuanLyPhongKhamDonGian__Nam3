<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Doctor</title>
    <!-- DataTable -->
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.1.3/css/bootstrap.min.css"/>
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs5/jq-3.6.0/dt-1.13.1/datatables.min.css"/>

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
@extends('doctor-layout/menu-doctor')
@section('content2')
    <div>
        <h2 style="position: relative; right: -270px; top: 15px">Dashboard</h2>
        <br>
        <div>
            <h3 style="position: relative; right: -270px; top: 35px">Thông tin cá nhân</h3>
            <button type="button" style="position: relative; right: -270px; top: 40px; font-size: 18px" class="btn btn-primary">Thông tin cá nhân</button>
            <p style="position: relative; right: -270px; top: 65px">Họ tên: {{Auth::user()->name}}</p>
            <p style="position: relative; right: -270px; top: 65px">Số điện thoại: {{Auth::user()->phones}}</p>
            <p style="position: relative; right: -270px; top: 65px">Ngày sinh: {{ date('d/m/Y', strtotime(Auth::user()->date_of_births))}}</p>
            <p style="position: relative; right: -270px; top: 65px">Giới tính: {{Auth::user()->genders}}</p>
            <p>Địa chỉ: {{Auth::user()->address}}</p>
        </div>

        <h3 style="position: relative; right: -270px; top: 35px">Lịch hẹn</h3>
        <button type="button" style="position: relative; right: -270px; top: 40px; font-size: 18px" class="btn btn-primary">Lịch hẹn</button>

        <div class="table1">
            <table id="lich-hen-chua-kham" class="table table-bordered border-dark" style="width: 100%">
                <!-- tiêu đề bảng -->
                <thead>
                <tr>
                    <th>ID</th>
                    <th>Họ tên</th>
                    <th>Số điện thoại</th>
                    <th>Ngày hẹn</th>
                    <th>Thời gian hẹn</th>
                    <th>Gói giá</th>
                    <th>Ngày đặt lịch</th>
                </tr>
                </thead>
                <!-- thân bảng -->
                <tbody>
                @forelse($datlich as $datlich)
                    <tr>
                        <td>{{ $datlich->id }}</td>
                        <td>{{ $datlich->names }}</td>
                        <td>{{ $datlich->phones }}</td>
                        <td>{{ date('d/m/Y', strtotime($datlich->dates)) }}</td>
                        <td>{{ $datlich->times }}</td>
                        <td>{{ $datlich->prices }}</td>
                        <td>{{ date('d/m/Y, H:i:s', strtotime($datlich->created_at)) }}</td>
                    </tr>
                </tbody>
                @empty
                    <tr>
                        <td>Chưa có lịch hẹn</td>
                    </tr>
                @endforelse
            </table>
        </div>
    </div>
@endsection
</body>
<!-- DataTable -->
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.1.3/js/bootstrap.bundle.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/v/bs5/jq-3.6.0/dt-1.13.1/datatables.min.js"></script>

<script>
    $(document).ready(function () {
        $('#lich-hen-chua-kham').DataTable();
    });
</script>
</html>
