<?php
class news_model extends CI_Model
{

	public function __construct()
	{
		$this->load->database();
		parent::__construct();

	}

	protected $table = 'news';

	public function getNews($slug = FALSE)
	{
		if ($slug === FALSE) {
			$query = $this->db->get($this->table);
			return $query->result_array();
		}
		$query = $this->db->get_where($this->table, array('slug' => $slug));
		return $query->row_array();
	}

/*	public function getNewsID($id = FALSE)
	{
		if ($id === FALSE) {
			$query = $this->db->get('news');
			return $query->result_array();
		}
		$query = $this->db->get_where('news', array('id' => $id));
		return $query->row_array();
	}*/

	function getAll($limit,$offset,$order = null)
	{
		$keyword = $this->input->get('keyword');
		if($keyword){
			$this->db->like(array('title'=>$keyword));
			$this->db->or_like(array('description'=>$keyword));
			$this->db->or_like(array('slug'=>$keyword));
			$this->db->or_like(array('text'=>$keyword));
		}
		#$this->db->limit($limit);
		#$this->db->offset($offset);
		#$this->db;
		return $this->db
			->order_by($order)
			->get_where($this->table, null, $limit, $offset)
			->result_array();
	}
	function countAll()
	{
		$keyword = $this->input->get('keyword');
		if($keyword){
			$this->db->like(array('title'=>$keyword));
			$this->db->or_like(array('description'=>$keyword));
			$this->db->or_like(array('slug'=>$keyword));
			$this->db->or_like(array('text'=>$keyword));
		}
		return $this->db->count_all_results($this->table);
	}

	public function getItems($params = [], $order= null, $limit = null, $offset = null)
	{

		$keyword = $this->input->get('keyword');
		if($keyword){
			$this->db->like(array('title'=>$keyword));
			$this->db->or_like(array('description'=>$keyword));
			$this->db->or_like(array('text'=>$keyword));
			$this->db->or_like(array('slug'=>$keyword));
		}

		if($order != null)
			$this->db->order_by($order);

		return $this->db
					->get_where($this->table, $params, $limit, $offset)
					-> result_array();
	}


}
