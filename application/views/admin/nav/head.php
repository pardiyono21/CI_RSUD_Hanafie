<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" type="image/png" sizes="16x16" href="<?=base_url()?>isset/plugins/images/favicon.png">
    <title>RSUD H. Hanafie</title>
    <!-- Bootstrap Core CSS -->
    <link href="<?=base_url()?>isset/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Menu CSS -->
    <link href="<?=base_url()?>isset/plugins/bower_components/sidebar-nav/dist/sidebar-nav.min.css" rel="stylesheet">
    <!-- toast CSS -->
    <link href="<?=base_url()?>isset/plugins/bower_components/toast-master/css/jquery.toast.css" rel="stylesheet">
    <!-- morris CSS -->
    <link href="<?=base_url()?>isset/plugins/bower_components/morrisjs/morris.css" rel="stylesheet">
    <!-- chartist CSS -->
    <link href="<?=base_url()?>isset/plugins/bower_components/chartist-js/dist/chartist.min.css" rel="stylesheet">
    <link href="<?=base_url()?>isset/plugins/bower_components/chartist-plugin-tooltip-master/dist/chartist-plugin-tooltip.css" rel="stylesheet">
    <!-- animation CSS -->
    <link href="<?=base_url()?>isset/css/animate.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="<?=base_url()?>isset/css/style.css" rel="stylesheet">
    <!-- color CSS -->
    <link href="<?=base_url()?>isset/css/colors/default.css" id="theme" rel="stylesheet">
    <link href="<?=base_url()?>isset/css/toastr.min.css" rel="stylesheet" type="text/css">

    <script src="<?=base_url()?>isset/plugins/bower_components/jquery/dist/jquery.min.js"></script>

    <script src="<?=base_url()?>isset/js/toastr.min.js"></script>
    <script type="text/javascript">
        toastr.options = {
          "closeButton": true,
          "debug": false,
          "newestOnTop": false,
          "progressBar": false,
          "positionClass": "toast-top-right",
          "preventDuplicates": false,
          "onclick": null,
          "showDuration": "1000",
          "hideDuration": "1000",
          "timeOut": "8000",
          "extendedTimeOut": "1000",
          "showEasing": "swing",
          "hideEasing": "linear",
          "showMethod": "fadeIn",
          "hideMethod": "fadeOut"
        }
    </script>
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>

<![endif]-->
<style type="text/css">
    .jq-toast-wrap {
        display: none;
    }
    .form-control-date{
        float: left;
        background-color: #fff;
        border: 1px solid #e4e7ea;
        border-radius: 0;
        box-shadow: 4px;
        color: #565656;
        height: 38px;
        max-width: 134px;
        padding: 7px 12px;
        transition: all 300ms linear 0s;
    }
    .tabel th{
        padding:10px;
    }
    .tabel td{
        padding:6px;
    }
    .tabel-col th{
        padding:10px;
    }
    .tabel-col td{
        margin:-6px;
    }
    .table-bordered-toggle th, td {
        border: 1px solid #e4e7ea;
        padding: 6px;
    }
    .table-bordered-collapse th, td {
        border: 1px solid #e4e7ea;
    }
    .table-bordered-collapse{
        margin: -7px
    }
    [aria-expanded="false"] .buka {
    display: inline;
    }

    [aria-expanded="false"] .tutup {
        display: none;
    }

    [aria-expanded="true"] .buka {
        display: none;
    }

    [aria-expanded="true"] .tutup {
        display: inline;
    }

    [aria-expanded="true"] .buka1 {
        display: none;
    }

    [aria-expanded="true"] .tutup1 {
        display: inline;
    }

    [aria-expanded="false"] .buka1 {
        display: inline;
    }

    [aria-expanded="false"] .tutup1 {
        display: none;
    }

    

    .buka, .tutup{
        padding-top: 2px;
        float: right;
    }
    .buka1, .tutup1{
        padding-top: 2px;
        float: right;
    }
    a{
        cursor: pointer;
    }
</style>
</head>

<body class="fix-header">
    <!-- ============================================================== -->
    <!-- Preloader -->
    <!-- ============================================================== -->
    <div class="preloader">
        <svg class="circular" viewBox="25 25 50 50">
            <circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="2" stroke-miterlimit="10" />
        </svg>
    </div>
    <!-- ============================================================== -->
    <!-- Wrapper -->
    <!-- ============================================================== -->
    <div id="wrapper">
        <!-- ============================================================== -->
        <!-- Topbar header - style you can find in pages.scss -->
        <!-- ============================================================== -->
        <nav class="navbar navbar-default navbar-static-top m-b-0">
            <div class="navbar-header">
                <div class="top-left-part">
                    <!-- Logo -->
                    <a class="logo" href="<?=base_url()?>adm_dashboard">
                        <!-- Logo icon image, you can use font-icon also -->
                        <b><u></u></b>
                        <!-- Logo text image you can use text also -->
                        <span class="hidden-xs">
                            <img src="<?=base_url()?>isset/plugins/images/hanafie_logo.png">
                        
                        </span> 
                    </a>
                </div>
                <!-- /Logo -->
                <ul class="nav navbar-top-links navbar-left">
                    <li><a href="javascript:void(0)" class="open-close waves-effect waves-light"><i class="fa fa-bars"></i></a></li>
                    
                    <!-- /.Megamenu -->
                </ul>
                <ul class="nav navbar-top-links navbar-right pull-right">
                    <li class="dropdown">
                        <a class="dropdown-toggle profile-pic" data-toggle="dropdown" href="#" aria-expanded="true"> <img src="<?=base_url()?>isset/plugins/images/users/userProfileIcon_gray.png" alt="user-img" width="36" class="img-circle"><b class="hidden-xs"><?=$this->session->userdata['logged_in']['hak_akses']?></b><span class="caret"></span> </a>
                        <ul class="dropdown-menu dropdown-user animated flipInY">
                            <li>
                                <!-- <div class="dw-user-box">
                                    <div class="u-img"><img src="<?=base_url()?>isset/plugins/images/users/varun.jpg" alt="user"></div>
                                    <div class="u-text">
                                        <h4>Steave Jobs</h4>
                                        <p class="text-muted">varun@gmail.com</p><a href="profile.html" class="btn btn-rounded btn-danger btn-sm">View Profile</a></div>
                                </div> -->
                            </li>
                            <li role="separator" class="divider"></li>
                            
                            <li><a href="<?=base_url()?>login/logout"><i class="fa fa-power-off"></i> Logout</a></li>
                        </ul>
                        <!-- /.dropdown-user -->
                    </li>
                </ul>
            </div>
            <!-- /.navbar-header -->
            <!-- /.navbar-top-links -->

            <!-- /.navbar-static-side -->
        </nav>
        <!-- End Top Navigation -->
        <!-- ============================================================== -->
        <!-- Left Sidebar - style you can find in sidebar.scss  -->
        <!-- ============================================================== -->
        <div class="navbar-default sidebar" role="navigation">
            <div class="sidebar-nav slimscrollsidebar">
                <div class="sidebar-head">
                    <h3><span class="fa-fw open-close"><i class="ti-close ti-menu"></i></span> <span class="hide-menu">Navigation</span></h3>
                </div>
                <ul class="nav" id="side-menu">
                    <li style="padding: 70px 0 0;">
                        <a href="<?=base_url()?>adm_dashboard" class="waves-effect"><i class="fa fa-home fa-fw" aria-hidden="true"></i>Dashboard</a>
                    </li>
                    <?php
                    if ($this->session->userdata['logged_in']['hak_akses']=='admin') {
                     
                    ?>
                    <li>
                        <a href="<?=base_url()?>adm_proses_etl" class="waves-effect"><i class="fa fa-clock-o fa-fw" aria-hidden="true"></i>Proses ETL</a>
                    </li>
                    <li>
                        <a href="<?=base_url()?>adm_olap" class="waves-effect"><i class="fa fa-clock-o fa-fw" aria-hidden="true"></i>OLAP</a>
                    </li>
                    <?php
                    }
                    ?>
                    <li>
                        <a href="<?=base_url()?>adm_reporting" class="waves-effect"><i class="fa fa-table fa-fw" aria-hidden="true"></i>Reporting</a>
                    </li>

                </ul>
                
            </div>
            
        </div>
        <!-- ============================================================== -->
        <!-- End Left Sidebar -->
        <!-- ============================================================== -->