<?php
class User extends CI_Model {
    
    public function index($data) {
       
        // print_r($data);
        // die;
        $data = array(
            'name' => $data['name'] ,
            'email' => $data['email'] ,
            'password' => $data['password'],
            'number' => $data['number'],
            'city' => $data['city'] 
            
         );
         
         $this->db->insert('form', $data);
         return true ;

     
    }


 //add user 
    public function adduser($data) {
       
        // print_r($data);
        // die;
        $data = array(
            'name' => $data['name'] ,
            'email' => $data['email'] ,
            'password' => $data['password'],
            'number' => $data['number'],
            'city' => $data['city'] 
            
         );
         
         $this->db->insert('form', $data);
         return true ;

     
    }


     //add bloguser 
     public function addblog($data) {
       
        // print_r($data);
        // die;
        $data = array(
            'name' => $data['name'] ,
            'title' => $data['title'] ,
            'description' => $data['description'],
            'createdate' => $data['createdate'],
            'updatedate' => $data['updatedate'],
            'image'=> $data['image']
           
            
         );
         
         $this->db->insert('bloglist', $data);
         return true ;

     
    }

 


}
?>