<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class App extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	
	public function index()
	{
		redirect('app/map');
	}
	
	public function map()
	{
		$this->load->view('maps/mapsindex');
	}
	
	/**public function pincode()
	{
		$table = $this->db->dbprefix('markers');
		$inputdata['pincode'] = $this->input->post('pincode');
		
		$pinview = $this->base_model->run_query(
		"Select * from markers );
		$this->data['pinview'] 	= $pinview;
		
		$this->load->view('maps/bypinlist' ,$this->data);
		
	**/
		
	
	
}