<?php
echo("pincode: " . $_POST['pincode'] . "<br />\n"); ?>
<?php
  /*$dbhost = 'localhost:3036';
   $dbuser = 'root';
   $dbpass = '';
   
   $conn = mysqli_connect($dbhost, $dbuser, $dbpass);
   
   if(! $conn ) {
      die('Could not connect: ' . mysqli_error());
   }
   
   $sql = 'SELECT * FROM markers where $pincode';
   mysqli_select_db('newportal');
   $retval = mysqli_query( $sql, $conn );
   
   if(! $retval ) {
      die('Could not get data: ' . mysqli_error());
   }
   
   while($row = mysqli_fetch_assoc($retval)) {
      echo " ID :{$row['id']}  <br> ".
         "Office NAME : {$row['officename']} <br> ".
         "pincode : {$row['pincode']} <br> ".
         "--------------------------------<br>";
   }
   
   echo "Fetched data successfully\n";
   
   mysqli_close($conn); */
?>

<?php
$con = mysqli_connect("localhost","root","","newportal");

// Check connection
if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }
?>

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
                                       <?php if(count($pinview)>0) { 
					$i=1;
					foreach($pinview as $r)
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

?>
