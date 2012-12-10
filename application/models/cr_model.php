<?php

class Cr_model extends CI_Model {

  private $type, $description;

  function __construct()
  {
      parent::__construct();
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
