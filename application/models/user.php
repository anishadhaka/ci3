<?php
class User extends CI_Model {
    
public function index($data) {
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
        $data = array(
            'name' => $data['name'] ,
            'email' => $data['email'] ,
            'password' => $data['password'],
            'number' => $data['number'],
            'city' => $data['city'],
         );
         
         $this->db->insert('form', $data);
         return true ;
    }


//add bloguser 
public function addblog($data) {
        $data = array(
            'Title' => $data['Title'] ,
            'name'=> $data['name'],
            'description' => $data['description'],
            'createdate' => $data['createdate'],
            'updatedate' => $data['updatedate'],
            'image'=> $data['image'],
            'slug' => $data['slug']   
         );
        //  print_r($data);die;
         $this->db->insert('bloglist', $data);
         return true ;
    }

//add addcategories 
public function addcategories($data) {
        $data = array(
            'Title'=> $data['Title'],
            'MetaDescription'=> $data['MetaDescription'],
            'MetaKeyword'=> $data['MetaKeyword'],
            'SEO_Robat'=> $data['SEO_Robat'],
            'slug' => $data['slug']  

         );
         
         $this->db->insert('blogcateg', $data);
         return true ;
    }



}
?>