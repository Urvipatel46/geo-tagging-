<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<!-- Body BEGIN -->
<body class="corporate" onload="$.reject({reject:{msie:9},overlayOpacity: 1,header:'Your browser is not supported here',paragraph1: 'Your browser is out of date, and is not compatible with '+  
    'our website.<strong>Please Update to IE 10 and above or consider changing your browser</strong>. A list of the most popular web browsers can be '+  
    'found below.',closeCookie: false,close: false,imagePath: './assets/global/plugins/jReject-master/images/'});">
   <!-- BEGIN STYLE CUSTOMIZER -->
    <div class="color-panel hidden-sm">
      <div class="color-mode-icons icon-color"></div>
      <div class="color-mode-icons icon-color-close"></div>
      <div class="color-mode">
        <p>THEME COLOR</p>
        <ul class="inline">
          <li class="color-red current color-default" data-style="red"></li>
          <li class="color-blue" data-style="blue"></li>
          <li class="color-green" data-style="green"></li>
          <li class="color-orange" data-style="orange"></li>
          <li class="color-gray" data-style="gray"></li>
          <li class="color-turquoise" data-style="turquoise"></li>
        </ul>
      </div>
    </div>
    <!-- END BEGIN STYLE CUSTOMIZER --> 
        <!-- BEGIN TOP BAR -->
    <div class="pre-header">
        <div class="container">
            <div class="row">
                <!-- BEGIN TOP BAR LEFT PART -->
                <div class="col-md-6 col-sm-6 additional-shop-info">
                    <ul class="list-unstyled list-inline">
                        <li><a href="tel:02766291561"><i class="fa fa-phone"></i><span>(02766) 291561</span></a></li>
                        <li><a href="mailto:principalgecpatan@gmail.com"><i class="fa fa-envelope-o"></i><span>principalgecpatan@gmail.com</span></a></li>
                    </ul>
                </div>
                <!-- END TOP BAR LEFT PART -->
                <!-- BEGIN TOP BAR MENU -->
                <div class="col-md-6 col-sm-6 additional-nav">
                    <ul class="list-unstyled list-inline pull-right">
					<?php $this->load->library('ion_auth');    
                              if ($this->ion_auth->logged_in()){?>
<?php $this->load->library('ion_auth');    
                              if ($this->ion_auth->logged_in() && !($this->ion_auth->is_admin()))
                              {
                              ?>
                              <li><i class="fa fa-user" style="color:#67bd3c;"></i><a href="<?php echo base_url();?>user/profile">Hello, <?php echo $this->session->userdata('username');?></a></li> 
<li><i class="fa fa-key" style="color:#67bd3c;"></i><a href="<?php echo base_url();?>auth/logout" >Log Out</a></li>							  
                       
                         <?php } else if ($this->ion_auth->logged_in() && ($this->ion_auth->is_admin() || $this->ion_auth->is_moderator())) { ?>
                          <li><i class="fa fa-user" style="color:#67bd3c;"></i><a href="<?php echo base_url();?>admin/profile">Hello, <?php echo $this->session->userdata('username');?></a></li>
                         <li><i class="fa fa-key" style="color:#67bd3c;"></i><a href="<?php echo base_url();?>auth/logout" >Log Out</a></li>
                        <?php } ?>
                        <?php } else { ?>
                        <li><i class="fa fa-key" style="color:#67bd3c;"></i><a href="<?php echo base_url();?>auth/login" >Log In</a></li>
                        <?php } ?>
                        
                    </ul>
                </div>
                <!-- END TOP BAR MENU -->
            </div>
        </div>        
    </div>
    <!-- END TOP BAR -->