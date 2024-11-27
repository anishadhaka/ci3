<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class UserController extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/userguide3/general/urls.html
	 */

function __construct() {
        parent::__construct();
        $this->load->library('form_validation');
		$this->load->model('userlist');	
		$this->load->model('pageslist');
		$this->load->library('pagination');
		$this->load->library('upload');
		$this->load->database();
		$this->load->library('upload');
		$this->load->library('session');
		$this->load->helper('url'); 
	$this->load->model('news');

		// $this->load->model('news');
        
    } 

//for login
private function check_login()
 {
	if (!$this->session->userdata('id')) {
		redirect('UserController/login', 'refresh');
	}
 }

//for logout
public function logout()
 {
	$this->session->sess_destroy(); 
	redirect('login');  
 }

//for registerpage
public function index($data=array())
	{
		$this->load->view('user/register');
	}
//data to database and move to login
public function storedata (){
    $data['name'] = $this->input->post('name');
	$data['email'] = $this->input->post('email');
    $data['password'] = $this->input->post('password');
    $data['number'] = $this->input->post('number');
	$data['city'] = $this->input->post('city');

	$this->form_validation->set_rules('name', 'name', 'required');
	$this->form_validation->set_rules('email', 'email', 'required');
    $this->form_validation->set_rules('password', 'password', 'required');
    $this->form_validation->set_rules('number', 'number', 'required');
	$this->form_validation->set_rules('city', 'city', 'required');
	
	if ($this->form_validation->run() == FALSE)
	{
	  $this->load->view('user/register');	
	}
	else
	{
	  $this->load->model('user');
		$check = $this->user->index($data);
		if($check == true){
			redirect('login');
		 }
	}
  }	
        public function login(){
      	$this->load->view('user/login');
        }

//fetch data to login and move to dashboard

public function loginvalidation() {
    $this->form_validation->set_rules('name', 'Name', 'required');
    $this->form_validation->set_rules('password', 'Password', 'required');
    
    $this->load->library('session');
    
    $data['name'] = $this->input->post('name');
    $data['password'] = $this->input->post('password');
    
    if ($this->form_validation->run() == FALSE) {
        $this->load->view('user/login');
    } else {
        $name = $data['name'];
        $password = $data['password'];
        
        $this->load->model('login');
        $user = $this->login->getdata($name, $password);
        
        if ($user) {
            $this->session->set_userdata('id', $user['id']);
            $this->session->set_userdata('name', $user['name']);  
            redirect('UserController/welcome');
        } else {
            echo 'Data not matched';
        }
    }
 }

//
public function welcome() {
		if ($this->session->userdata('id')) {
			$data['username'] = $this->session->userdata('name');
			$this->load->model('login');
			$data['user']=$this->login->user();
			$data['Blogs']=$this->login->Blogs();
			$data['News']=$this->login->News();
			$data['pages']=$this->login->pages();

			$this->load->view('user/header');
			$this->load->view('user/sidebar');
			$this->load->view('user/topbar');
			$this->load->view('user/dashboardcontent',$data);
			$this->load->view('user/footer');
			// $this->load->view('user/dashboard', $data);
		} else {
			redirect('UserController/login');
		}
	}

// profile
public function profile(){
    $this->check_login();
     $id = $this->session->userdata('id');
     $this->load->model('userlist');
     $data['user'] = $this->userlist->fetchdata($id);
	 $this->load->view('user/header');
	 $this->load->view('user/sidebar');
	 $this->load->view('user/topbar');
     $this->load->view('user/profile', $data);

    }	
      
//for userlist pagination
public function view()
          {
			 $this->load->model('userlist');
			 $this->load->view('user/header');
			 $this->load->view('user/sidebar');
			 $this->load->view('user/topbar');
      		$this->load->view('user/userlist');
			  $this->load->view('user/footer');
          }
      
      
//for delete  
public function delete($id)
      {
        $this->load->model('userlist');
      	 $this->userlist->delete_item($id);	
      	 redirect('userController/view');
      }
   
// edit data 
public function usereditdata($user) {
        	$this->load->model('userlist');
        	// echo $user; die;
        	$data['user'] = $this->userlist->usereditdata($user);
			$this->load->view('user/header');
			$this->load->view('user/sidebar');
			$this->load->view('user/topbar');
        	$this->load->view('user/update', $data);
			$this->load->view('user/footer');
		}
        	
 // for update
            public function userupdatedata() {
           	$this->form_validation->set_error_delimiters('<div class="error-message">', '</div>');   

        	$this->form_validation->set_rules('name', 'name', 'required');
        	$this->form_validation->set_rules('email', 'email', 'required');
            $this->form_validation->set_rules('password', 'password', 'required');
            $this->form_validation->set_rules('number', 'number', 'required');
        	$this->form_validation->set_rules('city', 'city', 'required');
        	
             $data['name'] = $this->input->post('name');
             $data['email'] = $this->input->post('email');
			 $data['password'] = $this->input->post('password');
			 $data['number'] = $this->input->post('number');
			 $data['city'] = $this->input->post('city');
			 $data['id'] = $this->input->post('id');
             $user=$data['id'];
        	 if ($this->form_validation->run() == FALSE) {
				
				$this->load->model('userlist');
				$data['user'] = $this->userlist->usereditdata($user);
				$this->load->view('user/update',$data);
				// echo "hello";
				// die;
			} else {
				// echo "qihqsi";
				// die;
			 	$this->load->model('userlist');
				$this->userlist->update_userdata($user, $data);
                // echo "hello";
				// die;
				redirect('userController/view');
		
				
			}
		
	}
// add user
public function adduser($data=array())
   {     
	     $this->load->view('user/header');
		 $this->load->view('user/sidebar');
		 $this->load->view('user/topbar');
	     $this->load->view('user/adduser');
		 $this->load->view('user/footer');
   }

   public function adddata (){
   $data['name'] = $this->input->post('name');
   $data['email'] = $this->input->post('email');
   $data['password'] = $this->input->post('password');
   $data['number'] = $this->input->post('number');
   $data['city'] = $this->input->post('city');
   
   // print_r($data);
   // die;
   $this->form_validation->set_rules('name', 'name', 'required');
   $this->form_validation->set_rules('email', 'email', 'required');
   $this->form_validation->set_rules('password', 'password', 'required');
   $this->form_validation->set_rules('number', 'number', 'required');
   $this->form_validation->set_rules('city', 'city', 'required');
   
   if ($this->form_validation->run() == FALSE)
   {
	   $this->load->view('user/adduser'); 
   }
   else
   {
	   $this->load->model('user');
	   $check = $this->user->adduser($data);
	   if($check == true){
		   redirect('userController/view');
	   }
   }	
  }	

//login password change page
public function password_page()
 {
	$data['user_id'] = ($this->uri->segment(2)) ? $this->uri->segment(2) : 0;
	$this->load->view('user/header');
	$this->load->view('user/sidebar');
	$this->load->view('user/topbar');
    $this->load->view('user/changeuserpass',$data);
	$this->load->view('user/footer');
 }
// password
public function userpass()
 {
    // $this->check_login();

    $this->form_validation->set_error_delimiters('<div class="error-message">', '</div>');
    $this->form_validation->set_rules('old_password', 'Old Password', 'required');
    $this->form_validation->set_rules('new_password', 'New Password', 'required|min_length[6]');
    $this->form_validation->set_rules('confirm_password', 'Confirm Password', 'required|matches[new_password]');

    $data = [
        'old_password' => $this->input->post('old_password'),
        'new_password' => $this->input->post('new_password'),
		'user_id' => $this->input->post('user_id'),

    ];
    if ($this->form_validation->run() == FALSE) {
		$this->load->view('user/header');
		$this->load->view('user/sidebar');
		$this->load->view('user/topbar');
		$this->load->view('user/changeuserpass');
		$this->load->view('user/footer');
    } else {
        
        $old_password = $data['old_password'];
        $new_password = $data['new_password'];
		$user_id = $data['user_id'];

        $this->load->model('userlist');
        $result = $this->userlist->userpass( $user_id,$old_password, $new_password);

        if ($result) {
            redirect('UserController/view', 'refresh');
        } else {
            $this->session->set_flashdata('error', 'Invalid Old Password');
			$this->session->set_flashdata('user_id', $user_id); 
			redirect('UserController/userpass');
			// $this->load->view('user/header');
			// $this->load->view('user/sidebar');
			// $this->load->view('user/topbar');
			// $this->load->view('user/changeuserpass',$id);
			// $this->load->view('user/footer');
        }
    }
 }


// for bloglist
public function blog()
 {        
	      $this->load->model('userlist');
		  $this->load->view('user/header');
		  $this->load->view('user/sidebar');
		  $this->load->view('user/topbar');
		  $this->load->view('user/bloglist');
		  $this->load->view('user/footer');
 }   
//
public function bloglistcategorias()
 {        

		  $this->load->model('userlist');
		  $this->load->view('user/header');
		  $this->load->view('user/sidebar');
		  $this->load->view('user/topbar');
		  $this->load->view('user/bloglistcategorias',['data'=>$data]);
		  $this->load->view('user/footer');
 } 



// edit blogdata     
		
public function editblog($user) {
	$this->load->model('userlist');
	$data['user'] = $this->userlist->editblog($user);
	$data['categories'] = $this->userlist->categoryc(); 
	$this->load->model('userlist');
	$this->load->view('user/header');
	$this->load->view('user/sidebar');
	$this->load->view('user/topbar');
	$this->load->view('user/updateblog', $data);

 }
	
// for blogupdate
public function updateblog($user) {
	$this->form_validation->set_rules('Title', 'Title', 'required');
	$this->form_validation->set_rules('name', 'name', 'required');
	$this->form_validation->set_rules('description', 'description', 'required');
	$this->form_validation->set_rules('number', 'createdate', 'required');
	$this->form_validation->set_rules('city', 'updatedate', 'required');
	
	function createSlug($string) {
		$slug = strtolower($string);
		$slug = preg_replace('/[^a-z0-9\s]/', '', $slug);
		$slug = str_replace(' ', '-', $slug);
		$slug = trim($slug, '-');
		return $slug;
	}
	 $data['Title'] = $this->input->post('Title');
	 $data['name'] = $this->input->post('name');
	 $data['description'] = $this->input->post('description');
	 $data['createdate'] = $this->input->post('createdate');
	 $data['updatedate'] = $this->input->post('updatedate');
	 $data['image'] = $this->input->post('image');
	 $slug = createSlug($data['name']);
	 $data['slug'] = $slug;
	 $data['id'] = $this->input->post('id');
	 $user=$data['id'];

	 if ($_FILES['image']['name']) {
		$config['upload_path'] = './uploads/images/'; 
		$config['allowed_types'] = 'jpg|jpeg|png|gif';  
		$config['max_size'] = 2048; 
		$config['file_name'] = time() . '_' . $_FILES['image']['name'];  
		
		$this->load->library('upload', $config);

		if (!$this->upload->do_upload('image')) {
			$data['upload_error'] = $this->upload->display_errors();
			$this->load->view('user/blogedit', $data);
			return;  
		} else {
			$upload_data = $this->upload->data();
			$data['image'] = $upload_data['file_name'];
		}
	}


	 if (!$this->form_validation->run() == FALSE) {
		
		$this->load->model('userlist');
		$data['user'] = $this->userlist->editblog($user);
		$this->load->view('user/updateblog',$data);
	} else {
		 $this->load->model('userlist');
		 $data['categories'] = $this->userlist->categoryc(); 
		$this->userlist->updateblog($user, $data);
		redirect('userController/blog');

		
	}

 }
// add blog
public function addblog($data=array())
   {  
	$this->load->model('userlist');
	
	$data['category'] = $this->userlist->category();
	  $this->load->view('user/header');
	    $this->load->view('user/sidebar');
	    $this->load->view('user/topbar');
	    $this->load->view('user/addblog',$data);
	    $this->load->view('user/footer');
   }
//
public function addblogdata() {
	function createSlug($string) {
		$slug = strtolower($string);
		$slug = preg_replace('/[^a-z0-9\s]/', '', $slug);
		$slug = str_replace(' ', '-', $slug);
		$slug = trim($slug, '-');
	
		return $slug;
	}

    $data['Title'] = $this->input->post('Title');
    $data['name'] = $this->input->post('name');
    $data['description'] = $this->input->post('description');
    $data['createdate'] = $this->input->post('createdate');
    $data['updatedate'] = $this->input->post('updatedate');
	$data['image']=$this->input->post('image');
	$slug = createSlug($data['name']);
	$data['slug'] = $slug;
     
    // Form validation
    $this->form_validation->set_rules('Title', 'Title', 'required');
    // $this->form_validation->set_rules('SEO_Title', 'SEO_Title', 'required');
    // $this->form_validation->set_rules('MetaDescription', 'MetaDescription', 'required');
    // $this->form_validation->set_rules('MetaKeyword', 'MetaKeyword', 'required');
    // $this->form_validation->set_rules('SEO_Robat', 'SEO_Robat', 'required');
    // $this->form_validation->set_rules('description', 'Description', 'required');
    // $this->form_validation->set_rules('createdate', 'Create Date', 'required');
    // $this->form_validation->set_rules('updatedate', 'Update Date', 'required');

    if ($this->form_validation->run() == FALSE) {
        $this->load->view('user/header');
	    $this->load->view('user/sidebar');
	    $this->load->view('user/topbar');
	    $this->load->view('user/addblog');
	    $this->load->view('user/footer');
    } else {
		if ($_FILES['image']['name']) {
            $config['upload_path'] = './uploads/images/'; 
            $config['allowed_types'] = 'jpg|jpeg|png|gif';  
            $config['max_size'] = 20480; 
            $config['file_name'] = time() . '_' . $_FILES['image']['name'];  
            
            $this->load->library('upload', $config);
    
            if (!$this->upload->do_upload('image')) {
                $data['upload_error'] = $this->upload->display_errors();
                $this->load->view('user/blogedit', $data);
                return;  
            } else {
                $upload_data = $this->upload->data();
                $data['image'] = $upload_data['file_name'];
           }
        }
		
        $this->load->model('user');
        $check = $this->user->addblog($data);  

        if ($check == true) {
            redirect('userController/blog'); 
        }
    }
 }
// add blog categories

public function addcategories() {
  
	function createSlug($string) {
		$slug = strtolower($string);
		$slug = preg_replace('/[^a-z0-9\s]/', '', $slug);
		$slug = str_replace(' ', '-', $slug);
		$slug = trim($slug, '-');
	
		return $slug;
	}

	$data['Title'] = $this->input->post('Title');
	$data['MetaDescription'] = $this->input->post('MetaDescription');
	$data['MetaKeyword'] = $this->input->post('MetaKeyword');
	$data['SEO_Robat'] = $this->input->post('SEO_Robat');
	$slug = createSlug($data['Title']);
	$data['slug'] = $slug;


    // Form validation

    $this->form_validation->set_rules('Title', 'Title', 'required');
    // $this->form_validation->set_rules('MetaDescription', 'MetaDescription', 'required');
    // $this->form_validation->set_rules('MetaKeyword', 'MetaKeyword', 'required');
    // $this->form_validation->set_rules('SEO_Robat', 'SEO_Robat', 'required');
    // $this->form_validation->set_rules('description', 'Description', 'required');
    // $this->form_validation->set_rules('createdate', 'Create Date', 'required');
    // $this->form_validation->set_rules('updatedate', 'Update Date', 'required');

    if ($this->form_validation->run() == FALSE) {
		// echo"jkbkj";die;

        $this->load->view('user/header');
	    $this->load->view('user/sidebar');
	    $this->load->view('user/topbar');
	    $this->load->view('user/addcategorias');
	    $this->load->view('user/footer');
    } else {
		// echo"jkbkj";die;
        $this->load->model('user');
        $check = $this->user->addcategories($data);
        if ($check == true) {
            redirect('userController/bloglistcategorias'); 
        }
        
    }
 }

 // delete blog 
 public function deleteblog($user){
          $this->load->model('user/userlist');
          $this->userlist->blogdelete($user);
          redirect('UserController/blog', 'refresh'); 
     }

 // delete deleteblogcat 
 public function deleteblogcat($user){
	// echo"$user";die;
		
	$this->load->model('userlist');
	$this->userlist->deleteblogcat($user);
	redirect('UserController/bloglistcategorias', 'refresh'); 
   }

// edit cateditdata 
public function cateditdata($user) {
	
	$this->load->model('userlist');
	// echo $user; die;
	$data['user'] = $this->userlist->cateditdata($user);
	$this->load->view('user/header');
	$this->load->view('user/sidebar');
	$this->load->view('user/topbar');
	$this->load->view('user/updateblogcat', $data);
	$this->load->view('user/footer');
   }
	
// for catupdatedata
public function catupdatedata() {

		function createSlug($string) {
			$slug = strtolower($string);
			$slug = preg_replace('/[^a-z0-9\s]/', '', $slug);
			$slug = str_replace(' ', '-', $slug);
			$slug = trim($slug, '-');
		
			return $slug;
		}
	   $this->form_validation->set_error_delimiters('<div class="error-message">', '</div>');   

    $this->form_validation->set_rules('Title', 'Title', 'required');
    $this->form_validation->set_rules('MetaDescription', 'MetaDescription', 'required');
    $this->form_validation->set_rules('MetaKeyword', 'MetaKeyword', 'required');
    $this->form_validation->set_rules('SEO_Robat', 'SEO_Robat', 'required');
	
	$data['Title'] = $this->input->post('Title');
	$data['MetaDescription'] = $this->input->post('MetaDescription');
	$data['MetaKeyword'] = $this->input->post('MetaKeyword');
	$data['SEO_Robat'] = $this->input->post('SEO_Robat');
	 $data['category_id'] = $this->input->post('category_id');
	 $user=$data['category_id'];
	 $slug = createSlug($data['Title']);
	$data['slug'] = $slug;
	//  print_r($data);die;
	 if ($this->form_validation->run() == FALSE) {
		
		$this->load->model('userlist');
		$data['user'] = $this->userlist->catupdatedata($user);
		$this->load->view('user/updatedateblog',$data);
		echo "hello";
		die;
	} else {
		 $this->load->model('userlist');
		$this->userlist->catupdatedata($user, $data);
		redirect('userController/bloglistcategorias');

		
	}

  }
 
//recycleblog pagination
public function recycleblog()
 {
    $this->load->view('user/header');
    $this->load->view('user/sidebar');
    $this->load->view('user/topbar');
    $this->load->view('user/recycle', ['data' => $data]);
    $this->load->view('user/footer');
 } 
	
// restore blog
public function blogrestore($user){
	$this->load->model('user/userlist');
   $result= $this->userlist->blogrestore($user);
	if ($result) {
		redirect('UserController/recycleblog', 'refresh');

	} else {
		echo "No record was updated. ";
	}
 }
		

//delete recycle
public function blogdelete($user){
   
        $this->load->model('user/userlist');
    $this->userlist->recycledelete($user);
    redirect('UserController/recycleblog', 'refresh');
   }


//for blogsite

public function blogsite($categoryTitle = NULL) {
    $this->load->model('userlist');
    $this->load->model('news');

    $this->check_login();

    $data['categories'] = $this->userlist->categoryc();
	$data['newscategories'] = $this->news->get_news_categories();
	
    if ($categoryTitle ) {
        $data['user'] = $this->userlist->get_posts_by_category_name(urldecode($categoryTitle));  
        $data['categoryTitle'] = urldecode($categoryTitle);  
        //  print_r($data);die;
	
	  $this->load->view('user/blogsiteheader', $data);
      $this->load->view('user/blogheader2');
      $this->load->view('user/category_data', $data);  
      $this->load->view('user/blogsitefooter');
    } else {
        $data['user'] = $this->userlist->blogsite();
        $data['news'] = $this->userlist->blognews();
	    $this->load->view('user/blogsiteheader', $data);
        $this->load->view('user/blogheader2');
        $this->load->view('user/blogsite', $data);  
        $this->load->view('user/blogsitefooter');
    }
   

  }
// for news category 
public function news_category($categoryTitle = NULL) {
		$this->load->model('userlist');
		$this->load->model('news');
		$this->check_login();
		$data['categories'] = $this->userlist->categoryc();
		$data['newscategories'] = $this->news->get_news_categories(); 
			if ($categoryTitle ) {
				$data['user'] = $this->news->get_posts_by_category_news($categoryTitle);  
				// $data['categoryTitle'] = urldecode($categoryTitle);  
				//  print_r($data);die;
			
			  $this->load->view('user/blogsiteheader', $data);
			  $this->load->view('user/blogheader2');
			  $this->load->view('user/category_newsdata', $data);  
			  $this->load->view('user/blogsitefooter');
			} else {
				echo"not found";
			}
    }
  


// blog site categ. dynamic select
public function category() {
	$this->check_login();
	$this->load->model('userlist');
	$data['category'] = $this->userlist->category();
	$this->load->view('user/addblog', $data);
   }

// blogsite about
public function blogsiteabout(){
	$this->load->model('userlist');

	$data['categories'] = $this->userlist->categoryc(); 
	$data['newscategories'] = $this->news->get_news_categories(); 

	$data['user']= $this->userlist->about();
	$this->load->view('user/blogsiteheader',$data);
	$this->load->view('user/about', $data);
	$this->load->view('user/blogsitefooter');
    }
// blogsite contactus 
public function contactus($data=array()){  
	$this->load->model('userlist');
	$this->load->model('news');

	$data['categories'] = $this->userlist->categoryc(); 
	$data['newscategories'] = $this->news->get_news_categories(); 

	
	$this->load->view('user/blogsiteheader',$data);
	$this->load->view('user/contactus');
	$this->load->view('user/blogsitefooter');

  }

// blogsite categorias 

public function blogsitecategories(){
	$this->load->model('userlist');
	$data['user']= $this->userlist->categorias();
	$this->load->view('user/blogsiteheader');
	
	$this->load->view('user/categorias', $data);
	$this->load->view('user/blogsitefooter');
  }

//  blogsite Read More
public function read_more($rowTitle,$rowslug) {
	$this->load->model('news');
	$data['newscategories'] = $this->news->get_news_categories();
    $data['categories'] = $this->userlist->categoryc();
        $data['post'] = $this->userlist->getdata($rowslug); 
        if (empty($data['post'])) {
            show_404(); 
        }
		$data['sideblog'] = $this->userlist->sideblog($rowTitle);
		$this->load->model('userlist');
	    $data['categories'] = $this->userlist->categoryc(); 
	    $this->load->view('user/blogsiteheader',$data);
        $this->load->view('user/readmore', $data); 
	    $this->load->view('user/blogsitefooter');

		
    }
//  blogsite Read More news
public function read_more1($rowTitle,$rowslug) {
	$this->load->model('news');
	$data['newscategories'] = $this->news->get_news_categories(); 
    $data['categories'] = $this->userlist->categoryc();
        $data['post'] = $this->news->getdata($rowslug); 
        if (empty($data['post'])) {
            show_404(); 
        }
		$data['sideblog'] = $this->news->sideblog($rowTitle);
		$this->load->model('news');
	    $this->load->view('user/blogsiteheader',$data);
        $this->load->view('user/readmorenews', $data); 
	    $this->load->view('user/blogsitefooter');

    }	

// blogsite blogcategoriasite 
public function blogcategoriasite(){
	$this->load->model('userlist');
	$data['user']= $this->userlist->categorias();
	// $this->load->view('user/blogsiteheader');
	$this->load->view('user/blogheader2');
	$this->load->view('user/blogcategorias', $data);
	$this->load->view('user/blogsitefooter');


    }


// blogsite newscategoriasite 

public function newscategoriasite(){
	$this->load->model('userlist');
	$data['user']= $this->userlist->newscategorias();
	// $this->load->view('user/blogsiteheader');
	$this->load->view('user/blogheader2');
	$this->load->view('user/newscategorias', $data);
	$this->load->view('user/blogsitefooter');


    }	



//contactus
public function contactusdata (){
    $data['name'] = $this->input->post('name');
	$data['email'] = $this->input->post('email');
    $data['message'] = $this->input->post('message');
   
	$this->form_validation->set_rules('name', 'name', 'required');
	$this->form_validation->set_rules('email', 'email', 'required');
    $this->form_validation->set_rules('message', 'message', 'required');
  
	if ($this->form_validation->run() == FALSE)
	{ 
		// echo"kjnk"; die;

	  $this->load->view('user/contactus');	
	}
	else
	{
	  $this->load->model('userlist');
		$check = $this->userlist->contact($data);
		if($check == true){
			// echo"kjnk"; die;
			redirect('contactus');
			// return Content("<script language='javascript' type='text/javascript'>alert('Save Successfully');</script>");
		 }
	}
  }	
  




//  pageslist pagination 
public function pageslist()
 {  
	
	$config = array();
	$config['base_url'] = base_url('UserController/pageslist');  
	$config['total_rows'] = $this->pageslist->getCountpage();    
	$config['per_page'] = 5;                                 
	$config['uri_segment'] = 3;                              

	
	$this->pagination->initialize($config);
	$page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
	$data['users'] = $this->pageslist->get_pages($config['per_page'], $page);
	$data['links'] = $this->pagination->create_links();
	 $this->load->model('pageslist'); 
	 $this->load->view('user/header');
	 $this->load->view('user/sidebar');
	 $this->load->view('user/topbar');
	$this->load->view('user/pageslist',['data'=>$data]);
	$this->load->view('user/footer');
 }
// add page
	     
public function addpages($data=array())
 {     
	  $this->load->view('user/header');
	  $this->load->view('user/sidebar');
	  $this->load->view('user/topbar');
	  $this->load->view('user/addpages');
	  $this->load->view('user/footer');
 }

public function addpage (){
    $data['Title'] = $this->input->post('Title');
    $data['date'] = $this->input->post('date');
    $data['email'] = $this->input->post('email');
    $data['number'] = $this->input->post('number');
    $data['gender'] = $this->input->post('gender');
    $data['description'] = $this->input->post('description');
    
    // print_r($data);
    // die;
    $this->form_validation->set_rules('Title', 'Title', 'required');
    $this->form_validation->set_rules('date', 'date', 'required');
    $this->form_validation->set_rules('email', 'email', 'required');
    $this->form_validation->set_rules('number', 'number', 'required');
    $this->form_validation->set_rules('gender', 'gender', 'required');
    $this->form_validation->set_rules('description', 'description', 'required');
    
    if ($this->form_validation->run() == FALSE)
    {    
    	//  echo"knk"; die;
    	$this->load->view('user/addpages'); 
    }
    else
    {
    	$this->load->model('pageslist');
    	$check = $this->pageslist->addpages($data);
    	if($check == true){
    		redirect('userController/pageslist');
    		// echo "redirect to login";
    	}
    }	
    }	

// delete pages
public function deletepages($id)
 {
  $this->load->model('pageslist');
	 $this->pageslist->delete_page($id);	
	 redirect('userController/pageslist');
 }




// edit data 
public function editpage($user) {
	
	
	$this->load->model('pageslist');
	// echo $user; die;
	$data['user'] = $this->pageslist->usereditdata($user);
	// echo $data;
	$this->load->view('user/header');
	$this->load->view('user/sidebar');
	$this->load->view('user/topbar');
	$this->load->view('user/updatepages',$data);
	$this->load->view('user/footer');
 }
	
// for update page
public function updatepage() {
		// $data['id'] = ($this->uri->segment(2)) ? $this->uri->segment(2) : 0;
		echo $data;
		$this->form_validation->set_error_delimiters('<div class="error-message">', '</div>');   
		$this->form_validation->set_rules('Title', 'Title', 'required');
		$this->form_validation->set_rules('date', 'date', 'required');
		$this->form_validation->set_rules('email', 'email', 'required');
		$this->form_validation->set_rules('number', 'number', 'required');
		$this->form_validation->set_rules('gender', 'gender', 'required');
		$this->form_validation->set_rules('description', 'description', 'required');
        
	   $data['Title'] = $this->input->post('Title');
	   $data['date'] = $this->input->post('date');
	   $data['email'] = $this->input->post('email');
	   $data['number'] = $this->input->post('number');
	   $data['gender'] = $this->input->post('gender');
	   $data['description'] = $this->input->post('description');
	   $data['id'] = $this->input->post('id');
	   $user=$data['id'];
	 if ($this->form_validation->run() == FALSE) {
		echo "hello";
		die;
		$this->load->model('pageslist');
		$data['user'] = $this->pageslist->usereditdata($user);
		$this->load->view('user/updatepages',$data);
		
	} else {
		// echo "qihqsi";
		// die;
		 $this->load->model('pageslist');
		$this->pageslist->update_userpage($user, $data);
		// echo "hello";
		// die;
		redirect('userController/pageslist');

		
	}

 }

// for news
public function news(){
  $this->load->model('news');
  $config = array();
  $config['base_url'] = base_url('UserController/news'); 
   //   var_dump($this->news); 
   // die();
  $config['total_rows'] = $this->news->getCount();
  $config['per_page'] = 5;                                 
  $config['uri_segment'] = 3; 
  
  $this->pagination->initialize($config);
  $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
  $data['users'] = $this->news->get_news($config['per_page'], $page);
  $data['links'] = $this->pagination->create_links();
  $this->load->model('news');
   $this->load->view('user/header');
   $this->load->view('user/sidebar');
   $this->load->view('user/topbar');
	$this->load->view('user/news',['data'=>$data]);
	$this->load->view('user/footer');
 } 



// edit editnews     
		
public function editnews($user) {
	$this->load->model('news');
	$data['user'] = $this->news->editnews($user);
	$data['newscategories'] = $this->news->get_news_categories();
	$this->load->model('userlist');
	$this->load->view('user/header');
	$this->load->view('user/sidebar');
	$this->load->view('user/topbar');
	$this->load->view('user/updatenews', $data);

 }
	
// for updatenews
public function updatenews() {
	//    $this->form_validation->set_error_delimiters('<div class="error-message">', '</div>');   
	function createSlug($string) {
		$slug = strtolower($string);
		$slug = preg_replace('/[^a-z0-9\s]/', '', $slug);
		$slug = str_replace(' ', '-', $slug);
		$slug = trim($slug, '-');
		return $slug;
	}
	$this->form_validation->set_rules('name', 'name', 'required');
	$this->form_validation->set_rules('Title', 'Title', 'required');
	$this->form_validation->set_rules('password', 'description', 'required');
	$data['name'] = $this->input->post('name');
	 $data['Title'] = $this->input->post('Title');
	 $data['description'] = $this->input->post('description');
	 $slug = createSlug($data['name']);
	 $data['slug'] = $slug; 
	 $data['id'] = $this->input->post('id');
	 $user=$data['id'];
	//  print_r($user);die;
	//  echo"$user";die;
	 if (!$this->form_validation->run() == FALSE) {
		echo "hello";
		die;
		$this->load->model('news');
		$data['user'] = $this->news->editnews($user);
		$this->load->view('user/updatenews',$data);
	} else {
		 $this->load->model('news');
		 $data['newscategories'] = $this->news->get_news_categories(); 
		 $this->news->updatenews($user, $data);
		redirect('UserController/news');

		
	}

 }
// add addnews
	     
public function addnews($data=array())
   {  
	$this->load->model('news');
	
	$data['newscategories'] = $this->news->get_news_categories();
	// print_r($data);die;
	  $this->load->view('user/header');
	    $this->load->view('user/sidebar');
	    $this->load->view('user/topbar');
	    $this->load->view('user/addnews',$data);
	    $this->load->view('user/footer');
   }

public function addnewsdata() {

	function createSlug($string) {
		$slug = strtolower($string);
		$slug = preg_replace('/[^a-z0-9\s]/', '', $slug);
		$slug = str_replace(' ', '-', $slug);
		$slug = trim($slug, '-');
	
		return $slug;
	}
    $data['name'] = $this->input->post('name');
    $data['Title'] = $this->input->post('Title');
    $data['description'] = $this->input->post('description');
	$data['image']=$this->input->post('image');
	$slug = createSlug($data['name']);
	$data['slug'] = $slug;

    // Form validation
    $this->form_validation->set_rules('name', 'name', 'required');
    $this->form_validation->set_rules('Title', 'Title', 'required');
    $this->form_validation->set_rules('description', 'Description', 'required');


    if ($this->form_validation->run() == FALSE) {
        $this->load->view('user/header');
	    $this->load->view('user/sidebar');
	    $this->load->view('user/topbar');
	    $this->load->view('user/addnews');
	    $this->load->view('user/footer');
    } else {
        // Image upload configuration
		if ($_FILES['image']['name']) {
            $config['upload_path'] = './uploads/images/'; 
            $config['allowed_types'] = 'jpg|jpeg|png|gif';  
            $config['max_size'] = 20480; 
            $config['file_name'] = time() . '_' . $_FILES['image']['name'];  
            
            $this->load->library('upload', $config);
    
            if (!$this->upload->do_upload('image')) {
                $data['upload_error'] = $this->upload->display_errors();
                $this->load->view('user/newsedit', $data);
                return;  
            } else {
                $upload_data = $this->upload->data();
                $data['image'] = $upload_data['file_name'];
           }
        }
		
        $this->load->model('news');
        $check = $this->news->addnews($data);  

        if ($check == true) {
            redirect('UserController/news'); 
        }
    }
 }

// delete  newsblog 
public function deletenews($user){
          $this->load->model('news');
          $this->news->newsdelete($user);
          redirect('UserController/news', 'refresh'); 
 }





// newscat
public function newscategorias()
 {        
	$config = array();
	$config['base_url'] = base_url('UserController/newscategorias');  
	$config['total_rows'] = $this->userlist->getCountBlogn();    
	$config['per_page'] = 5;                                 
	$config['uri_segment'] = 3;                              

	
	$this->pagination->initialize($config);
	$page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
	$data['users'] = $this->userlist->getnewsc($config['per_page'], $page);
	$data['links'] = $this->pagination->create_links();
	// Load the view
		  $this->load->model('userlist');
		  $this->load->view('user/header');
		  $this->load->view('user/sidebar');
		  $this->load->view('user/topbar');
		  $this->load->view('user/newscat',['data'=>$data]);
		  $this->load->view('user/footer');
 } 

// delete news categ 
public function deletenewsc($user){
	// print_r($user);die;
	$this->load->model('news');
	$this->news->deletenewsc($user);
	redirect('UserController/newscategorias', 'refresh'); 
 }
// add news cat
public function addnewscategories() {
  
	function createSlug($string) {
		$slug = strtolower($string);
		$slug = preg_replace('/[^a-z0-9\s]/', '', $slug);
		$slug = str_replace(' ', '-', $slug);
		$slug = trim($slug, '-');
	
		return $slug;
	}

	$data['Title'] = $this->input->post('Title');
	$data['MetaDescription'] = $this->input->post('MetaDescription');
	$data['MetaKeyword'] = $this->input->post('MetaKeyword');
	$data['SEO_Robat'] = $this->input->post('SEO_Robat');
	$slug = createSlug($data['Title']);
	$data['slug'] = $slug;


    // Form validation

    $this->form_validation->set_rules('Title', 'Title', 'required');
    // $this->form_validation->set_rules('MetaDescription', 'MetaDescription', 'required');
    // $this->form_validation->set_rules('MetaKeyword', 'MetaKeyword', 'required');
    // $this->form_validation->set_rules('SEO_Robat', 'SEO_Robat', 'required');
    // $this->form_validation->set_rules('description', 'Description', 'required');
    // $this->form_validation->set_rules('createdate', 'Create Date', 'required');
    // $this->form_validation->set_rules('updatedate', 'Update Date', 'required');

    if ($this->form_validation->run() == FALSE) {
		// echo"jkbkj";die;

        $this->load->view('user/header');
	    $this->load->view('user/sidebar');
	    $this->load->view('user/topbar');
	    $this->load->view('user/addnewscat');
	    $this->load->view('user/footer');
    } else {
		// echo"jkbkj";die;
        $this->load->model('news');
        $check = $this->news->addnewscategories($data);
        if ($check == true) {
            redirect('userController/newscategorias'); 
        }
        
    }
 }
//
// edit newscatedit 
public function newscatedit($user) {
	
	$this->load->model('news');
	// echo $user; die;
	$data['user'] = $this->news->newscatedit($user);
	$this->load->view('user/header');
	$this->load->view('user/sidebar');
	$this->load->view('user/topbar');
	$this->load->view('user/updatenewscat', $data);
	$this->load->view('user/footer');
   }
//
// for newscatupdate
public function newscatupdate() {

	function createSlug($string) {
		$slug = strtolower($string);
		$slug = preg_replace('/[^a-z0-9\s]/', '', $slug);
		$slug = str_replace(' ', '-', $slug);
		$slug = trim($slug, '-');
	
		return $slug;
	}
   $this->form_validation->set_error_delimiters('<div class="error-message">', '</div>');   

    $this->form_validation->set_rules('Title', 'Title', 'required');
    $this->form_validation->set_rules('MetaDescription', 'MetaDescription', 'required');
    $this->form_validation->set_rules('MetaKeyword', 'MetaKeyword', 'required');
    $this->form_validation->set_rules('SEO_Robat', 'SEO_Robat', 'required');
    
    $data['Title'] = $this->input->post('Title');
    $data['MetaDescription'] = $this->input->post('MetaDescription');
    $data['MetaKeyword'] = $this->input->post('MetaKeyword');
    $data['SEO_Robat'] = $this->input->post('SEO_Robat');
     $data['category_id'] = $this->input->post('category_id');
     $user=$data['category_id'];
     $slug = createSlug($data['Title']);
    $data['slug'] = $slug;
    //  print_r($data);die;
     if ($this->form_validation->run() == FALSE) {
    	
    	$this->load->model('news');
    	$data['user'] = $this->news->newscatupdate($user);
    	$this->load->view('user/updatedateblog',$data);
    	echo "hello";
    	die;
    } else {
    	 $this->load->model('news');
    	$this->news->newscatupdate($user, $data);
    	redirect('userController/newscategorias');	
     }
    
    }
//
}
?>