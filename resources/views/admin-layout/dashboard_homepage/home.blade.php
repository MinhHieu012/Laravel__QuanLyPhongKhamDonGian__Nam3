<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body>
@extends('admin-layout.menu.AdminMenu.AdminLTE.menu')
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
                                @if($appointment_count == 0)
                                    <div>
                                        <h3>0</h3>
                                    </div>
                                @else
                                    @if($appointment_count < 10)
                                        <div>
                                            <h3>0{{ $appointment_count }} </h3>
                                        </div>
                                    @else
                                        <div>
                                            <h3>{{ $appointment_count }} </h3>
                                        </div>
                                    @endif
                                @endif

                                <h5>Lịch hẹn được đặt trong</h5>
                                <h5>Tháng {{ $current_month }}/{{ $current_year }}</h5>
                            </div>
                            <div class="icon">
                                <i class="ion ion-bag"></i>
                            </div>
                            <a href="{{URL::asset('/admin/lichhenchuaxacnhan')}}" class="small-box-footer">Xem thêm <i class="fas fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                    <!-- ./col -->
                    <div class="col-lg-3 col-6">
                        <!-- small box -->
                        <div class="small-box bg-success">
                            <div class="inner">
                                @if($paid_appointments == 0)
                                    <div>
                                        <h3>0</h3>
                                    </div>
                                @else
                                    @if($paid_appointments < 10)
                                        <div>
                                            <h3>0{{ $paid_appointments }} </h3>
                                        </div>
                                    @else
                                        <div>
                                            <h3>{{ $paid_appointments }} </h3>
                                        </div>
                                    @endif
                                @endif

                                <h5>Số đơn đã thanh toán trong</h5>
                                <h5>Tháng {{ $current_month }}/{{ $current_year }}</h5>
                            </div>
                            <div class="icon">
                                <i class="ion ion-stats-bars"></i>
                            </div>
                            <a href="{{URL::asset('/admin/lichhendathanhtoan')}}" class="small-box-footer">Chi tiết <i class="fas fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                    <!-- ./col -->
                    <div class="col-lg-3 col-6">
                        <!-- small box -->
                        <div class="small-box bg-warning">
                            <div class="inner">
                                @if($unpaid_appointments == 0)
                                    <div>
                                        <h3>0</h3>
                                    </div>
                                @else
                                    @if($unpaid_appointments < 10)
                                        <div>
                                            <h3>0{{ $unpaid_appointments }} </h3>
                                        </div>
                                    @else
                                        <div>
                                            <h3>{{ $unpaid_appointments }} </h3>
                                        </div>
                                    @endif
                                @endif

                                <h5>Lịch hẹn chưa thanh toán trong</h5>
                                <h5>Tháng {{ $current_month }}/{{ $current_year }}</h5>
                            </div>
                            <div class="icon">
                                <i class="ion ion-person-add"></i>
                            </div>
                            <a href="{{URL::asset('/admin/lichhenchuathanhtoan')}}" class="small-box-footer">Chi tiết <i class="fas fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                    <!-- ./col -->
                    <div class="col-lg-3 col-6">
                        <!-- small box -->
                        <div class="small-box bg-danger">
                            <div class="inner">
                                @if($cancelled_appointments == NULL)
                                    <div>
                                        <h3>0</h3>
                                    </div>
                                @else
                                    @if($cancelled_appointments < 10)
                                        <div>
                                            <h3>0{{ $cancelled_appointments }} </h3>
                                        </div>
                                    @else
                                        <div>
                                            <h3>{{ $cancelled_appointments }} </h3>
                                        </div>
                                    @endif
                                @endif

                                <h5>Lịch hẹn bị hủy trong</h5>
                                <h5>Tháng {{ $current_month }}/{{ $current_year }}</h5>
                            </div>
                            <div class="icon">
                                <i class="ion ion-pie-graph"></i>
                            </div>
                            <a href="#" class="small-box-footer">Chi tiết <i class="fas fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
        crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
</html>
