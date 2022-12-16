<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lịch hẹn</title>

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
@extends('doctor-layout/menu-doctor')
@section('content2')
    <div>
        <h2 style="position: relative; right: -270px; top: 15px">Lịch hẹn</h2>
        <button type="button" style="position: relative; right: -270px; top: 40px" class="btn btn-primary">Lịch hẹn đã khám</button>

        <div class="table1">
            <table id="lich-hen-da-kham" class="table table-bordered border-dark" style="width: 100%">
                <!-- tiêu đề bảng -->
                <thead>
                <tr>
                    <th>Họ tên</th>
                    <th>Số điện thoại</th>
                    <th>Ngày hẹn</th>
                    <th>Thời gian hẹn</th>
                    <th>Gói giá</th>
                </tr>
                </thead>
                <!-- thân bảng -->
                <tbody>
                @forelse($datlich as $datlich)
                    <tr>
                        <td>{{ $datlich->names }}</td>
                        <td>{{ $datlich->phones }}</td>
                        <td>{{ date('d/m/Y', strtotime($datlich->dates)) }}</td>
                        <td>{{ $datlich->times }}</td>
                        <td>{{ $datlich->prices }}</td>
                    </tr>
                </tbody>
                @empty
                    <tr>
                        <td>Chưa có lịch hẹn</td>
                    </tr>
                    @endforelse
                </tbody>
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
        $('#lich-hen-da-kham').DataTable();
    });
</script>
</html>
