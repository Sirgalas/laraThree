<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>{{$title}}</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.6 -->
    <link rel="stylesheet" href="/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
    <!-- datepicker -->
    <link rel="stylesheet" href="/js/admin/datepicker/datepicker3.css">
    <link href="/js/admin/select2/select2.css" rel="stylesheet" />
    <!-- jvectormap -->
    <link rel="stylesheet" href="/js/admin/jvectormap/jquery-jvectormap-1.2.2.css">
    <!-- fileinput -->
    <link rel="stylesheet" href="/css/bootstrap.css">
    <link rel="stylesheet" href="/js/admin/datepicker/datepicker3.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-fileinput/5.0.9/css/fileinput.min.css" media="all" rel="stylesheet" type="text/css" />
    <!-- Theme style -->
    <link rel="stylesheet" href="/css/admin/AdminLTE.min.css">
    <!-- AdminLTE Skins. Choose a skin from the css/skins
         folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="/css/admin/skins/_all-skins.min.css">


    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

    @include('admin.include.header')
    <!-- Left side column. contains the logo and sidebar -->
    @include('admin.include.left')

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->

        @yield('breadcrumb')
        <!-- Main content -->
        <section class="content">
            @include('admin.include.error')
            @yield('content')
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->

    @include('admin.include.footer')

    <!-- Control Sidebar -->
    @include('admin.include.right')
    <!-- /.control-sidebar -->
    <!-- Add the sidebar's background. This div must be placed
         immediately after the control sidebar -->
    <div class="control-sidebar-bg"></div>

</div>
<!-- ./wrapper -->

<!-- jQuery 2.2.3 -->
<script src="/js/admin/jQuery/jquery-2.2.3.min.js"></script>

<!-- Bootstrap 3.3.6 -->
<script src="/js/vendor/bootstrap.min.js"></script>
<!-- datepicker -->
<script src="/js/admin/datepicker/bootstrap-datepicker.js"></script>
<!-- ckeditor  -->
<script src="/js/admin/ckeditor/ckeditor.js"></script>
<!-- fileinput -->
<script src="/js/admin/fileinput/plugins/piexif.min.js" type="text/javascript"></script>
<script src="/js/admin/fileinput/plugins/sortable.min.js" type="text/javascript"></script>
<script src="/js/admin/fileinput/plugins/purify.min.js" type="text/javascript"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
<script src="/js/admin/fileinput/fileinput.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-fileinput/5.0.9/themes/fa/theme.js"></script>
<script src="/js/admin/fileinput/fileinput.js"></script>
<!--select2 -->
<script src="/js/admin/select2/select2.full.js"></script>
<!-- FastClick -->
<script src="/js/admin/fastclick/fastclick.js"></script>
<!-- AdminLTE App -->

<!-- Sparkline -->
<script src="/js/admin/sparkline/jquery.sparkline.min.js"></script>
<!-- jvectormap -->
<script src="/js/admin/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
<script src="/js/admin/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
<!-- SlimScroll 1.3.0 -->
<script src="/js/admin/slimScroll/jquery.slimscroll.min.js"></script>
<!-- ChartJS 1.0.1 -->
<script src="/js/admin/chartjs/Chart.min.js"></script>

<!-- AdminLTE for demo purposes -->
<script src="/js/admin/demo.js"></script>
<script src="/js/admin/app.js"></script>
</body>
</html>
