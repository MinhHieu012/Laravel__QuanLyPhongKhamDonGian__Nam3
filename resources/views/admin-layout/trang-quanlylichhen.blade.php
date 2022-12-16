<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quản lý lịch hẹn</title>

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
        <h2 style="position: relative; right: -270px; top: 15px">Lịch hẹn</h2>
        <br>
        @if(session()->has('deleteDone'))
            <div class="alert alert-success" style="position: relative; right: -270px; top: 15px;color: #41BC66; font-size: 18px; font-weight: 500; text-align: left; width: max-content">
                {{ session()->get('deleteDone') }}
            </div>
        @endif

        @if(session()->has('editDone'))
            <div class="alert alert-success" style="position: relative; right: -270px; top: 15px;color: #41BC66; font-size: 18px; font-weight: 500; text-align: left; width: max-content">
                {{ session()->get('editDone') }}
            </div>
        @endif

        <button type="button" style="position: relative; right: -270px; top: 40px" class="btn btn-primary">Lịch đã hẹn</button>

        <div class="table1">
            <table id="lich-da-hen" class="table table-bordered border-dark" style="width: 100%">
                <!-- tiêu đề bảng -->
                <thead>
                <tr>
                    <th>Họ tên</th>
                    <th>Số điện thoại</th>
                    <th>Ngày hẹn</th>
                    <th>Thời gian hẹn</th>
                    <th>Gói giá</th>
                    <th>Thao tác</th>
                </tr>
                </thead>
                <!-- thân bảng -->
                <tbody>
                @forelse($appointment_schedule as $appointment_schedule)
                <tr>
                    <td>{{ $appointment_schedule->names }}</td>
                    <td>{{ $appointment_schedule->phones }}</td>
                    <td>{{ date('d/m/Y', strtotime($appointment_schedule->dates)) }}</td>
                    <td>{{ $appointment_schedule->times }}</td>
                    <td>{{ $appointment_schedule->prices }}</td>
                    <td>
                        <button type="button" class="btn btn-primary">Đã thanh toán</button>
                        <button form="editForm" type="button" onclick="location.href='{{ route('admin.editLichHen',$appointment_schedule->id) }}';" class="btn btn-warning";>Sửa</button>
                        <button form="deleteForm" type="submit" onclick="return confirm('Bạn có chắc chắn muốn xóa?')" class="btn btn-danger">Xóa</button>
                    </td>
                </tr>
                @empty
                    <tr>
                        <td>Chưa có lịch hẹn</td>
                    </tr>
                @endforelse
                </tbody>
            </table>
            <form id="deleteForm" action="{{ route('admin.deleteLichHen',$appointment_schedule->id) }}" method="GET"></form>
        </div>
    </div>
@endsection
</body>
<!-- DataTable -->
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.1.3/js/bootstrap.bundle.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/v/bs5/jq-3.6.0/dt-1.13.1/datatables.min.js"></script>

<script>
    $(document).ready(function () {
        $('#lich-da-hen').DataTable();
    });
</script>
</html>
