<?php
class login extends CI_Model {
  public function getdata($name, $password) {
    $this->db->where('name', $name);
    $this->db->where('password', $password);
    $query = $this->db->get("form");
   
    if ($query->num_rows() > 0) {
        return $query->row_array();  
    } else {
        return false;
    }
}
}
?>