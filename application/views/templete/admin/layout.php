<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<?php $this->load->view('templete/admin/Head'); ?>
<?php $this->load->view('templete/admin/loader'); ?>
<?php $this->load->view('templete/admin/TopNav'); ?>
<?php $this->load->view('templete/admin/Leftsidebar'); ?>
<?php $this->load->view('templete/admin/Rightsidebar'); ?>
<?php $this->load->view($content); ?>
<?php $this->load->view('templete/admin/Scripts'); ?>
<?php $this->load->view('templete/admin/Footer'); ?>