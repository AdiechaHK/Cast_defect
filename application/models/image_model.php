<?php 

class Image_model extends CI_Model {

  private $defect, $image;

  function __construct()
  {
      parent::__construct();
  }

  public function insert_item($arg)
  {
    return $this->db->insert('image', $arg);
  }

  public function update_item($data, $id)
  {
    $this->db->update('image', $data, array('id' => $id)); 
  }

  public function remove_item($id)
  {
    $this->db->delete('image', array('id' => $id));
  }

  public function select_item($id)
  {
    $query = $this->db->query('select id, image from `image` where defect='.$id);
    if($query->num_rows() == 1){
      return $query->row();
    } else {
      return null;
    }
  }
}

?>