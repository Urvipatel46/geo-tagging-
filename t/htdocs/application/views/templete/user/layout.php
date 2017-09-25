<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<?php $this->load->view('Layout/admin/Head'); ?>
<?php $this->load->view('Layout/admin/TopNav'); ?>
<?php $this->load->view('Layout/admin/MainNav'); ?>
<?php $this->load->view($content); ?>
<?php $this->load->view('Layout/admin/Footer'); ?>
<?php $this->load->view('Layout/admin/Scripts'); ?>