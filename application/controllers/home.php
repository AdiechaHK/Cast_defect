<?php 

class Home extends CI_Controller {

	public function index() 
	{
		$heder_data['user_name'] = $this->session->userdata('user_name');;
		$this->load->view('header', $heder_data);
		$this->load->view('home_page');
		$this->load->view('footer');
	}
}

?>