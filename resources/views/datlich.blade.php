@extends('footer')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đặt lịch</title>
    <link href="{{ URL::asset('css/datlich.css') }}" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <!-- DataTable -->
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.1.3/css/bootstrap.min.css"/>
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs5/jq-3.6.0/dt-1.13.1/datatables.min.css"/>

    <style>
        table {
            font-family: arial, sans-serif;
            border-collapse: collapse;
        }

        .table1 {
            position: relative;
            top: 100px;
            width: 1250px;
            margin-left: auto;
            margin-right: auto;
            color: black;
        }

        td, th {
            border: 1px solid #dddddd;
            text-align: left;
            padding: 8px;
        }

        tr:nth-child(even) {
            background-color: #dddddd;
        }

        h2 {
            position: relative;
            top: 70px;
            display: flex;
            justify-content: center;

        }
    </style>
<body>
@extends('menu')
@section('content')

    <!-- Form đặt lịch -->
    <div class="background-form">
        <div class="form-datlich">
            <span class="title"><u>Thông tin đặt lịch</u></span>
            <br>
            <form action="{{ URL::asset('/datlich') }}" id="myForm" method="POST">
            <label>Họ và tên</label>
            <input type="text" id="name" name="name" placeholder="Nhập họ và tên" value="{{Auth::user()->name}}" required>
            <br>
            <label>Số điện thoại</label>
            <input type="number" id="phone" name="phone" placeholder="Nhập số điện thoại" value="{{Auth::user()->phones}}" required>
            <br>
            <label>Ngày hẹn</label>
            <input type="date" id="date" name="date" required>
            <br>
                <label for="cars">Thời gian hẹn</label>
                <select style="position: relative; top:20px;" name="time" id="time">
                    <optgroup label="Sáng">
                        <option value="Sáng 8:00 giờ - 9:00 giờ">Sáng 08:00 giờ đến 09:00 giờ</option>
                        <option value="Sáng 9:00 giờ đến 10:00 giờ">Sáng 09:00 giờ đến 10:00 giờ</option>
                        <option value="Sáng 10:00 giờ đến 11:00 giờ">Sáng 10:00 giờ đến 11:00 giờ</option>
                    </optgroup>
                    <optgroup label="Chiều">
                        <option value="Chiều 01:00 giờ đến 02:00 giờ">Chiều 01:00 giờ đến 02:00 giờ</option>
                        <option value="Chiều 02:00 giờ đến 03:00 giờ">Chiều 02:00 giờ đến 03:00 giờ</option>
                        <option value="Chiều 03:00 giờ đến 04:00 giờ">Chiều 03:00 giờ đến 04:00 giờ</option>
                        <option value="Chiều 04:00 giờ đến 05:00 giờ">Chiều 04:00 giờ đến 05:00 giờ</option>
                        <option value="Chiều 05:00 giờ đến 06:00 giờ">Chiều 05:00 giờ đến 06:00 giờ</option>
                    </optgroup>
                </select>
            <br>
            <label for="cars">Gói giá</label>
            <select style="position: relative; top:20px;" name="price" id="price">
                <option value="Gói 100.000đ">Gói 100.000đ</option>
                <option value="Gói 200.000đ">Gói 200.000đ</option>
                <option value="Gói 250.000đ">Gói 250.000đ</option>
            </select>
            <br> <br>
            <span style="position: relative; right: 17px; text-decoration: none;">Xem thông tin chuyển khoản tại <a href="{{URL::asset('/lienhe')}}">trang Liên Hệ</a> nếu thanh toán online</span>
            <br> <br>
                {{--<button class="btn-add" id="addConfirm" onclick="return confirm('Bạn hãy chắc chắn thông tin dưới đây là chính xác?')" type="submit">Thêm</button>--}}
                <button class="btn-add" id="addConfirm" onclick="confirm('Bạn hãy chắc chắn thông tin dưới đây là chính xác?')" type="submit">Đặt lịch</button>
            </form>
            <img class="img" src="{{URL::asset('image/banner2.jpg')}}" style="position: relative; top: -470px;" alt="banner">
        </div>
    </div>

    <!-- Bảng lịch hẹn đã đặt -->
    <h2 style="font-size: 45px">Lịch đã hẹn</h2>

    <div class="table1">
    <table id="lich_da_hen" class="table table-bordered border-dark" style="width: 100%">
        <!-- tiêu đề bảng -->
        @if (session('done'))
            <script>
                window.onload = function() {
                    // Display the message box
                    Swal.fire({
                        text: "{{ session('done') }}",
                        textColor: 'black',
                        icon: 'success',
                        confirmButtonText: 'OK',
                    })
                }
            </script>
        @endif

        @if (session('deleteDone'))
            <script>
                window.onload = function() {
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
                window.onload = function() {
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

        @if (session('errorDatLich'))
            <script>
                window.onload = function() {
                    // Display the message box
                    Swal.fire({
                        text: "{{ session('errorDatLich') }}",
                        textColor: 'black',
                        icon: 'error',
                        confirmButtonText: 'OK',
                    })
                }
            </script>
        @endif

        @if (session('form_expired'))
            <script>
                window.onload = function() {
                    // Display the message box
                    Swal.fire({
                        text: "{{ session('form_expired') }}",
                        textColor: 'black',
                        icon: 'error',
                        confirmButtonText: 'OK',
                    })
                }
            </script>
        @endif

        @if (session('checkLogin'))
            <script>
                window.onload = function() {
                    // Display the message box
                    Swal.fire({
                        text: "{{ session('checkLogin') }}",
                        textColor: 'black',
                        icon: 'error',
                        confirmButtonText: 'OK',
                    })
                }
            </script>
        @endif
        <thead>
            <tr>
                <th>Họ tên</th>
                <th>Số điện thoại</th>
                <th>Ngày hẹn</th>
                <th>Thời gian hẹn</th>
                <th>Ngày giờ đặt lịch</th>
                <th>Gói giá</th>
                <th>Thao tác</th>
                <th>Thao tác</th>
            </tr>
        </thead>
        <!-- thân bảng -->
        @forelse($datlichs as $datlich)
        <tbody>
            <tr>
                <td>{{ $datlich->names }}</td>
                <td>{{ $datlich->phones }}</td>
                <td>{{ date('d/m/Y', strtotime($datlich->dates)) }}</td>
                <td>{{ $datlich->times }}</td>
                <td>{{ date('d/m/Y, H:i:s', strtotime($datlich->created_at)) }}</td>
                <td>{{ $datlich->prices }}</td>
                <td>
                    <form action="{{ url('/datlich/edit/' . $datlich->id)}}" method="GET">
                        <button type="submit" class="btn btn-warning">Sửa lịch hẹn</button>
                    </form>
                </td>
                <td>
                    <form action="{{ url('/datlich/delete/'. $datlich->id)}}" method="POST">
                        <button type="submit" onclick="return confirm('Bạn có chắc chắn muốn hủy lich hẹn (Nếu lịch hẹn đã đặt quá 5p ko thể hủy! Hãy liên hệ qua FB)?')" class="btn btn-danger">Hủy lịch hẹn</button>
                    </form>
                </td>
            </tr>
        @empty
        @endforelse
        </tbody>
    </table>
    </div>
@endsection
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
<!-- DataTable -->
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.1.3/js/bootstrap.bundle.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/v/bs5/jq-3.6.0/dt-1.13.1/datatables.min.js"></script>

<script>
    $(document).ready(function () {
        $.fn.dataTableExt.sErrMode = 'throw';
        $('#lich_da_hen').DataTable({
            language: {
                search: "Tìm kiếm",
                lengthMenu: "Hiển thị 1 trang _MENU_ cột",
                info: "Bản ghi từ _START_ đến _END_ Tổng cộng _TOTAL_",
                infoEmpty: "0 bản ghi trong 0 tổng cộng 0",
                zeroRecords: "Không có lịch hoặc dữ liệu bạn tìm kiếm",
                emptyTable: "Chưa có lịch hẹn nào được đặt",
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

<!-- Messenger Plugin chat Code -->
<div id="fb-root"></div>

<!-- Your Plugin chat code -->
<div id="fb-customer-chat" class="fb-customerchat">
</div>

<script>
    var chatbox = document.getElementById('fb-customer-chat');
    chatbox.setAttribute("page_id", "113797844541227");
    chatbox.setAttribute("attribution", "biz_inbox");
</script>

<!-- Your SDK code -->
<script>
    window.fbAsyncInit = function() {
        FB.init({
            xfbml            : true,
            version          : 'v15.0'
        });
    };

    (function(d, s, id) {
        var js, fjs = d.getElementsByTagName(s)[0];
        if (d.getElementById(id)) return;
        js = d.createElement(s); js.id = id;
        js.src = 'https://connect.facebook.net/vi_VN/sdk/xfbml.customerchat.js';
        fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));

    // Ko cho ng dùng chọn ngày trong quá khứ
    window.onload = function() {
        const dateInput = document.getElementById('date');
        const currentDate = new Date().toISOString().split('T')[0];
        dateInput.min = currentDate;
    }
</script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
</html>


