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
			$config = array();
			$config['base_url'] = base_url('UserController/view');  
			$config['total_rows'] = $this->userlist->getCount();    
			$config['per_page'] = 5;                                 
			$config['uri_segment'] = 3;                              
		
			
			$this->pagination->initialize($config);
			$page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
			$data['users'] = $this->userlist->get_users($config['per_page'], $page);
			$data['links'] = $this->pagination->create_links();
             $this->load->model('userlist'); 
			 $this->load->model('userlist');
			 $this->load->view('user/header');
			 $this->load->view('user/sidebar');
			 $this->load->view('user/topbar');
      		$this->load->view('user/userlist',['data'=>$data]);
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
		   // echo "redirect to login";
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
	
// print_r( $data) ;
// die;
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
	$config = array();
	$config['base_url'] = base_url('UserController/blog');  
	$config['total_rows'] = $this->userlist->getCountBlog();    
	$config['per_page'] = 3;                                 
	$config['uri_segment'] = 3;                              

	
	$this->pagination->initialize($config);
	$page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
	$data['users'] = $this->userlist->getusers($config['per_page'], $page);
	$data['links'] = $this->pagination->create_links();
	// Load the view
		  $this->load->model('userlist');
		  $this->load->view('user/header');
		  $this->load->view('user/sidebar');
		  $this->load->view('user/topbar');
		  $this->load->view('user/bloglist',['data'=>$data]);
		  $this->load->view('user/footer');
}   
public function bloglistcategorias()
{        
	$config = array();
	$config['base_url'] = base_url('UserController/bloglistcategorias');  
	$config['total_rows'] = $this->userlist->getCountBlogc();    
	$config['per_page'] = 3;                                 
	$config['uri_segment'] = 3;                              

	
	$this->pagination->initialize($config);
	$page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
	$data['users'] = $this->userlist->getusersc($config['per_page'], $page);
	$data['links'] = $this->pagination->create_links();
	// Load the view
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
	$this->load->model('userlist');
	$this->load->view('user/header');
	$this->load->view('user/sidebar');
	$this->load->view('user/topbar');
	$this->load->view('user/updateblog', $data);

}
	
// for blogupdate
	public function updateblog() {
	//    $this->form_validation->set_error_delimiters('<div class="error-message">', '</div>');   

	$this->form_validation->set_rules('name', 'name', 'required');
	$this->form_validation->set_rules('email', 'title', 'required');
	$this->form_validation->set_rules('SEO_Title', 'SEO_Title', 'required');
    $this->form_validation->set_rules('MetaDescription', 'MetaDescription', 'required');
    $this->form_validation->set_rules('MetaKeyword', 'MetaKeyword', 'required');
    $this->form_validation->set_rules('SEO_Robat', 'SEO_Robat', 'required');
	$this->form_validation->set_rules('password', 'description', 'required');
	$this->form_validation->set_rules('number', 'createdate', 'required');
	$this->form_validation->set_rules('city', 'updatedate', 'required');
	
	
	 $data['name'] = $this->input->post('name');
	 $data['title'] = $this->input->post('title');
	 $data['SEO_Title'] = $this->input->post('SEO_Title');
	 $data['MetaDescription'] = $this->input->post('MetaDescription');
	 $data['MetaKeyword'] = $this->input->post('MetaKeyword');
	 $data['SEO_Robat'] = $this->input->post('SEO_Robat');
	 $data['description'] = $this->input->post('description');
	 $data['createdate'] = $this->input->post('createdate');
	 $data['updatedate'] = $this->input->post('updatedate');
	 $data['id'] = $this->input->post('id');
	 $user=$data['id'];
	 if (!$this->form_validation->run() == FALSE) {
		
		$this->load->model('userlist');
		$data['user'] = $this->userlist->editblog($user);
		$this->load->view('user/updateblog',$data);
	} else {
		 $this->load->model('userlist');
		$this->userlist->updateblog($user, $data);
		// echo "hello";
		// die;
		redirect('userController/blog');

		
	}

}
// add blog
	     
   public function addblog($data=array())
   {    $this->load->view('user/header');
	    $this->load->view('user/sidebar');
	    $this->load->view('user/topbar');
	    $this->load->view('user/addblog');
	    $this->load->view('user/footer');
   }

   public function addblogdata() {
    $data['name'] = $this->input->post('name');
    $data['title'] = $this->input->post('title');
	$data['SEO_Title'] = $this->input->post('SEO_Title');
	$data['MetaDescription'] = $this->input->post('MetaDescription');
	$data['MetaKeyword'] = $this->input->post('MetaKeyword');
	$data['SEO_Robat'] = $this->input->post('SEO_Robat');
    $data['description'] = $this->input->post('description');
    $data['createdate'] = $this->input->post('createdate');
    $data['updatedate'] = $this->input->post('updatedate');
	$data['image']=$this->input->post('image');

    // Form validation
    $this->form_validation->set_rules('name', 'Name', 'required');
    // $this->form_validation->set_rules('title', 'Title', 'required');
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
        // Image upload configuration
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

 // delete blog 
 public function deleteblog($user){
		
          $this->load->model('user/userlist');
          $this->userlist->blogdelete($user);
          redirect('UserController/blog', 'refresh'); 
}

//for recycle page
// public function recycle(){
// 	$this->load->view('user/header');
// 	$this->load->view('user/sidebar');
// 	$this->load->view('user/topbar');
// 	$this->load->view('user/recycle',['data' => $data]);
// 	$this->load->view('user/footer');
//   }




  
//recycleblog pagination
public function recycleblog()
{
    $this->load->model('userlist');
    $this->load->library('pagination');

    $config = array();
    $config['base_url'] = base_url('UserController/recycleblog');  
    $config['total_rows'] = $this->userlist->countrows();  
    $config['per_page'] = 5;                                 
    $config['uri_segment'] = 3;  
  
    $this->pagination->initialize($config);

    $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
    // echo "Current page: " . $page;

 
    $data['user'] = $this->userlist->getblogrecycledata($config['per_page'], $page);
    $data['links'] = $this->pagination->create_links();
	// print_r($data['links']);
	// die;

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

public function blogsite() {
    $this->load->model('userlist');
    
    $data['user'] = $this->userlist->blogsite(); 
    $data['news'] = $this->userlist->blognews();  

	$this->load->view('user/blogsiteheader');
    $this->load->view('user/blogheader2');
    $this->load->view('user/blogsite', $data);  
    $this->load->view('user/blogsitefooter');
}
// blogsite about 

public function blogsiteabout(){
	$this->load->model('userlist');
	$data['user']= $this->userlist->about();
	$this->load->view('user/blogsiteheader');
	$this->load->view('user/about', $data);
	$this->load->view('user/blogsitefooter');


    }
// blogsite contactus 
public function contactus($data=array())
{   $this->load->view('user/blogsiteheader');
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

// Read More
    public function read_more($post_id) {
        $data['post'] = $this->userlist->get_post_by_id($post_id); 
        if (empty($data['post'])) {
            show_404(); 
        }
		$data['sideblog'] = $this->userlist->sideblog();
		$this->load->view('user/blogsiteheader');
        $this->load->view('user/readmore', $data); 
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
  
  // Read Morenews
  public function read_morenews($post_id) {
	$data['post'] = $this->userlist->get_news_by_id($post_id); 
	if (empty($data['post'])) {
		show_404(); 
	}
	$data['sideblog'] = $this->userlist->sidenews();
	$this->load->view('user/blogsiteheader');
	$this->load->view('user/newsreadmore', $data); 
$this->load->view('user/blogsitefooter');

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
$data['title'] = $this->input->post('title');
$data['date'] = $this->input->post('date');
$data['email'] = $this->input->post('email');
$data['number'] = $this->input->post('number');
$data['gender'] = $this->input->post('gender');
$data['description'] = $this->input->post('description');

// print_r($data);
// die;
$this->form_validation->set_rules('title', 'title', 'required');
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
		$this->form_validation->set_rules('title', 'title', 'required');
		$this->form_validation->set_rules('date', 'date', 'required');
		$this->form_validation->set_rules('email', 'email', 'required');
		$this->form_validation->set_rules('number', 'number', 'required');
		$this->form_validation->set_rules('gender', 'gender', 'required');
		$this->form_validation->set_rules('description', 'description', 'required');
        
	   $data['title'] = $this->input->post('title');
	   $data['date'] = $this->input->post('date');
	   $data['email'] = $this->input->post('email');
	   $data['number'] = $this->input->post('number');
	   $data['gender'] = $this->input->post('gender');
	   $data['description'] = $this->input->post('description');
	   $data['id'] = $this->input->post('id');
	   $user=$data['id'];
	//    print_r($user);
	//    die;

	
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
public function news()

{
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
	$this->load->model('userlist');
	$this->load->view('user/header');
	$this->load->view('user/sidebar');
	$this->load->view('user/topbar');
	$this->load->view('user/updatenews', $data);

}
	
// for updatenews
	public function updatenews() {
	//    $this->form_validation->set_error_delimiters('<div class="error-message">', '</div>');   

	$this->form_validation->set_rules('name', 'name', 'required');
	$this->form_validation->set_rules('email', 'title', 'required');
	$this->form_validation->set_rules('password', 'description', 'required');

	
	
	 $data['name'] = $this->input->post('name');
	 $data['title'] = $this->input->post('title');
	 $data['description'] = $this->input->post('description');

	 $data['id'] = $this->input->post('id');
	 $user=$data['id'];
	//  print_r($user);
	//  die;
	 if (!$this->form_validation->run() == FALSE) {
		echo "hello";
		die;
		$this->load->model('news');
		$data['user'] = $this->news->editnews($user);
		$this->load->view('user/updatenews',$data);
	} else {
		 $this->load->model('news');
		$this->news->updatenews($user, $data);
		// echo "hello";
		// die;
		redirect('UserController/news');

		
	}

}
// add addnews
	     
   public function addnews($data=array())
   {    $this->load->view('user/header');
	    $this->load->view('user/sidebar');
	    $this->load->view('user/topbar');
	    $this->load->view('user/addnews');
	    $this->load->view('user/footer');
   }

   public function addnewsdata() {
    $data['name'] = $this->input->post('name');
    $data['title'] = $this->input->post('title');
    $data['description'] = $this->input->post('description');

	$data['image']=$this->input->post('image');

    // Form validation
    $this->form_validation->set_rules('name', 'Name', 'required');
    $this->form_validation->set_rules('title', 'Title', 'required');
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

 // delete blog 
 public function deletenews($user){
		
          $this->load->model('news');
          $this->news->newsdelete($user);
          redirect('UserController/news', 'refresh'); 
}

}
?>