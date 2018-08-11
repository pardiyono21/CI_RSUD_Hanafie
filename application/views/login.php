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
    <link href="<?=base_url()?>isset/bootstrap/dist/css/bootstrap.css" rel="stylesheet">
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
    
            
     <div class="row">
       
            

        <div class="col-md-4 col-md-offset-4 col-sm-6 col-sm-offset-3 col-xs-10 col-xs-offset-1" style="margin-top: 5%; ">
            <?php 
                            if($this->session->flashdata('msg')){ 
                                ?>
                                <div class="alert alert-<?=$this->session->flashdata('alert')?> alert-dismissible show" role="alert">
                                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                  </button>
                                  <strong>Alert !  </strong><?=$this->session->flashdata('msg');?>
                                </div>
                                <?php
                            } 
                            ?>
            <div class="white-box" style="border: solid #555">
                <div class="new-login-box">
                <div class="white-box">
                    <h3 class="box-title m-b-0">Sign In to Admin</h3>
                    <small>Enter your details below</small>
                    <!-- <form class="form-horizontal new-lg-form" id="loginform" action="adm_dashboard"> -->
                  <?php 
                  $attributes = array('class' => 'form-horizontal new-lg-form', 'id' => 'loginform');
                  echo form_open('login/login_process', $attributes); 
                  ?>
                    <div class="form-group  m-t-20">
                      <div class="col-xs-12">
                        <label>Username</label>
                        <input class="form-control" type="text" name="username" id="name" value="<?=$this->session->flashdata('user')?>" placeholder="Username">
                      </div>
                    </div>
                    <div class="form-group">
                      <div class="col-xs-12">
                        <label>Password</label>
                        <input class="form-control" type="password" name="password" id="password" value="<?=$this->session->flashdata('pass')?>" placeholder="Password">
                      </div>
                    </div>
                    
                    <div class="form-group text-center m-t-20">
                      <div class="col-xs-12">
                        <button class="btn btn-info btn-lg btn-block btn-rounded text-uppercase waves-effect waves-light" type="submit" value=" Login " name="submit">Log In</button>
                      </div>
                    </div>
                   <?php echo form_close(); ?>
                    
                  
               
                </div>
                </div>
                  
            </div>
            
        </div>
        
    </div>
    
    <!-- ============================================================== -->
    <!-- End Wrapper -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- All Jquery -->
    <!-- ============================================================== -->
    <script src="<?=base_url()?>isset/plugins/bower_components/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap Core JavaScript -->
    <script src="<?=base_url()?>isset/bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- Menu Plugin JavaScript -->
    <script src="<?=base_url()?>isset/plugins/bower_components/sidebar-nav/dist/sidebar-nav.min.js"></script>
    <!--slimscroll JavaScript -->
    <script src="<?=base_url()?>isset/js/jquery.slimscroll.js"></script>
    <!--Wave Effects -->
    <script src="<?=base_url()?>isset/js/waves.js"></script>
    <!--Counter js -->
    <script src="<?=base_url()?>isset/plugins/bower_components/waypoints/lib/jquery.waypoints.js"></script>
    <script src="<?=base_url()?>isset/plugins/bower_components/counterup/jquery.counterup.min.js"></script>
    <!-- chartist chart -->
    <script src="<?=base_url()?>isset/plugins/bower_components/chartist-js/dist/chartist.min.js"></script>
    <script src="<?=base_url()?>isset/plugins/bower_components/chartist-plugin-tooltip-master/dist/chartist-plugin-tooltip.min.js"></script><!-- chartist chart -->
  
    <!-- Sparkline chart JavaScript -->
    <script src="<?=base_url()?>isset/plugins/bower_components/jquery-sparkline/jquery.sparkline.min.js"></script>
    <!-- Custom Theme JavaScript -->
    <script src="<?=base_url()?>isset/js/custom.min.js"></script>
    <script src="<?=base_url()?>isset/js/dashboard1.js"></script>
    <script src="<?=base_url()?>isset/plugins/bower_components/toast-master/js/jquery.toast.js"></script>
</body>

</html>