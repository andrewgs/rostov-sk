<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Users_interface extends CI_Controller {
	
	var $user = array('uid'=>0,'ulogin'=>'','uemail'=>'');
	var $loginstatus = array('status'=>FALSE);
	var $months = array("01"=>"января","02"=>"февраля","03"=>"марта","04"=>"апреля","05"=>"мая","06"=>"июня","07"=>"июля","08"=>"августа","09"=>"сентября","10"=>"октября","11"=>"ноября","12"=>"декабря");
	
	function __construct(){
		
		parent::__construct();
		$this->load->model('mdadmins');
		$this->load->model('mdnews');
		$this->load->model('mdunion');
		
		$cookieuid = $this->session->userdata('logon');
		if(isset($cookieuid) and !empty($cookieuid)):
			$this->user['uid'] = $this->session->userdata('userid');
			if($this->user['uid']):
				$userinfo = $this->mdadmins->read_record($this->user['uid']);
				if($userinfo):
					$this->user['ulogin']			= $userinfo['login'];
					$this->user['uemail']			= '';
					$this->loginstatus['status'] 	= TRUE;
				endif;
			endif;
			
			if($this->session->userdata('logon') != md5($userinfo['login'])):
				$this->loginstatus['status'] = FALSE;
				$this->user = array();
			endif;
		endif;
	}
	
	public function index(){
		
		$pagevar = array(
			'title'			=> 'Группа строительных компаний РСК',
			'description'	=> '',
			'author'		=> '',
			'news'			=> $this->mdnews->read_records_limit(3,0),
			'baseurl' 		=> base_url(),
		);
		
		for($i=0;$i<count($pagevar['news']);$i++):
			$pagevar['news'][$i]['date'] = $this->operation_date($pagevar['news'][$i]['date']);
		endfor;
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
			'allnews'		=> $this->mdnews->read_records(),
			'news'			=> array(),
			'baseurl' 		=> base_url(),
			'newsid'		=> 0
		);
		
		for($i=0;$i<count($pagevar['news']);$i++):
			$pagevar['news'][$i]['date'] = $this->operation_date($pagevar['news'][$i]['date']);
		endfor;
		if($this->uri->total_segments() == 2):
			$translit = preg_split('/-/',$this->uri->segment(2));
			if(!is_numeric($translit[0])):
				redirect('');
			endif;
			if(count($pagevar['allnews'])):
				$pagevar['news'] = $this->mdnews->read_record($translit[0]);
				$pagevar['newsid'] = $translit[0];
			endif;
		else:
			if(count($pagevar['allnews'])):
				$pagevar['news'] = $this->mdnews->read_record($pagevar['allnews'][0]['id']);
				$pagevar['newsid'] = $pagevar['allnews'][0]['id'];
			endif;
		endif;
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
			'msgs'			=> $this->session->userdata('msgs'),
			'msgr'			=> $this->session->userdata('msgr'),
		);
		$this->session->unset_userdata('msgs');
		$this->session->unset_userdata('msgr');
		
		if($this->input->post('submit')):
			unset($_POST['submit']);
			$this->form_validation->set_rules('name',' ','required|trim');
			$this->form_validation->set_rules('email',' ','required|valid_email|trim');
			$this->form_validation->set_rules('phone',' ','required|trim');
			$this->form_validation->set_rules('text',' ','required|trim');
			if(!$this->form_validation->run()):
				$this->session->set_userdata('msgr','Ошибка. Повторите ввод.');
			else:
				ob_start();
				?>
				<p>Сообщение от <?=$_POST['name'];?></p>
				<p>Email: <?=$_POST['email'];?></p>
				<p>Контактный телефон: <?=$_POST['phone'];?></p>
				<p>Сообщение:<br/><?=$_POST['text'];?></p>
				<?
				$mailtext = ob_get_clean();
				
				$this->email->clear(TRUE);
				$config['smtp_host'] = 'localhost';
				$config['charset'] = 'utf-8';
				$config['wordwrap'] = TRUE;
				$config['mailtype'] = 'html';
				
				$this->email->initialize($config);
				$this->email->to('rsk_rostov@mail.ru');
				$this->email->from($_POST['email'],$_POST['name']);
				$this->email->bcc('');
				$this->email->subject('Форма обратной связи Группа строительных компаний «РСК»');
				$this->email->message($mailtext);
				$this->email->send();
				$this->session->set_userdata('msgs','Сообщение отправлено');
			endif;
			redirect($this->uri->uri_string());
		endif;
		
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
	
	public function admin_login(){
	
		$pagevar = array(
			'title'			=> 'Группа строительных компаний РСК | Авторизация',
			'description'	=> '',
			'author'		=> '',
			'baseurl' 		=> base_url(),
			'loginstatus'	=> $this->loginstatus,
			'userinfo'		=> $this->user,
			'msgs'			=> $this->session->userdata('msgs'),
			'msgr'			=> $this->session->userdata('msgr'),
		);
		$this->session->unset_userdata('msgs');
		$this->session->unset_userdata('msgr');
		
		if($this->input->post('submit')):
			$_POST['submit'] == NULL;
			$user = $this->mdadmins->auth_user($this->input->post('login'),$this->input->post('password'));
			if(!$user):
				$this->session->set_userdata('msgr','Имя пользователя и пароль не совпадают');
				redirect($this->uri->uri_string());
			else:
				$session_data = array('logon'=>md5($user['login']),'userid'=>$user['id']);
				$this->session->set_userdata($session_data);
				redirect("admin-panel/actions/news");
			endif;
		endif;
		
		if($this->loginstatus['status']):
			redirect('admin-panel/actions/news');
		endif;
		
		$this->load->view("admin_interface/login",$pagevar);
	}

	public function operation_date($field){
			
		$list = preg_split("/-/",$field);
		$nmonth = $this->months[$list[1]];
		$pattern = "/(\d+)(-)(\w+)(-)(\d+)/i";
		$replacement = "\$5 $nmonth \$1 г."; 
		return preg_replace($pattern, $replacement,$field);
	}
	
	public function operation_dot_date($field){
			
		$list = preg_split("/-/",$field);
		$pattern = "/(\d+)(-)(\w+)(-)(\d+)/i";
		$replacement = "\$5.$3.\$1"; 
		return preg_replace($pattern, $replacement,$field);
	}
}

/* End of file users_interface.php */
/* Location: ./application/controllers/users_interface.php */