<?php 

class Defect extends CI_Controller {

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

		$this->load->model('Defect_model', 'defect');
		$data['result'] = $this->defect->item_list();

		$heder_data['user_name'] = $this->session->userdata('user_name');
		$this->load->view('header', $heder_data);
		$this->load->view('side_bar');
		$this->load->view('defect_list', $data);
		$this->load->view('footer');
	}

	public function add_item()
	{
		$this->load->model('Defect_model', 'defect');
		$data = $this->defect->new_item();
		$data['title_text'] = "Add Defect";
		
		$heder_data['user_name'] = $this->session->userdata('user_name');
		$this->load->view('header', $heder_data);
		$this->load->view('side_bar');
		$this->load->view('defect_item_form', $data);
		$this->load->view('footer');
	}

	public function edit_item($id)
	{
		$this->load->model('Defect_model', 'defect');
		$sel_item = $this->defect->select_item($id);
		$data['id'] = $id;
		$data['title'] = $sel_item->title;
		$data['description'] = $sel_item->description;
		$data['title_text'] = "Update Defect";
		$heder_data['user_name'] = $this->session->userdata('user_name');
		$this->load->view('header', $heder_data);
		$this->load->view('side_bar');
		$this->load->view('defect_item_form', $data);
		$this->load->view('footer');
	}

	public function save_item()
	{

		// Database interaction
		$this->load->model('Defect_model', 'defect');
		$data = array(
				'title' => $_POST['title'],
				'description' => $_POST['description']);

		if(isset($_POST['id']))
		{
			$this->defect->update_item($data, $_POST['id']);
		}
		else 
		{
			$this->defect->insert_item($data);
		}
		header("location:".site_url("defect/item_list"));
	}

	public function remove_item($id)
	{
		$this->load->model('Defect_model', 'defect');
		$this->defect->remove_item($id);
		header("location:".site_url("defect/item_list"));
	}

	public function chg_image($id) {

		$this->load->model('Image_model', 'image');
		$sel_item = $this->image->select_item($id);
		if($sel_item == null) {
			$data['image'] = "no-image.jpg";
		} else {
			$data['id'] = $sel_item->id;
			$data['image'] = $sel_item->image;
		}
		$data['title_text'] = "Change Image";
		$data['defect_id'] = $id;

		$heder_data['user_name'] = $this->session->userdata('user_name');
		$this->load->view('header', $heder_data);
		$this->load->view('side_bar');
		$this->load->view('image_form', $data);
		$this->load->view('footer');

	}

	public function save_image($id) {
		$data;
		if(isset($_FILES['file']) && $_FILES['file']['error'] == UPLOAD_ERR_OK) {
			// File upload code
			$extension = end(explode(".", $_FILES["file"]["name"]));
			$file_name = time().'_'.(rand()%10000).".".$extension;
			move_uploaded_file($_FILES["file"]["tmp_name"],"./upload/".$file_name);

			if(isset($_POST['extFile'])) {
				// remove old file if exist
				unlink("./upload/".$_POST['extFile']);
			}
			$data = array(
					'defect' => $id,
					'image' => $file_name);
		
			// Database interaction
			$this->load->model('Image_model', 'image');

			if(isset($_POST['id']))
			{
				$this->image->update_item($data, $_POST['id']);
			}
			else 
			{
				$this->image->insert_item($data);
			}
		} 
		header("location:".site_url("defect/item_details/".$id));

	}

	public function remove_image($id) {
		$this->load->model('Image_model', 'image');
		$sel_item = $this->image->select_item($id);
		if($sel_item != null){
			$this->image->remove_item($sel_item->id);
			unlink("./upload/".$sel_item->image);
		}
		header("location:".site_url("defect/item_details/".$id));
	}

	public function chg_cos_rem($id) {

	}

	public function item_details($id) {
		$this->load->model('Image_model', 'image');
		$sel_item = $this->image->select_item($id);
		if($sel_item == null) {
			$data['image'] = "no-image.jpg";
		} else {
			$data['id'] = $sel_item->id;
			$data['image'] = $sel_item->image;
		}
		$data['title_text'] = "Change Image";
		$data['defect_id'] = $id;

		$this->load->model('Param_model', 'param');
		$this->load->model('Cr_model', 'cr');
		$data['param_list'] = $this->param->param_of_defect($id);
		$data['cr_list'] = $this->cr->cr_of_defect($id);
		$data['aval_param_list'] = $this->param->all_param();
		$data['selected'] = $this->session->userdata('selected');
		$this->session->unset_userdata('selected');

		$heder_data['user_name'] = $this->session->userdata('user_name');
		$this->load->view('header', $heder_data);
		$this->load->view('side_bar');
		$this->load->view('details', $data);
		$this->load->view('footer');
	}

	public function save_defect_param($id) {
		$this->load->model('Param_model', 'param');
		$data = array(
			'defect' => $id,
			'param' => $_POST['param'],
			'block' => $_POST['block']);
		echo $_POST['id'];
		if(isset($_POST['id'])) {
			// Update oparation
			$this->param->update_param_of_defect($data, $_POST['id']);
		} else {
			// Insert oparation
			$this->param->inst_param_of_defect($data);
		}
		$this->session->set_userdata('selected', 'param');
	}

	public function del_param($id) {
		$this->load->model('Param_model', 'param');
		$this->param->del_param_of_defect($id);
		$this->session->set_userdata('selected', 'param');
		header("location:".$_SERVER['HTTP_REFERER']);
	}

	public function save_cr($id) {
		$this->load->model('Cr_model', 'cr');
		$data = array(
			'defect' => $id,
			'type' => $_POST['type'],
			'block' => $_POST['block']);
		echo $_POST['id'];
		if(isset($_POST['id'])) {
			// Update oparation
			$this->cr->update_cr_of_defect($data, $_POST['id']);
		} else {
			// Insert oparation
			$this->cr->inst_cr_of_defect($data);
		}
		$this->session->set_userdata('selected', 'cr');
	}

	public function del_cr($id) {
		$this->load->model('Cr_model', 'cr');
		$this->cr->del_cr_of_defect($id);
		$this->session->set_userdata('selected', 'cr');
		header("location:".$_SERVER['HTTP_REFERER']);
	}
}

?>