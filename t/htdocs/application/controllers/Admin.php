<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends MY_Controller {
	
	/***Authenticate Admin for each function by calling the Parent Method 
	validate_admin() in Constructor***/
	function __construct()
    {
        parent::__construct();
		
		$this->load->library('form_validation');
		
    }
	
	/***Admin Dashboard (Default Function. If no function is called, this function
	 will be called)***/
	public function index()
	{
		redirect('admin/dashboard');
	}

	/***Admin Dashboard***/
	function dashboard()
	{
		$this->validate_admin();
		$table = $this->db->dbprefix('users');
		
		//Records of Latest Users
		$latestUsers = $this->base_model->run_query(
		"SELECT u.* FROM users u, users_groups g WHERE u.id=g.user_id
		and g.group_id=2 and u.id!=1 ORDER BY u.id desc LIMIT 5"
		);
		
		//Data For Chart
		$activeUsers = $this->base_model->run_query(
		"select * from ".$table." where id!=1 and active=1 
		ORDER BY date_of_registration"
		);
		
		$inactiveUsers = $this->base_model->run_query(
		"select * from ".$table." where id!=1 and active=0 
		ORDER BY date_of_registration"
		);
		
		$this->data['activeUsersCount'] 	= count($activeUsers);
		$this->data['inactiveUsersCount'] 	= count($inactiveUsers);
		$this->data['latestUsers'] 			= $latestUsers;
		$this->data['pagetitle'] 			= 'Dashboard';
		$this->data['active_menu'] 			= 'Dashboard';
		$this->data['content'] 				= 'admin/index';
		$this->_render_page('templete/admin/layout', $this->data);
		
	}
	
	//View All Users
	function viewAllUsers()
	{
		$this->validate_admin();

		$allUsers 	= $this->base_model->run_query(
		"SELECT u.* FROM users u, users_groups g WHERE u.id=g.user_id
		and g.group_id=2 and u.id!=1 ORDER BY u.id desc "
		);
		$this->data['allUsers'] 	= $allUsers;
		$this->data['pagetitle'] 		= 'General Users';
		$this->data['active_menu'] 	= 'users';
		$this->data['content'] 		= 'admin/view_all_users';
		$this->_render_page('templete/admin/layout', $this->data);
	}
	
	
	//Delete User
	function deleteUser()
	{
		$this->validate_admin();
	
		if ($this->uri->segment(3) != '' && is_numeric($this->uri->segment(3))) {
			$where['id'] = $this->uri->segment(3);
			$this->base_model->delete_record(
			$this->db->dbprefix('users'), 
			$where
			);
			$this->prepare_flashmessage("Record Deleted Successfully", 0);
			if($this->uri->segment(4) != '' && $this->uri->segment(4) == 'admin')
				redirect('admin/admins');
			elseif($this->uri->segment(4) != '' && $this->uri->segment(4) == 'moderator')
				redirect('admin/moderators');
			else
				redirect('admin/viewAllUsers');
		}
	
	}
	
	//View All Admins
	function moderators()
	{
		$this->validate_admin();
		
		$moderators =	$this->base_model->run_query("SELECT u.* FROM users u, users_groups g WHERE u.id=g.user_id and g.group_id=4 ORDER BY u.id desc ");
		$this->data['users'] = $moderators;
		
		$this->data['active_menu']='users';
		$this->data['title'] = 'Moderators - Super Admin Dashboard';
		$this->data['heading'] = 'Moderators';
		
		$this->data['content'] = 'admin/moderators';
		$this->data['user_type'] = 'moderator';
		
		$this->_render_page('templete/admin/layout',$this->data);
	}
	
	
	public function _image_check($image = '', $param2 = '')
	{
		
		$name = explode('.',$param2);
		
		if(count($name)>2 || count($name)<= 0) {
           $this->form_validation->set_message('_image_check', 'Only jpg / jpeg / png images are accepted.');
            return FALSE;
        }
		
		$ext = $name[1];
		
		$allowed_types = array('jpg','jpeg','png');
		
		if (!in_array($ext, $allowed_types)) {			
			$this->form_validation->set_message('_image_check', 'Only jpg / jpeg / png images are accepted.');
			return FALSE;
		}
		else {
			return TRUE;
		}
	}
	
	
	//Create User
	function create_user($user_type = '')
	{
		$this->validate_admin();
		
		$this->data['title'] = "Create User";
	
		//$this->load->config('ion_auth');
		$this->config->load('ion_auth', TRUE);
		$tables = $this->config->item('tables','ion_auth');
		
		if($this->input->post('submit')!='') {
			//validate form input
			$this->form_validation->set_rules('first_name', $this->lang->line('create_user_validation_fname_label'), 'required|xss_clean');
			$this->form_validation->set_rules('last_name', $this->lang->line('create_user_validation_lname_label'), 'required|xss_clean');
			$this->form_validation->set_rules('email', $this->lang->line('create_user_validation_email_label'), 'required|valid_email|is_unique['.$tables['users'].'.email]');
			$this->form_validation->set_rules('phone', $this->lang->line('create_user_validation_phone_label'), 'required|xss_clean|integer');

			$this->form_validation->set_rules('password', $this->lang->line('create_user_validation_password_label'), 'required|min_length[' . $this->config->item('min_password_length', 'ion_auth') . ']|max_length[' . $this->config->item('max_password_length', 'ion_auth') . ']|matches[password_confirm]');
			$this->form_validation->set_rules('password_confirm', $this->lang->line('create_user_validation_password_confirm_label'), 'required');			
			
			if(!empty($_FILES['image']['name'])) {
			
				$this->form_validation->set_rules('image',"Image", 'callback__image_check['.$_FILES['image']['name'].']');			
			
			}

			if ($this->form_validation->run() == true)
			{
				$username = $this->input->post('first_name') . ' ' . $this->input->post('last_name');
				$email    = strtolower($this->input->post('email'));
				$password = $this->input->post('password');
				$image = $_FILES['image']['name'];

				$additional_data = array(
					'first_name' => $this->input->post('first_name'),
					'last_name'  => $this->input->post('last_name'),
					'phone'      => $this->input->post('phone'),
					'date_of_registration'      => date('Y-m-d')
				);
				
				if(!empty($image))
					$additional_data['image'] = $image;
				
				$id = $this->ion_auth->register($username, $password, $email, $additional_data);
				
				if($this->input->post('user_type') == "admin") {
					$empdata['group_id'] = "3";
					$redirect_path = "admin/admins";
				}
				else {
					$empdata['group_id'] = "4";
					$redirect_path = "admin/moderators";
				}
				
				$this->db->where('user_id', $id);
				if($this->db->update('users_groups',$empdata)) {
				
					$this->prepare_flashmessage($this->ion_auth->messages(),2);
					redirect($redirect_path, 'refresh');
				
				}
			}
			else
			{
				//display the create user form
				//set the flash data error message if there is one
				$this->prepare_flashmessage((validation_errors() ? validation_errors() : ($this->ion_auth->errors() ? $this->ion_auth->errors() : $this->session->flashdata('message'))),1);
				redirect("admin/create_user", 'refresh');
				
			}
		}

			$this->data['first_name'] = array(
				'name'  => 'first_name',
				'class'=>'form-control',
				'placeholder'=>'First Name',
				'id'    => 'first_name',
				'type'  => 'text',
				'value' => $this->form_validation->set_value('first_name'),
			);
			$this->data['last_name'] = array(
				'name'  => 'last_name',
				'class'=>'form-control',
				'placeholder'=>'Last Name',
				'id'    => 'last_name',
				'type'  => 'text',
				'value' => $this->form_validation->set_value('last_name'),
			);
			$this->data['email'] = array(
				'name'  => 'email',
				'class'=>'form-control',
				'placeholder'=>'User Email',
				'id'    => 'email',
				'type'  => 'text',
				'value' => $this->form_validation->set_value('email'),
			);
			$this->data['company'] = array(
				'name'  => 'company',
				'class'=>'form-control',
				'placeholder'=>'Company',
				'id'    => 'company',
				'type'  => 'text',
				'value' => $this->form_validation->set_value('company'),
			);
			$this->data['phone'] = array(
				'name'  => 'phone',
				'class'=>'form-control',
				'placeholder'=>'Phone',
				'id'    => 'phone',
				'type'  => 'text',
				'value' => $this->form_validation->set_value('phone'),
			);
			$this->data['password'] = array(
				'name'  => 'password',
				'class'=>'form-control',
				'placeholder'=>'Password',
				'id'    => 'password',
				'type'  => 'password',
				'value' => $this->form_validation->set_value('password'),
			);
			$this->data['password_confirm'] = array(
				'name'  => 'password_confirm',
				'class'=>'form-control',
				'placeholder'=>'Confirm Password',
				'id'    => 'password_confirm',
				'type'  => 'password',
				'value' => $this->form_validation->set_value('password_confirm'),
			);
			
			$this->data['user_type'] = $user_type;
			
			$this->data['content'] = 'admin/create_user';
			$this->_render_page('templete/admin/layout', $this->data);
	}

	//edit a user
	function edit_user($id = '', $user_type = '')
	{
		$this->validate_admin();
		
		$this->data['title'] = "Edit User";

		if($id == "") {
		
			$id = $this->input->post('id');
		
		}
		
		if(!is_numeric($id)){
		return;
		}
		
		$user = $this->ion_auth->user($id)->row();
		$groups=$this->ion_auth->groups()->result_array();
		$currentGroups = $this->ion_auth->get_users_groups($id)->result();

		//validate form input
		$this->form_validation->set_rules('first_name', $this->lang->line('edit_user_validation_fname_label'), 'required|xss_clean');
		$this->form_validation->set_rules('last_name', $this->lang->line('edit_user_validation_lname_label'), 'required|xss_clean');
		$this->form_validation->set_rules('phone', $this->lang->line('edit_user_validation_phone_label'), 'required|xss_clean');
		
		if(!empty($_FILES['image']['name'])) {
			
			$this->form_validation->set_rules('image',"Image", 'callback__image_check['.$_FILES['image']['name'].']');			
		
		}

		if (isset($_POST) && !empty($_POST))
		{
			$data = array(
				'first_name' => $this->input->post('first_name'),
				'last_name'  => $this->input->post('last_name'),
				'company'    => $this->input->post('company'),
				'phone'      => $this->input->post('phone'),
				'username'      => $this->input->post('first_name') . ' ' . $this->input->post('last_name'),
			);
			
			$image = $_FILES['image']['name'];
			
			//update the password if it was posted
			if ($this->input->post('password'))
			{
				$this->form_validation->set_rules('password', $this->lang->line('edit_user_validation_password_label'), 'required|min_length[' . $this->config->item('min_password_length', 'ion_auth') . ']|max_length[' . $this->config->item('max_password_length', 'ion_auth') . ']|matches[password_confirm]');
				$this->form_validation->set_rules('password_confirm', $this->lang->line('edit_user_validation_password_confirm_label'), 'required');

				$data['password'] = $this->input->post('password');
			}

			if ($this->form_validation->run() === TRUE)
			{
				
				if(!empty($image)) {
				
					if (file_exists('assets/uploads/images/'. $user->image)) {
						unlink('assets/uploads/images/'. $user->image);
					}
					if(file_exists('assets/uploads/images(200x200)/'. $user->image)) {
						unlink('assets/uploads/images(200x200)/'. $user->image);
					}
						
					if(file_exists('assets/uploads/images(50x50)/'. $user->image)) {
						unlink('assets/uploads/images(50x50)/'. $user->image);
					}
					
					$ext = explode('.', $image);
					
					if(count($ext)>2 || count($ext)<= 0) {
					   $this->form_validation->set_message('_image_check', 'Only jpg / jpeg / png images are accepted.');
						return FALSE;
					}
					
					$img = $ext[0]."_".$user->id.".".$ext[1];
					
					$data['image'] = $img;
				
				}
				
				$this->ion_auth->update($user->id, $data);

				if($this->input->post('user_type') == "admin") {
					$redirect_path = "admin/admins";
				}
				else {
					$redirect_path = "admin/moderators";
				}
				
				$this->prepare_flashmessage('User Updated Successfully.', 0);
				redirect($redirect_path, 'refresh');
			}
		}

		//display the edit user form
		$this->data['csrf'] = $this->_get_csrf_nonce();

		//set the flash data error message if there is one
		$this->data['message'] = (validation_errors() ? validation_errors() : ($this->ion_auth->errors() ? $this->ion_auth->errors() : $this->session->flashdata('message')));

		//pass the user to the view
		$this->data['user'] = $user;
		$this->data['groups'] = $groups;
		$this->data['currentGroups'] = $currentGroups;

		$this->data['first_name'] = array(
			'name'  => 'first_name',
			'class'=>'form-control',
			'placeholder'=>'First Name',
			'id'    => 'first_name',
			'type'  => 'text',
			'value' => $this->form_validation->set_value('first_name', $user->first_name),
		);
		$this->data['last_name'] = array(
			'name'  => 'last_name',
			'class'=>'form-control',
			'placeholder'=>'Last Name',
			'id'    => 'last_name',
			'type'  => 'text',
			'value' => $this->form_validation->set_value('last_name', $user->last_name),
		);
		$this->data['company'] = array(
			'name'  => 'company',
			'class'=>'form-control',
			'placeholder'=>'Company',
			'id'    => 'company',
			'type'  => 'text',
			'value' => $this->form_validation->set_value('company', $user->company),
		);
		$this->data['phone'] = array(
			'name'  => 'phone',
			'class'=>'form-control',
			'placeholder'=>'Phone',
			'id'    => 'phone',
			'type'  => 'text',
			'value' => $this->form_validation->set_value('phone', $user->phone),
		);
		$this->data['email'] = array(
			'name'  => 'email',
			'class'=>'form-control',
			'placeholder'=>'User Email',
			'id'    => 'email',
			'type'  => 'text',
			'readonly'  => 'readonly',
			'value' => $this->form_validation->set_value('email', $user->email),
		);
		$this->data['password'] = array(
			'name' => 'password',
			'class'=>'form-control',
			'placeholder'=>'Password',
			'id'   => 'password',
			'type' => 'password'
		);
		$this->data['password_confirm'] = array(
			'name' => 'password_confirm',
			'class'=>'form-control',
			'placeholder'=>'Confirm Password',
			'id'   => 'password_confirm',
			'type' => 'password'
		);
		
			$this->data['user_type'] = $user_type;
			$this->data['content']='admin/edit_user';
			$this->_render_page('templete/admin/layout',$this->data);
		//$this->_render_page('auth/edit_user', $this->data);
	}
	
	
	//Admin Profile
	function profile()
	{
		$this->validate_admin();
		
		$userid = $this->session->userdata('user_id');
		if (isset($userid) && $userid != '' && is_numeric($userid)) {
			$table = $this->db->dbprefix('users');
			$condition['id'] = $userid;
			$records = $this->base_model->fetch_records_from(
			$table, 
			$condition,
			$select = 'id, username, first_name, last_name, email, phone, 
			image, active', 
			$order_by = '' 
			);
			$this->data['details'] 	= $records;
			$this->data['content'] 	= 'admin/profile';
			$this->data['title'] 	= 'Admin Profile';
			$this->_render_page('templete/admin/layout', $this->data);
		}
		else {
			$this->prepare_flashmessage('Session Expired!', 2);
			redirect('auth/login', 'refresh');
		}
	}
	
	//View User Profile
	function viewUserProfile()
	{
		$this->validate_admin();
		
		if ($this->uri->segment(3) && is_numeric($this->uri->segment(3))) {
			$userid 				= $this->uri->segment(3);
			$table 					= $this->db->dbprefix('users');
			$condition['id'] 		= $userid;
			$records 				= $this->base_model->fetch_records_from(
			$table, 
			$condition,
			$select 				= 'id, username, email, phone, image, active', 
			$order_by = '' 
			);
			$this->data['details'] 	= $records;
			$this->data['content'] 	= 'admin/view_user_profile';
			$this->data['title'] 	= 'User Profile';
			$this->_render_page('templete/admin/layout', $this->data);
		}
		else {
			redirect('admin', 'refresh');
		}
	}
	
	//Update Admin Profile
	function updateProfile()
	{
		$this->validate_admin();
		
		$this->form_validation->set_rules('first_name', 'First Name', 
		'trim|required|xss_clean');
		$this->form_validation->set_rules('last_name', 'Last Name', 
		'trim|required|xss_clean');
		$this->form_validation->set_rules('email', 'Email', 
		'trim|required|xss_clean|valid_email');
		$this->form_validation->set_rules('phone', 'Phone', 
		'required|xss_clean|integer');
		
		if(!empty($_FILES['image']['name'])) {

			$this->form_validation->set_rules('image',"Image", 'callback__image_check['.$_FILES['image']['name'].']');			

		}
		
		if ($this->form_validation->run() == true) {
			$userid = $this->input->post('user');
			if ($this->input->post('submit')!='' && isset($userid) && $userid!='') {
				$data['first_name'] 	= $this->input->post('first_name');
				$data['last_name'] 		= $this->input->post('last_name');
				$data['username'] 		= $this->input->post('first_name')
				." ".$this->input->post('last_name');
				$data['phone'] 			= $this->input->post('phone');
				$data['email'] 			= $this->input->post('email');
				
				//Unset User Name
				$this->session->unset_userdata('username');
				//Set User Name
				$this->session->set_userdata('username',$data['username']);
				
				$image = $_FILES['image']['name'];
				
				//Upload User Photo
				if (!empty($image)) {	
					$r = $this->base_model->run_query(
					'select image from '.$this->db->dbprefix('users')
					.' where image != "" and id = '.$userid
					);
					if (count($r) > 0) {
					
						if (file_exists('assets/uploads/images/'.$r[0]->image)) {
							unlink('assets/uploads/images/'.$r[0]->image);
						}
						if(file_exists('assets/uploads/images(200x200)/'
						.$r[0]->image)) {
							unlink('assets/uploads/images(200x200)/'.$r[0]->image);
						}
							
						if(file_exists('assets/uploads/images(50x50)/'
						.$r[0]->image)) {
							unlink('assets/uploads/images(50x50)/'.$r[0]->image);
						}
					}
					
					//Unset User Image 
					$this->session->unset_userdata('image');
					
					$ext = explode('.',$image);
					
					$img = $ext[0]."_".$userid.".".$ext[1];
					
					$data['image'] = $img;
					move_uploaded_file(
					$_FILES['image']['tmp_name'], 
					'assets/uploads/images/'.$img
					);
					$this->create_thumbnail(
					'assets/uploads/images/'. $img, 
					'assets/uploads/images(200x200)/'. $img,200,200
					);
					$this->create_thumbnail(
					'assets/uploads/images/'. $img, 
					'assets/uploads/images(50x50)/'. $img,
					50,50
					);
					
					//Set User Image
					$this->session->set_userdata('image',$img);
					
				}
				
				$table 					= $this->db->dbprefix('users');
				$where['id'] 			= $userid;
				$this->base_model->update_operation($data, $table, $where);
				
				$this->prepare_flashmessage(
				'Your profile has been successfully updated.', 0
				);
				redirect('admin/profile', 'refresh');
			}
			else {
				$this->prepare_flashmessage('Session Expired!', 2);
				redirect('auth/login', 'refresh');
			}
		}
		else {
			$this->prepare_flashmessage(validation_errors(), 1);
			redirect('admin/profile', 'refresh');
		}
	}
	
	
	//Block User
	function blockUser()
	{
		$this->validate_admin();
		
		if ($this->uri->segment(3) && is_numeric($this->uri->segment(3))) {
			$userid 					= $this->uri->segment(3);
			$table 						= $this->db->dbprefix('users');
			$data['active'] 			= 0;
			$where['id'] 				= $userid;
			if ($this->base_model->update_operation($data, $table, $where)) {
				$this->prepare_flashmessage("User has been blocked.", 2);
				if($this->uri->segment(4) != '' && $this->uri->segment(4) == 'admin')
					redirect('admin/admins', 'refresh');
				elseif($this->uri->segment(4) != '' && $this->uri->segment(4) == 'moderator')
					redirect('admin/moderators', 'refresh');
				else
					redirect('admin/viewUserProfile/'.$userid, 'refresh');
			}
		}
		else {
			redirect('admin', 'refresh');
		}
	}
		
	
	//Activate User
	function activateUser()
	{
		$this->validate_admin();
		
		if ($this->uri->segment(3) && is_numeric($this->uri->segment(3))) {
			$userid 					= $this->uri->segment(3);
			$table 						= $this->db->dbprefix('users');
			$data['active'] 			= 1;
			$where['id'] 				= $userid;
			if ($this->base_model->update_operation($data, $table, $where)) {
				$this->prepare_flashmessage("User has been activated.", 2);
				if($this->uri->segment(4) != '' && $this->uri->segment(4) == 'admin')
					redirect('admin/admins', 'refresh');
				elseif($this->uri->segment(4) != '' && $this->uri->segment(4) == 'moderator')
					redirect('admin/moderators', 'refresh');
				else
					redirect('admin/viewUserProfile/'.$userid, 'refresh');
			}
		}
		else {
			redirect('admin', 'refresh');
		}
	}
	
	//CRUD Operations for Notifications
	function notifications()
	{
		$this->validate_admin();
		
		if ($this->uri->segment(3) != '') {
			$where['nid'] = $this->uri->segment(3);
			$this->base_model->delete_record(
			$this->db->dbprefix('notifications'), 
			$where
			);
			$this->prepare_flashmessage("Record Deleted Successfully", 0);
			redirect('admin/notifications');		
		}
				
		$this->data['title'] 			= 'Notifications';
		$this->data['active_menu'] 		= 'notifications';
		$this->data['records'] 			= $this->base_model->fetch_records_from(
		$this->db->dbprefix('notifications')
		);
		$this->data['content'] 			= 'admin/notifications/notifications';
		$this->_render_page('templete/admin/layout', $this->data);
	}
	
	function addeditNotifications()
	{
		$this->validate_admin();
		
		$this->load->library('form_validation');
		$this->form_validation->set_rules('title', 'Title', 'trim|required');
		$this->form_validation->set_rules(
		'description', 
		'Description', 
		'trim|required'
		);
		$this->form_validation->set_rules('post_date', 'Post Date', 'trim|required');
		$this->form_validation->set_rules('last_date', 'Last Date', 'trim|required');
		if($this->input->post()) {
			if ($this->form_validation->run() == true) {
				$inputdata['title'] 		= $this->input->post('title');
				$inputdata['description'] 	= $this->input->post('description');
				$inputdata['post_date'] 	= date(
				'Y-m-d', 
				strtotime($this->input->post('post_date'))
				);
				$inputdata['last_date'] 	= date(
				'Y-m-d', 
				strtotime($this->input->post('last_date'))
				);
				$inputdata['status'] 		= $this->input->post('status');
				
				if ($this->input->post('id') == '') {
					$this->base_model->insert_operation(
					$inputdata, 
					$this->db->dbprefix('notifications')
					);
					
					$msg 					= "Record Added Successfully";
				}
				else {
					$where['nid'] 			= $this->input->post('id');
					$this->base_model->update_operation(
					$inputdata,
					$this->db->dbprefix('notifications'), 
					$where
					);
					$msg 					= "Record Updated Successfully";
				}
				$this->prepare_flashmessage($msg, 0);
				redirect('admin/notifications');
			}
			else {
			$this->prepare_flashmessage(validation_errors(), 1);
				redirect('admin/addeditNotifications');
			}
		}
		
		if ($this->uri->segment(3) != '' && is_numeric($this->uri->segment(3))) {
			$this->data['data'] 		= $this->base_model->run_query(
			"select * from ".$this->db->dbprefix('notifications')
			." where nid=".$this->uri->segment(3)
			);
			$this->data['id'] 			= $this->uri->segment(3);
			$this->data['title'] 		= 'Update Notification';
		}
		else {
			$this->data['data'] 		= array();
			$this->data['id'] 			= '';
			$this->data['title'] 		= 'Add Notification';
		}
				
		$Options['Active'] 				= 'Active';
		$Options['Inactive'] 			= 'Inactive';
		$this->data['element'] 			= $Options;
		
		$this->data['active_menu'] 		= 'notifications';
		$this->data['content'] 			= 'admin/notifications/addeditNotifications';
		$this->_render_page('templete/admin/layout', $this->data);
	}
	
	//Update General Settings
	function settings()
	{
		$this->validate_admin();
		
		$this->load->library('form_validation');
		$this->form_validation->set_rules('site_title', 'Site Title', 'trim|required|xss_clean');
		$this->form_validation->set_rules(
		'site_description', 
		'Site Description', 
		'trim|required'
		);
		$this->form_validation->set_rules(
		'site_keywords', 
		'Site Keywords', 
		'trim|required'
		);
		$this->form_validation->set_rules('site_url', 'Site URL', 'trim|required');
		$this->form_validation->set_rules('copy_right', 'Copy Right', 'trim|required');
		$this->form_validation->set_rules('address', 'Address', 'trim|required');
		$this->form_validation->set_rules('phone', 'Phone', 'trim|required|integer');
		$this->form_validation->set_rules(
		'passing_score', 
		'Passing Score', 
		'trim|required|integer'
		);
		$this->form_validation->set_rules(
		'contact_email',
		'Contact Email',
		'trim|required|valid_email'
		);
		$this->form_validation->set_rules(
		'google_analytics',
		'Google Analytics',
		'trim|required'
		);
		$this->form_validation->set_rules(
		'certificate_content', 
		'Certificate Content', 
		'trim|required'
		);
		$this->form_validation->set_rules(
		'certificate_sign_text', 
		'Text for Signature', 
		'trim|required'
		);
		
		if(!empty($_FILES['site_logo']['name'])) {

			$this->form_validation->set_rules('site_logo',"Site Logo", 'callback__image_check['.$_FILES['site_logo']['name'].']');			

		}
		if(!empty($_FILES['certificate_logo']['name'])) {

			$this->form_validation->set_rules('certificate_logo',"Certificate Logo", 'callback__image_check['.$_FILES['certificate_logo']['name'].']');			

		}
		if(!empty($_FILES['certificate_sign']['name'])) {

			$this->form_validation->set_rules('certificate_sign',"Certificate Sign", 'callback__image_check['.$_FILES['certificate_sign']['name'].']');			

		}
		
		if ($this->form_validation->run() == true) {
			$image 		= $_FILES['site_logo']['name'];
			$image2 	= $_FILES['certificate_logo']['name'];
			$image3 	= $_FILES['certificate_sign']['name'];
			
			//Upload Website Logo
			if (!empty($image)) {	
				$r = $this->base_model->run_query(
				"select * from ".$this->db->dbprefix('general_settings').""
				);
				unlink('assets/designs/images/'.$r[0]->site_logo);
				unlink('assets/uploads/'.$r[0]->site_logo);
				
				$ext = explode('.', $_FILES['site_logo']['name']);
				$inputdata['site_logo'] = $image;
				move_uploaded_file(
				$_FILES['site_logo']['tmp_name'], 
				'assets/uploads/'.$image
				);	
				$this->create_thumbnail(
				'assets/uploads/'. $image, 
				'assets/designs/images/'. $image,360,64
				);
			}
			//Upload Logo on Certificate
			if (!empty($image2)) {	
				$r = $this->base_model->run_query(
				"select * from ".$this->db->dbprefix('general_settings').""
				);
				unlink('assets/uploads/certificate/'.$r[0]->certificate_logo);
				
				$inputdata['certificate_logo'] = $image2;
				move_uploaded_file(
				$_FILES['certificate_logo']['tmp_name'], 
				'assets/uploads/certificate/'.$image2
				);
			}
			//Upload Signature on Certificate
			if (!empty($image3)) {	
				$r = $this->base_model->run_query(
				"select * from ".$this->db->dbprefix('general_settings').""
				);
				unlink('assets/uploads/certificate/'.$r[0]->certificate_sign);
				$inputdata['certificate_sign'] = $image3;
				move_uploaded_file(
				$_FILES['certificate_sign']['tmp_name'], 
				'assets/uploads/certificate/'.$image3
				);
			}
			
			
			$inputdata['site_title'] 		= $this->input->post('site_title');
			$inputdata['site_description'] 	= $this->input->post('site_description');
			$inputdata['site_keywords'] 	= $this->input->post('site_keywords');
			$inputdata['site_url'] 			= $this->input->post('site_url');
			$inputdata['copy_right'] 		= $this->input->post('copy_right');
			$inputdata['address'] 			= $this->input->post('address');
			$inputdata['phone'] 			= $this->input->post('phone');
			$inputdata['passing_score'] 	= $this->input->post('passing_score');

			$inputdata['is_performance_report_for'] = $this->input->post('is_performance_report_for');
			$inputdata['quizzes_for'] 		= $this->input->post('quizzes_to_display');
			$inputdata['contact_email'] 	= $this->input->post('contact_email');
			$inputdata['google_analytics'] 	= $this->input->post('google_analytics');
			$inputdata['certificate_content'] = trim($this->input->post(
			'certificate_content')
			);
			$inputdata['certificate_sign_text'] = trim($this->input->post(
			'certificate_sign_text')
			);
			
			$inputdata['updated_date'] 		= date('Y-m-d');
			$this->base_model->update_operation(
			$inputdata, 
			$this->db->dbprefix('general_settings')
			);
			$msg = "Record Updated Successfully";
			$this->prepare_flashmessage($msg, 0);
			redirect('admin/settings');
		}
		
		$this->data['data'] 			= $this->base_model->run_query(
		"select * from ".$this->db->dbprefix('general_settings').""
		);
		$this->data['title'] 			= 'Update Settings';
	
		$this->data['active_menu'] 		= 'settings';
		$this->data['content'] 			= 'admin/settings/settings';
		$this->_render_page('templete/admin/layout', $this->data);
	}
	
	//Update Email Settings
	function emailSettings()
	{
		$this->validate_admin();
		
		$this->load->library('form_validation');
		$this->form_validation->set_rules('smtp_host', 'Smtp Host', 'trim|required');
		$this->form_validation->set_rules('smtp_user', 'Smtp User', 'trim|required|xss_clean');
		$this->form_validation->set_rules('smtp_pass', 'Smtp Password', 'trim|required');
		$this->form_validation->set_rules('smtp_port', 'Smtp Port', 'trim|required');
		if($this->input->post()) {
			if ($this->form_validation->run() == true) {
				$inputdata['smtp_host'] 		= $this->input->post('smtp_host');
				$inputdata['smtp_user'] 		= $this->input->post('smtp_user');
				$inputdata['smtp_pass'] 		= $this->input->post('smtp_pass');
				$inputdata['smtp_port'] 		= $this->input->post('smtp_port');
				$this->base_model->update_operation(
				$inputdata, 
				$this->db->dbprefix('email_setting')
				);
				$msg = "Record Updated Successfully";
				$this->prepare_flashmessage($msg, 0);
				redirect('admin/emailSettings');
			}
			else {				
					$this->prepare_flashmessage(validation_errors(), 1);
					redirect('admin/emailSettings');
			}
		}
		$this->data['data'] 			= $this->base_model->run_query(
		"select * from ".$this->db->dbprefix('email_setting').""
		);
		$this->data['title'] 			= 'Email Settings';
	
		$this->data['active_menu'] 		= 'email-settings';
		$this->data['content'] 			= 'admin/settings/email_settings';
		$this->_render_page('templete/admin/layout', $this->data);
	}
	
	
	//Load View for Uploading Questions in Excel Format
	function uploadexcel()
	{
		if(!$this->ion_auth->logged_in() || !($this->ion_auth->is_admin() || $this->ion_auth->is_moderator()))		
		{				
			$this->prepare_flashmessage("You have no access to this module",1);
				redirect('user', 'refresh');		
		}
		
		$this->data['title'] 			= 'Upload questions';
		$this->data['active_menu'] 		= 'questions';
		$this->data['content'] 			= 'admin/questions/upload_question_excel';
		if($this->ion_auth->is_moderator())
			$template = "moderatortemplate";
		else
			$template = "admintemplate";
			
		$this->_render_page('temp/'.$template, $this->data);
	}
	
	//Read Excel Format Questions and Insert into DB
	function readquestionexcel()
	{
		if(!$this->ion_auth->logged_in() || !($this->ion_auth->is_admin() || $this->ion_auth->is_moderator()))		
		{				
			$this->prepare_flashmessage("You have no access to this module",1);
				redirect('user', 'refresh');		
		}
		
		include(FCPATH.'/assets/excelassets/PHPExcel/IOFactory.php');
		$inputFileName 					= $_FILES['questionsfile']['tmp_name'];
		$objReader 						= new PHPExcel_Reader_Excel5();
		$objPHPExcel 					= $objReader->load($inputFileName);
		echo '<hr />';
		$sheetData 						= $objPHPExcel->getActiveSheet()->toArray(null, true, true, true);
		$i								= 0;
		$j 								= 0;
		$data 							= array();
		$valid 							= 1;
		foreach ($sheetData as $r) {
			if ($i++ != 0) {			
			    if ($valid == 1) {
					$data[$j++] = array(
										'subjectid' 	=> $r['A'], 
										'questiontype' 	=> $r['B'],
										'totalanswers' 	=> $r['C'],
										'question' 		=> $r['D'],
										'answer1' 		=> $r['E'], 
										'answer2' 		=> $r['F'],
										'answer3' 		=> $r['G'],
										'answer4' 		=> $r['H'],
										'answer5' 		=> $r['I'],
										'correctanswer' => $r['J'],
										'difficultylevel' => $r['K'],
										'status' 		=> $r['L']
										);
				}
				else {
					break;
				}
			}
		
		}
			if ($valid == 1) {
				$this->db->insert_batch($this->db->dbprefix('questions'), $data);
			}
			else {
				$msg 	= "Invalid Data in excel";
				 $this->prepare_flashmessage($msg, 1);
				 redirect('admin/uploadexcel', 'refresh');
			}
			
			if ($this->db->affected_rows() > 0) {
				$msg = "Questions inserted Successfully";
				$this->prepare_flashmessage($msg, 0);
			}
			else {
				 $msg = "Questions not inserted Successfully";
				 $this->prepare_flashmessage($msg, 1);
			}
				redirect('admin/uploadexcel', 'refresh');
	}
	
	//About Us Content Updation
	function aboutusContent()
	{
		$this->validate_admin();
		
		$this->load->library('form_validation');
		$this->form_validation->set_rules(
		'content', 
		'Content for Aboutus', 
		'trim|required'
		);
		
		if ($this->form_validation->run() == true) {		
			$inputdata['content'] = trim($this->input->post('content'));
			$inputdata['date_modified'] = date('Y-m-d');
			$this->base_model->update_operation(
			$inputdata, 
			$this->db->dbprefix('aboutus_content')
			);
			$msg = "Record Updated Successfully";
			$this->prepare_flashmessage($msg, 0);
			redirect('admin/aboutusContent');
		}
		
		$this->data['data'] = $this->base_model->run_query(
		"select * from ".$this->db->dbprefix('aboutus_content').""
		);
		$this->data['title'] 			= 'Update Aboutus Content';
		$this->data['active_menu'] 		= 'aboutus_content';
		$this->data['content'] 			= 'admin/aboutus_content';
		$this->_render_page('templete/admin/layout', $this->data);
	}
	
	//Validation for checking duplicates when performing add operation
	function check_duplicates()
	{
		if(!$this->ion_auth->logged_in() || !($this->ion_auth->is_admin() || $this->ion_auth->is_moderator()))		
		{				
			$this->prepare_flashmessage("You have no access to this module",1);
				redirect('user', 'refresh');		
		}
		
		$table 							= $this->input->post('table');
		$cond 							= $this->input->post('condition');
		$cond_val 						= $this->input->post('condition_value');
		$condition[$cond] 				= $cond_val;
		if ($this->base_model->check_duplicates($table,$condition)) {
		    echo "false";//No Availability	
		}
		else {
			echo "true";
		}
	}
	
	
	//Validation for checking duplicates when performing update operation. Here will check the availability except with the updating one.
	function check_duplicates_with_not_cond()
	{
		if(!$this->ion_auth->logged_in() || !($this->ion_auth->is_admin() || $this->ion_auth->is_moderator()))		
		{				
			$this->prepare_flashmessage("You have no access to this module",1);
				redirect('user', 'refresh');		
		}
		
		$table 							= $this->input->post('table');
		$cond 							= $this->input->post('condition');
		$cond_val 						= $this->input->post('condition_value');
		$not_cond 						= $this->input->post('not_condition');
		$not_cond_val 					= $this->input->post('not_condition_value');
		$duplicates 					= $this->base_model->run_query(
		"select * from ".$this->db->dbprefix($table)." where "
		.$cond."='".$cond_val."' and ".$not_cond."!=".$not_cond_val
		);
	
		if (count($duplicates)>0) {
			echo "false";//No Availability
		}
		else {
			echo "true";
		}
	}
	
	// Function For Logout
	function logout()
	{
		$this->session->sess_destroy();
		$this->prepare_flashmessage("You have successfully logout", 0);
		redirect('welcome');
	
	}
	// function for Uploading Logo
	function do_upload()
	{
		$this->validate_admin();
		
		$config['upload_path'] 			= './assets/uploads/paypal_logo';
		$config['allowed_types'] 		= 'jpg';
		$config['max_size']				= '1000';
		$config['max_width']  			= '400';
		$config['max_height'] 			= '100';
		$config['file_name'] 			= 'logo.jpg';
		$config['overwrite'] 			= TRUE;

		$this->load->library('upload', $config);

		if (!$this->upload->do_upload())
		{
			$this->prepare_flashmessage($this->upload->display_errors(), 1);
			redirect('admin/paypal_settings');
		}
		else
		{
			$this->prepare_flashmessage("Logo Uploaded Successfully", 0);
			redirect('admin/paypal_settings');
			
		}
	}
	
	function group_settings()
	{
		$this->validate_admin();
		
		if ($this->uri->segment(3) != '' && is_numeric($this->uri->segment(3))) {
			$where['id'] 	= $this->uri->segment(3);
			$this->base_model->delete_record($this->db->dbprefix('group_settings'), $where);
			$this->prepare_flashmessage("Record Deleted Successfully", 0);
			redirect('admin/group_settings');		
		}
				
		$this->data['title'] 		= 'Group Settings';
		$this->data['active_menu'] 	= '';
		$this->data['records'] 		= $this->base_model->fetch_records_from(
		$this->db->dbprefix('group_settings')
		);
		$this->data['content'] 		= 'admin/settings/group_settings';
		$this->_render_page('templete/admin/layout', $this->data);
	}
	
	
	function add_group()
	{
		$this->validate_admin();
		
		$this->load->library('form_validation');
		
		$this->form_validation->set_rules('group_name', 'Group Name', 'trim|required');
		
		if ($this->input->post()) {
			if ($this->form_validation->run() == true) {
				$inputdata['group_name'] 		= $this->input->post('group_name');
				$inputdata['status'] 	= $this->input->post('status');
				
				if ($this->input->post('id') == '') {
					$this->base_model->insert_operation(
					$inputdata,
					$this->db->dbprefix('group_settings')
					);
					
					$msg = "Record Added Successfully";
				}
				else {
					$where['id'] = $this->input->post('id');
					$this->base_model->update_operation(
					$inputdata, 
					$this->db->dbprefix('group_settings'), 
					$where
					);
					$msg = "Record Updated Successfully";
				}
				$this->prepare_flashmessage($msg, 0);
				redirect('admin/group_settings', 'refresh');
			}
			else {
				$this->prepare_flashmessage(validation_errors(), 1);
				redirect('admin/add_group', 'refresh');
			}
		}
		if ($this->uri->segment(3) != '' && is_numeric($this->uri->segment(3))) {
			$this->data['data'] 	= $this->base_model->run_query(
			"select * from ".$this->db->dbprefix('group_settings')
			." where id=".$this->uri->segment(3)
			);
			$this->data['id'] 		= $this->uri->segment(3);
			$this->data['title'] 	= 'Update Group';
		}
		else {
			$this->data['data'] 	= array();
			$this->data['id'] 		= '';
			$this->data['title'] 	= 'Add Group';
		}
		$Options['Active'] 			= 'Active';
		$Options['Inactive'] 		= 'Inactive';
		$this->data['element'] 		= $Options;
		$this->data['active_menu'] 	= '';
		$this->data['content'] 		= 'admin/settings/add_group_settings';
		$this->_render_page('templete/admin/layout', $this->data);
	}
	
	
	 
}
