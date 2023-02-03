<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quản lý bác sĩ</title>

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
@extends('admin-layout.menu.AdminMenu.AdminLTE.menu')
@section('content2')
    <div>
        <h2 style="position: relative; right: -270px; top: 15px">Thông tin các bác sĩ</h2>
        <br>
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

        @if (session('deleteDone'))
            <script>
                window.onload = function () {
                    // Display the message box
                    Swal.fire({
                        text: "{{ session('deleteDone') }}",
                        textColor: 'black',
                        icon: 'success',
                        confirmButtonText: 'OK',
                    })
                }
            </script>
        @endif

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

        @if (session('resetDone'))
            <script>
                window.onload = function () {
                    // Display the message box
                    Swal.fire({
                        text: "{{ session('resetDone') }}",
                        textColor: 'black',
                        icon: 'success',
                        confirmButtonText: 'OK',
                    })
                }
            </script>
        @endif

        <button type="button" style="position: relative; right: -270px; top: 40px" class="btn btn-primary"
                onclick="window.location.href='{{URL::asset('admin/quanlybacsi/add')}}';">+ Thêm bác sĩ
        </button>
        <br> <br>
        <button type="button" style="position: relative; right: -270px; top: 40px" class="btn btn-warning"
                onclick="window.location.href='{{URL::asset('/admin/quanlybacsi/lock')}}';">Xem các tài khoản bác sĩ bị
            khóa
        </button>
        <div class="table1">
            <table id="hosobacsi" class="table table-bordered border-dark" style="width: 100%">
                <!-- tiêu đề bảng -->
                <thead>
                <tr>
                    <th>ID</th>
                    <th>Họ tên</th>
                    <th>Số điện thoại</th>
                    <th>Ngày sinh</th>
                    <th>Lĩnh vực khám</th>
                    <th>Xóa</th>
                    <th>Reset mật khẩu</th>
                    <th>Khóa</th>
                </tr>
                </thead>
                <!-- thân bảng -->
                <tbody>
                @forelse($bacsi as $bacsi)
                    <tr>
                        <td>{{ $bacsi->id }}</td>
                        <td>{{ $bacsi->name }}</td>
                        <td>{{ $bacsi->phones }}</td>
                        <td>{{ date('d/m/Y', strtotime($bacsi->date_of_births))}}</td>
                        <td>{{ $bacsi->specialty }}</td>
                        {{--<td>
                            <form action="{{ url('admin/quanlybacsi/edit/' . $bacsi->id) }}"
                                  method="GET">
                                <button type="submit" class="btn btn-outline-warning">Sửa</button>
                            </form>
                        </td>--}}

                        <td>
                            <form action="{{ url('admin/quanlybacsi/delete/' . $bacsi->id) }}" method="GET">
                                <button type="submit" onclick="return confirm('Bạn có chắc chắn muốn xóa bác sĩ này?')"
                                        class="btn btn-outline-danger">Xóa
                                </button>
                            </form>
                        </td>

                        <td>
                            <form action="{{ url('/admin/quanlybacsi/resetpassword/' . $bacsi->id) }}" method="POST">
                                <button type="submit" class="btn btn-outline-warning" onclick="confirm('Bạn muốn reset mật khẩu tài khoản này?')">Reset</button>
                            </form>
                        </td>

                        <td>
                            <form action="{{ url('/admin/quanlybacsi/lock/' . $bacsi->id) }}" method="POST">
                                <button type="submit" class="btn btn-outline-danger" onclick="confirm('Bạn muốn khóa tài khoản này?')">Khóa tài khoản</button>
                            </form>
                        </td>
                    </tr>
                @empty
                @endforelse
                </tbody>
            </table>
        </div>
    </div>

</body>
<!-- DataTable -->
<script type="text/javascript"
        src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.1.3/js/bootstrap.bundle.min.js"></script>
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

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
@endsection
</html>
