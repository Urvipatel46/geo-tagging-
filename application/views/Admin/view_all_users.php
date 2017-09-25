
<!-- JQuery DataTable Css -->
    <link href="<?php echo base_url();?>assets/plugins/jquery-datatable/skin/bootstrap/css/dataTables.bootstrap.css" rel="stylesheet">
  
   <section class="content">
        <div class="container-fluid">
            <div class="block-header">
                <h2>
                    User Management
                   
                </h2>
				 <?php echo validation_errors();
		echo $this->session->flashdata('message');
	 ?>
            </div>
            
            <!-- Exportable Table -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                List Of All Public Users
                            </h2>
                            <ul class="header-dropdown m-r--5">
                                <li class="dropdown">
                                    <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                                        <i class="material-icons">more_vert</i>
                                    </a>
                                    <ul class="dropdown-menu pull-right">
                                        <li><a href="<?php echo base_url();?>admin/create_user">Create User</a></li>
                                        <li><a href="javascript:void(0);">Another action</a></li>
                                        <li><a href="javascript:void(0);">Something else here</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </div>
                        <div class="body">
                            <table id="example" class="table table-bordered table-striped table-hover dataTable js-exportable">
                                <thead>
                                    <tr>
                                        <th>S.No.</th>
						<th>Photo</th>
						<th>User Name</th>
						<th>Email</th>
						<th>Phone</th>
						<th>Date of Registration</th>
						<th>Status</th>
						<th>Action</th>
                                    </tr>
                                </thead>
                                <tfoot>
                                    <tr>
                                        <th>S.No.</th>
						<th>Photo</th>
						<th>User Name</th>
						<th>Email</th>
						<th>Phone</th>
						<th>Date of Registration</th>
						<th>Status</th>
						<th>Action</th>
                                    </tr>
                                </tfoot>
                                <tbody>
                                    <tr>
                                        <?php if(count($allUsers)>0) { 
					$i=1;
					foreach($allUsers as $r)
					{
				
				?>
				
					<tr>
						<td><?php echo $i++;?></td>
						<td><img style="height:45px;width:60px;" src="<?php echo base_url();?>assets/uploads/images(200x200)/<?php 
						if(isset($r->image)&&$r->image!='')echo $r->image; else echo "dflt-user-icn.png";?>"></td>
						<td><?php echo $r->username;?></td>
						<td><?php echo $r->email;?></td>
						<td><?php echo $r->phone;?></td>
						<td><?php echo $r->date_of_registration;?></td>
						<td><?php if($r->active==1) echo "Active"; else echo "Inactive";?></td>
						<td>
							 <a href="<?php echo base_url();?>admin/viewUserProfile/<?php echo $r->id;?>"><div class="btn bg-primary wnm-user">View</div></a>
	 
							 <?php if($r->active==1) { ?>
							 
								<a href="<?php echo base_url();?>admin/blockUser/<?php echo $r->id;?>" onclick="return confirm('Are you sure you want to block this user?')"><div class="btn bg-primary wnm-user">Block</div></a>
							 
							 <?php } else {?>
							 
								<a href="<?php echo base_url();?>admin/activateUser/<?php echo $r->id;?>" onclick="return confirm('Are you sure you want to activate this user?')"><div class="btn bg-primary wnm-user">Activate</div></a>
							 
							 <?php } ?>
							 
							 <a href="<?php echo base_url();?>admin/deleteUser/<?php echo $r->id;?>/general_user"><div class="btn bg-primary wnm-user" onclick="return confirm('Are you sure you want to delete this record?')">Delete</div></a>
							 
						</td>
					</tr>
					
				<?php } } else "<tr><td colspan='4'>No Data Available.</td></tr>"; ?>
                                    </tr>
                                    
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <!-- #END# Exportable Table -->
        </div>
    </section> <!-- Jquery DataTable Plugin Js -->
    <script src="<?php echo base_url();?>assets/plugins/jquery-datatable/jquery.dataTables.js"></script>
    <script src="<?php echo base_url();?>assets/plugins/jquery-datatable/skin/bootstrap/js/dataTables.bootstrap.js"></script>
    <script src="<?php echo base_url();?>assets/plugins/jquery-datatable/extensions/export/dataTables.buttons.min.js"></script>
    <script src="<?php echo base_url();?>assets/plugins/jquery-datatable/extensions/export/buttons.flash.min.js"></script>
    <script src="<?php echo base_url();?>assets/plugins/jquery-datatable/extensions/export/jszip.min.js"></script>
    <script src="<?php echo base_url();?>assets/plugins/jquery-datatable/extensions/export/pdfmake.min.js"></script>
    <script src="<?php echo base_url();?>assets/plugins/jquery-datatable/extensions/export/vfs_fonts.js"></script>
    <script src="<?php echo base_url();?>assets/plugins/jquery-datatable/extensions/export/buttons.html5.min.js"></script>
    <script src="<?php echo base_url();?>assets/plugins/jquery-datatable/extensions/export/buttons.print.min.js"></script>
	<script src="<?php echo base_url();?>assets/js/pages/tables/jquery-datatable.js"></script>

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
    <script type="text/javascript" language="javascript" class="init">

$(document).ready(function() {
	$('#example').dataTable();
});

	</script>
