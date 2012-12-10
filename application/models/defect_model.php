<?php

class Defect_model extends CI_Model {

  private $title, $description;

  function __construct()
  {
      parent::__construct();
  }

  public function item_list()
  {
    $query = $this->db->query("select id, title from defects;");
    return $query->result();
  }

  public function insert_item($arg)
  {
    return $this->db->insert('defects', $arg);
  }

  public function update_item($data, $id)
  {
    $this->db->update('defects', $data, array('id' => $id)); 
  }

  public function remove_item($id)
  {
    $this->db->delete('defects', array('id' => $id));
  }

  // public function get_image($id)
  // {
  //   $query = $this->db->query('select `image` from `casting` where id='.$id);
  //   $row = $query->row();
  //   return $row->image;
  // }

  public function select_item($id)
  {
    $query = $this->db->query('select * from `defects` where id='.$id);
    return $query->row();
  }

  public function new_item()
  {
    return array('title' => "",
      'description' => "");
  }
}

?>