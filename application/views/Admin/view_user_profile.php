<section class="content">
        <div class="container-fluid">
            <div class="block-header">
                <h2>User Profile</h2>
            </div>

            

            <div class="row clearfix">
                <!-- Task Info -->
                <div class="col-xs-12 col-sm-12 col-md-8 col-lg-8">
                    <div class="card">
                        <div class="header">
                            <h2>Profile of <?php echo $d->username;?></h2>
                            <ul class="header-dropdown m-r--5">
                                <li class="dropdown">
                                    <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                                        <i class="material-icons">more_vert</i>
                                    </a>
                                    <ul class="dropdown-menu pull-right">
                                        <li><a href="javascript:void(0);">Action</a></li>
                                        <li><a href="javascript:void(0);">Another action</a></li>
                                        <li><a href="javascript:void(0);">Something else here</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </div>
                        <div class="body">
                            <div class="table-responsive">
							<?php if(count($details)) {

		foreach($details as $d) {

?>
	
 <strong>Full Name </strong>: <?php echo $d->username;?>
 </div>
   <div class="details">
 
 <strong>Email</strong> : <?php echo $d->email;?>
 </div>
  <div class="details">
 <strong> Phone </strong>: <?php echo $d->phone;?>
 </div>

  <?php if($d->active==1) { ?>
 
  <a href="<?php echo base_url();?>admin/blockUser/<?php echo $d->id;?>" onclick="return confirm('Are you sure you want to block this user?')"><div class="btn bg-primary  exam-histry-btn">Block User</div></a>
  
   <?php } else { ?>
   
	<a href="<?php echo base_url();?>admin/activateUser/<?php echo $d->id;?>" onclick="return confirm('Are you sure you want to activate this user?')"><div class="btn bg-primary  exam-histry-btn">Activate User</div></a>
   
   <?php } ?>
   
   
                               
                            </div>
                        </div>
                    </div>
                </div>
                <!-- #END# Task Info -->
                <!-- Browser Usage -->
                <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
                    <div class="card">
                        <div class="header">
                            <h2>User Photo</h2>
							Personal Details of <?php echo $d->username;?>
                            <?php echo $this->session->flashdata('message');
   

	$imgSRC = base_url()."assets/uploads/images(200x200)/"."dflt-user-icn.png";;
	if($d->image!='')
		$imgSRC = base_url()."assets/uploads/images(200x200)/".$d->image;
	
	
   
   
   ?>
                        </div>
                        <div class="body">
                            <div id="donut_chart" class="dashboard-donut-chart"></div>
                        </div>
						
						<?php } }?>
                    </div>
                </div>
                <!-- #END# Browser Usage -->
            </div>
        </div>
    </section>

