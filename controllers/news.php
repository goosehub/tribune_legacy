<?php
class News extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('news_model');
	}

	public function index()
	{
		$data['news'] = $this->news_model->get_news();
		$data['title'] = 'News';

		$this->load->view('templates/header', $data);
		$this->load->view('news/index', $data);
		$this->load->view('templates/footer');
	}

	public function view($slug)
	{
		$this->load->helper('form');
		$this->load->library('form_validation');
		$data['news_item'] = $this->news_model->get_news($slug);
		$data['comments'] = $this->news_model->get_news_comments($slug);
		$this->form_validation->set_rules('name', 'Name', 'required');
		$this->form_validation->set_rules('text', 'text', 'required');

		if (empty($data['news_item']))
		{
			show_404();
		}

		$data['title'] = $data['news_item']['title'];
		$slug = $data['news_item']['slug'];

		if ($this->form_validation->run() === FALSE)
		{
		$this->load->view('templates/header', $data);
		$this->load->view('news/view', $data);
		$this->load->view('templates/footer');
		}
		else
		{
			$this->news_model->set_news_comment($slug);
			$this->load->view('news/success');
		}
	}

	public function contribute()
	{
		$data['title'] = 'contribute a news item';

		// Defining error notices
		$data['errorCode'] = '';
		$data['errorExists'] = '';
		$data['errorInvalid'] = '';
		$data['uploadName'] = '';
		$data['uploadType'] = '';
		$data['uploadSize'] = '';
		$data['uploadFilename'] = '';
		$data['uploadLocation'] = '';

		// Form Validation
		$this->load->helper('form');
		$this->load->library('form_validation');
		$this->form_validation->set_rules('title', 'Title', 'required');
		$this->form_validation->set_rules('text', 'text', 'required');
		$this->form_validation->set_rules('caption', 'caption', 'required');

	if($_SERVER['REQUEST_METHOD'] == 'POST'
		&& isset($_FILES['userfile']) )
		{
		// Image info
		$image_info = getimagesize($_FILES["userfile"]["tmp_name"]);
		$image_width = $image_info[0];
		$image_height = $image_info[1];
		$allowedExts = array("gif", "jpeg", "jpg", "png");
		$temp = explode(".", $_FILES["userfile"]["name"]);
		$extension = end($temp);

		//Validate
		if ((($_FILES["userfile"]["type"] == "image/gif")
		|| ($_FILES["userfile"]["type"] == "image/jpeg")
		|| ($_FILES["userfile"]["type"] == "image/jpg")
		|| ($_FILES["userfile"]["type"] == "image/pjpeg")
		|| ($_FILES["userfile"]["type"] == "image/x-png")
		|| ($_FILES["userfile"]["type"] == "image/png"))
		&& ($_FILES["userfile"]["size"] < 3200000)
		&& ($image_height < 3200)
		&& ($image_width < 3200)
		&& ($image_height > 200)
		&& ($image_width > 200)
		&& in_array($extension, $allowedExts)) {
		  if ($_FILES["userfile"]["error"] > 0) {
			// Error check
		    $data['errorCode'] = "Return Code: " . $_FILES["userfile"]["error"] . "<br>";
		  } else {
		  	//File info stored
		    $data['uploadName'] = "Upload: " . $_FILES["userfile"]["name"] . "<br>";
		    $data['uploadType'] = "Type: " . $_FILES["userfile"]["type"] . "<br>";
		    $data['uploadSize'] = "Size: " . ($_FILES["userfile"]["size"] / 1024) . " kB<br>";
		    $data['uploadFilename'] = "Temp file: " . $_FILES["userfile"]["tmp_name"] . "<br>";
		    if (file_exists("/tribune/images/" . $_FILES["userfile"]["name"])) {
		    //Error check
		      $data['errorExists'] = $_FILES["userfile"]["name"] . " already exists. ";
		    } else {
		    	// Success and move file
		      move_uploaded_file($_FILES["userfile"]["tmp_name"],
		      "../tribune/images/" . $_FILES["userfile"]["name"]);
		      $data['uploadLocation'] = "Stored in: " . "/tribune/images/" . $_FILES["userfile"]["name"];
		    }
		  }
		}
	}
	else if($_SERVER['REQUEST_METHOD'] == 'POST'
		&& ! isset($_FILES['userfile']) )
	{
		$data['errorInvalid'] = 'Invalid File';
	}


		//Form validation and view loading
		if ($this->form_validation->run() === FALSE)
		{
			$this->load->view('templates/header', $data);
			$this->load->view('news/contribute');
			$this->load->view('templates/footer');
		}
		else
		{
			$filename = $_FILES["userfile"]["name"];
			$this->news_model->set_news($filename);
			$this->load->view('templates/header', $data);
			$this->load->view('news/success');
			$this->load->view('templates/footer');			
		}

	}





		// Category Functions
		public function s4s()
	{
		$category = 's4s';
		$data['news'] = $this->news_model->get_news_category($category);
		$data['title'] = 'S4S News';

		$this->load->view('templates/header', $data);
		$this->load->view('news/s4s', $data);
		$this->load->view('templates/footer');
	}
	// functions can't start with a number, so fourchan instead of 4chan
		public function fourchan()
	{
		$category = '4chan';
		$data['news'] = $this->news_model->get_news_category($category);
		$data['title'] = '4Chan News';

		$this->load->view('templates/header', $data);
		$this->load->view('news/4chan', $data);
		$this->load->view('templates/footer');
	}
		public function www()
	{
		$category = 'world wide web';
		$data['news'] = $this->news_model->get_news_category($category);
		$data['title'] = 'World Wide Web News';

		$this->load->view('templates/header', $data);
		$this->load->view('news/www', $data);
		$this->load->view('templates/footer');
	}
		public function opinion()
	{
		$category = 'opinion';
		$data['news'] = $this->news_model->get_news_category($category);
		$data['title'] = 'Opinion';

		$this->load->view('templates/header', $data);
		$this->load->view('news/opinion', $data);
		$this->load->view('templates/footer');
	}
		public function advice()
	{
		$category = 'advice';
		$data['news'] = $this->news_model->get_news_category($category);
		$data['title'] = 'Advice';

		$this->load->view('templates/header', $data);
		$this->load->view('news/advice', $data);
		$this->load->view('templates/footer');
	}
		public function reviews()
	{
		$category = 'reviews';
		$data['news'] = $this->news_model->get_news_category($category);
		$data['title'] = 'Reviews';

		$this->load->view('templates/header', $data);
		$this->load->view('news/reviews', $data);
		$this->load->view('templates/footer');
	}
		public function interviews()
	{
		$category = 'interviews';
		$data['news'] = $this->news_model->get_news_category($category);
		$data['title'] = 'Interviews';

		$this->load->view('templates/header', $data);
		$this->load->view('news/interviews', $data);
		$this->load->view('templates/footer');
	}
		public function investigations()
	{
		$category = 'investigations';
		$data['news'] = $this->news_model->get_news_category($category);
		$data['title'] = 'Investigations';

		$this->load->view('templates/header', $data);
		$this->load->view('news/investigations', $data);
		$this->load->view('templates/footer');
	}

}