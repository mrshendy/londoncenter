<!-- Title -->
<title> @yield('title') </title>
<!-- Favicon -->
<link rel="icon" href="{{ asset('assets/images/logo-sm.png') }}" type="image/x-icon" />
<link href="{{ asset('assets/css/select2.min.css') }}" rel="stylesheet" />
<link href="{{ asset('assets/css/dataTables.bootstrap5.min.css') }}" rel="stylesheet" />
<link href="{{ asset('assets/css/responsive.bootstrap.min.css') }}" rel="stylesheet" />
<link href="{{ asset('assets/css/buttons.dataTables.min.css') }}" rel="stylesheet" />
<link href="{{ asset('assets/libs/jsvectormap/css/jsvectormap.min.css') }}" rel="stylesheet" type="text/css" />
<!-- Layout config Js -->
    <!-- dropzone css -->
    <link rel="stylesheet" href="{{ asset('assets/libs/dropzone/dropzone.css') }}" type="text/css" />

   <!-- Filepond css -->
    <link rel="stylesheet" href="{{ asset('assets/libs/filepond/filepond.min.css') }}" type="text/css" />
    <link rel="stylesheet" href="{{ asset('assets/libs/filepond-plugin-image-preview/filepond-plugin-image-preview.min.css') }}">
<script src="{{ asset('assets/js/layout.js') }}"></script>

<!-- Bootstrap Css -->
<!-- Icons Css -->

<link href="{{ asset('assets/css/icons.min.css') }}" rel="stylesheet" />
<!-- App Css-->

 
@if (App::getlocale() == 'ar')
    <link href="{{ asset('assets/css/bootstrap-rtl.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/css/app-rtl.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/css/custom-rtl.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/css/book-rtl.css') }}" rel="stylesheet" />
@endif
@if (App::getlocale() == 'en')
    <link href="{{ asset('assets/css/bootstrap.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/css/app.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/css/custom.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/css/book.css') }}" rel="stylesheet" />
@endif
<!-- custom Css-->
<link href="{{ asset('assets/plugins/notify/css/notifIt.css') }}" rel="stylesheet" />
<meta name="csrf-token" content="{{ csrf_token() }}">

<!-- Sweet Alert css-->
<link href="{{ asset('assets/libs/sweetalert2/sweetalert2.min.css') }}" rel="stylesheet" type="text/css" />
<script src="{{ URL::asset('assets/images/icon/lordicon.js') }}"></script>
<script src="{{ URL::asset('assets/js/ckeditor.js') }}"></script>


@yield('css')
@if (session()->has('error_system'))
    <script>
        window.onload = function() {
            notif({
                msg: "<b>Oops!</b> An Error Occurred",
                type: "error"
            })
        }
    </script>
@endif
@if (session()->has('add'))
    <script>
        window.onload = function() {
            notif({
                msg: "Data has been added successfully",
                type: "success"
            })
        }
    </script>
@endif
@if (session()->has('edit_m'))
    <script>
        window.onload = function() {
            notif({
                msg: "The data has been updated successfully",
                type: "success"
            })
        }
    </script>
@endif
@if (session()->has('delete_m'))
    <script>
        window.onload = function() {
            notif({
                msg: "The data has been deleted successfully",
                type: "success"
            })
        }
    </script>
@endif
@if (session()->has('uploaded_m'))
    <script>
        window.onload = function() {
            notif({
                msg: "The data has been uploaded successfully",
                type: "success"
            })
        }
    </script>
@endif
@if (session()->has('warning_system'))
    <script>
        window.onload = function() {
            notif
                ({
                    type: "warning",
                    msg: "<b>Warning:</b> Something Went Wrong",
                })
        }
    </script>
@endif
@if (session()->has('already_exists'))
    <script>
        window.onload = function() {
            notif
                ({
                    type: "warning",
                    msg: "<b>Warning:</b> This data already exists",
                })
        }
    </script>
@endif
@if (session()->has('cancel_reservation'))
    <script>
        window.onload = function() {
            notif
                ({
                    msg: "{{ trans('message_trans.cancel_reservation') }}",
                    type: "success"
                })
        }
    </script>
@endif
@if (session()->has('cancel_invoices'))
    <script>
        window.onload = function() {
            notif
                ({
                    msg: "{{ trans('message_trans.cancel_invoices') }}",
                    type: "success"
                })
        }
    </script>
@endif
@if (session()->has('pay_invoices'))
    <script>
        window.onload = function() {
            notif
                ({
                    msg: "{{ trans('message_trans.pay_invoices') }}",
                    type: "success"
                })
        }
    </script>
@endif
