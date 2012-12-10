<?php

class Param extends CI_Controller {

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
	public function item_list()
	{

		$this->load->model('Param_model', 'param');
		$data['result'] = $this->param->item_list();

		$heder_data['user_name'] = $this->session->userdata('user_name');
		$this->load->view('header', $heder_data);
		$this->load->view('side_bar');
		$this->load->view('param_list', $data);
		$this->load->view('footer');
	}

	public function add_item()
	{
		$this->load->model('Param_model', 'param');
		$data = $this->param->new_item();
		$data['title_text'] = "Add Parameter";
		
		$heder_data['user_name'] = $this->session->userdata('user_name');
		$this->load->view('header', $heder_data);
		$this->load->view('side_bar');
		$this->load->view('param_item_form', $data);
		$this->load->view('footer');
	}

	public function edit_item($id)
	{
		$this->load->model('Param_model', 'param');
		$sel_item = $this->param->select_item($id);
		$data['id'] = $id;
		$data['title'] = $sel_item->title;
		$data['title_text'] = "Update Parameter";
		$heder_data['user_name'] = $this->session->userdata('user_name');
		$this->load->view('header', $heder_data);
		$this->load->view('side_bar');
		$this->load->view('param_item_form', $data);
		$this->load->view('footer');
	}

	public function save_item()
	{

		// Database interaction
		$this->load->model('Param_model', 'param');
		$data = array('title' => $_POST['title']);
		if(isset($_POST['id']))
		{
			$this->param->update_item($data, $_POST['id']);
		}
		else 
		{
			$this->param->insert_item($data);
		}
		header("location:".site_url("param/item_list"));
	}

	public function remove_item($id)
	{
		$this->load->model('Param_model', 'param');
		$this->param->remove_item($id);
		header("location:".site_url("param/item_list"));
	}
}


?>