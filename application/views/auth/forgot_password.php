<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <title>Forgot Password | India Postoffices Geo-Tagging</title>
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

<body class="fp-page">
    <div class="fp-box">
        <div class="logo">
           <a href="javascript:void(0);">Geo -<b>Tagging</b></a>
            <small>All Post offices of India With Geo-Tagging</small>
        </div>
        <div class="card">
            <div class="body">
                <?php echo form_open("auth/forgot_password");?>
                    <div id="infoMessage" class="msg"><?php echo $message;?>
                        Enter your email address that you used to register. We'll send you an email with your username and a
                        link to reset your password.

                    </div>
                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="material-icons">email</i>
                        </span>
                        <div class="form-line">
                           <?php echo form_input($identity,'','class="form-control" placeholder="Email" required autofocus');?> 
                        </div>
                    </div>
                    <?php echo form_submit('submit', lang('forgot_password_submit_btn'), 'class="btn btn-block btn-lg bg-pink waves-effect"');?>

                   

                    <div class="row m-t-20 m-b--5 align-center">
                        <a href="<?php echo base_url(); ?>auth/login">Sign In!</a>
                    </div>
               <?php echo form_close();?>
            </div>
        </div>
    </div>
    <p>If you did not recieve email please email your username and  email id to reset your passwor. @ : demo@demo.com</p>

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
    <script src="<?php echo base_url(); ?>assets/js/pages/examples/forgot-password.js"></script>
</body>

</html>



