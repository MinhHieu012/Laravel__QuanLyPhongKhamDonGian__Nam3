<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin</title>
    <!-- DataTable -->
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.1.3/css/bootstrap.min.css"/>
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs5/jq-3.6.0/dt-1.13.1/datatables.min.css"/>
</head>
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
@extends('admin-layout/menuadmin')
@section('content2')
    <div>
        <h2 style="position: relative; right: -270px; top: 15px">Lịch hẹn đã thanh toán</h2>
        <button type="button" style="position: relative; right: -270px; top: 40px" class="btn btn-primary">Lịch hẹn đã thanh toán</button>

        <div class="table1">
            <table id="lich_da_thanh_toan" class="table table-bordered border-dark" style="width: 100%">
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
                    @forelse($lich_da_thanh_toan as $lich_da_thanh_toan)
                    <tr>
                        <td>{{ $lich_da_thanh_toan->id }}</td>
                        <td>{{ $lich_da_thanh_toan->names }}</td>
                        <td>{{ $lich_da_thanh_toan->phones }}</td>
                        <td>{{ date('d/m/Y', strtotime($lich_da_thanh_toan->dates)) }}</td>
                        <td>{{ $lich_da_thanh_toan->times }}</td>
                        <td>{{ $lich_da_thanh_toan->prices }}</td>
                        <td>{{ date('d/m/Y, H:i:s', strtotime($lich_da_thanh_toan->created_at)) }}</td>
                    </tr>
                    @empty
                        <tr>
                            <td>Chưa có lịch hẹn nào đã thanh toán</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
    </div>
@endsection
</body>
<!-- DataTable -->
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.1.3/js/bootstrap.bundle.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/v/bs5/jq-3.6.0/dt-1.13.1/datatables.min.js"></script>
<script>
    $(document).ready(function () {
        $('#lich_da_thanh_toan').DataTable();
    });
</script>
</html>
