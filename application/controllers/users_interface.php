<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Users_interface extends CI_Controller {
	
	function __construct(){
		
		parent::__construct();
	}
	
	public function index(){
		
		$pagevar = array(
			'title'			=> 'Группа строительных компаний РСК',
			'description'	=> '',
			'author'		=> '',
			'baseurl' 		=> base_url(),
		);
		
		$this->load->view('users_interface/index',$pagevar);
	}
	
	public function about(){
		
		$pagevar = array(
			'title'			=> 'Группа строительных компаний РСК | О компании',
			'description'	=> '',
			'author'		=> '',
			'baseurl' 		=> base_url(),
		);
		
		$this->load->view('users_interface/about',$pagevar);
	}

	public function news(){
		
		$pagevar = array(
			'title'			=> 'Группа строительных компаний РСК | Новости компании и публикации в прессе',
			'description'	=> '',
			'author'		=> '',
			'baseurl' 		=> base_url(),
		);
		
		$this->load->view('users_interface/news',$pagevar);
	}
	
	public function objects(){
		
		$pagevar = array(
			'title'			=> 'Группа строительных компаний РСК | Строительные объекты',
			'description'	=> '',
			'author'		=> '',
			'baseurl' 		=> base_url(),
		);
		
		$this->load->view('users_interface/objects',$pagevar);
	}
	
	public function contacts(){
		
		$pagevar = array(
			'title'			=> 'Группа строительных компаний РСК',
			'description'	=> '',
			'author'		=> '',
			'baseurl' 		=> base_url(),
		);
		
		$this->load->view('users_interface/contacts',$pagevar);
	}
	
	public function for_partners(){
		
		$pagevar = array(
			'title'			=> 'Группа строительных компаний РСК | Строительным компаниям',
			'description'	=> '',
			'author'		=> '',
			'baseurl' 		=> base_url(),
		);
		
		$this->load->view('users_interface/for-partners',$pagevar);
	}
	
	public function for_individuals(){
		
		$pagevar = array(
			'title'			=> 'Группа строительных компаний РСК | Частным лицам',
			'description'	=> '',
			'author'		=> '',
			'baseurl' 		=> base_url(),
		);
		
		$this->load->view('users_interface/for-individuals',$pagevar);
	}
	
	public function for_architectors(){
		
		$pagevar = array(
			'title'			=> 'Группа строительных компаний РСК | Строителям и архитекторам',
			'description'	=> '',
			'author'		=> '',
			'baseurl' 		=> base_url(),
		);
		
		$this->load->view('users_interface/for-architectors',$pagevar);
	}
	
	public function licenzii(){
		
		$pagevar = array(
			'title'			=> 'Группа строительных компаний РСК | О компании',
			'description'	=> '',
			'author'		=> '',
			'baseurl' 		=> base_url(),
		);
		
		$this->load->view('users_interface/licenzii',$pagevar);
	}
	
	public function blagodarnosti(){
		
		$pagevar = array(
			'title'			=> 'Группа строительных компаний РСК | Благодарственные письма',
			'description'	=> '',
			'author'		=> '',
			'baseurl' 		=> base_url(),
		);
		
		$this->load->view('users_interface/blagodarnosti',$pagevar);
	}
	
}

/* End of file users_interface.php */
/* Location: ./application/controllers/users_interface.php */