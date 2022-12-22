<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quản lý bác sĩ</title>

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
        <h2 style="position: relative; right: -270px; top: 15px">Hồ sơ bác sĩ</h2>
        <br>
        @if(session()->has('success'))
            <div class="alert alert-success" style="position: relative; right: -270px; top: 15px;color: #41BC66; font-size: 18px; font-weight: 500; text-align: left; width: max-content">
                {{ session()->get('success') }}
            </div>
        @endif

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
        <button type="button" style="position: relative; right: -270px; top: 40px" class="btn btn-primary" onclick="window.location.href='{{URL::asset('admin/quanlybacsi/add')}}';">+ Thêm bác sĩ</button>

        <div class="table1">
            <table id="hosobacsi" class="table table-bordered border-dark" style="width: 100%">
                <!-- tiêu đề bảng -->
                <thead>
                <tr>
                    <th>ID</th>
                    <th>Tên đăng nhập</th>
                    <th>Mật khẩu</th>
                    <th>Họ tên</th>
                    <th>Số điện thoại</th>
                    <th>Ngày sinh</th>
                    <th>Giới tính</th>
                    <th>Địa chỉ</th>
                    <th>Ngày thêm</th>
                    <th>Thao tác</th>
                </tr>
                </thead>
                <!-- thân bảng -->
                <tbody>
                @forelse($bacsi as $bacsi)
                    <tr>
                        <td>{{ $bacsi->id }}</td>
                        <td>{{ $bacsi->username }}</td>
                        <td>.....</td>
                        <td>{{ $bacsi->name }}</td>
                        <td>{{ $bacsi->phones }}</td>
                        <td>{{ date('d/m/Y', strtotime($bacsi->date_of_births))}}</td>
                        <td>{{ $bacsi->genders }}</td>
                        <td>{{ $bacsi->address }}</td>
                        <td>{{ date('d/m/Y, H:i:s', strtotime($bacsi->created_at)) }}</td>
                        <td>
                            <button form="editForm" type="button" onclick="location.href='{{ route('doctor.edit', $bacsi->id) }}';" class="btn btn-warning";>Sửa</button>
                            <button form="deleteForm" type="submit" onclick="return confirm('Bạn có chắc chắn muốn xóa?')" class="btn btn-danger">Xóa</button>
                            <form id="deleteForm" action="{{ route('doctor.delete', $bacsi->id)}} }}" method="GET"></form>
                        </td>
                    </tr>
                    @empty
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
        $.fn.dataTableExt.sErrMode = 'throw';
        $('#hosobacsi').DataTable({
            language: {
                search: "Tìm kiếm",
                lengthMenu: "Hiển thị 1 trang _MENU_ cột",
                info: "Bản ghi từ _START_ đến _END_ Tổng cộng _TOTAL_",
                infoEmpty: "0 bản ghi trong 0 tổng cộng 0",
                zeroRecords: "Không có lịch hoặc dữ liệu bạn tìm kiếm",
                emptyTable: "Chưa có bác sĩ nào",
                paginate: {
                    first: "Trang đầu",
                    previous: "Trang trước",
                    next: "Trang sau",
                    last: "Trang cuối"
                },
            },
        });

    });
</script>
</html>
