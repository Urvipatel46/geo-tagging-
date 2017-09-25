<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
 <!-- BEGIN HEADER -->
    <div class="header">
      <div class="container">
        <a class="site-logo" href="index.html"><img src="<?php echo base_url(); ?>assets/frontend/layout/img/logos/logo-corp-green.png" alt="Metronic FrontEnd"></a>

        <a href="javascript:void(0);" class="mobi-toggler"><i class="fa fa-bars"></i></a>

        <!-- BEGIN NAVIGATION -->
        <div class="header-navigation pull-right font-transform-inherit">
          <ul>
            <li class="<?php if($title=="Home") echo "active";?>">
              <a data-target="#" href="<?php echo base_url(); ?>Web/Index">
                Home                 
              </a>             
             </li>
			 <li class="dropdown dropdown-megamenu">
              <a class="dropdown-toggle" data-toggle="dropdown" data-target="#" href="javascript:;">
                About
                
              </a>
              <ul class="dropdown-menu">
                <li>
                  <div class="header-navigation-content">
                    <div class="row">
                      <div class="col-md-4 header-navigation-col">
                        <h4>Institute</h4>
                        <ul>
                          <li><a href="index.html">Astro Trainers</a></li>
                          
                        </ul>
                      </div>
                      <div class="col-md-4 header-navigation-col">
                        <h4>Campus</h4>
                        <ul>
                          <li><a href="index.html">Base Layer</a></li>
                          
                        </ul>
                      </div>
                      <div class="col-md-4 header-navigation-col">
                        <h4>Accessories</h4>
                        <ul>
                          <li><a href="index.html">Belts</a></li>
                          
                        </ul>

                       
                      </div>
                    </div>
                  </div>
                </li>
              </ul>
            </li>
			<li class="dropdown dropdown-megamenu">
              <a class="dropdown-toggle" data-toggle="dropdown" data-target="#" href="javascript:;">
                Departments
                
              </a>
              <ul class="dropdown-menu">
                <li>
                  <div class="header-navigation-content">
                    <div class="row">
                      <div class="col-md-4 header-navigation-col">
                        <h4>Institute</h4>
                        <ul>
                          <li><a href="index.html">Astro Trainers</a></li>
                          
                        </ul>
                      </div>
                      <div class="col-md-4 header-navigation-col">
                        <h4>Campus</h4>
                        <ul>
                          <li><a href="index.html">Base Layer</a></li>
                          
                        </ul>
                      </div>
                      <div class="col-md-4 header-navigation-col">
                        <h4>Accessories</h4>
                        <ul>
                          <li><a href="index.html">Belts</a></li>
                          
                        </ul>

                        
                      </div>
                    </div>
                  </div>
                </li>
              </ul>
            </li>
			<li class="dropdown">
              <a class="dropdown-toggle" data-toggle="dropdown" data-target="#" href="javascript:;">
                Academic
                
              </a>
                
              <ul class="dropdown-menu">
                <li><a href="page-about.html">About Us</a></li>
                         
              </ul>
            </li>
			<li class="dropdown">
              <a class="dropdown-toggle" data-toggle="dropdown" data-target="#" href="javascript:;">
                Facilities 
              </a>
                
              <ul class="dropdown-menu">
                <li><a href="page-about.html">About Us</a></li>
                         
              </ul>
            </li>
			<li class="dropdown">
              <a class="dropdown-toggle" data-toggle="dropdown" data-target="#" href="javascript:;">
                Disclosure
              </a>
                
              <ul class="dropdown-menu">
                <li><a href="page-about.html">About Us</a></li>
                         
              </ul>
            </li>
			<li class="dropdown">
              <a class="dropdown-toggle" data-toggle="dropdown" data-target="#" href="javascript:;">
                TEQIP
              </a>
                
              <ul class="dropdown-menu">
                <li><a href="page-about.html">About Us</a></li>
                         
              </ul>
            </li>
			<li class="dropdown">
              <a class="dropdown-toggle" data-toggle="dropdown" data-target="#" href="javascript:;">
                Placement
              </a>
                
              <ul class="dropdown-menu">
                <li><a href="page-about.html">About Us</a></li>
                         
              </ul>
            </li>
			<li class="dropdown">
              <a class="dropdown-toggle" data-toggle="dropdown" data-target="#" href="javascript:;">
                Alumni
              </a>
                
              <ul class="dropdown-menu">
                <li><a href="page-about.html">About Us</a></li>
                         
              </ul>
            </li>
			
       
            <li class="<?php if($title=="Contact") echo "active";?>"><a href="<?php echo base_url(); ?>Web/Contact" target="_self">Contact Us</a></li>

            <!-- BEGIN TOP SEARCH -->
            <li class="menu-search">
              <span class="sep"></span>
              <i class="fa fa-search search-btn"></i>
              <div class="search-box">
                <form action="#">
                  <div class="input-group">
                    <input type="text" placeholder="Search" class="form-control">
                    <span class="input-group-btn">
                      <button class="btn btn-primary" type="submit">Search</button>
                    </span>
                  </div>
                </form>
              </div> 
            </li>
            <!-- END TOP SEARCH -->
          </ul>
        </div>
        <!-- END NAVIGATION -->
      </div>
    </div>
    <!-- Header END -->