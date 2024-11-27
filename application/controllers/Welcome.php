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


}


