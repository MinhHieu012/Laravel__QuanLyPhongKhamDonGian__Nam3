<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đổi mật khẩu</title>

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

    .a1 {
        position: relative;
        top: 50px;
        left: 270px;
        width: 500px;
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
        <h2 style="position: relative; right: -270px; top: 15px">Đổi mật khẩu</h2>
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
        <form action="{{ URL::asset('admin/changepassword') }}" class="a1" method="POST">
            <div class="mb-3">
                <label for="exampleInputPassword1" style="font-size: 20px" class="form-label">Tên đăng nhập</label>
                <input type="text" class="form-control" value="{{Auth::user()->username}}" disabled>
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" style="font-size: 20px" class="form-label">Mật khẩu mới</label>
                <input type="password" class="form-control" id="password" name="password"
                       placeholder="Nhập mật khẩu mới" required>
                @error('password')
                <p style="color: red; font-size: 17px; margin-top: 10px; font-weight: 500">Mật khẩu phải có 10 kí tự bao
                    gồm ít nhất:
                <li style="color: red; font-size: 17px; margin-top: 10px; font-weight: 500">1 chữ thường</li>
                <li style="color: red; font-size: 17px; margin-top: 10px; font-weight: 500">1 chữ in hoa</li>
                <li style="color: red; font-size: 17px; margin-top: 10px; font-weight: 500">Số 0-9</li>
                <li style="color: red; font-size: 17px; margin-top: 10px; font-weight: 500">Kí tự đặc biệt (@, !, ...)
                </li>
                </p>
                @enderror
            </div>

            <div class="mb-3">
                <label for="exampleInputPassword1" style="font-size: 20px" class="form-label">Xác nhận mật khẩu</label>
                <input type="password" class="form-control" id="confirm_password" name="confirm_password"
                       placeholder="Nhập lại mật khẩu mới" required>
                @error('confirm_password')
                <p style="color: red; font-size: 17px; margin-top: 10px; font-weight: 500">Mật khẩu xác nhận phải trùng
                    khớp với mật khẩu ở trên!</p>
                @enderror
            </div>

            <button type="submit" onclick="confirm('Bạn hãy chắc chắn muốn đổi mật khẩu?')" class=" btn btn-success"
                    id="changepassword" name="changepassword">Đổi mật khẩu
            </button>
        </form>
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
