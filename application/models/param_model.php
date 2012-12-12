<?php

class Param_model extends CI_Model {

  private $title, $description;

  function __construct()
  {
      parent::__construct();
  }

  public function item_list()
  {
    $query = $this->db->query("select id, title from parameter;");
    return $query->result();
  }

  public function insert_item($arg)
  {
    return $this->db->insert('parameter', $arg);
  }

  public function update_item($data, $id)
  {
    $this->db->update('parameter', $data, array('id' => $id)); 
  }

  public function remove_item($id)
  {
    $this->db->delete('parameter', array('id' => $id));
  }

  // public function get_image($id)
  // {
  //   $query = $this->db->query('select `image` from `casting` where id='.$id);
  //   $row = $query->row();
  //   return $row->image;    // Son of roshniben gajjar (bhuj)
  // }

  public function select_item($id)
  {
    $query = $this->db->query('select * from `parameter` where id='.$id);
    return $query->row();
  }

  public function new_item()
  {
    return array('title' => "");
  }

  public function param_of_defect($id){
    $query_str = "SELECT b.id, a.title, b.block FROM parameter a, def_param b WHERE a.id = b.param AND b.defect = $id;";
    $query = $this->db->query($query_str);
    return $query->result();
  }

  public function all_param(){
    $query = $this->db->query("select id, title from parameter;");
    return $query->result();
  }

  public function inst_param_of_defect($arg) {
    $this->db->insert('def_param', $arg);
  }

  public function update_param_of_defect($arg, $id) {
    $this->db->update('def_param', $arg, array('id' => $id)); 
  }

  public function del_param_of_defect($id) {
    $this->db->delete('def_param', array('id' => $id));
  }

  public function cr_of_defect($id) {
    $query_str = "SELECT id, type, block FROM cos_rem WHERE defect = $id;";
    $query = $this->db->query($query_str);
    return $query->result();
  }

  public function inst_cr_of_defect($arg) {
    $this->db->insert('cos_rem', $arg);
  }

  public function update_cr_of_defect($arg, $id) {
    $this->db->update('cos_rem', $arg, array('id' => $id)); 
  }

  public function del_cr_of_defect($id) {
    $this->db->delete('cos_rem', array('id' => $id));
  }
}

?>
