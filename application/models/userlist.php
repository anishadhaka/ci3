<?php
class userlist extends CI_Model {

public function All()                   
    {
       $data = $this->db->get('form');
        $result = $data->result_array();
      return  $result ;
    }


// profile
public function fetchdata($id){
          $this->db->where("id",$id);
          $query= $this->db->get("form");
          $result=$query->row_array();
          return $result;

       }    

// for delete
       public function delete_item($id)
       {
          return $this->db->delete('form', array('id' => $id));
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
public function userpass($user_id, $old_password, $new_password){ 

    $this->db->where('id', $user_id);
    $this->db->where('password', $old_password); 
    $query = $this->db->get('form'); 
    echo $this->db->last_query();
    if ($query->num_rows() > 0) {
        $update = [
            'password' => $new_password 
        ];

        $this->db->where('id', $user_id);
        return $this->db->update('form', $update);
    } else {
        return false;
    }
}
// for bloglistcategorias

public function getusersc($limit, $start) {
    
    $this->db->limit($limit, $start); 
    // $this->db->where('title'=>'business'); 
    $query = $this->db->get('blogcateg');    
    return $query->result_array();           
 }



// for deleteblogcat
public function deleteblogcat($id){
   return $this->db->delete('blogcateg', array('category_id' => $id));
}

//for cateditdata
public function cateditdata($user) {
    $this->db->where('category_id', $user);
    $query = $this->db->get('blogcateg'); 
    return $query->row_array(); 
}
//for catupdatedata   
public function catupdatedata($user, $data) {
    $updatedata=[
        'Title'=> $data['Title'],  
        'MetaDescription'=> $data['MetaDescription'],  
        'MetaKeyword'=> $data['MetaKeyword'],  
        'SEO_Robat'=> $data['SEO_Robat'],
        'slug'=> $data['slug'],

      
    ];
    $this->db->where('category_id', $user);
    return $this->db->update('blogcateg', $updatedata); 
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
            'Title'=> $data['Title'],
            'name'=> $data['name'],
            'description'=> $data['description'],     
            'createdate'=> $data['createdate'],       
            'updatedate'=> $data['updatedate'] ,
            'image'=> $data['image'] ,
            'slug'=> $data['slug'] ,
        ];
        // print_r($updateblog);die;
        $this->db->where('id', $user);
        $check=$this->db->update('bloglist', $updateblog); 
        // print_r($check);die;

        return $check;
    } 


//get blog recycle data
public function getblogrecycledata($limit, $start){
    $this->db->where('recycle', 0); 
    $this->db->limit($limit, $start);
    $query = $this->db->get('bloglist');
    return $query->result_array();  
 }


// add blog data
public function addblog($data) {
   print_r($data);die;
    if (isset($data['image'])) {
        $data['image'] = $data['image'];
    } else {
        $data['image'] = NULL;
    }
    $this->db->insert('bloglist', $data);
    return true;
 }

//delete blog
public function blogdelete($user){
    $this->db->where('id', $user);
    $this->db->update('bloglist', ['recycle' => 0]);
    if ($this->db->affected_rows() > 0) {
        return true;
    } else {
        return false;
    }
 }

// restore data
public function blogrestore($user){    
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
public function blogsite() {
    $this->db->where("recycle", 1);
    $query = $this->db->get("bloglist");
    return $query->result_array();  
}

public function blognews() {
    $query = $this->db->get("news");
    return $query->result_array();  
}
public function categoryc() {
    $this->db->select('category_id, Title,slug');
    $query = $this->db->get('blogcateg');  
    return $query->result_array();  
  }

//
public function get_posts_by_category_name($categoryName) {
    $this->db->select('bloglist.*');  
    $this->db->from('bloglist');
    $this->db->join('blogcateg', 'bloglist.Title = blogcateg.Title'); 
    $this->db->where('blogcateg.Title', $categoryName);  
    $query = $this->db->get();

    $check= $query->result_array();  
    return $check;
    // print_r($check); die;
}
public function get_posts_by_category_slug($categorySlug) {
    $this->db->select('bloglist.*');
    $this->db->from('bloglist');
    $this->db->join('blogcateg', 'bloglist.Title = blogcateg.Title');
    $this->db->where('blogcateg.slug', $categorySlug);  
    $query = $this->db->get();

    return $query->result_array();  
}



public function get_post_by_slug($slug) {
    // Fetch the post using the slug
    $this->db->where('slug', $slug);
    $query = $this->db->get('bloglist');
    return $query->row_array();  // Fetch single post
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
//blogsite newscategorias
public function newscategorias(){
  $query=  $this->db->get("news");
  return $query->result_array();
 }
//contactus data to db
public function contact($data) {
    // print_r($data);
    // die;
    $data = array(
        'name' => $data['name'] ,
        'email' => $data['email'] ,
        'message' => $data['message']  
     );
     $this->db->insert('contactus', $data);
     return true ;
  }
// readmore
public function getdata($rowslug) {
    $this->db->where('slug', $rowslug); 
    $query = $this->db->get('bloglist');
    return $query->row_array();
 }
public function sideblog($rowTitle){
    $this->db->where("recycle", 1);
    $this->db->where('Title',$rowTitle);
    $query = $this->db->get("bloglist");
    return $query->result_array();
   }

// readmorenews
public function get_news_by_id($post_id) {
    $this->db->where('id', $post_id); 
    $query = $this->db->get('news');
    return $query->row_array();
 }
public function sidenews(){
    $query = $this->db->get("news");
    return $query->result_array();
   }
// category dropdown 
public function category() {
    $this->db->select('category_id, Title');
    $query = $this->db->get('blogcateg');  
    return $query->result_array();  
  }
// get newslist category
public function getnewsc($limit, $start) {
    $query = $this->db->get('newscateg');    
    return $query->result_array();           
 }
public function getCountBlogn(){
    return $this->db->count_all_results('newscateg');  
} 
// for ajax pagination and fetch data from blog for bloglist
public function getFilteredBlogs($start, $length, $search, $order_by, $order_dir,$start_date,$end_date) {
        
    if (!empty($search)) {
        $this->db->group_start(); 
        $this->db->like('id', $search);
        $this->db->or_like('Title', $search);
        $this->db->or_like('name', $search);
        $this->db->group_end(); 
    }
    if (!empty($start_date) && !empty($end_date)) {
        $this->db->where('createdate >=', $start_date);
        $this->db->where('createdate <=', $end_date);
    }
 
    if (!empty($order_by) && !empty($order_dir)) {
        $this->db->order_by($order_by, $order_dir); 
    } else {
        $this->db->order_by('id', 'asc'); 
    }

   
    $this->db->limit($length, $start);
    $this->db->where("recycle", 1);
    $query = $this->db->get('bloglist');
    
   
    return $query->result();
 }


 public function countAllBlogs() {
    $this->db->where("recycle", 1);
    return $this->db->count_all('bloglist'); 
 }

 public function countFilteredBlogs($search, $start_date = null, $end_date = null) {
    if (!empty($search)) {
        $this->db->like('id', $search);
        $this->db->or_like('Title', $search);
        $this->db->or_like('name', $search);
    }
    if (!empty($start_date) && !empty($end_date)) {
        $this->db->where('createdate >=', $start_date);
        $this->db->where('createdate <=', $end_date);
    }
    $this->db->where("recycle", 1);
    return $this->db->count_all_results('bloglist'); 
 }



//for fetch data of user from form table

public function getFiltereduser($start, $length, $search, $order_by, $order_dir) {
        
    if (!empty($search)) {
        $this->db->group_start(); 
        $this->db->like('id', $search);
        $this->db->or_like('name', $search);
        $this->db->or_like('email', $search);
        $this->db->group_end(); 
    }
  
 
    if (!empty($order_by) && !empty($order_dir)) {
        $this->db->order_by($order_by, $order_dir); 
    } else {
        $this->db->order_by('id', 'asc'); 
    }

   
    $this->db->limit($length, $start);

    
    $query = $this->db->get('form');
    
   
    return $query->result();
 }


  public function countAlluser() {
    return $this->db->count_all('form'); 
 }

 public function countFiltereduser($search) {
    if (!empty($search)) {
        $this->db->like('id', $search);
        $this->db->or_like('Title', $search);
        $this->db->or_like('name', $search);
    }
   
    return $this->db->count_all_results('form'); 
 }

//for fetch data of user from blogcateg table for blog category

public function getFilteredblogcateg($start, $length, $search, $order_by, $order_dir,$start_date,$end_date) {
        
    if (!empty($search)) {
        $this->db->group_start(); 
        $this->db->like('category_id', $search);
        $this->db->or_like('Title', $search);
        $this->db->or_like('MetaDescription', $search);
        $this->db->group_end(); 
    }
    if (!empty($start_date) && !empty($end_date)) {
        $this->db->where('createdate >=', $start_date);
        $this->db->where('createdate <=', $end_date);
    }
 
    if (!empty($order_by) && !empty($order_dir)) {
        $this->db->order_by($order_by, $order_dir); 
    } else {
        $this->db->order_by('category_id', 'asc'); 
    }

   
    $this->db->limit($length, $start);
     $query = $this->db->get('blogcateg');
           return $query->result();
 }


 public function countAllblogcateg() {
    return $this->db->count_all('blogcateg'); 
 }

 public function countFilteredblogcateg($search, $start_date = null, $end_date = null) {
    if (!empty($search)) {
        $this->db->like('category_id', $search);
        $this->db->or_like('Title', $search);
        $this->db->or_like('MetaDescription', $search);
    }
    if (!empty($start_date) && !empty($end_date)) {
        $this->db->where('createdate >=', $start_date);
        $this->db->where('createdate <=', $end_date);
    }
    return $this->db->count_all_results('blogcateg'); 
 }

//for fetch data of user from newscateg table for news category

public function getFilterednewscateg($start, $length, $search, $order_by, $order_dir,$start_date,$end_date) {
        
    if (!empty($search)) {
        $this->db->group_start(); 
        $this->db->like('category_id', $search);
        $this->db->or_like('Title', $search);
        $this->db->or_like('MetaDescription', $search);
        $this->db->group_end(); 
    }
    if (!empty($start_date) && !empty($end_date)) {
        $this->db->where('createdate >=', $start_date);
        $this->db->where('createdate <=', $end_date);
    }
 
    if (!empty($order_by) && !empty($order_dir)) {
        $this->db->order_by($order_by, $order_dir); 
    } else {
        $this->db->order_by('category_id', 'asc'); 
    }

   
    $this->db->limit($length, $start);

    
    $query = $this->db->get('newscateg');
    
   
    return $query->result();
 }


 public function countAllnewscateg() {
    return $this->db->count_all('newscateg'); 
 }

 public function countFilterednewscateg($search, $start_date = null, $end_date = null) {
    if (!empty($search)) {
        $this->db->like('category_id', $search);
        $this->db->or_like('Title', $search);
        $this->db->or_like('MetaDescription', $search);
    }
    if (!empty($start_date) && !empty($end_date)) {
        $this->db->where('createdate >=', $start_date);
        $this->db->where('createdate <=', $end_date);
    }
    return $this->db->count_all_results('newscateg'); 
 }
//
// for ajax pagination and fetch data from news for news
public function getFilterednews($start, $length, $search, $order_by, $order_dir,$start_date,$end_date) {
        
    if (!empty($search)) {
        $this->db->group_start(); 
        $this->db->like('id', $search);
        $this->db->or_like('Title', $search);
        $this->db->or_like('name', $search);
        $this->db->group_end(); 
    }
    if (!empty($start_date) && !empty($end_date)) {
        $this->db->where('createdate >=', $start_date);
        $this->db->where('createdate <=', $end_date);
    }
 
    if (!empty($order_by) && !empty($order_dir)) {
        $this->db->order_by($order_by, $order_dir); 
    } else {
        $this->db->order_by('id', 'asc'); 
    }

   
    $this->db->limit($length, $start);

    
    $query = $this->db->get('news');
    
   
    return $query->result();
 }


 public function countAllnews() {
    return $this->db->count_all('news'); 
 }

 public function countFilterednews($search, $start_date = null, $end_date = null) {
    if (!empty($search)) {
        $this->db->like('id', $search);
        $this->db->or_like('Title', $search);
        $this->db->or_like('name', $search);
    }
    if (!empty($start_date) && !empty($end_date)) {
        $this->db->where('createdate >=', $start_date);
        $this->db->where('createdate <=', $end_date);
    }
    return $this->db->count_all_results('news'); 
 }
//
// for ajax pagination and fetch data from pages for pages
public function getFilteredpages($start, $length, $search, $order_by, $order_dir,$start_date,$end_date) {
        
    if (!empty($search)) {
        $this->db->group_start(); 
        $this->db->like('id', $search);
        $this->db->or_like('Title', $search);
        $this->db->or_like('date', $search);
        $this->db->or_like('number', $search);
        $this->db->or_like('gender', $search);
        $this->db->group_end(); 
    }
    if (!empty($start_date) && !empty($end_date)) {
        $this->db->where('createdate >=', $start_date);
        $this->db->where('createdate <=', $end_date);
    }
    
    if (!empty($order_by) && !empty($order_dir)) {
        $this->db->order_by($order_by, $order_dir); 
    } else {
        $this->db->order_by('id', 'asc'); 
    }

    $this->db->limit($length, $start);
    $query = $this->db->get('pageslist');
    return $query->result();
 }


 public function countAllpages() {
    return $this->db->count_all('pageslist'); 
 }

 public function countFilteredpages($search, $start_date = null, $end_date = null) {
    if (!empty($search)) {
        $this->db->like('id', $search);
        $this->db->or_like('Title', $search);
        $this->db->or_like('date', $search);
    }
    if (!empty($start_date) && !empty($end_date)) {
        $this->db->where('createdate >=', $start_date);
        $this->db->where('createdate <=', $end_date);
    }
    return $this->db->count_all_results('pageslist'); 
 }
// 
// for ajax pagination and fetch data from blog for bloglist
public function getFilteredRecycleBlogs($start, $length, $search, $order_by, $order_dir,$start_date,$end_date) {
        
    if (!empty($search)) {
        $this->db->group_start(); 
        $this->db->like('id', $search);
        $this->db->or_like('Title', $search);
        $this->db->or_like('name', $search);
        $this->db->group_end(); 
    }
    if (!empty($start_date) && !empty($end_date)) {
        $this->db->where('createdate >=', $start_date);
        $this->db->where('createdate <=', $end_date);
    }
 
    if (!empty($order_by) && !empty($order_dir)) {
        $this->db->order_by($order_by, $order_dir); 
    } else {
        $this->db->order_by('id', 'asc'); 
    }

   
    $this->db->limit($length, $start);
    $this->db->where('recycle', 0); 
    $query = $this->db->get('bloglist');
    
   
    return $query->result();
 }


 public function countAllRecycleBlogs() {
    $this->db->where('recycle', 0); 
    return $this->db->count_all('bloglist'); 
 }

 public function countFilteredRecycleBlogs($search, $start_date = null, $end_date = null) {
    if (!empty($search)) {
        $this->db->like('id', $search);
        $this->db->or_like('Title', $search);
        $this->db->or_like('name', $search);
    }
    if (!empty($start_date) && !empty($end_date)) {
        $this->db->where('createdate >=', $start_date);
        $this->db->where('createdate <=', $end_date);
    }
    $this->db->where('recycle', 0); 
    return $this->db->count_all_results('bloglist'); 
 }

//for fetch data of user from form table

public function getFilteredprofile($start, $length, $search, $order_by, $order_dir) {
        
    if (!empty($search)) {
        $this->db->group_start(); 
        $this->db->like('id', $search);
        $this->db->or_like('company_name', $search);
        $this->db->or_like('company_type', $search);
        $this->db->group_end(); 
    }
  
 
    if (!empty($order_by) && !empty($order_dir)) {
        $this->db->order_by($order_by, $order_dir); 
    } else {
        $this->db->order_by('id', 'asc'); 
    }

   
    $this->db->limit($length, $start);
    $query = $this->db->get('company_details');
    return $query->result();
 }


  public function countAllprofile() {
    return $this->db->count_all('company_details'); 
 }

 public function countFilteredprofile($search) {
    if (!empty($search)) {
        $this->db->like('id', $search);
        $this->db->or_like('company_name', $search);
        $this->db->or_like('company_type', $search);
    }
   
    return $this->db->count_all_results('company_details'); 
 }

 //for edit
 public function companyeditdata($user) {
    $this->db->where('id', $user);
    $query = $this->db->get('company_details'); 
    return $query->row_array(); 
 }
 //for update   
 public function update_company($user, $data) {
    $updatedata=[
        'company_name' => $data['company_name'],    
        'company_type'=> $data['company_type'],  
        'company_email'=> $data['company_email']
    ];
    $this->db->where('id', $user);
    return $this->db->update('company_details', $updatedata); 
 }
 // for delete
 public function delete_company($id)
 {
   return $this->db->delete('company_details', array('id' => $id));
 }
//

}
?>



