

		 <?php if(isset($user_type) && $user_type == "admin") {
		 
					$link = "admins";
					$text = "Admin";
					
				} else {
				
					$link = "moderators";
					$text = "Moderator";
				
				}	 
		 ?>
		 
         <li><a href="<?php echo base_url();?>admin/<?php echo $link;?>"> <?php echo $text."s";?></a></li>
      
      <?php 
         echo $this->session->flashdata('message');
         ?>
          <section class="content">
        <div class="container-fluid">
            <div class="block-header">
                <h2>User Management</h2>
            </div>
            <!-- Horizontal Layout -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                               Add User
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
						<?php echo form_open("admin/create_user",'class="form-signin" id="user_creation_form" enctype="multipart/form-data" class="form-horizontal"');?>
                   ">
                                <?php if(count($data)>0)
            $data=$data[0];*/
            ?> 

			<input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>" />
			
								
								
            <div class="form-group">
               <label for="ftname">First Name <span style="color:red;">*</span></label>
                  <?php echo form_input($first_name);?>
            </div>
            <div class="form-group">
               <label for="ftname">Last Name <span style="color:red;">*</span></label>
                  <?php echo form_input($last_name);?> 
            </div>
            <div class="form-group">
               <label for="ftname">Phone<span style="color:red;">*</span></label>
                  <?php echo form_input($phone);?>
            </div>
            <div class="form-group">
               <label for="ftname">Email <span style="color:red;">*</span></label>
                  <?php echo form_input($email);?>
            </div>
            <div class="form-group">
               <label for="ftname">Photo <span style="color:red;">*</span></label>
                  <input type="file" name="image" id="image" class=""/>
            </div>
            <div class="form-group">
               <label for="ftname">Password <span style="color:red;">*</span></label>
                  <?php echo form_input($password);?>
            </div>
            <div class="form-group">
               <label for="ftname">Confirm Password <span style="color:red;">*</span></label>
                  <?php echo form_input($password_confirm);?>
            </div>
          
			<?php echo form_hidden('user_type', $user_type) ;?>
			<div class="row clearfix">
                                    <div class="col-lg-offset-2 col-md-offset-2 col-sm-offset-4 col-xs-offset-5">
									<input type="hidden" name="id" value="<?php if(isset($id)) echo $id;?>">
									 <?php echo form_submit('submit', $this->lang->line('new_user_submit_btn'),'class="btn btn-primary wnm-user"');?>
         <button type="submit" class="btn btn-primary m-t-15 waves-effect">Update</button>
                                        
                                    </div>
                                </div>
             
              

            <?php echo form_close(); ?>
								
         
                                
                                
								         
         
        
		
        
        
                        </div>
                    </div>
                </div>
            </div>
            <!-- #END# Horizontal Layout -->
            
        </div>
    </section>
   </div>
</div>

<!-- Validations -->
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



  <!-- Validations -->
<script src="<?php echo base_url();?>assets/designs/js/jquery.min.js"></script>
<script src="<?php echo base_url();?>assets/designs/js/jquery.validate.min.js"></script>
<script src="<?php echo base_url();?>assets/designs/js/additional-methods.min.js"></script>
<script type="text/javascript"> 
   (function($,W,D)
   {
      var JQUERY4U = {};
   
      JQUERY4U.UTIL =
      {
          setupFormValidation: function()
          {
              //Additional Methods			
   		$.validator.addMethod("pwdmatch", function(repwd, element) {
   			var pwd=$('#password').val();
   			return (this.optional(element) || repwd==pwd);
   		},"Password and Confirm passwords does not match.");
   		
   		$.validator.addMethod("lettersonly",function(a,b){return this.optional(b)||/^[a-z ]+$/i.test(a)},"Please enter valid name.");
   		
   		$.validator.addMethod("alphanumericonly",function(a,b){return this.optional(b)||/^[a-z0-9 ]+$/i.test(a)},"Alphanumerics only please");
   		
   		$.validator.addMethod("phoneNumber", function(uid, element) {
   			return (this.optional(element) || uid.match(/^([0-9]*)$/));
   		},"Please enter a valid number.");
   		
   		$.validator.addMethod("alphanumerichyphen", function(uid, element) {
   			return (this.optional(element) || uid.match(/^([a-zA-Z0-9 -]*)$/));
   		},"Only Alphanumerics and hyphens are allowed.");
   
   		$.validator.addMethod('check_duplicate_email', function (value, element) {
   			var is_valid=false;
   				$.ajax({
   						url: "<?php echo base_url();?>welcome/check_duplicate_email",
   						type: "post",
   						dataType: "html",
   						data:{ emailid:$('#email').val(), <?php echo $this->security->get_csrf_token_name();?>: "<?php echo $this->security->get_csrf_hash();?>"},
   						async:false,
   						success: function(data) {
   						//alert(data);
   						is_valid = data == 'true';
   				}
   		   });
   		   return is_valid;
   		}, "The Email-id you've entered already exists.Please enter other Email-id.");
   		
   		
   		//form validation rules
              $("#user_creation_form").validate({
                  rules: {
                      first_name: {
                          required: true,
                          lettersonly: true,
   					rangelength: [3, 30]
                      },
   				last_name: {
                          required: true,
                          lettersonly: true,
   					rangelength: [3, 30]
                      },                    
   				phone: {
                          required: true,
   					phoneNumber: true,
   					rangelength: [10, 11]
                      },
   				email: {
                          required: true,
   					email: true,
   					check_duplicate_email: true
                      },
   				image: {
                          required: true,
						  accept: "jpg|jpeg|png"
                      },
   				password:{
   					required:true,
   					rangelength: [8, 30]
   				},
   				password_confirm:{
   					required:true,
   					pwdmatch: true
   				}
                  },
   			
   			messages: {
   				first_name: {
                          required: "Please enter your first name."
                      },
   				last_name: {
                          required: "Please enter your last name."
                      },                    
   				phone: {
                          required: "Please enter your number."
                      },
   				email: {
                          required: "Please enter your email-id."
                      },
   				image: {
                          required: "Please upload your photo.",
						  accept: "Only jpg / jpeg / png images are accepted."
                      },
   				password:{
   					required: "Please enter password."
   				},
   				password_confirm:{
   					required: "Please enter confirm password."
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
<script src="<?php echo base_url();?>assets/designs/js/bootstrap.min.js"></script>
