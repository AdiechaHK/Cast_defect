<?php

class Casting_model extends CI_Model {

  private $title, $description, $image_url;

  function __construct()
  {
      parent::__construct();
  }

  public function item_list()
  {
    $query = $this->db->query("select id, title from casting;");
    return $query->result();
  }

  public function insert_item($arg)
  {
    return $this->db->insert('casting', $arg);
  }

  public function update_item($data, $id)
  {
    $this->db->update('casting', $data, array('id' => $id)); 
  }

  public function remove_item($id)
  {
    $this->db->delete('casting', array('id' => $id));
  }

  public function get_image($id)
  {
    $query = $this->db->query('select `image` from `casting` where id='.$id);
    $row = $query->row();
    return $row->image;
  }

  public function select_item($id)
  {
    $query = $this->db->query('select * from `casting` where id='.$id);
    return $query->row();
  }

  public function new_item()
  {
    return array('title' => "",
      'description' => "",
      'image' => "");
  }
}

?>