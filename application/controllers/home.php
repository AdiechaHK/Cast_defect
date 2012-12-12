<?php 

class Home extends CI_Controller {

	public function index() 
	{
		$heder_data['user_name'] = $this->session->userdata('user_name');
		$this->load->model('Casting_model', 'casting');
		$res = $this->casting->list_all();
		$data['cast_list'] = $res;

		$this->load->view('header', $heder_data);
		$this->load->view('home_page', $data);
		$this->load->view('footer');
	}

	public function defects_list()
	{
		$heder_data['user_name'] = $this->session->userdata('user_name');
		$this->load->model('Defect_model', 'defect');
		$data['def_list'] = $this->defect->item_list_with_details();

		$this->load->view('header', $heder_data);
		$this->load->view('list_of_defects', $data);
		$this->load->view('footer');

	}

	public function defect_detail($id)
	{
		// load models
		$this->load->model('Defect_model', 'defect');
		$this->load->model('Image_model', 'image');
		$this->load->model('Param_model', 'param');
		$this->load->model('Cr_model', 'cr');

		// Set data
		$img_row = $this->image->select_item($id);
		$def_row = $this->defect->select_item($id);
		if($img_row != null) $data['image'] = $img_row->image;
		$data['title'] = $def_row->title;
		$data['description'] = $def_row->description;
		$data['param_list'] = $this->param->param_of_defect($id);
		$data['cr_list'] = $this->cr->cr_of_defect($id);


		$heder_data['user_name'] = $this->session->userdata('user_name');
		$this->load->view('header', $heder_data);
		$this->load->view('details_of_defect', $data);
		$this->load->view('footer');

	}

	public function history()
	{
		$heder_data['user_name'] = $this->session->userdata('user_name');

		$this->load->view('header', $heder_data);
		$this->load->view('history_page', $data);
		$this->load->view('footer');

	}

	public function about_us()
	{
		$heder_data['user_name'] = $this->session->userdata('user_name');

		$this->load->view('header', $heder_data);
		$this->load->view('about_us_page', $data);
		$this->load->view('footer');

	}
}

?>