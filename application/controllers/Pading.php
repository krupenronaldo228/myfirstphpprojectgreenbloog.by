<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pading extends CI_Controller {
	public function __construct()
	{
		parent::__construct();

		// load Pagination library
		$this->load->library('pagination');

		// load URL helper
		$this->load->helper('url');
	}

	function index($offset=0)
	{
		$this->load->library('pagination');
		$config['base_url'] = site_url('admin/news/index');
		$config['total_rows'] = $this->news_model->countAll();
		$config['per_page'] = 3;
		$config['reuse_query_string'] = TRUE;
		$this->pagination->initialize($config);
		$data['news'] = $this->news_model->getAll($config['per_page'],$offset);
		$this->load->view('admin/news/index',$data);
	}


	/*public function index()
	{
		// load db and model
		$this->load->database();
		$this->load->model('blog_model');

		// init params
		$params = array();
		$limit_per_page = 1;
		$start_index = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
		$total_records = $this->blog_model->get_total();

		if ($total_records > 0)
		{
			// get current page records
			$params["results"] = $this->blog_model->get_current_page_records($limit_per_page, $start_index);

			$config['base_url'] =  base_url() . 'paging/index';
			$config['total_rows'] = $total_records;
			$config['per_page'] = $limit_per_page;
			$config["uri_segment"] = 3;

			$this->pagination->initialize($config);

			// build paging links
			$params["links"] = $this->pagination->create_links();
		}

		$this->load->view('article', $params);
	}

	public function custom()
	{
		// load db and model
		$this->load->database();
		$this->load->model('blog_model');

		// init params
		$params = array();
		$limit_per_page = 2;
		$page = ($this->uri->segment(3)) ? ($this->uri->segment(3) - 1) : 0;
		$total_records = $this->blog_model->get_total();

		if ($total_records > 0)
		{
			// get current page records
			$params["results"] = $this->blog_model->get_current_page_records($limit_per_page, $page*$limit_per_page);

			$config['base_url'] = base_url() . 'paging/custom';
			$config['total_rows'] = $total_records;
			$config['per_page'] = $limit_per_page;
			$config["uri_segment"] = 3;

			// custom paging configuration
			$config['num_links'] = 2;
			$config['use_page_numbers'] = TRUE;
			$config['reuse_query_string'] = TRUE;

			$config['full_tag_open'] = '<div class="pagination">';
			$config['full_tag_close'] = '</div>';

			$config['first_link'] = 'First Page';
			$config['first_tag_open'] = '<span class="firstlink">';
			$config['first_tag_close'] = '</span>';

			$config['last_link'] = 'Last Page';
			$config['last_tag_open'] = '<span class="lastlink">';
			$config['last_tag_close'] = '</span>';

			$config['next_link'] = 'Next Page';
			$config['next_tag_open'] = '<span class="nextlink">';
			$config['next_tag_close'] = '</span>';

			$config['prev_link'] = 'Prev Page';
			$config['prev_tag_open'] = '<span class="prevlink">';
			$config['prev_tag_close'] = '</span>';

			$config['cur_tag_open'] = '<span class="curlink">';
			$config['cur_tag_close'] = '</span>';

			$config['num_tag_open'] = '<span class="numlink">';
			$config['num_tag_close'] = '</span>';

			$this->pagination->initialize($config);

			// build paging links
			$params["links"] = $this->pagination->create_links();
		}

		$this->load->view('article', $params);
	}*/
}
