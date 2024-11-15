<?php
class userlist extends CI_Model {
    public function All()                   
    {
       $data = $this->db->get('form');
        $result = $data->result_array();
      return  $result ;
    }

// for delete
       public function delete_item($id)
       {
          return $this->db->delete('form', array('id' => $id));
       }

//pagination
            public function get_users($limit, $start) {
                $this->db->limit($limit, $start);  
                $query = $this->db->get('form');  
                return $query->result_array();        
            }
            public function getCount() {
                 return $this->db->count_all('form');  
            }

//for get data
   public function getuserdata($limit, $offset)
    {
        $query = $this->db->get('form', $limit, $offset); 
        return $query->result_array();
    }
//for edit
    public function usereditdata($user) {
        $this->db->where('id', $user);
        $query = $this->db->get('form'); 
        return $query->row_array(); 
    }
 //for update   
    public function update_userdata($user, $data) {
        $updatedata=[
            'name' => $data['name'],    
            'email'=> $data['email'],  
            'password'=> $data['password'],     
            'number'=> $data['number'],       
            'city'=> $data['city'] ,
          
        ];
        $this->db->where('id', $user);
        return $this->db->update('form', $updatedata); 
    }

//change userpass
public function userpass($id, $old_password, $new_password)
{  
    //  echo $user. $old_password. $new_password; die;

    $this->db->where('id', $id);
    $this->db->where('password', $old_password); 
    $query = $this->db->get('form'); 

    echo $this->db->last_query();


    if ($query->num_rows() > 0) {
        $update = [
            'password' => $new_password 
        ];

        $this->db->where('id', $id);
        return $this->db->update('form', $update);
    } else {
        return false;
    }
}

// for bloglist

    public function getusers($limit, $start) {
        $this->db->where('recycle', 1);
        $this->db->limit($limit, $start);  
        $query = $this->db->get('bloglist');    
        return $query->result_array();           
    }
    public function getCountBlog(){

        $this->db->where('recycle',1);
         return $this->db->count_all_results('bloglist');  
    }

 //for editblog
    public function editblog($user) {
        $this->db->where('id', $user);
        $query = $this->db->get('bloglist'); 
        return $query->row_array(); 
    }
 //for updateblog   
    public function updateblog($user, $data) {
        $updateblog=[
            'name' => $data['name'],    
            'title'=> $data['title'],  
            'description'=> $data['description'],     
            'createdate'=> $data['createdate'],       
            'updatedate'=> $data['updatedate'] ,
          
        ];
        $this->db->where('id', $user);
        return $this->db->update('bloglist', $updateblog); 
    } 

// for recycleblog 

         public function countrows()
         {
             $this->db->where('recycle', 0);
             return $this->db->count_all_results('bloglist');
         }
//get blog recycle data
public function getblogrecycledata($limit, $start)
{
    $this->db->where('recycle', 0); 
    $this->db->limit($limit, $start);
    $query = $this->db->get('bloglist');
    return $query->result_array();  
}


// add blog data
public function addblog($data) {
   
    if (isset($data['image'])) {
        $data['image'] = $data['image'];
    } else {
        $data['image'] = NULL;
    }
    

    $this->db->insert('bloglist', $data);

    return true;
}

//delete blog
public function blogdelete($user)
{
    $this->db->where('id', $user);
    $this->db->update('bloglist', ['recycle' => 0]);

    if ($this->db->affected_rows() > 0) {
        return true;
    } else {
        return false;
    }
}

// restore data
public function blogrestore($user)
{    
    $this->db->where('id', $user);
    $this->db->update('bloglist', ['recycle' => 1]);
    if ($this->db->affected_rows() > 0) {
        return true;
    } else {
        return false;
    }
}
// delete recycle 
public function recycledelete($user)
    {
        $this->db->where('id', $user);
        return $this->db->delete('bloglist');
}
   

// blogsite
    public function blogsite(){
        $this->db->where("recycle",1);
      $query=  $this->db->get("bloglist");
      return $query->result_array();


}
// blogsite about
public function about(){
    $this->db->where("recycle",1);
  $query=  $this->db->get("bloglist");
  return $query->result_array();


}
//blogsite categorias
public function categorias(){
    $this->db->where("recycle",1);
  $query=  $this->db->get("bloglist");
  return $query->result_array();


}
// readmore
public function get_post_by_id($post_id) {
    $this->db->where('id', $post_id); 
    $query = $this->db->get('bloglist');
    return $query->row_array();
}
public function sideblog(){
    $this->db->where("recycle", 1);
    $query = $this->db->get("bloglist");
    return $query->result_array();
   }


}
?>
