<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pharmacy - HCM</title>
    <meta name="description" content="Free Bootstrap 4 Admin Theme | Pike Admin">
    <meta name="author" content="Pike Web Development">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <!-- Favicon -->
    <link rel="shortcut icon" href="{{ asset('assets/images/favicon.ico') }}">
    <!-- Bootstrap CSS -->
    <link href="{{ asset('assets/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css" />
    <!-- Font Awesome CSS -->
    <link href="{{ asset('assets/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/plugins/toastr/toastr.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/plugins/sweetalert/sweetalert.css') }}" rel="stylesheet" type="text/css" />
    <!-- DateTimePicker -->
    <link href="{{ asset('assets/plugins/datetimepicker/css/daterangepicker.css') }}" rel="stylesheet" type="text/css" />
    <!-- Custom CSS -->
    <link href="{{ asset('assets/css/style.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/css/custom.css') }}" rel="stylesheet" type="text/css" />
    <!-- BEGIN CSS for this page -->
    
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/js/datatable/DataTables-1.10.18/css/dataTables.bootstrap4.min.css') }}" />
    <!-- END CSS for this page -->

    <!-- Create at 2019/06/14 by haidt -->
    <style>
        tr.selected {
            background-color: #007bff40
        }
    </style>
    <!-- END -->
</head>

<body class="adminbody">
    <div id="main"> 
        @include('admin.layout.header')
        @include('admin.layout.left')
        
        <div class="content-page">
            <!-- Start content -->
            <div class="content">
                @yield('content')
            </div>
            <!-- END content -->
        </div>
        @include('admin.layout.footer')
       
    </div>
    <!-- END main -->

    <!-- Extra large modal -->
    <div id="form-popup-xl" class="modal fade bd-example-modal-xl" tabindex="-1" role="dialog" aria-labelledby="myExtraLargeModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
            </div>
        </div>
    </div>

    <div id="form-popup-lg" class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            
        </div>
    </div>

    <div id="form-popup-md" class="modal fade bd-example-modal-xl" tabindex="-1" role="dialog" aria-labelledby="myExtraDefaultModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">

            </div>
        </div>
    </div>

    <div id="form-popup-sm" class="modal fade bd-example-modal-sm" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-sm">
            <div class="modal-content">
            </div>
        </div>
    </div>

    <script src="{{ asset('assets/js/modernizr.min.js') }}"></script>
    <script src="{{ asset('assets/js/jquery.min.js') }}"></script>
    <script src="{{ asset('assets/js/moment.min.js') }}"></script>
    <script src="{{ asset('assets/js/popper.min.js') }}"></script>
    <script src="{{ asset('assets/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('assets/js/detect.js') }}"></script>
    <script src="{{ asset('assets/js/fastclick.js') }}"></script>
    <script src="{{ asset('assets/js/jquery.blockUI.js') }}"></script>
    <script src="{{ asset('assets/js/jquery.nicescroll.js') }}"></script>
    <!-- App js -->
    <script src="{{ asset('assets/js/pikeadmin.js') }}"></script>
    <!-- BEGIN Java Script for this page -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.4.0/Chart.min.js"></script>
    <script src="{{ asset('assets/js/datatable/DataTables-1.10.18/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('assets/js/datatable/DataTables-1.10.18/js/dataTables.bootstrap4.min.js') }}"></script>
    <!-- Counter-Up-->
    <script src="{{ asset('assets/plugins/waypoints/lib/jquery.waypoints.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/counterup/jquery.counterup.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/toastr/toastr.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/sweetalert/sweetalert.js') }}"></script>
    <script src="{{ asset('assets/js/jquery.safeform.js') }}"></script>
    <script src="{{ asset('assets/js/script.js') }}"></script>
    <!-- create at 2019/06/13 by haidt -->
    <!-- <script src="{{ asset('assets/js/custom/main.js') }}"></script> -->
    <script src="//cdnjs.cloudflare.com/ajax/libs/numeral.js/2.0.6/numeral.min.js"></script>
    <script src="{{ asset('assets/plugins/datetimepicker/js/daterangepicker.js') }}"></script>



    @section('script')
    @show

    <script type="text/javascript">
        $(document).ready(function() {

            // update profile action
            $('#btn-save-profile').click(function() {
                let form = $('form[name=frmUserProfileModal]');

                let password = form.find('input[name=password]');
                if(password.val().length < 6 && password.val().trim() != '') {
                    toastr.error('{{ __('validation.min.numeric', ['attribute' => 'Mật khẩu', 'min' => 6]) }}');
                    password.focus();
                    return false;
                }
            })
        });
    </script>
</body>

</html>