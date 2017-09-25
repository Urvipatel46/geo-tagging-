<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
 <section>
        <!-- Left Sidebar -->
        <aside id="leftsidebar" class="sidebar">
            <!-- User Info -->
            <div class="user-info">
                <div class="image">
                    <img src="<?php echo base_url();?>assets/uploads/images(200x200)/<?php if($this->session->userdata('image')!='') echo $this->session->userdata('image');else echo 'dflt-user-icn.png';?>" width="48" height="48" alt="User" />
                </div>
                <div class="info-container">
                    <div class="name" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><?php echo $this->session->userdata('username');?></div>
                    <div class="email">john.doe@example.com</div>
                    <div class="btn-group user-helper-dropdown">
                        <i class="material-icons" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">keyboard_arrow_down</i>
                        <ul class="dropdown-menu pull-right">
                            <li><a href="<?php echo base_url();?>admin/profile"><i class="material-icons">person</i>Profile</a></li>                                                    
                            <li role="seperator" class="divider"></li>
                            <li><a href="<?php echo base_url();?>admin/logout"><i class="material-icons">input</i>Sign Out</a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <!-- #User Info -->
            <!-- Menu -->
            <div class="menu">
                <ul class="list">
                    <li class="header">MAIN NAVIGATION</li>
                    <li>
                        <a href="<?php echo base_url(); ?>admin/dashboard">
                            <i class="material-icons col-brown">dashboard</i>
                            <span>Dashboard</span>
                        </a>
                    </li>			
					<li>
					    <a href="<?php echo base_url(); ?>admin/viewAllPostOffices">
                            <i class="material-icons col-brown">healing</i>
                            <span>Post-Office Management</span>
                        </a>
                    </li>
                    <li>
                        <a href="javascript:void(0);" class="menu-toggle">
                            <i class="material-icons col-blue">people</i>
                            <span>User Management</span>
                        </a>
						<ul class="ml-menu">
                            <li>
                                <a href="<?php echo base_url(); ?>admin/viewallusers">
								<i class="material-icons col-green">list</i>
                                    <span>User List</span>
                                </a>
                            </li>
							 <li>
                                <a href="<?php echo base_url(); ?>">
								<i class="material-icons col-green">supervisor_account</i>
                                    <span>User Roles</span>
                                </a>
                            </li>
							
							  <!--
							<li>
                                <a href="javascript:void(0);">
								<i class="material-icons col-red">delete</i>
                                    <span>Remove User</span>
                                </a>
                            </li>
							<li>
                                <a href="javascript:void(0);">
								<i class="material-icons  col-light-purple">poll</i>
                                    <span>User Activity</span>
                                </a>
                            </li>-->
							</ul>
                    </li>
                    
                  <li>
                                <a href="<?php echo base_url(); ?>admin/settings">
								<i class="material-icons col-pink">settings</i>
                                    <span>Settings</span>
                                </a>
                            </li>
                    
                    <li>
                        <a href="javascript:void(0);" class="menu-toggle">
                            <i class="material-icons">trending_up</i>
                            <span>Multi Level Menu</span>
                        </a>
                        <ul class="ml-menu">
                            <li>
                                <a href="javascript:void(0);">
                                    <span>Menu Item</span>
                                </a>
                            </li>
                            <li>
                                <a href="javascript:void(0);">
                                    <span>Menu Item - 2</span>
                                </a>
                            </li>
                            <li>
                                <a href="javascript:void(0);" class="menu-toggle">
                                    <span>Level - 2</span>
                                </a>
                                <ul class="ml-menu">
                                    <li>
                                        <a href="javascript:void(0);">
                                            <span>Menu Item</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="javascript:void(0);" class="menu-toggle">
                                            <span>Level - 3</span>
                                        </a>
                                        <ul class="ml-menu">
                                            <li>
                                                <a href="javascript:void(0);">
                                                    <span>Level - 4</span>
                                                </a>
                                            </li>
                                        </ul>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </li>
  
                    <li class="header">LABELS</li>
                 
                    <li>
                        <a href="javascript:void(0);">
                            <i class="material-icons col-light-blue">donut_large</i>
                            <span>Information</span>
                        </a>
                    </li>
                </ul>
            </div>
            <!-- #Menu -->
            <!-- Footer -->
            <div class="legal">
                <!--<div class="copyright">
                    Copyright&copy; 2017 <a href="javascript:void(0);">Online Post offices Geo Tagging</a>.
                </div>-->
                <div class="version">
                    <b>Version: </b> 1.0
                </div>
            </div>
            <!-- #Footer -->
        </aside>
        <!-- #END# Left Sidebar -->