<?php 

class Panel extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		if( ! $this->session->userdata('isAdmin')) {
			header("location:".base_url("/"));
		}
	}

	public function index()
	{
		$this->load->view('home_page');
	}

	public function home()
	{
		header("location:".site_url("casting/item_list"));
	}
}

?>