@extends('customer-layout.Homepage.home')
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
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
