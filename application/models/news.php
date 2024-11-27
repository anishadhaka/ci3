<?php
class news extends CI_Model {
//add news 
public function addnews($data) {
             $data = array(
                'name' => $data['name'] ,
                'Title' => $data['Title'] ,
                'description' => $data['description'],
                'image'=> $data['image'],
                'slug' => $data['slug']   

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
    // print_r($user, $data);die;
        $updateblog=[    
            'name'=> $data['name'],
            'Title'=> $data['Title'],
            'description'=> $data['description'],   
            'slug'=> $data['slug'] ,
        ];
        // print_r($updateblog);die;
        $this->db->where('id', $user);
        return $this->db->update('news', $updateblog); 
    }
//delete news

public function newsdelete ($user)
 {
   return $this->db->delete('news', array('id' => $user));
 }


//blogsite newsdeletec
public function deletenewsc($user){
    return $this->db->delete('newscateg', array('category_id' => $user));
 }
//
//add addcategories 
public function addnewscategories($data) {
    $data = array(
        'Title'=> $data['Title'],
        'MetaDescription'=> $data['MetaDescription'],
        'MetaKeyword'=> $data['MetaKeyword'],
        'SEO_Robat'=> $data['SEO_Robat'],
        'slug' => $data['slug']  

     );
     
     $this->db->insert('newscateg', $data);
     return true ;

    }
//for cateditdata
public function newscatedit($user) {
    $this->db->where('category_id', $user);
    $query = $this->db->get('newscateg'); 
    return $query->row_array(); 
 }
//for catupdatedata   
public function newscatupdate($user, $data) {
    $updatedata=[
        'Title'=> $data['Title'],  
        'MetaDescription'=> $data['MetaDescription'],  
        'MetaKeyword'=> $data['MetaKeyword'],  
        'SEO_Robat'=> $data['SEO_Robat'],
        'slug'=> $data['slug'],
    ];
    $this->db->where('category_id', $user);
    return $this->db->update('newscateg', $updatedata); 
 }
//
// public function category() {
//     $this->db->select('category_id, Title');
//     $query = $this->db->get('newscateg');  
//     return $query->result_array();  
//   } 
//

public function get_news_categories() {
    $this->db->select('category_id, Title');
    $query = $this->db->get('newscateg');  
    return $query->result_array();  
}
//
// public function categoryc() {
//     $this->db->select('category_id, Title,slug');
//     $query = $this->db->get('newscateg');  
//     return $query->result_array();  
//   }
    
//
public function get_posts_by_category_news($categoryTitle) {

    $this->db->select('news.*');  
    $this->db->from('news');
    $this->db->join('newscateg', 'news.Title = newscateg.Title'); 
    $this->db->where('newscateg.Title', $categoryTitle);  
    $query = $this->db->get();

    $check= $query->result_array();  
    return $check;
    print_r($check); die;
}    
public function getdata($rowslug) {

    // print_r($rowslug);die;
    $this->db->where('slug', $rowslug); 
    $query = $this->db->get('news');
    // print_r($query);die;
    return $query->row_array();
 }
//
public function sideblog($rowTitle){
    // print_r($rowTitle);die;
    $this->db->where('Title',$rowTitle);
    $query = $this->db->get("news");
    return $query->result_array();
   }

    
}
?>