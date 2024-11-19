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
public function user(){
    return $this->db->count_all_results('form');
}
public function Blogs(){
    $this->db->where('recycle',1);
    return $this->db->count_all_results('bloglist');
}
public function News(){
    return $this->db->count_all_results('news');
}
public function pages(){
    return $this->db->count_all_results('pageslist');
}
}
?>