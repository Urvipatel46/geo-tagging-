<?php
defined('BASEPATH') OR exit('No direct script access allowed');

?>
<html >
<!--Head-->
<head>
    <meta charset="utf-8" />
    <title>Error 404 - Page Not Found</title>

    <meta name="description" content="" />
    <meta name="viewport" content="" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <link rel="shortcut icon" href="assets/img/favicon.png" type="image/x-icon"><?php $base_url = load_class('Config')->config['base_url']; ?>


    <!--Basic Styles-->
    <link href="<?php echo $base_url; ?>assets/css/bootstrap.min.css" rel="stylesheet" />
    <link id="bootstrap-rtl-link" href="#" rel="stylesheet" />
    <link href="<?php echo $base_url; ?>assets/css/font-awesome.min.css" rel="stylesheet" />
    <link href="<?php echo $base_url; ?>assets/css/weather-icons.min.css" rel="stylesheet" />

    <!--Fonts-->
    <link href="../../fonts.googleapis.com/cssa9bc.css?family=Open+Sans:300italic,400italic,600italic,700italic,400,600,700,300" rel="stylesheet" type="text/css">

    <!--Beyond styles-->
    <link id="beyond-link" href="<?php echo $base_url; ?>assets/css/beyond.min.css" rel="stylesheet" />
    <link href="<?php echo $base_url; ?>assets/css/demo.min.css" rel="stylesheet" />
    <link href="<?php echo $base_url; ?>assets/css/animate.min.css" rel="stylesheet" />
    <link id="skin-link" href="#" rel="stylesheet" type="text/css" />

    <!--Skin Script: Place this script in head to load scripts for skins and rtl support-->
    <script src="<?php echo $base_url; ?>assets/js/skins.min.js"></script>
</head>
<!--Head Ends-->
<!--Body-->
<body class="body-404">
    <div class="error-header"> </div>
    <div class="container ">
        <section class="error-container text-center">
            <h1>404</h1>
            <div class="error-divider">
                <h2><?php echo $heading; ?></h2>
                <p class="description"><?php echo $message; ?></p>
            </div>
            <a href="../../../" class="return-btn"><i class="fa fa-home"></i>Home</a>
        </section>
    </div>
    <!--Basic Scripts-->
	
    <script src="<?php echo $base_url; ?>assets/js/jquery-2.0.3.min.js"></script>
    <script src="<?php echo $base_url; ?>assets/js/bootstrap.min.js"></script>
    <script src="<?php echo $base_url; ?>assets/js/slimscroll/jquery.slimscroll.min.js"></script>

    <!--Beyond Scripts-->
    <script src="<?php echo $base_url; ?>assets/js/beyond.min.js"></script>

   
</body>
<!--Body Ends-->
</html>

		
