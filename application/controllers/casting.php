<?php 

class Casting extends CI_Controller {

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
		$this->load->model('Casting_model', 'casting');
		$data['result'] = $this->casting->item_list();

		$heder_data['user_name'] = $this->session->userdata('user_name');
		$this->load->view('header', $heder_data);
		$this->load->view('side_bar');
		$this->load->view('casting_list', $data);
		$this->load->view('footer');
	}

	public function add_item()
	{
		$this->load->model('Casting_model', 'casting');
		$data = $this->casting->new_item();
		$data['title_text'] = "Add Casting";
		
		$heder_data['user_name'] = $this->session->userdata('user_name');
		$this->load->view('header', $heder_data);
		$this->load->view('side_bar');
		$this->load->view('casting_item_form', $data);
		$this->load->view('footer');
	}

	public function edit_item($id)
	{
		$this->load->model('Casting_model', 'casting');
		$sel_item = $this->casting->select_item($id);
		$data['id'] = $id;
		$data['title'] = $sel_item->title;
		$data['description'] = $sel_item->description;
		$data['image'] = ($sel_item->image=="") ? 'no-image.jpg': $sel_item->image;
		$data['title_text'] = "Update Casting";
		$heder_data['user_name'] = $this->session->userdata('user_name');
		$this->load->view('header', $heder_data);
		$this->load->view('side_bar');
		$this->load->view('casting_item_form', $data);
		$this->load->view('footer');
	}

	public function save_item()
	{
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
					'title' => $_POST['title'],
					'description' => $_POST['description'],
					'image' => $file_name);
		} else {
			$data = array(
					'title' => $_POST['title'],
					'description' => $_POST['description']);			
		}

		// Database interaction
		$this->load->model('Casting_model', 'casting');

		if(isset($_POST['id']))
		{
			$this->casting->update_item($data, $_POST['id']);
		}
		else 
		{
			$this->casting->insert_item($data);
		}
		header("location:".site_url("casting/item_list"));
	}

	public function remove_item($id)
	{
		$this->load->model('Casting_model', 'casting');
		unlink("./upload/".$this->casting->get_image($id));
		$this->casting->remove_item($id);
		header("location:".site_url("casting/item_list"));
	}
}
// gaurang.nakum@gmail.com
?>