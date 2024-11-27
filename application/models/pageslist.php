<?php
class pageslist extends CI_Model {
    public function __construct() {
        parent::__construct();
        $this->load->database();  
    }

//pagination pages
            public function get_pages($limit, $start) {
                // $this->db->limit($limit, $start);  
                $query = $this->db->get('pageslist');
                $check= $query->result_array();  
                return $check;    
            }
            public function getCountpage() {
                //  return $this->db->count_all('pageslist');  
            }

// add page
public function addpages($data) {
    $data = array(
        'title' => $data['title'] ,
        'date' => $data['date'] ,
        'email' => $data['email'],
        'number' => $data['number'],
        'gender' => $data['gender'],
        'description' => $data['description'] 
        
     );
     
     $this->db->insert('pageslist', $data);
     return true ;

 
}
 
 // for delete pages
 public function delete_page($id)
 {
    return $this->db->delete('pageslist', array('id' => $id));
 }           

//for editpage
public function usereditdata($user) {
    $this->db->where('id', $user);
    $query = $this->db->get('pageslist'); 
    return $query->row_array(); 
}
//for update pages  
public function update_userpage($user, $data) {
    $updatedata=[
        'Title' => $data['Title'] ,
        'date' => $data['date'] ,
        'email' => $data['email'],
        'number' => $data['number'],
        'gender' => $data['gender'],
        'description' => $data['description'] 
      
    ];
   $id= $this->db->where('id', $user);
    $check= $this->db->update('pageslist', $updatedata); 
    return $check;
}

}
?>            