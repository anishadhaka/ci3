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
            'Title' => $data['Title'] ,
            // 'Title'=> $data['Title'],
            // 'MetaDescription'=> $data['MetaDescription'],
            // 'MetaKeyword'=> $data['MetaKeyword'],
            // 'SEO_Robat'=> $data['SEO_Robat'],
            'description' => $data['description'],
            'createdate' => $data['createdate'],
            'updatedate' => $data['updatedate'],
            'image'=> $data['image']  
            
         );
         
         $this->db->insert('bloglist', $data);
         return true ;

     
    }

      //add addcategories 
      public function addcategories($data) {
       
        // print_r($data);
        // die;
        $data = array(

            'Title'=> $data['Title'],
            'MetaDescription'=> $data['MetaDescription'],
            'MetaKeyword'=> $data['MetaKeyword'],
            'SEO_Robat'=> $data['SEO_Robat']

         );
         
         $this->db->insert('blogcateg', $data);
         return true ;

     
    }



}
?>