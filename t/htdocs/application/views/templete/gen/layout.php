<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<?php $this->load->view('Layout/gen/Head'); ?>
<?php $this->load->view('Layout/gen/TopNav'); ?>
<?php $this->load->view('Layout/gen/MainNav'); ?>
<?php $this->load->view($content); ?>
<?php $this->load->view('Layout/gen/Footer'); ?>
<?php $this->load->view('Layout/gen/Scripts'); ?>