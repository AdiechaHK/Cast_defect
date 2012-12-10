<?php 

class Admin extends CI_Controller {

	public function index()
	{
		$this->load->view('home_page');
	}

	public function sign_in_submit()
	{
		$this->load->model('User_model', 'user');
		$responce = $this->user->signIn();

		if($responce["error"] == false) {
			$this->session->set_userdata('isAdmin', true);
			$this->session->set_userdata('user_name', $responce["content"]);
			header('location:'.base_url("/"));			
		} else {
			$this->session->set_userdata("error", true);
			$this->session->set_userdata("error_msg", $responce["content"]);
			header('location:'.site_url("admin/sign_in"));			
		}
	}

	public function sign_in()
	{
		$heder_data['user_name'] = $this->session->userdata('user_name');
		$this->load->view('header', $heder_data);
		$data['error'] = $this->session->userdata('error');
		$data['error_msg'] = $this->session->userdata('error_msg');
		$this->load->view('logIn_form', $data);
		$this->load->view('footer');
	}

	public function sign_out() {
		$this->session->unset_userdata('isAdmin');
		$this->session->unset_userdata('user_name');

		header('location:'.base_url("/"));
	}

	public function add_user_view()
	{

		$heder_data['user_name'] = $this->session->userdata('user_name');
		$this->load->view('header', $heder_data);
		$this->load->view('user_registration_form');
		$this->load->view('footer');
	}

	public function add_user()
	{
		$this->load->helper('url');
		$this->load->helper('form');

		$this->load->model('User_model', 'user');
		$num = $this->user->add();

		$heder_data['user_name'] = $this->session->userdata('user_name');
		$data['num'] = $num;

		$this->load->view('header', $heder_data);
		$this->load->view('user_registration_responce', $data);
		$this->load->view('footer');
	}

	public function remove_error() {
		$this->session->unset_userdata("error");
		$this->session->unset_userdata("error_msg");
	}
}

?>