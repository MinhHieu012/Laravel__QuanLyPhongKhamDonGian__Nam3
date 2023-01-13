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

        .a1 {
            position: relative;
            top: 60px;
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
@extends('doctor-layout.menu.DoctorMenu.AdminLTE.menu')
@section('content2')
    <div>
        <h2 style="position: relative; right: -270px; top: 15px">Sửa thông tin</h2>
        <button class="btn btn-primary" style="position: relative; right: -270px; top: 35px" onclick="window.location.href='{{URL::asset('/doctor/hoso')}}';">Quay lại</button>
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
        <form action="{{ URL::asset('doctor/hoso/edit') }}" class="a1" method="POST">
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">ID</label>
                <input type="text" class="form-control" value="{{Auth::user()->id}}" disabled>
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Số điện thoại</label>
                <input type="phone" class="form-control" id="phone" name="phone"
                       placeholder="Nhập số điện thoại của bác sĩ" required>
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Ngày sinh</label>
                <input type="date" class="form-control" id="date_of_birth" name="date_of_birth" required>
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Giới tính</label> <br>
                <select style="width: 500px; height: 38px; padding-left: 10px" name="gender" id="gender" required>
                    <option value="Nam">Nam</option>
                    <option value="Nữ">Nữ</option>
                    <option value="Khác">Khác</option>
                </select>
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Địa chỉ</label>
                <input type="text" class="form-control" id="address" name="address"
                       placeholder="Nhập địa chỉ của bác sĩ" required>
            </div>

            <button type="submit" class=" btn btn-success" id="edit" name="edit">Cập nhật thông tin
            </button>
        </form>
    </div>


</body>
<!-- DataTable -->
<script type="text/javascript"
        src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.1.3/js/bootstrap.bundle.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/v/bs5/jq-3.6.0/dt-1.13.1/datatables.min.js"></script>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
@endsection
</html>
