<?php
class news extends CI_Model {


         //add news 
         public function addnews($data) {
       
            // print_r($data);
            // die;
            $data = array(
                'name' => $data['name'] ,
                'title' => $data['title'] ,
                'description' => $data['description'],
               
                'image'=> $data['image']
               
                
             );
             
             $this->db->insert('news', $data);
             return true ;
    
         
        }
    
     

// for news

public function get_news($limit, $start) {
    $this->db->limit($limit, $start);  
    $query = $this->db->get('news');  
    return $query->result_array();        
}
public function getCount() {
     return $this->db->count_all('news');  
}

 //for editnews
    public function editnews($user) {
        $this->db->where('id', $user);
        $query = $this->db->get('news'); 
        return $query->row_array(); 
    }
 //for updatenews   
    public function updatenews($user, $data) {
        // echo"jkb,k";
        $updateblog=[
            'name' => $data['name'],    
            'title'=> $data['title'],  
            'description'=> $data['description'],     
          
          
        ];
        $this->db->where('id', $user);
        return $this->db->update('news', $updateblog); 
    } 
//delete news

public function newsdelete ($user)
{
   return $this->db->delete('news', array('id' => $user));
}

}
?>