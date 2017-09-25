    <section class="content">
        <div class="container-fluid">
            <div class="block-header">
                <h2>App Settings</h2>
            </div>
            <!-- Horizontal Layout -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                               Update App Settings
                            </h2>
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
                            <form method="POST" action="<?php echo base_url();?>admin/settings" id="settings_form" enctype="multipart/form-data"class="form-horizontal">
                                 <?php if(count($data)>0)
            $data=$data[0];
            ?> 

			<input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>" />
			
								<div class="row clearfix">
                                    <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                        <label for="email_address_2">Site_Title</label>
										<?php 
               $val = '';
               	if ($this->input->post( 'site_title' )) {
               	$val = $this->input->post( 'site_title' );
               	}
               	elseif (count($data)) {
               		$val = $data->site_title;
               	}
            ?>

                                    </div>
                                    <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input type="text" id="site_title" name="site_title" value="<?php echo $val;?>" placeholder="Enter Site Title"  class="form-control" >
                                            </div>
                                        </div>
                                    </div>
                                </div>
								<div class="row clearfix">
                                    <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                        <label for="email_address_2">Site Description</label>
										<?php 
               $val = '';
               	if ($this->input->post('site_description')) {
					$val = $this->input->post('site_description');
               	}
               	elseif (count($data)) {
               		$val = $data->site_description;
               	}
               ?>
										

                                    </div>
                                    <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <textarea id="site_description" class="form-control"name="site_description" value="<?php echo $val;?>" placeholder="Enter Site Description" ><?php echo $val;?></textarea>
                                            </div>
                                        </div>
                                    </div>
                                </div>
								<div class="row clearfix">
                                    <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                        <label for="email_address_2">Site Keywords</label>
										<?php 
               $val = '';
               	if ($this->input->post('site_keywords')) {
					$val = $this->input->post('site_keywords');
               	}
               	elseif (count($data)) {
               		$val = $data->site_keywords;
               	}
               ?>
            

                                    </div>
                                    <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                        <div class="form-group">
                                            <div class="form-line">
                                    <textarea class="form-control" id="site_keywords" name="site_keywords" value="<?php echo $val;?>" placeholder="Enter Site Keywords" ><?php echo $val;?></textarea>
                                            </div>
                                        </div>
                                    </div>
                                </div>
								<div class="row clearfix">
                                    <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                        <label for="email_address_2">Site URL</label>
										<?php 
               $val = '';
               	if ($this->input->post('site_url')) {
					$val = $this->input->post('site_url');
               	}
               	elseif (count($data)) {
               		$val = $data->site_url;
               	}
               
               ?>

                                    </div>
                                    <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input type="text" class="form-control" id="site_url" name="site_url" value="<?php echo $val;?>" placeholder="Enter Site URL" />
												
                                            </div>
                                        </div>
                                    </div>
                                </div>
								<div class="row clearfix">
                                    <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                        <label for="email_address_2">Copyright</label>
										<?php 
				$val = '';
					if(($this->input->post('copy_right' )))
					{
					$val = $this->input->post('copy_right');
					}
					elseif(count($data))
					{
						$val = $data->copy_right;
					}
	
			?>
						
            

                                    </div>
                                    <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input type="text" class="form-control" id="copy_right" name="copy_right" value="<?php echo $val;?>" placeholder="Enter Copy Right" > 
                                            </div>
                                        </div>
                                    </div>
                                </div>
								<div class="row clearfix">
                                    <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                             <label for="inputEmail">Site Logo</label>
        

                                    </div>
                                    <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                        <div class="form-group">
                                            <div class="form-line">
                                                    <input type="file" id="site_logo" class="form-control" name="site_logo">
                                            </div>
                                        </div>
                                    </div>
                                </div>
								
                                <div class="row clearfix">
                                    <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
            <label for="inputEmail">Address</label>
			 <?php 
               $val = '';
               	if ($this->input->post('address')) {
					$val = $this->input->post('address');
               	}
               	elseif (count($data)) {
               		$val = $data->address;
               	}
               
               ?>
                                    </div>
                                    <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <textarea class="form-control" id="address" name="address" value="<?php echo $val;?>" placeholder="Enter Address" ><?php echo $val;?></textarea>
                                            </div>
                                        </div>
                                    </div>
                                </div>
								<div class="row clearfix">
                                    <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                        <label for="password_2">Contact Email</label>
										<?php 
               $val = '';
               	if ($this->input->post('contact_email')) {
					$val = $this->input->post('contact_email');
               	}
               	elseif (count($data)) {
               		$val = $data->contact_email;
               	}
            ?>
                                    </div>
                                    <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input type="text" class="form-control" id="contact_email" name="contact_email" value="<?php echo $val;?>" placeholder="Enter Contact Email" >
                                            </div>
                                        </div>
                                    </div>
                                </div>
								<div class="row clearfix">
                                    <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                        <label for="password_2">Phone</label>
										 <?php 
               $val = '';
               	if ($this->input->post( 'phone' )) {
					$val = $this->input->post('phone');
               	}
               	elseif (count($data)) {
               		$val = $data->phone;
               	}
               ?>
            
        
                                    </div>
                                    <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input type="text" class="form-control" id="phone" name="phone" value="<?php echo $val;?>" placeholder="Enter Phone Number" >
                                            </div>
                                        </div>
                                    </div>
                                </div>
								<div class="row clearfix">
                                    <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                        <label for="password_2">Google Analytics</label>
								<?php 
               $val = '';
               	if ($this->input->post('google_analytics')) {
					$val = $this->input->post('google_analytics');
               	}
               	elseif (count($data)) {
               		$val = $data->google_analytics;
               	}
            ?>
			</div>
                                    <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <textarea class="form-control" id="google_analytics" name="google_analytics" placeholder="Type Google Analytics" ><?php echo $val;?></textarea>
                                            </div>
                                        </div>
                                    </div>
                                </div>
           
         
                                
                                <div class="row clearfix">
                                    <div class="col-lg-offset-2 col-md-offset-2 col-sm-offset-4 col-xs-offset-5">
									<input type="hidden" name="id" value="<?php if(isset($id)) echo $id;?>">
         <button type="submit" class="btn btn-primary m-t-15 waves-effect">Update</button>
                                        
                                    </div>
                                </div>
								         
         
        
		
        
        
                        </div>
                    </div>
                </div>
            </div>
            <!-- #END# Horizontal Layout -->
            
        </div>
    </section>

<script src="<?php echo base_url();?>assets/designs/js/jquery.validate.min.js"></script>
<script type="text/javascript"> 
   (function($,W,D)
   {
      var JQUERY4U = {};
   
      JQUERY4U.UTIL =
      {
          setupFormValidation: function()
          {			
   		//form validation rules
              $("#settings_form").validate({
                  
   			ignore: "", //To validate hidden fields
   			rules: {
                      site_title: {
   					required: true,
   					rangelength: [5, 100]
   				},
   				site_description: {
   					required: true
   				},
   				site_keywords: {
   					required: true
   				},
   				site_url: {
   					required: true,
   					url: true
   				},
   				address: {
   					required: true
   				},
   				phone: {
   					required: true,
   					digits: true,
   					rangelength: [10,11]
   				},
   				passing_score: {
   					required: true,
   					digits: true
   				},
   				contact_email: {
   					required: true,
   					email: true
   				},
				site_logo: {
				
					accept: "jpg|jpeg|png"
				
				},
				certificate_logo: {
				
					accept: "jpg|jpeg|png"
				
				},
				certificate_sign: {
				
					accept: "jpg|jpeg|png"
				
				},
   				certificate_content: {
   					required: true
   				},
   				certificate_sign_text: {
   					required: true
   				}
   				
                  },
   			
   			messages: {
   				site_title: {
   					required: "Please enter title of website."
   				},
   				site_description: {
   					required: "Please enter description for website."
   				},
   				site_keywords: {
   					required: "Please enter site keywords."
   				},
   				site_url: {
   					required: "Please enter site URL."
   				},
   				address: {
   					required: "Please enter address that is to be appear in contact page."
   				},
   				phone: {
   					required: "Please enter contact number."
   				},
   				passing_score: {
   					required: "Please enter qualifying score of the quizzes/exams."
   				},
   				contact_email: {
   					required: "Please enter contact email."
   				},
				site_logo: {
				
					accept: "Only jpg / jpeg / png images are accepted."
				
				},
				certificate_logo: {
				
					accept: "Only jpg / jpeg / png images are accepted."
				
				},
				certificate_sign: {
				
					accept: "Only jpg / jpeg / png file formats are accepted."
				
				},
   				certificate_content: {
   					required: "Please enter content for certificate."
   				},
   				certificate_sign_text: {
   					required: "Please enter text that is to be appear under the uploaded signature."
   				}
   			},
                  
                  submitHandler: function(form) {
                      form.submit();
                  }
              });
          }
      }
   
      //when the dom has loaded setup form validation rules
      $(D).ready(function($) {
          JQUERY4U.UTIL.setupFormValidation();
      });
   
   })(jQuery, window, document);
   
</script>

