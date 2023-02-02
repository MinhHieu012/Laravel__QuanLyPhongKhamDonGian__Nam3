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

        #p1 {
            position: relative; right: -270px; top: 35px;
            font-size: 18px;
        }
    </style>
<body>
@extends('doctor-layout.menu.DoctorMenu.AdminLTE.menu')
@section('content2')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Thống kê</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{URL::asset('/')}}">Home</a></li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>

        <section class="content">
            <div class="container-fluid">
                <!-- Small boxes (Stat box) -->
                <div class="row">
                    <div class="col-lg-3 col-6">
                        <!-- small box -->
                        <div class="small-box bg-info">
                            <div class="inner">
                                @if($appointments_by_doctor == 0)
                                    <div>
                                        <h3>0</h3>
                                    </div>
                                @else
                                    @if($appointments_by_doctor < 10)
                                        <div>
                                            <h3>0{{ $appointments_by_doctor }} </h3>
                                        </div>
                                    @else
                                        <div>
                                            <h3>{{ $appointments_by_doctor }} </h3>
                                        </div>
                                    @endif
                                @endif

                                <h5>Lịch hẹn nhận được trong</h5>
                                <h5>Tháng {{ $current_month }}/{{ $current_year }}</h5>
                            </div>
                            <div class="icon">
                                <i class="ion ion-bag"></i>
                            </div>
                            <a href="{{URL::asset('/doctor/lichhenchuakham')}}" class="small-box-footer">Xem thêm <i class="fas fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                    <!-- ./col -->
                    <div class="col-lg-3 col-6">
                        <!-- small box -->
                        <div class="small-box bg-warning">
                            <div class="inner">
                                @if($appointments_un_examines == 0)
                                    <div>
                                        <h3>0</h3>
                                    </div>
                                @else
                                    @if($appointments_un_examines < 10)
                                        <div>
                                            <h3>0{{ $appointments_un_examines }} </h3>
                                        </div>
                                    @else
                                        <div>
                                            <h3>{{ $appointments_un_examines }} </h3>
                                        </div>
                                    @endif
                                @endif

                                <h5>Lịch hẹn chưa khám trong</h5>
                                <h5>Tháng {{ $current_month }}/{{ $current_year }}</h5>
                            </div>
                            <div class="icon">
                                <i class="ion ion-stats-bars"></i>
                            </div>
                            <a href="{{URL::asset('/doctor/lichhenchuakham')}}" class="small-box-footer">Chi tiết <i class="fas fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                    <!-- ./col -->
                    <div class="col-lg-3 col-6">
                        <!-- small box -->
                        <div class="small-box bg-primary">
                            <div class="inner">
                                @if($appointments_being_examines == 0)
                                    <div>
                                        <h3>0</h3>
                                    </div>
                                @else
                                    @if($appointments_being_examines < 10)
                                        <div>
                                            <h3>0{{ $appointments_being_examines }} </h3>
                                        </div>
                                    @else
                                        <div>
                                            <h3>{{ $appointments_being_examines }} </h3>
                                        </div>
                                    @endif
                                @endif

                                <h5>Lịch hẹn đang khám trong</h5>
                                <h5>Tháng {{ $current_month }}/{{ $current_year }}</h5>
                            </div>
                            <div class="icon">
                                <i class="ion ion-pie-graph"></i>
                            </div>
                            <a href="{{URL::asset('/doctor/lichhendangkham')}}" class="small-box-footer">Chi tiết <i class="fas fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                    <!-- ./col -->
                    <div class="col-lg-3 col-6">
                        <!-- small box -->
                        <div class="small-box bg-success">
                            <div class="inner">
                                @if($appointments_done_examines == 0)
                                    <div>
                                        <h3>0</h3>
                                    </div>
                                @else
                                    @if($appointments_done_examines < 10)
                                        <div>
                                            <h3>0{{ $appointments_done_examines }} </h3>
                                        </div>
                                    @else
                                        <div>
                                            <h3>{{ $appointments_done_examines }} </h3>
                                        </div>
                                    @endif
                                @endif

                                <h5>Lịch hẹn đã khám xong</h5>
                                <h5>Tháng {{ $current_month }}/{{ $current_year }}</h5>
                            </div>
                            <div class="icon">
                                <i class="ion ion-person-add"></i>
                            </div>
                            <a href="{{URL::asset('/doctor/lichhendakham')}}" class="small-box-footer">Chi tiết <i class="fas fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>

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
</body>
<!-- DataTable -->
<script type="text/javascript"
        src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.1.3/js/bootstrap.bundle.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/v/bs5/jq-3.6.0/dt-1.13.1/datatables.min.js"></script>

<script>
    $(document).ready(function () {
        $('#lich-hen-chua-kham').DataTable();
    });
</script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
@endsection
</html>
