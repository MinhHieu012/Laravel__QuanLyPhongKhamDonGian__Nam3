<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin</title>
    <!-- DataTable -->
    <link rel="stylesheet" type="text/css"
          href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.1.3/css/bootstrap.min.css"/>
    <link rel="stylesheet" type="text/css"
          href="https://cdn.datatables.net/v/bs5/jq-3.6.0/dt-1.13.1/datatables.min.css"/>
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
@extends('admin-layout.menu.menu')
@section('content2')
    <div>
        <h2 style="position: relative; right: -270px; top: 15px">Lịch hẹn đã thanh toán</h2>

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

        <button type="button" style="position: relative; right: -270px; top: 40px" class="btn btn-primary">Lịch hẹn đã
            thanh toán
        </button>
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
                    <th>Ngày thanh toán</th>
                    <th>Thao tác</th>
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
                        <td>{{ date('d/m/Y, H:i', strtotime($lich_da_thanh_toan->created_at)) }}</td>
                        <td>{{ date('d/m/Y, H:i', strtotime($lich_da_thanh_toan->updated_at)) }}</td>
                        <td>
                            <form action="{{ url('/admin/quanlylichhen/unpaid/'. $lich_da_thanh_toan->id) }}"
                                  method="POST">
                                @csrf
                                <button type="submit" onclick="return confirm('Lịch hẹn này chưa thanh toán?')"
                                        class="btn btn-outline-warning">Chưa thanh toán
                                </button>
                            </form>
                        </td>
                    </tr>
                @empty
                @endforelse
                </tbody>
            </table>
        </div>
    </div>
    </div>
    </div>
@endsection
</body>
<!-- DataTable -->
<script type="text/javascript"
        src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.1.3/js/bootstrap.bundle.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/v/bs5/jq-3.6.0/dt-1.13.1/datatables.min.js"></script>
<script>
    $(document).ready(function () {
        $.fn.dataTableExt.sErrMode = 'throw';
        $('#lich_da_thanh_toan').DataTable({
            language: {
                search: "Tìm kiếm",
                lengthMenu: "Hiển thị 1 trang _MENU_ cột",
                info: "Bản ghi từ _START_ đến _END_ Tổng cộng _TOTAL_",
                infoEmpty: "0 bản ghi trong 0 tổng cộng 0",
                zeroRecords: "Không có lịch hoặc dữ liệu bạn tìm kiếm",
                emptyTable: "Chưa có lịch hẹn nào được thanh toán",
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

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>

</html>
