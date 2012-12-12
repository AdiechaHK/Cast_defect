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

  public function item_list_with_details()
  {
    $query_str = "select e.id, e.title, e.i_count, e.p_count, f.c_count 
                  from (
                    select c.id, c.title, c.i_count, d.p_count 
                    from (
                      select a.id, a.title, b.i_count 
                      from 
                        defects as a
                        left join (
                          select count(id) as i_count, defect as i_def 
                          from image group by i_def
                        ) as b 
                      on a.id=b.i_def
                      ) as c 
                      left join (
                        select count(id) as p_count, defect as p_def 
                        from def_param group by p_def
                      ) as d 
                    on c.id=d.p_def
                    ) as e 
                    left join (
                      select count(id) as c_count, defect as c_def 
                      from cos_rem group by c_def
                    ) as f 
                  on e.id=f.c_def;";
    $query = $this->db->query($query_str);
    return $query->result();
  }
}

?>