
<!-- JQuery DataTable Css -->
    <link href="<?php echo base_url();?>assets/plugins/jquery-datatable/skin/bootstrap/css/dataTables.bootstrap.css" rel="stylesheet">
  
   <section class="content">
        <div class="container-fluid">
            <div class="block-header">
                <h2>
                    All Post-Offices List
                    
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
                               India
                            </h2>
                            <ul class="header-dropdown m-r--5">
                                <li class="dropdown">
                                    <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                                        <i class="material-icons">more_vert</i>
                                    </a>
                                    <ul class="dropdown-menu pull-right">
                                        <li><a href="<?php echo base_url();?>admin/addpostoffice">Add Postoffice</a></li>
                                        <li><a href="javascript:void(0);">Another action</a></li>
                                        <li><a href="javascript:void(0);">Something else here</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </div>
                        <div class="body"> 
                            <table "width="100%" id="example" class="table table-bordered table-striped table-hover dataTable js-exportable">
                                <thead>
                                    <tr>
                                        <th>No</th>
						<th>Office Name</th>
						<th>Address</th>
						<th style="width:70px;">Pincode</th>
						<th style="width:50px;">Type</th>
						<th style="width:150px;">Delevery Status</th>
						<th>District</th>
						<th>State</th>
						<th>lngtitude</th>
						<th>lottitude</th>
						<th>Action</th>
						
                                    </tr>
                                </thead>
                                <tfoot>
                                    <tr>
                                        <th>No</th>
						<th>Office Name</th>
						<th>Address</th>
						<th style="width:70px;">Pincode</th>
						<th style="width:50px;">Type</th>
						<th style="width:150px;">Delevery Status</th>
						<th>District</th>
						<th>State</th>
						<th>lngtitude</th>
						<th>lottitude</th>
						<th>Action</th>
                                    </tr>
                                </tfoot>
                                <tbody>
                                    <tr>
                                        <?php if(count($allPostoffices)>0) { 
					$i=1;
					foreach($allPostoffices as $r)
					{
				
				?>
				
					<tr>
						<td><?php echo $i++;?></td>
						<!--<td><img style="height:45px;width:60px;" src="<?php echo base_url();?>assets/uploads/images(200x200)/<?php 
						if(isset($r->image)&&$r->image!='')echo $r->image; else echo "dflt-user-icn.png";?>"></td>-->
						<td><?php echo $r->officename;?></td>
						<td><?php echo $r->address;?></td>
						<td><?php echo $r->pincode;?></td>
						<td><?php echo $r->type;?></td>
						<td><?php echo $r->Deliverystatus;?></td>
						<td><?php echo $r->Districtname;?></td>
						<td><?php echo $r->statename;?></td>
						<td><?php echo $r->lng;?></td>
						<td><?php echo $r->lat;?></td>
												<td>
							 <a href="<?php echo base_url();?>admin/viewPostoffice/<?php echo $r->id;?>"><div class="btn bg-primary wnm-user">View</div></a>
							 <a href="<?php echo base_url();?>admin/EditPostoffice/<?php echo $r->id;?>"><div class="btn bg-primary wnm-user">Edit</div></a>						 
							 <a href="<?php echo base_url();?>admin/DeletePostoffice/<?php echo $r->id;?>"><div class="btn bg-primary wnm-user" onclick="return confirm('Are you sure you want to delete this record?')">Delete</div></a>
							 
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
