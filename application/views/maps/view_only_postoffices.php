<section class="content">
        <div class="container-fluid">            
            <!-- Horizontal Layout -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                VIEW POSTOFFICE
                            </h2>
                            
                        </div>
                        <div class="body">
                            <form class="form-horizontal">
                                <div class="row clearfix">
                                    <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                        <label for="Id">Id</label>
									<?php 
               $val = '';
               	if ($this->input->post('Id')) {
					$val = $this->input->post('Id');
               	}
               	elseif (count($data)) {
               		$val = $data->Id;
               	}
               ?>	
                                    </div>
                                    <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input value="<?php echo $val; ?>" type="text" id="Id" class="form-control" placeholder="Enter your Id">
                                            </div>
                                        </div>
                                    </div>
                                </div>
								<div class="row clearfix">
                                    <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                        <label for="Office_Name">Office Name</label>
                                    <?php 
               $val = '';
               	if ($this->input->post('Office_Name')) {
					$val = $this->input->post('Office_Name');
               	}
               	elseif (count($data)) {
               		$val = $data->Office_Name;
               	}
               ?>
									</div>
                                    <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input value="<?php echo $val; ?>" type="text" id="Office_Name" class="form-control" placeholder="Enter your Office Name">
                                            </div>
                                        </div>
                                    </div>
                                </div>
								<div class="row clearfix">
                                    <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                        <label for="Pincode">Pincode</label>
                                    <?php 
               $val = '';
               	if ($this->input->post('Pincode')) {
					$val = $this->input->post('Pincode');
               	}
               	elseif (count($data)) {
               		$val = $data->Pincode;
               	}
               ?>
									</div>
                                    <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input value="<?php echo $val;?>" type="text" id="Pincode" class="form-control" placeholder="Enter Pincode">
                                            </div>
                                        </div>
                                    </div>
                                </div>
								<div class="row clearfix">
                                    <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                        <label for="Office_Type">Office Type</label>
                                    <?php 
               $val = '';
               	if ($this->input->post('Office_Type')) {
					$val = $this->input->post('Office_Type');
               	}
               	elseif (count($data)) {
               		$val = $data->Office_Type;
               	}
               ?>
									</div>
                                    <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input value="<?php echo $val; ?>" type="text" id="Office_Type" class="form-control" placeholder="Enter Office Type">
                                            </div>
                                        </div>
                                    </div>
                                </div>
								<div class="row clearfix">
                                    <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                        <label for="Delivery_Status">Delivery Status</label>
                                    <?php 
               $val = '';
               	if ($this->input->post('Delivery_Status')) {
					$val = $this->input->post('Delivery_Status');
               	}
               	elseif (count($data)) {
               		$val = $data->Delivery_Status;
               	}
               ?>
									</div>
                                    <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input value="<?php echo $val; ?>" type="text" id="Delivery_Status" class="form-control" placeholder="Enter Delivery Status">
                                            </div>
                                        </div>
                                    </div>
                                </div>
								<div class="row clearfix">
                                    <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                        <label for="Division">Division</label>
										<?php 
               $val = '';
               	if ($this->input->post('Division')) {
					$val = $this->input->post('Division');
               	}
               	elseif (count($data)) {
               		$val = $data->Division;
               	}
               ?>
                                    </div>
                                    <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input value="<?php echo $val; ?>" type="text" id="Division" class="form-control" placeholder="Enter Division">
                                            </div>
                                        </div>
                                    </div>
                                </div>
								<div class="row clearfix">
                                    <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                        <label for="Region">Region</label>
                                    <?php 
               $val = '';
               	if ($this->input->post('Region')) {
					$val = $this->input->post('Region');
               	}
               	elseif (count($data)) {
               		$val = $data->Region;
               	}
               ?>
									</div>
                                    <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input value="<?php echo $val; ?>" type="text" id="Region" class="form-control" placeholder="Enter Region">
                                            </div>
                                        </div>
                                    </div>
                                </div>
								<div class="row clearfix">
                                    <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                        <label for="Circle">Circle</label>
                                    <?php 
               $val = '';
               	if ($this->input->post('Circle')) {
					$val = $this->input->post('Circle');
               	}
               	elseif (count($data)) {
               		$val = $data->Circle;
               	}
               ?>
									</div>
                                    <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input value="<?php echo $val; ?>" type="text" id="Circle" class="form-control" placeholder="Enter Circle">
                                            </div>
                                        </div>
                                    </div>
                                </div>
								<div class="row clearfix">
                                    <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                        <label for="Taluka">Taluka</label>
                                    <?php 
               $val = '';
               	if ($this->input->post('Taluka')) {
					$val = $this->input->post('Taluka');
               	}
               	elseif (count($data)) {
               		$val = $data->Taluka;
               	}
               ?>
									</div>
                                    <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input value="<?php echo $val; ?>" type="text" id="Taluka" class="form-control" placeholder="Enter Taluka">
                                            </div>
                                        </div>
                                    </div>
                                </div>
								<div class="row clearfix">
                                    <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                        <label for="District">District</label>
                                    <?php 
               $val = '';
               	if ($this->input->post('District')) {
					$val = $this->input->post('District');
               	}
               	elseif (count($data)) {
               		$val = $data->District;
               	}
               ?>
									</div>
                                    <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input value="<?php echo $val;?>" type="text" id="District" class="form-control" placeholder="Enter District">
                                            </div>
                                        </div>
                                    </div>
                                </div>
								<div class="row clearfix">
                                    <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                        <label for="State">State</label>
										<?php 
               $val = '';
               	if ($this->input->post('State')) {
					$val = $this->input->post('State');
               	}
               	elseif (count($data)) {
               		$val = $data->State;
               	}
               ?>
                                    </div>
                                    <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input value="<?php echo $val; ?>" type="text" id="State" class="form-control" placeholder="Enter State">
                                            </div>
                                        </div>
                                    </div>
                                </div>
								<div class="row clearfix">
                                    <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                        <label for="Telephone">Telephone</label>
                                    <?php 
               $val = '';
               	if ($this->input->post('Telephone')) {
					$val = $this->input->post('Telephone');
               	}
               	elseif (count($data)) {
               		$val = $data->Telephone;
               	}
               ?>
									</div>
                                    <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input value="<?php echo $val;?>" type="text" id="Telephone" class="form-control" placeholder="Enter Telephone">
                                            </div>
                                        </div>
                                    </div>
                                </div>
								<div class="row clearfix">
                                    <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                        <label for="Related_Suboffice">Related Suboffice</label>
										<?php 
               $val = '';
               	if ($this->input->post('Related_Suboffice')) {
					$val = $this->input->post('Related_Suboffice');
               	}
               	elseif (count($data)) {
               		$val = $data->Related_Suboffice;
               	}
               ?>
                                    </div>
                                    <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input value="<?php echo $val; ?>" type="text" id="Related_Suboffice" class="form-control" placeholder="Enter Related Suboffice">
                                            </div>
                                        </div>
                                    </div>
                                </div>
								<div class="row clearfix">
                                    <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                        <label for="Related_Headoffice">Related Headoffice</label>
                                    <?php 
               $val = '';
               	if ($this->input->post('Related_Headoffice')) {
					$val = $this->input->post('Related_Headoffice');
               	}
               	elseif (count($data)) {
               		$val = $data->Related_Headoffice;
               	}
               ?>
									</div>
                                    <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input value="<?php echo $val; ?>" type="text" id="Related_Headoffice" class="form-control" placeholder="Enter Related Headoffice">
                                            </div>
                                        </div>
                                    </div>
                                </div>
								<div class="row clearfix">
                                    <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                        <label for="Longitude">Longitude</label>
                                    <?php 
               $val = '';
               	if ($this->input->post('Longitude')) {
					$val = $this->input->post('Longitude');
               	}
               	elseif (count($data)) {
               		$val = $data->Longitude;
               	}
               ?>
									</div>
                                    <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input value="<?php echo $val; ?>" type="text" id="Longitude" class="form-control" placeholder="Enter Longitude">
                                            </div>
                                        </div>
                                    </div>
                                </div>
								<div class="row clearfix">
                                    <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                        <label for="Latitude">Latitude</label>
                                    <?php 
               $val = '';
               	if ($this->input->post('Latitude')) {
					$val = $this->input->post('Latitude');
               	}
               	elseif (count($data)) {
               		$val = $data->Latitude;
               	}
               ?>
									</div>
                                    <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input value="<?php echo $val; ?>" type="text" id="Latitude" class="form-control" placeholder="Enter Latitude">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row clearfix">
                                    <div class="col-lg-offset-2 col-md-offset-2 col-sm-offset-4 col-xs-offset-5">
                                        <button type="button" class="btn btn-primary m-t-15 waves-effect">SUBMIT</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!-- #END# Horizontal Layout -->
        </div>
    </section>
