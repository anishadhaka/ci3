<?php
class news extends CI_Model {
         //add news 
         public function addnews($data) {
            $data = array(
                'Title' => $data['Title'] ,
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
        $updateblog=[    
            'Title'=> $data['Title'],  
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


//blogsite newsdeletec
public function newsdeletec(){
    $query=  $this->db->get("newscateg");
    return $query->result_array();
}
}
?>