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
		$this->load->helper('form');
		$this->load->library('form_validation');

		$data['title'] = 'contribute a news item';

		$this->form_validation->set_rules('title', 'Title', 'required');
		$this->form_validation->set_rules('text', 'text', 'required');
		$this->form_validation->set_rules('caption', 'caption', 'required');



		if ($this->form_validation->run() === FALSE)
		{
			$this->load->view('templates/header', $data);
			$this->load->view('news/contribute');
			$this->load->view('templates/footer');

		}
		else
		{
			$filename = $_FILES["file"]["name"];
			$this->news_model->set_news($filename);
			$this->load->view('templates/header', $data);
			$this->load->view('news/success');
			$this->load->view('templates/footer');
			
		}

		     if($_SERVER['REQUEST_METHOD'] == 'POST')
		{

		$image_info = getimagesize($_FILES["file"]["tmp_name"]);
		$image_width = $image_info[0];
		$image_height = $image_info[1];

		//upload
		$allowedExts = array("gif", "jpeg", "jpg", "png");
		$temp = explode(".", $_FILES["file"]["name"]);
		$extension = end($temp);

		if ((($_FILES["file"]["type"] == "image/gif")
		|| ($_FILES["file"]["type"] == "image/jpeg")
		|| ($_FILES["file"]["type"] == "image/jpg")
		|| ($_FILES["file"]["type"] == "image/pjpeg")
		|| ($_FILES["file"]["type"] == "image/x-png")
		|| ($_FILES["file"]["type"] == "image/png"))
		&& ($_FILES["file"]["size"] < 1600000)
		&& ($image_height < 1600)
		&& ($image_width < 1600)
		&& in_array($extension, $allowedExts)) {
		  if ($_FILES["file"]["error"] > 0) {
		    echo "Return Code: " . $_FILES["file"]["error"] . "<br>";
		  } else {
		    echo "Upload: " . $_FILES["file"]["name"] . "<br>";
		    echo "Type: " . $_FILES["file"]["type"] . "<br>";
		    echo "Size: " . ($_FILES["file"]["size"] / 1024) . " kB<br>";
		    echo "Temp file: " . $_FILES["file"]["tmp_name"] . "<br>";
		    if (file_exists("/tribune/images/" . $_FILES["file"]["name"])) {
		      echo $_FILES["file"]["name"] . " already exists. ";
		    } else {
		      move_uploaded_file($_FILES["file"]["tmp_name"],
		      "../tribune/images/" . $_FILES["file"]["name"]);
		      echo "Stored in: " . "/tribune/images/" . $_FILES["file"]["name"];
		    }
		  }
		} else {
		  echo "Invalid file";
		}

		}
	}

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