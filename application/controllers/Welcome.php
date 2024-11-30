<?php


class Welcome extends CI_Controller {

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
public function index()
	{
		$this->load->view('welcome_message');
	}

	
//get blog data
public function getBlogData() {
		header("Access-Control-Allow-Origin: *");  
		header("Access-Control-Allow-Methods: GET, POST, OPTIONS");
		header("Access-Control-Allow-Headers: Content-Type, X-Requested-With");
		$this->load->model('userlist');
		
		
		$search = $this->input->post('search')['value'];
		$start = $this->input->post('start');
		$length = $this->input->post('length');
		$draw = $this->input->post('draw');
		$start_date = $this->input->post('start_date');
		$end_date = $this->input->post('end_date');
		
		$order_column = $_POST['order'][0]['column']; 
		$order_dir = $_POST['order'][0]['dir']; 
		
		
		$columns = ['id', 'Title', 'name', 'description', 'createdate','updatedate','image']; 
		$order_by = $columns[$order_column]; 
	
		
		$blogs = $this->userlist->getFilteredBlogs($start, $length, $search, $order_by, $order_dir,$start_date,$end_date);
		$totalRecords = $this->userlist->countAllBlogs();
		$filteredRecords = $this->userlist->countFilteredBlogs($search, $start_date, $end_date);
	
		$counter = $start + 1;
		$data = [];
		foreach ($blogs as $blog) {
			$data[] = [
				$counter++,
				// htmlspecialchars($blog->id),
				htmlspecialchars($blog->Title),
				htmlspecialchars($blog->name),
				// htmlspecialchars($blog->description),
				htmlspecialchars($blog->createdate),
				htmlspecialchars($blog->updatedate),
				"<img src='". base_url('uploads/images/'.$blog->image )."'height=100px;>",
				"<a href='" . base_url('UserController/editblog/' . $blog->id) . "' class='edit-btn'>Edit</a>",
				"<a href='" . base_url('UserController/deleteblog/' . $blog->id) . "' class='delete-btn' onclick='return confirm(\"Are you sure you want to delete this blog?\")'>Delete</a>"
			];
		}
		$response = [
			"draw" => intval($draw),
			"recordsTotal" => $totalRecords,
			"recordsFiltered" => $filteredRecords,
			"data" => $data
		];
		echo json_encode($response);
	}


// get user data

public function getuserData() {
	header("Access-Control-Allow-Origin: *");  
	header("Access-Control-Allow-Methods: GET, POST, OPTIONS");
	header("Access-Control-Allow-Headers: Content-Type, X-Requested-With");
	$this->load->model('userlist');
	
	
	$search = $this->input->post('search')['value'];
	$start = $this->input->post('start');
	$length = $this->input->post('length');
	$draw = $this->input->post('draw');

	
	$order_column = $_POST['order'][0]['column']; 
	$order_dir = $_POST['order'][0]['dir']; 
	
	
	$columns = ['id', 'name', 'email', 'password', 'number','city']; 
	$order_by = $columns[$order_column]; 

	
	$blogs = $this->userlist->getFiltereduser($start, $length, $search, $order_by, $order_dir);
	$totalRecords = $this->userlist->countAlluser();
	$filteredRecords = $this->userlist->countFiltereduser($search);

	$counter = $start + 1;
	$data = [];
	foreach ($blogs as $blog) {
		$data[] = [
			$counter++,
			htmlspecialchars($blog->name),
			htmlspecialchars($blog->email),
			htmlspecialchars($blog->password),
			htmlspecialchars($blog->number),
			htmlspecialchars($blog->city),
			"<a href='" . base_url('UserController/usereditdata/' . $blog->id) . "' class='edit-btn'>Edit</a>",
			"<a href='" . base_url('UserController/delete/' . $blog->id) . "' class='delete-btn' onclick='return confirm(\"Are you sure you want to delete this blog?\")'>Delete</a>"
		];
	}
	$response = [
		"draw" => intval($draw),
		"recordsTotal" => $totalRecords,
		"recordsFiltered" => $filteredRecords,
		"data" => $data
	];
	echo json_encode($response);
 }

//
// get blog data

public function getblogcateg() {
	header("Access-Control-Allow-Origin: *");  
	header("Access-Control-Allow-Methods: GET, POST, OPTIONS");
	header("Access-Control-Allow-Headers: Content-Type, X-Requested-With");
	$this->load->model('userlist');
	
	
	$search = $this->input->post('search')['value'];
	$start = $this->input->post('start');
	$length = $this->input->post('length');
	$draw = $this->input->post('draw');
	$start_date = $this->input->post('start_date');
	$end_date = $this->input->post('end_date');
	
	$order_column = $_POST['order'][0]['column']; 
	$order_dir = $_POST['order'][0]['dir']; 
	
	
	$columns = ['category_id ', 'Title', 'MetaDescription', 'MetaKeyword', 'SEO_Robat']; 
	$order_by = $columns[$order_column]; 

	
	$blogs = $this->userlist->getFilteredblogcateg($start, $length, $search, $order_by, $order_dir,$start_date,$end_date);
	$totalRecords = $this->userlist->countAllblogcateg();
	$filteredRecords = $this->userlist->countFilteredblogcateg($search, $start_date, $end_date);

	$counter = $start + 1;
	$data = [];
	foreach ($blogs as $blog) {
		$data[] = [
			$counter++,
			htmlspecialchars($blog->Title),
			htmlspecialchars($blog->MetaDescription),
			htmlspecialchars($blog->MetaKeyword),
			htmlspecialchars($blog->SEO_Robat),
			"<a href='" . base_url('UserController/cateditdata/' . $blog->category_id) . "' class='edit-btn'>Edit</a>",
			"<a href='" . base_url('UserController/deleteblogcat/' . $blog->category_id) . "' class='delete-btn' onclick='return confirm(\"Are you sure you want to delete this blog?\")'>Delete</a>"
		];
	}
	$response = [
		"draw" => intval($draw),
		"recordsTotal" => $totalRecords,
		"recordsFiltered" => $filteredRecords,
		"data" => $data
	];
	echo json_encode($response);
 }

// get news categ data
public function getnewscateg() {
	header("Access-Control-Allow-Origin: *");  
	header("Access-Control-Allow-Methods: GET, POST, OPTIONS");
	header("Access-Control-Allow-Headers: Content-Type, X-Requested-With");
	$this->load->model('userlist');
	
	
	$search = $this->input->post('search')['value'];
	$start = $this->input->post('start');
	$length = $this->input->post('length');
	$draw = $this->input->post('draw');
	$start_date = $this->input->post('start_date');
	$end_date = $this->input->post('end_date');
	
	$order_column = $_POST['order'][0]['column']; 
	$order_dir = $_POST['order'][0]['dir']; 
	
	
	$columns = ['category_id ', 'Title', 'MetaDescription', 'MetaKeyword', 'SEO_Robat']; 
	$order_by = $columns[$order_column]; 

	
	$blogs = $this->userlist->getFilterednewscateg($start, $length, $search, $order_by, $order_dir,$start_date,$end_date);
	$totalRecords = $this->userlist->countAllnewscateg();
	$filteredRecords = $this->userlist->countFilterednewscateg($search, $start_date, $end_date);

	$counter = $start + 1;
	$data = [];
	foreach ($blogs as $blog) {
		$data[] = [
			$counter++,
			htmlspecialchars($blog->Title),
			htmlspecialchars($blog->MetaDescription),
			htmlspecialchars($blog->MetaKeyword),
			htmlspecialchars($blog->SEO_Robat),
			"<a href='" . base_url('UserController/newscatedit/' . $blog->category_id) . "' class='edit-btn'>Edit</a>",
			"<a href='" . base_url('UserController/deletenewsc/' . $blog->category_id) . "' class='delete-btn' onclick='return confirm(\"Are you sure you want to delete this blog?\")'>Delete</a>"
		];
	}
	$response = [
		"draw" => intval($draw),
		"recordsTotal" => $totalRecords,
		"recordsFiltered" => $filteredRecords,
		"data" => $data
	];
	echo json_encode($response);
 }
//get news data
public function getnewsData() {
	header("Access-Control-Allow-Origin: *");  
	header("Access-Control-Allow-Methods: GET, POST, OPTIONS");
	header("Access-Control-Allow-Headers: Content-Type, X-Requested-With");
	$this->load->model('userlist');
	
	
	$search = $this->input->post('search')['value'];
	$start = $this->input->post('start');
	$length = $this->input->post('length');
	$draw = $this->input->post('draw');
	$start_date = $this->input->post('start_date');
	$end_date = $this->input->post('end_date');
	
	$order_column = $_POST['order'][0]['column']; 
	$order_dir = $_POST['order'][0]['dir']; 
	
	
	$columns = ['id', 'name', 'Title', 'description', 'image']; 
	$order_by = $columns[$order_column]; 

	
	$blogs = $this->userlist->getFilterednews($start, $length, $search, $order_by, $order_dir,$start_date,$end_date);
	$totalRecords = $this->userlist->countAllnews();
	$filteredRecords = $this->userlist->countFilterednews($search, $start_date, $end_date);

	$counter = $start + 1;
	$data = [];
	foreach ($blogs as $blog) {
		$data[] = [
			$counter++,
			htmlspecialchars($blog->name),
			htmlspecialchars($blog->Title),
			htmlspecialchars($blog->description),
			"<img src='". base_url('uploads/images/'.$blog->image )."'height=100px;>",
			"<a href='" . base_url('UserController/editnews/' . $blog->id) . "' class='edit-btn'>Edit</a>",
			"<a href='" . base_url('UserController/deletenews/' . $blog->id) . "' class='delete-btn' onclick='return confirm(\"Are you sure you want to delete this blog?\")'>Delete</a>"
		];
	}
	$response = [
		"draw" => intval($draw),
		"recordsTotal" => $totalRecords,
		"recordsFiltered" => $filteredRecords,
		"data" => $data
	];
	echo json_encode($response);
}
//get pages data
public function getpagesData() {
	header("Access-Control-Allow-Origin: *");  
	header("Access-Control-Allow-Methods: GET, POST, OPTIONS");
	header("Access-Control-Allow-Headers: Content-Type, X-Requested-With");
	$this->load->model('userlist');
	
	
	$search = $this->input->post('search')['value'];
	$start = $this->input->post('start');
	$length = $this->input->post('length');
	$draw = $this->input->post('draw');
	$start_date = $this->input->post('start_date');
	$end_date = $this->input->post('end_date');
	
	
	$order_column = $_POST['order'][0]['column']; 
	$order_dir = $_POST['order'][0]['dir']; 
	
	
	$columns = ['id', 'Title', 'date', 'email', 'number','gender','description']; 
	$order_by = $columns[$order_column]; 

	
	$blogs = $this->userlist->getFilteredpages($start, $length, $search, $order_by, $order_dir,$start_date,$end_date);
	$totalRecords = $this->userlist->countAllpages();
	$filteredRecords = $this->userlist->countFilteredpages($search, $start_date, $end_date);

	$counter = $start + 1;
	$data = [];
	foreach ($blogs as $blog) {
		$data[] = [
			$counter++,
			htmlspecialchars($blog->Title),
			htmlspecialchars($blog->date),
			htmlspecialchars($blog->email),
			htmlspecialchars($blog->number),
			htmlspecialchars($blog->gender),
			htmlspecialchars($blog->description),
			"<a href='" . base_url('UserController/editpage/' . $blog->id) . "' class='edit-btn'>Edit</a>",
			"<a href='" . base_url('UserController/deletepages/' . $blog->id) . "' class='delete-btn' onclick='return confirm(\"Are you sure you want to delete this blog?\")'>Delete</a>"
		];
	}
	$response = [
		"draw" => intval($draw),
		"recordsTotal" => $totalRecords,
		"recordsFiltered" => $filteredRecords,
		"data" => $data
	];
	echo json_encode($response);
 }
// get recycle blog data
public function getRecycleBlogData() {
	header("Access-Control-Allow-Origin: *");  
	header("Access-Control-Allow-Methods: GET, POST, OPTIONS");
	header("Access-Control-Allow-Headers: Content-Type, X-Requested-With");
	$this->load->model('userlist');
	
	
	$search = $this->input->post('search')['value'];
	$start = $this->input->post('start');
	$length = $this->input->post('length');
	$draw = $this->input->post('draw');
	$start_date = $this->input->post('start_date');
	$end_date = $this->input->post('end_date');
	
	$order_column = $_POST['order'][0]['column']; 
	$order_dir = $_POST['order'][0]['dir']; 
	
	
	$columns = ['id', 'Title', 'name', 'description', 'createdate','updatedate','image']; 
	$order_by = $columns[$order_column]; 

	
	$blogs = $this->userlist->getFilteredRecycleBlogs($start, $length, $search, $order_by, $order_dir,$start_date,$end_date);
	$totalRecords = $this->userlist->countAllRecycleBlogs();
	$filteredRecords = $this->userlist->countFilteredRecycleBlogs($search, $start_date, $end_date);

	$counter = $start + 1;
	$data = [];
	foreach ($blogs as $blog) {
		$data[] = [
			$counter++,
			htmlspecialchars($blog->Title),
			htmlspecialchars($blog->name),
			htmlspecialchars($blog->description),
			htmlspecialchars($blog->createdate),
			htmlspecialchars($blog->updatedate),
			"<img src='". base_url('uploads/images/'.$blog->image )."'height=100px;>",
			"<a href='" . base_url('UserController/blogrestore/' . $blog->id) . "' class='edit-btn'>Restore</a>",
			"<a href='" . base_url('UserController/blogdelete/' . $blog->id) . "' class='delete-btn' onclick='return confirm(\"Are you sure you want to delete this blog?\")'>Delete</a>"
		];
	}
	$response = [
		"draw" => intval($draw),
		"recordsTotal" => $totalRecords,
		"recordsFiltered" => $filteredRecords,
		"data" => $data
	];
	echo json_encode($response);
}
 
// get company detail data

public function getprofileData() {
	header("Access-Control-Allow-Origin: *");  
	header("Access-Control-Allow-Methods: GET, POST, OPTIONS");
	header("Access-Control-Allow-Headers: Content-Type, X-Requested-With");
	$this->load->model('userlist');
	
	
	$search = $this->input->post('search')['value'];
	$start = $this->input->post('start');
	$length = $this->input->post('length');
	$draw = $this->input->post('draw');

	
	$order_column = $_POST['order'][0]['column']; 
	$order_dir = $_POST['order'][0]['dir']; 
	
	
	$columns = ['id','company_id', 'company_name', 'company_type', 'company_email']; 
	$order_by = $columns[$order_column]; 

	
	$blogs = $this->userlist->getFilteredprofile($start, $length, $search, $order_by, $order_dir);
	$totalRecords = $this->userlist->countAllprofile();
	$filteredRecords = $this->userlist->countFilteredprofile($search);

	$counter = $start + 1;
	$data = [];
	foreach ($blogs as $blog) {
		$data[] = [
			$counter++,
			htmlspecialchars($blog->company_id),
			htmlspecialchars($blog->company_name),
			htmlspecialchars($blog->company_type),
			htmlspecialchars($blog->company_email),
			"<button class='btn btn-primary view-address-btn' data-company-id='" . $blog->company_id . "'>View Address</button>",
			"<a href='" . base_url('Welcome/companyeditdata/' . $blog->id) . "' class='edit-btn'>Edit</a>",
			"<a href='" . base_url('Welcome/delete_company/' . $blog->id) . "' class='delete-btn' onclick='return confirm(\"Are you sure you want to delete this blog?\")'>Delete</a>"
		];
	}
	$response = [
		"draw" => intval($draw),
		"recordsTotal" => $totalRecords,
		"recordsFiltered" => $filteredRecords,
		"data" => $data
	];
	echo json_encode($response);
 }
 

 // edit data 
 public function companyeditdata($user) {
	$this->load->model('userlist');
	// echo $user; die;
	$data['user'] = $this->userlist->companyeditdata($user);
	$this->load->view('user/header');
	$this->load->view('user/sidebar');
	$this->load->view('user/topbar');
	$this->load->view('user/update_companydata', $data);
	$this->load->view('user/footer');
 }
	
 // for update
	public function companyupdatedata() {
	   $this->form_validation->set_error_delimiters('<div class="error-message">', '</div>');   

	$this->form_validation->set_rules('company_name', 'company_name', 'required');
	$this->form_validation->set_rules('company_type', 'company_type', 'required');
	$this->form_validation->set_rules('company_email', 'company_email', 'required');

	$data['company_id'] = $this->input->post('company_id');
	 $data['company_name'] = $this->input->post('company_name');
	 $data['company_type'] = $this->input->post('company_type');
	 $data['company_email'] = $this->input->post('company_email');

	 $data['id'] = $this->input->post('id');
	 $user=$data['id'];
	 if ($this->form_validation->run() == FALSE) {
		
		$this->load->model('userlist');
		$data['user'] = $this->userlist->companyeditdata($user);
		$this->load->view('user/update_companydata',$data);
		// echo "hello";
		// die;
	} else {
		// echo "qihqsi";
		// die;
		 $this->load->model('userlist');
		$this->userlist->update_company($user, $data);
		// echo "hello";
		// die;
		redirect('UserController/companies');

		
	}

 }
  //for delete  
 public function delete_company($id)
 {
  $this->load->model('userlist');
	 $this->userlist->delete_company($id);	
	 redirect('UserController/companies');
 }
 // add company view page
 public function addcmp($data=array())
   {     
	     $this->load->view('user/header');
		 $this->load->view('user/sidebar');
		 $this->load->view('user/topbar');
	     $this->load->view('user/addcmp');
		 $this->load->view('user/footer');
   }
 // add company
   public function add (){
	$data['company_id'] = $this->input->post('company_id');
   $data['company_name'] = $this->input->post('company_name');
   $data['company_type'] = $this->input->post('company_type');
   $data['company_email'] = $this->input->post('company_email');

   // print_r($data);
   // die;
   $this->form_validation->set_rules('company_name', 'company_name', 'required');
   $this->form_validation->set_rules('company_type', 'company_type', 'required');
   $this->form_validation->set_rules('company_email', 'company_email', 'required');

   if ($this->form_validation->run() == FALSE)
   {
	   $this->load->view('user/addcomp'); 
   }
   else
   {
	   $this->load->model('userlist');
	   $check = $this->userlist->add($data);
	   if($check == true){
		   redirect('UserController/companies');
	   }
   }	
  }	

//
public function getprofileData2() {
	header("Access-Control-Allow-Origin: *");  
	header("Access-Control-Allow-Methods: GET, POST, OPTIONS");
	header("Access-Control-Allow-Headers: Content-Type, X-Requested-With");
	$this->load->model('userlist');
	
	
	$search = $this->input->post('search')['value'];
	$start = $this->input->post('start');
	$length = $this->input->post('length');
	$draw = $this->input->post('draw');

	
	$order_column = $_POST['order'][0]['column']; 
	$order_dir = $_POST['order'][0]['dir']; 
	
	
	$columns = ['id','company_id', 'address', 'latitude', 'longitute','mobile']; 
	$order_by = $columns[$order_column]; 

	
	$blogs = $this->userlist->getFilteredprofile2($start, $length, $search, $order_by, $order_dir);
	$totalRecords = $this->userlist->countAllprofile2();
	$filteredRecords = $this->userlist->countFilteredprofile2($search);

	$counter = $start + 1;
	$data = [];
	foreach ($blogs as $blog) {
		$data[] = [
			$counter++,
			htmlspecialchars($blog->company_id),
			htmlspecialchars($blog->address),
			htmlspecialchars($blog->latitude),
			htmlspecialchars($blog->longitute),
			htmlspecialchars($blog->mobile),
			// "<button class='btn btn-primary view-address-btn' data-company-id='" . $blog->id . "'>View Address</button>",
			"<a href='" . base_url('Welcome/companyeditdata2/' . $blog->company_id) . "' class='edit-btn'>Edit</a>",
			"<a href='" . base_url('Welcome/delete_company2/' . $blog->company_id) . "' class='delete-btn' onclick='return confirm(\"Are you sure you want to delete this blog?\")'>Delete</a>"
		];
		
	}
	$response = [
		"draw" => intval($draw),
		"recordsTotal" => $totalRecords,
		"recordsFiltered" => $filteredRecords,
		"data" => $data
	];
	echo json_encode($response);
 }
 

 // edit data 
 public function companyeditdata2($blog) {
	$this->load->model('userlist');
	// echo $blog; die;
	$data['user'] = $this->userlist->companyeditdata2($blog);
	$this->load->view('user/header');
	$this->load->view('user/sidebar');
	$this->load->view('user/topbar');
	$this->load->view('user/update_address', $blog);
	$this->load->view('user/footer');
 }
	
 // for update
	public function companyupdatedata2() {
	// echo $blog; die;

	   $this->form_validation->set_error_delimiters('<div class="error-message">', '</div>');   

	$this->form_validation->set_rules('address', 'address', 'required');
	// $this->form_validation->set_rules('latitude', 'latitude', 'required');
	// $this->form_validation->set_rules('longitute', 'longitute', 'required');

	 $data['address'] = $this->input->post('address');
	 $data['latitude'] = $this->input->post('latitude');
	 $data['longitute'] = $this->input->post('longitute');
	 $data['mobile'] = $this->input->post('mobile');


	 $data['company_id'] = $this->input->post('company_id');
	 $user=$data['company_id'];
	 if ($this->form_validation->run() == FALSE) {
		$this->load->model('userlist');
		$data['user'] = $this->userlist->companyeditdata2($blog);
		$this->load->view('user/update_address',$data);
		echo "hello";
		die;
	} else {
		// echo "qihqsi";
		// die;
		 $this->load->model('userlist');
		$this->userlist->update_company2($user, $data);
		// echo "hello";
		// die;
		redirect('UserController/companies');

		
	}

 }
  //for delete  
 public function delete_company2($company_id)
 {
  $this->load->model('userlist');
	 $this->userlist->delete_company2($company_id);	
	//  print_r($data);die;
	//  $this->load->view('user/update_companydata');
	redirect('UserController/companies');

 }

    public function adddata (){
		// echo"jnbj,m";die;
		$data['company_id'] = $this->input->post('company_id');
    $data['address'] = $this->input->post('address');
    $data['latitude'] = $this->input->post('latitude');
    $data['longitute'] = $this->input->post('longitute');
    $data['mobile'] = $this->input->post('mobile');
    
    // print_r($data);
    // die;
    $this->form_validation->set_rules('address', 'address', 'required');
    // $this->form_validation->set_rules('latitude', 'latitude', 'required');
    // $this->form_validation->set_rules('longitute', 'longitute', 'required');
    // $this->form_validation->set_rules('mobile', 'mobile', 'required');
    
    
    if ($this->form_validation->run() == FALSE)
    {   echo"incomp";die;
    	// $this->load->view('user/adduser'); 
    	redirect('Welcome/getprofileData2');
    }
    else
    {
    	$this->load->model('userlist');
    	$check = $this->userlist->adduser($data);
		// print_r($check);die;
    	if($check == true){
    		redirect('UserController/companies');
	//  $this->load->view('user/company_details');

    	}
    }	
    }	

}


