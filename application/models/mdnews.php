<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

class Mdnews extends CI_Model{

	var $id			= 0;
	var $title		= '';
	var $small_title= '';
	var $translit	= '';
	var $text 		= '';
	var $small_text = '';
	var $date		= '';
	var $image		= '';
	var $noimage	= 0;
	
	function __construct(){
		parent::__construct();
	}
	
	function insert_record($data,$translit){
			
		$this->title	= htmlspecialchars($data['title']);
		$this->small_title	= htmlspecialchars($data['small_title']);
		$this->translit	= $translit;
		$this->text		= $data['text'];
		$this->small_text= $data['small_text'];
		$this->date		= date("Y-m-d");
		if($data['image']):
			$this->image	= $data['image'];
			$this->noimage = 0;
		else:
			$this->image = '';
			$this->noimage = 1;
		endif;
		
		$this->db->insert('news',$this);
		return $this->db->insert_id();
	}
	
	function update_record($id,$data,$translit,$noimage){
		
		$this->db->set('title',htmlspecialchars($data['title']));
		$this->db->set('small_title',htmlspecialchars($data['small_title']));
		$this->db->set('translit',$translit);
		$this->db->set('text',$data['text']);
		$this->db->set('small_text',$data['small_text']);
		$this->db->set('noimage',$noimage);
		if(isset($data['image'])):
			$this->db->set('image',$data['image']);
		endif;
		$this->db->where('id',$id);
		$this->db->update('news');
		return $this->db->affected_rows();
	}
	
	function read_records(){
		
		$this->db->select('id,title,text,date,translit,noimage,small_text,small_title');
		$this->db->order_by('date','DESC');
		$this->db->order_by('id','DESC');
		$query = $this->db->get('news');
		$data = $query->result_array();
		if(count($data)) return $data;
		return NULL;
	}
	
	function read_records_limit($count,$from){
		
		$this->db->select('id,date,translit,noimage,small_text,small_title');
		$this->db->order_by('date','DESC');
		$this->db->limit($count,$from);
		$query = $this->db->get('news');
		$data = $query->result_array();
		if(count($data)) return $data;
		return NULL;
	}
	
	function count_records(){
		
		$this->db->select('COUNT(*) AS cnt');
		$this->db->order_by('date','DESC');
		$query = $this->db->get('news');
		$data = $query->result_array();
		if(isset($data[0]['cnt'])) return $data[0]['cnt'];
		return 0;
	}
	
	function read_record($id){
		
		$this->db->select('id,title,text,date,translit,noimage,small_text,small_title');
		$this->db->where('id',$id);
		$query = $this->db->get('news',1);
		$data = $query->result_array();
		if(isset($data[0])) return $data[0];
		return NULL;
	}
	
	function read_field($id,$field){
			
		$this->db->where('id',$id);
		$query = $this->db->get('news',1);
		$data = $query->result_array();
		if(isset($data[0])) return $data[0][$field];
		return FALSE;
	}
	
	function read_field_translit($translit,$field){
			
		$this->db->where('translit',$translit);
		$query = $this->db->get('news',1);
		$data = $query->result_array();
		if(isset($data[0])) return $data[0][$field];
		return FALSE;
	}
	
	function delete_record($id){
	
		$this->db->where('id',$id);
		$this->db->delete('news');
		return $this->db->affected_rows();
	}
	
	function get_image($mid){
		
		$this->db->where('id',$mid);
		$this->db->select('image');
		$query = $this->db->get('news');
		$data = $query->result_array();
		return $data[0]['image'];
	}
}