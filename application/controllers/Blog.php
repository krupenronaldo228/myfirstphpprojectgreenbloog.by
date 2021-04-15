<?php

/**
 * Class Blog
 * @property CI_Pagination pagination
 * @property CI_DB_query_builder db
 * @property news_model news
 */

class Blog extends CI_Controller {


	public function __construct()
	{
		parent::__construct();
		$this->load->model('news_model', 'news');
		#$this->load->library('pagination');
		$this->load->helper('url');
		// Your own constructor code
	}

	public function index545()
	{
	/*	$data['id'] = "";
		$data['title'] = "";
		$data['description'] = "";
		$data['image'] = "";
		$data['text'] = "";
		$data['pubdate'] = "";
		$data['slug'] = "";*/

	/*	$this->load->model('blog_model');

		$data['query'] = $this->blogview->get_last_ten_entries();*/
        $data['news'] = $this->news->getNews();
        $this->load->view('blogview', $data);
		$this->load->view('news', $data);

	}


	public function view()
	{
		$slug = $this->uri->segment(2);
     $data['news_item'] = $this->news->getNews($slug);

     if(empty($data['news_item'])){
     	show_404();
	 }


		$data['news'] = $this->news->getItems(['slug !=' => $slug], 'pubdate DESC', 2);

     $data['title'] = $data['news_item']['title'];
  	 $data['image'] = $data['news_item']['image'];
	 $data['text'] = $data['news_item']['text'];
	 $data['pubdate'] = $data['news_item']['pubdate'];
	 $data['description'] = $data['news_item']['description'];

     $this->load->view('news', $data);

	}


	public function index() {

		$per_page = 5;
		$uri_segment =2;

		$config['base_url'] = 'http://greenbloog.by/blog';
		$config['total_rows'] = $this->news->countAll();
		$config['per_page'] = $per_page;
		$config['num_links'] = 4;
		$config['uri_segment'] = $uri_segment;
		$config['use_page_numbers'] = TRUE;
		#$config['page_query_string'] = TRUE;
		#$config['suffix'] = '?';

		$config['full_tag_open'] = "<ul class='pagination'>";
		$config['full_tag_close'] = '</ul>';

		/*$config['first_link'] = 'Первая страница';
		$config['first_tag_open'] = '<span class="firstlink">';
		$config['first_tag_close'] = '</span>';*/

		/*$config['last_link'] = 'Последняя страница';
		$config['last_tag_open'] = '<span class="lastlink">';
		$config['last_tag_close'] = '</span>';*/

	    $config['first_link'] = "<span aria-hidden=\"true\">&laquo;</span>";
		$config['last_link'] = "<span aria-hidden=\"true\">&raquo;</span>";

		/*$config['next_link'] = 'Далее';
		$config['next_tag_open'] = '<span class="nextlink">';
		$config['next_tag_close'] = '</span>';

		$config['prev_link'] = 'Назад';
		$config['prev_tag_open'] = '<span class="prevlink">';
		$config['prev_tag_close'] = '</span>';*/

		$config['cur_tag_open'] = '<span class="curlink">';
		$config['cur_tag_close'] = '</span>';

		$config['num_tag_open'] = '<span class="numlink">';
		$config['num_tag_close'] = '</span>';

		if (count($_GET)>0)
		{
			$config['suffix'] = '?' . http_build_query($_GET, '', "&");
			$config['first_url'] = $config['base_url'] . $config['suffix'];
		}


		$offset = (intval($this->uri->segment(2)) * $config['per_page']) - $config['per_page'];
		#var_dump($offset); die;
		if ($offset < 0) $offset = 0;

		$this->load->library('pagination');
		$this->pagination->initialize($config);


		$sort = $this->input->get('sort');
		if(empty($sort)) $sort = 'pubdate DESC';
		$data['sort'] = $sort;

		$data['news'] = $this->news->getItems([], $sort, $config['per_page'], $offset);
		#var_dump($data['news']); die;

		$data['pagination'] = $this->pagination->create_links();



		$this->load->view('blogview', $data);

			}

	/*function index2($offset=0, $per_page=5)
	{
		$this->load->library('pagination');
		$config['base_url'] = site_url('http://greenbloog.by/blog');
		$config['total_rows'] = $this->news_model->countAll();
		$config['per_page'] = $per_page;
		$config['reuse_query_string'] = TRUE;
		$this->pagination->initialize($config);
		$data['news'] = $this->news_model->getAll($config['per_page'],$offset);
		$this->load->view('blogview',$data);
	}*/

/*	public function sortASC(){
		$sort = $this->input->get('sort');
		if(empty($sort)) $sort = 'pubdate ASC';
		$this->data['sort'] = $sort;
			}

	public function sortDESC(){
		$sort = $this->input->get('sort');
		if(empty($sort)) $sort = 'pubdate DESC';
		$this->data['sort'] = $sort;
			}*/

}
