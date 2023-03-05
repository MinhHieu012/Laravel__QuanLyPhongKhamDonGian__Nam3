<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lịch hẹn</title>

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
@extends('doctor-layout.menu.DoctorMenu.AdminLTE.menu')
@section('content2')
    <div>
        <h2 style="position: relative; right: -270px; top: 15px">Lịch hẹn đã khám</h2>
        <button type="button" style="position: relative; right: -270px; top: 60px" class="btn btn-primary">Lịch hẹn đã
            khám
        </button>
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

        <div class="table1">
            @if(count($appointments) > 0)
            @foreach ($appointments as $date => $appointmentsForDate)
                <table id="{{ $date }}" class="table table-bordered border-dark" style="width: 100%">
                    <br>
                    <h4>Lịch hẹn đã khám xong ngày {{ $date }}</h4>
                    <!-- tiêu đề bảng -->
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>Họ tên</th>
                        <th>Số điện thoại</th>
                        {{--<th>Ngày hẹn</th>--}}
                        <th>Thời gian hẹn</th>
                        <th>Gói khám</th>
                        <th>Phòng khám</th>
                        <th>Ngày khám xong</th>
                    </tr>
                    </thead>
                    <!-- thân bảng -->
                    <tbody>
                    @forelse($appointmentsForDate as $appointment)
                        <tr>
                            <td>{{ $appointment->id }}</td>
                            <td>{{ $appointment->names }}</td>
                            <td>{{ $appointment->phones }}</td>
                            <td>{{ $appointment->appointment_times->times}}</td>
                            <td>{{ $appointment->health_checkup_packages->names . ' - ' . $appointment->health_checkup_packages->prices }}</td>
                            <td>{{ $appointment->rooms->rooms }}</td>
                            <td>{{ date('d/m/Y, H:i:s', strtotime($appointment->updated_at)) }}</td>

                            {{--<td>
                                <form action="{{ url('/doctor/lichhen/backdangkham/'. $appointment->id) }}" method="POST">
                                    @csrf
                                    <button type="submit" onclick="return confirm('Lịch hẹn này chưa khám xong?')"
                                            class="btn btn-outline-warning">Chưa khám xong
                                    </button>
                                </form>
                            </td>--}}
                        </tr>
                    @empty
                        <tr>
                            <td colspan="12">Không có lịch hẹn nào</td>
                        </tr>
                    @endforelse
                    <script>
                        $(document).ready(function () {
                            $.fn.dataTableExt.sErrMode = 'throw';
                            $('#{{ $date }}').DataTable({
                                language: {
                                    search: "Tìm kiếm",
                                    lengthMenu: "Hiển thị 1 trang _MENU_ cột",
                                    info: "Bản ghi từ _START_ đến _END_ Tổng cộng _TOTAL_",
                                    infoEmpty: "0 bản ghi trong 0 tổng cộng 0",
                                    zeroRecords: "Không có lịch hoặc dữ liệu bạn tìm kiếm",
                                    emptyTable: "Chưa có lịch hẹn được xác nhận",
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
                    @endforeach
                    </tbody>
                </table>
        </div>

        @else
            <h4 style="margin-top: 10px">Không có lịch hẹn nào đã khám xong</h4>
        @endif

    </div>

</body>
<!-- DataTable -->
<script type="text/javascript"
        src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.1.3/js/bootstrap.bundle.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/v/bs5/jq-3.6.0/dt-1.13.1/datatables.min.js"></script>

<script>
    $(document).ready(function () {
        $.fn.dataTableExt.sErrMode = 'throw';
        $('#lich-hen-da-kham').DataTable({
            language: {
                search: "Tìm kiếm",
                lengthMenu: "Hiển thị 1 trang _MENU_ cột",
                info: "Bản ghi từ _START_ đến _END_ Tổng cộng _TOTAL_",
                infoEmpty: "0 bản ghi trong 0 tổng cộng 0",
                zeroRecords: "Không có lịch hoặc dữ liệu bạn tìm kiếm",
                emptyTable: "Chưa có lịch hẹn nào đã khám xong",
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
