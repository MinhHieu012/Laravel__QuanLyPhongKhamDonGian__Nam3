<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="{{ URL::asset('css/trangchu.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css"/>
    <title>Trang Chủ</title>
</head>
<body>
@section('Footer')
    <div class="footer">
        <div class="container text-center text-md-start mt-5">
            <!-- Grid row -->
            <div class="row mt-3">
                <!-- Grid column -->
                <div class="col-md-3 col-lg-4 col-xl-3 mx-auto mb-4">
                    <!-- Content -->
                    <h4 class="text-uppercase fw-bold mb-4">
                        Tư vấn sức khỏe HealthCare
                    </h4>
                    <p>Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas.</p>
                </div>

                <!-- Grid column -->
                <div class="col-md-2 col-lg-2 col-xl-2 mx-auto mb-4">
                    <!-- Links -->
                    <h6 class="text-uppercase fw-bold mb-4">
                        Chính Sách
                    </h6>
                    <p>
                        <a href="#!" class="text-reset">Chính sách</a>
                    </p>
                    <p>
                        <a href="#!" class="text-reset">Dịch vụ</a>
                    </p>
                    <p>
                        <a href="#!" class="text-reset">Tư vấn</a>
                    </p>
                    <p>
                        <a href="#!" class="text-reset">Chăm sóc khách hàng</a>
                    </p>
                </div>

                <!-- Grid column -->
                <div class="col-md-3 col-lg-2 col-xl-2 mx-auto mb-4">
                    <!-- Links -->
                    <h6 class="text-uppercase fw-bold mb-4">
                        Đối Tác
                    </h6>
                    <p>
                        <a href="#!" class="text-reset">Đối tác</a>
                    </p>
                    <p>
                        <a href="#!" class="text-reset">Đối tác khách hàng</a>
                    </p>
                    <p>
                        <a href="#!" class="text-reset">Đối tác liên kết</a>
                    </p>
                    <p>
                        <a href="#!" class="text-reset">Maketing</a>
                    </p>
                </div>

            </div>
        </div>
    </div>
@show
@yield('content1')
</body>
</html>
