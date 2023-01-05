@extends('customer-layout.Footer.footer')
    <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Giới thiệu</title>

    <!-- DataTable -->
    <link rel="stylesheet" type="text/css"
          href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.1.3/css/bootstrap.min.css"/>
    <link rel="stylesheet" type="text/css"
          href="https://cdn.datatables.net/v/bs5/jq-3.6.0/dt-1.13.1/datatables.min.css"/>
</head>
<style>
    .row .col {
        position: relative;
        top: 100px;
    }
</style>
<body>
@extends('customer-layout.Menu.menu')
@section('content')
    <div class="container">
        <div class="row">
            <h3 style="margin-top: 40px">Các loại gói khám</h3>
            <div class="table1" style="margin-top: 20px">
                <table id="hosobacsi" class="table table-bordered border-dark" style="width: 100%">
                    <!-- tiêu đề bảng -->
                    <thead>
                    <tr>
                        <th>Loại khám</th>
                        <th>Tên gói khám</th>
                        <th>Giá</th>
                        <th>Mô tả</th>
                    </tr>
                    </thead>
                    <!-- thân bảng -->
                    <tbody>
                    @forelse($goikham as $goikham)
                        <tr>
                            <td>{{ $goikham->types }}</td>
                            <td>{{ $goikham->names }}</td>
                            <td>{{ $goikham->prices }}</td>
                            <td>{{ $goikham->descriptions }}</td>
                        </tr>
                    @empty
                    @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
</body>
<!-- DataTable -->
<script type="text/javascript"
        src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.1.3/js/bootstrap.bundle.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/v/bs5/jq-3.6.0/dt-1.13.1/datatables.min.js"></script>
<!-- Messenger Plugin chat Code -->
<div id="fb-root"></div>

<!-- Your Plugin chat code -->
<div id="fb-customer-chat" class="fb-customerchat">
</div>

@if (session('checkLogin'))
    <script>
        window.onload = function () {
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

<script>
    var chatbox = document.getElementById('fb-customer-chat');
    chatbox.setAttribute("page_id", "113797844541227");
    chatbox.setAttribute("attribution", "biz_inbox");
</script>

<!-- Your SDK code -->
<script>
    window.fbAsyncInit = function () {
        FB.init({
            xfbml: true,
            version: 'v15.0'
        });
    };

    (function (d, s, id) {
        var js, fjs = d.getElementsByTagName(s)[0];
        if (d.getElementById(id)) return;
        js = d.createElement(s);
        js.id = id;
        js.src = 'https://connect.facebook.net/vi_VN/sdk/xfbml.customerchat.js';
        fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));
</script>

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
                emptyTable: "Chưa có gói khám nào",
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



