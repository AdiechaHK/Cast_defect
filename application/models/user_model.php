<?php

class User_model extends CI_Model {

  private $name, $email, $password;

  function __construct()
  {
      parent::__construct();
  }

  public function signIn()
  {
    $email = $_POST['email'];
    $password = md5($_POST['password']);

    $query =  $this->db->query("select `password`, `name` from `user` where `email`=\"".$email."\"");
    // echo $query;
    $result =  $query->result();

    $count = $query->num_rows();

    if($count == 1) {
      // Check password
      $row =  $query->row_array(); 
      if($password == $row['password']) {
        // result for success full sign in
        $responce["error"] = false;
        $responce["content"] = $row['name'];

      } else {
        // wrong password
        $responce["error"] = true;
        $responce["content"] = "Incorrect Password.";
      }
    } else if($count > 1) {
      $responce["error"] = true;
      $responce["content"] = "Conflicts in accouts, contect to your site admin.";
    } else {
      $responce["error"] = true;
      $url = site_url("admin/sign_out");
      $responce["content"] = "Account not found.";
    }
    return $responce;
  }

  public function add()
  {
    $_POST['password'] = md5($_POST['password']);
    return $this->db->insert('user', $_POST);
  }
}

?>