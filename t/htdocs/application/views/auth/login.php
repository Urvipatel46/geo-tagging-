<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <title>Sign In | India Postoffices Geo-Tagging</title>
    <!-- Favicon-->
    <link rel="icon" href="<?php echo base_url(); ?>assets/frontend/layout/img/logos/gec.png" type="image/png">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,700&subset=latin,cyrillic-ext" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" type="text/css">

    <!-- Bootstrap Core Css -->
    <link href="<?php echo base_url(); ?>assets/plugins/bootstrap/css/bootstrap.css" rel="stylesheet">

    <!-- Waves Effect Css -->
    <link href="<?php echo base_url(); ?>assets/plugins/node-waves/waves.css" rel="stylesheet" />

    <!-- Animation Css -->
    <link href="<?php echo base_url(); ?>assets/plugins/animate-css/animate.css" rel="stylesheet" />

    <!-- Custom Css -->
    <link href="<?php echo base_url(); ?>assets/css/style.css" rel="stylesheet">


</head>

<body onload="runBGSlideShow()" class="login-page">
    <div class="login-box">
        <div class="logo">
            <a href="javascript:void(0);">Geo -<b>Tagging</b></a>
            <small>All Post offices of India With Geo-Tagging</small>
        </div>
		
        <div class="card">
            <div class="body">
              <!--<h1><?php echo lang('login_heading');?></h1>
<p><?php echo lang('login_subheading');?></p>-->
                <?php echo form_open("auth/login");?>
                    
                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="material-icons">person</i>
                        </span>
                        <div class="form-line">
                            <?php echo form_input($identity, '','class="form-control" placeholder="Username" required autofocus');?>
                        </div>
                    </div>
                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="material-icons">lock</i>
                        </span>
                        <div class="form-line">
                           <?php echo form_input($password, '', 'class="form-control" placeholder="Password" required');?>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-8 p-t-5">
                          <?php echo form_checkbox('remember', '1', false, 'id="remember" class="filled-in chk-col-pink"');?>                            
                            <label for="rememberme"><?php echo lang('login_remember_label', 'remember');?></label>
                        </div>
                        <div class="col-xs-4">
                            <?php echo form_submit('submit', lang('login_submit_btn'),'class="btn btn-block bg-pink waves-effect"');?>
                        </div>
                    </div>
                    <div class="row m-t-15 m-b--20">
                        <div class="col-xs-6">
                            <a href="<?php echo base_url(); ?>auth/create_user">Register Now!</a>
                        </div>
                        <div class="col-xs-6 align-right">
                            <a href="<?php echo base_url(); ?>auth/forgot_password"><?php echo lang('login_forgot_password');?></a>
                        </div>
                    </div>
                <?php echo form_close();?>
            </div>
        </div>
    </div>
	<div id="infoMessage" class="msg"><?php echo $message;?></div>

    <!-- Jquery Core Js -->
    <script src="<?php echo base_url(); ?>assets/plugins/jquery/jquery.min.js"></script>

    <!-- Bootstrap Core Js -->
    <script src="<?php echo base_url(); ?>assets/plugins/bootstrap/js/bootstrap.js"></script>

    <!-- Waves Effect Plugin Js -->
    <script src="<?php echo base_url(); ?>assets/plugins/node-waves/waves.js"></script>

    <!-- Validation Plugin Js -->
    <script src="<?php echo base_url(); ?>assets/plugins/jquery-validation/jquery.validate.js"></script>

    <!-- Custom Js -->
    <script src="<?php echo base_url(); ?>assets/js/admin.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/pages/examples/sign-in.js"></script>
</body>

</html>






