<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

class Admin_interface extends CI_Controller{

	var $language = 'ru';
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
				else:
					redirect('');
				endif;
			endif;
			
			if($this->session->userdata('logon') != md5($userinfo['login'])):
				$this->loginstatus['status'] = FALSE;
				redirect('');
			endif;
		else:
			redirect('');
		endif;
		
		if($this->session->userdata('language')):
			$this->language = $this->session->userdata('language');
		else:
			$this->language = 'ru';
		endif;
	}
	
	public function admin_panel(){
		
		$pagevar = array(
			'title'			=> 'Панель администрирования',
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
		
		$this->session->set_userdata('backpath',$pagevar['baseurl'].$this->uri->uri_string());
		$this->load->view("admin_interface/admin-panel",$pagevar);
	}
	
	public function profile(){
		
		$pagevar = array(
					'description'	=> '',
					'author'		=> '',
					'title'			=> 'Панель администрирования | Смена пароля',
					'baseurl' 		=> base_url(),
					'userinfo'		=> $this->user,
					'user'			=> $this->mdadmins->read_record($this->user['uid']),
					'msgs'			=> $this->session->userdata('msgs'),
					'msgr'			=> $this->session->userdata('msgr')
			);
		$this->session->unset_userdata('msgs');
		$this->session->unset_userdata('msgr');
		
		if($this->input->post('submit')):
			$_POST['submit'] = NULL;
			$this->form_validation->set_rules('oldpas',' ','trim');
			$this->form_validation->set_rules('password',' ','trim');
			$this->form_validation->set_rules('confpass',' ','trim');
			if(!$this->form_validation->run()):
				$this->session->set_userdata('msgr','Ошибка. Неверно заполены необходимые поля<br/>');
				redirect($this->uri->uri_string());
			else:
				if(!empty($_POST['oldpas']) && !empty($_POST['password']) && !empty($_POST['confpass'])):
					if(!$this->mdadmins->user_exist('password',md5($_POST['oldpas']))):
						$this->session->set_userdata('msgr',' Не верный старый пароль!');
					elseif($_POST['password']!=$_POST['confpass']):
						$this->session->set_userdata('msgr',' Пароли не совпадают.');
					else:
						$this->mdadmins->update_field($this->user['uid'],'password',md5($_POST['password']));
						$this->mdadmins->update_field($this->user['uid'],'cryptpassword',$this->encrypt->encode($_POST['password']));
						$this->session->set_userdata('msgs',' Пароль успешно изменен');
					endif;
				endif;
				redirect($this->uri->uri_string());
			endif;
		endif;
		$this->load->view("admin_interface/admin-profile",$pagevar);
	}
	
	public function admin_logoff(){
		
		$this->session->sess_destroy();
			redirect('');
	}
	
	/******************************************************* text ************************************************************/
	
	public function admin_edit_text(){
		
		$pagevar = array(
					'description'	=> '',
					'author'		=> '',
					'title'			=> 'Панель администрирования | Смена пароля',
					'baseurl' 		=> base_url(),
					'userinfo'		=> $this->user,
					'text'			=> array(),
					'text'			=> $this->mdadmins->read_record($this->user['uid']),
					'msgs'			=> $this->session->userdata('msgs'),
					'msgr'			=> $this->session->userdata('msgr')
			);
		$this->session->unset_userdata('msgs');
		$this->session->unset_userdata('msgr');
		
		switch($this->uri->segment(3)):
			case 'contacts' : 	$pagevar['text']['id'] = $id1 = 1;
								$pagevar['text']['vname1'] = $this->mdtexts->read_field($id1,'text');
								$pagevar['text']['noimage'] = $this->mdtexts->read_field($id1,'noimage');
								$pagevar['text']['lname1'] = 'Адрес';
								$pagevar['text']['fname1'] = 'text1';
								$id2 = 2;
								$pagevar['text']['vname2'] = $this->mdtexts->read_field($id2,'text');
								$pagevar['text']['lname2'] = 'E-mail';
								$pagevar['text']['fname2'] = 'text2';
								break;
			case 'clients' : 	$pagevar['text']['id'] = $id1 = 3;
								$pagevar['text']['vname1'] = $this->mdtexts->read_field($id1,'text');
								$pagevar['text']['noimage'] = $this->mdtexts->read_field($id1,'noimage');
								$pagevar['text']['lname1'] = 'Прелог';
								$pagevar['text']['fname1'] = 'text1';
								$id2 = 4;
								$pagevar['text']['vname2'] = $this->mdtexts->read_field($id2,'text');
								$pagevar['text']['lname2'] = 'Содержание';
								$pagevar['text']['fname2'] = 'text2';
								break;
			case 'about' : 		$pagevar['text']['id'] = $id1 = 5;
								$pagevar['text']['vname1'] = $this->mdtexts->read_field($id1,'text');
								$pagevar['text']['noimage'] = $this->mdtexts->read_field($id1,'noimage');
								$pagevar['text']['lname1'] = 'О компании';
								$pagevar['text']['fname1'] = 'text1';
								$id2 = NULL;
								break;
			case 'vakansii' : 	$pagevar['text']['id'] = $id1 = 6;
								$pagevar['text']['vname1'] = $this->mdtexts->read_field($id1,'text');
								$pagevar['text']['noimage'] = $this->mdtexts->read_field($id1,'noimage');
								$pagevar['text']['lname1'] = 'Вакансии';
								$pagevar['text']['fname1'] = 'text1';
								$id2 = NULL;
								break;
			default : redirect($this->session->userdata('backpath'));
		endswitch;
		if($this->input->post('submit')):
			unset($_POST['submit']);
			$text = array(); $i = 0;
			if(!isset($_POST['noimage'])):
				$_POST['noimage'] = 0;
			endif;
			if($_FILES['image']['error'] != 4):
				$this->mdtexts->update_field($id1,'image',file_get_contents($_FILES['image']['tmp_name']));
			endif;
			$this->mdtexts->update_field($id1,'noimage',$_POST['noimage']);
			$this->mdtexts->update_field($id1,'text',$_POST['text1']);
			if(isset($id2)):
				$this->mdtexts->update_field($id2,'noimage',1);
				$this->mdtexts->update_field($id2,'text',$_POST['text2']);
			endif;
			$this->session->set_userdata('msgs','Текс сохранен успешно.');
			redirect($this->uri->uri_string());
		endif;
		$this->load->view("admin_interface/texts/edit-text",$pagevar);
	}
	
	/******************************************************* events ************************************************************/
	
	public function control_news(){
		
		$from = intval($this->uri->segment(5));
		$pagevar = array(
			'title'			=> 'Панель администрирования | Новости',
			'description'	=> '',
			'author'		=> '',
			'baseurl'		=> base_url(),
			'loginstatus'	=> $this->loginstatus,
			'userinfo'		=> $this->user,
			'events'		=> $this->mdnews->read_records_limit(5,$from),
			'pages'			=> array(),
			'msgs'			=> $this->session->userdata('msgs'),
			'msgr'			=> $this->session->userdata('msgr'),
		);
		$this->session->unset_userdata('msgs');
		$this->session->unset_userdata('msgr');
		
		for($i=0;$i<count($pagevar['events']);$i++):
			$pagevar['events'][$i]['date'] = $this->operation_dot_date($pagevar['events'][$i]['date']);
		endfor;
		
		$config['base_url'] 		= $pagevar['baseurl'].'admin-panel/actions/news/from/';
		$config['uri_segment'] 		= 5;
		$config['total_rows'] 		= $this->mdnews->count_records();
		$config['per_page'] 		= 5;
		$config['num_links'] 		= 4;
		$config['first_link']		= 'В начало';
		$config['last_link'] 		= 'В конец';
		$config['next_link'] 		= 'Далее &raquo;';
		$config['prev_link'] 		= '&laquo; Назад';
		$config['cur_tag_open']		= '<li class="active"><a href="#">';
		$config['cur_tag_close'] 	= '</a></li>';
		$config['full_tag_open'] 	= '<div class="pagination"><ul>';
		$config['full_tag_close'] 	= '</ul></div>';
		$config['first_tag_open'] 	= '<li>';
		$config['first_tag_close'] 	= '</li>';
		$config['last_tag_open'] 	= '<li>';
		$config['last_tag_close'] 	= '</li>';
		$config['next_tag_open'] 	= '<li>';
		$config['next_tag_close'] 	= '</li>';
		$config['prev_tag_open'] 	= '<li>';
		$config['prev_tag_close'] 	= '</li>';
		$config['num_tag_open'] 	= '<li>';
		$config['num_tag_close'] 	= '</li>';
		
		$this->pagination->initialize($config);
		$pagevar['pages'] = $this->pagination->create_links();
		
		$this->session->set_userdata('backpath',$pagevar['baseurl'].$this->uri->uri_string());
		$this->load->view("admin_interface/news/list-news",$pagevar);
	}
	
	public function control_add_new(){
		
		$pagevar = array(
			'title'			=> 'Панель администрирования | Добавление новости',
			'description'	=> '',
			'author'		=> '',
			'baseurl'		=> base_url(),
			'loginstatus'	=> $this->loginstatus,
			'userinfo'		=> $this->user,
			'msgs'			=> $this->session->userdata('msgs'),
			'msgr'			=> $this->session->userdata('msgr'),
		);
		$this->session->unset_userdata('msgs');
		$this->session->unset_userdata('msgr');
		
		if($this->input->post('submit')):
			unset($_POST['submit']);
			$this->form_validation->set_rules('title',' ','required|trim');
			$this->form_validation->set_rules('small_title',' ','required|trim');
			$this->form_validation->set_rules('text',' ','required|trim');
			$this->form_validation->set_rules('small_text',' ','required|trim');
			if(!$this->form_validation->run()):
				$this->session->set_userdata('msgr','Ошибка. Неверно заполены необходимые поля<br/>');
				$this->control_add_events();
				return FALSE;
			else:
				if($_FILES['image']['error'] != 4):
					$_POST['image'] = file_get_contents($_FILES['image']['tmp_name']);
				else:
					$_POST['image'] = FALSE;
				endif;
				$translit = $this->translite($_POST['small_title']);
				$result = $this->mdnews->insert_record($_POST,$translit);
				if($result):
					$this->session->set_userdata('msgs','Запись создана успешно.');
				endif;
				redirect($this->uri->uri_string());
			endif;
		endif;
		
		$this->load->view("admin_interface/news/add-news",$pagevar);
	}
	
	public function control_edit_news(){
		
		$nid = $this->uri->segment(6);
		$pagevar = array(
			'title'			=> 'Панель администрирования | Редактирование новости',
			'description'	=> '',
			'author'		=> '',
			'baseurl'		=> base_url(),
			'loginstatus'	=> $this->loginstatus,
			'userinfo'		=> $this->user,
			'event'			=> $this->mdnews->read_record($nid),
			'msgs'			=> $this->session->userdata('msgs'),
			'msgr'			=> $this->session->userdata('msgr'),
		);
		$this->session->unset_userdata('msgs');
		$this->session->unset_userdata('msgr');
		
		if($this->input->post('submit')):
			unset($_POST['submit']);
			$this->form_validation->set_rules('title',' ','required|trim');
			$this->form_validation->set_rules('small_title',' ','required|trim');
			$this->form_validation->set_rules('text',' ','required|trim');
			$this->form_validation->set_rules('small_text',' ','required|trim');
			if(!$this->form_validation->run()):
				$this->session->set_userdata('msgr','Ошибка. Неверно заполены необходимые поля<br/>');
				$this->control_edit_events();
				return FALSE;
			else:
				if($_FILES['image']['error'] != 4):
					$_POST['image'] = file_get_contents($_FILES['image']['tmp_name']);
				endif;
				if(isset($_POST['noimage'])):
					$noimage = 1;
				else:
					$noimage = 0;
				endif;
				$translit = $this->translite($_POST['small_title']);
				$result = $this->mdnews->update_record($nid,$_POST,$translit,$noimage);
				if($result):
					$this->session->set_userdata('msgs','Запись сохранена успешно.');
				endif;
				redirect($this->session->userdata('backpath'));
			endif;
		endif;
		
		$this->load->view("admin_interface/news/edit-news",$pagevar);
	}
	
	public function control_delete_news(){
		
		$nid = $this->uri->segment(6);
		if($nid):
			$result = $this->mdnews->delete_record($nid);
			if($result):
				$this->session->set_userdata('msgs','Запись удалена успешно.');
			else:
				$this->session->set_userdata('msgr','Запись не удалена.');
			endif;
			redirect($this->session->userdata('backpath'));
		else:
			show_404();
		endif;
	}
	
	/******************************************************** functions ******************************************************/	
	
	function get_sizes(){
	
		$sizes= array();
		for($i=0;$i<39;$i++):
			$sizes[$i]['id'] = $i;
			$sizes[$i]['code'] = '';
		endfor;
		$sizes[0]['code'] = '40(s)';
		$sizes[1]['code'] = '42(M)';
		$sizes[2]['code'] = '44(L)';
		$sizes[3]['code'] = '46(XL)';
		$sizes[4]['code'] = '48(XXL)';
		$sizes[5]['code'] = '50(3XL)';
		$sizes[6]['code'] = '52(4XL)';
		$sizes[7]['code'] = '54(5XL)';
		$sizes[8]['code'] = '56(6XL)';
		$sizes[9]['code'] = '44(s)';
		$sizes[10]['code'] = '48(M)';
		$sizes[11]['code'] = '52(L)';
		$sizes[12]['code'] = '56(XL)';
		$sizes[13]['code'] = '60(XXL)';
		$sizes[14]['code'] = '64(3XL)';
		$sizes[15]['code'] = '68(4XL)';
		$sizes[16]['code'] = '72(5XL)';
		$sizes[17]['code'] = '44-46(s)';
		$sizes[18]['code'] = '48-50(M)';
		$sizes[19]['code'] = '52-54(L)';
		$sizes[20]['code'] = '56-58(XL)';
		$sizes[17]['code'] = '44-46(s)';
		$sizes[18]['code'] = '48-50(M)';
		$sizes[19]['code'] = '52-54(L)';
		$sizes[20]['code'] = '56-58(XL)';
		
		$sizes[21]['code'] = '42(XS)';
		$sizes[22]['code'] = '44(S)';
		$sizes[23]['code'] = '46(M)';
		$sizes[24]['code'] = '48(L)';
		$sizes[25]['code'] = '50(XL)';
		$sizes[26]['code'] = '52(XXL)';
		$sizes[27]['code'] = '54(3XL)';
		$sizes[28]['code'] = '56(4XL)';
		$sizes[29]['code'] = '58(5XL)';
		
		$sizes[30]['code'] = '42-44(XS)';
		$sizes[31]['code'] = '44-46(S)';
		$sizes[32]['code'] = '46-48(M)';
		$sizes[33]['code'] = '48-50(L)';
		$sizes[34]['code'] = '50-52(XL)';
		$sizes[35]['code'] = '52-54(XXL)';
		$sizes[36]['code'] = '54-56(3XL)';
		$sizes[37]['code'] = '56-58(4XL)';
		$sizes[38]['code'] = '58-60(5XL)';
		
		return $sizes;
	}
	
	function resize_image($tmpName,$wgt,$hgt,$dim,$ratio){
			
		chmod($tmpName,0777);
		$img = getimagesize($tmpName);
		$this->load->library('image_lib');
		$this->image_lib->clear();
		$config['image_library'] 	= 'gd2';
		$config['source_image']		= $tmpName; 
		$config['create_thumb'] 	= FALSE;
		$config['maintain_ratio'] 	= $ratio;
		$config['quality'] 			= 100;
		$config['master_dim'] 		= $dim;
		$config['width'] 			= $wgt;
		$config['height'] 			= $hgt;
		$this->image_lib->initialize($config);
		$this->image_lib->resize();
		
		$image = file_get_contents($tmpName);
		return $image;
	}
	
	function case_image($file){
			
		$info = getimagesize($file);
		switch ($info[2]):
			case 1	: return TRUE;
			case 2	: return TRUE;
			case 3	: return TRUE;
			default	: return FALSE;	
		endswitch;
	}
	
	public function translite($string){
		
		$rus = array("1","2","3","4","5","6","7","8","9","0","ё","й","ю","ь","ч","щ","ц","у","к","е","н","г","ш","з","х","ъ","ф","ы","в","а","п","р","о","л","д","ж","э","я","с","м","и","т","б","Ё","Й","Ю","Ч","Ь","Щ","Ц","У","К","Е","Н","Г","Ш","З","Х","Ъ","Ф","Ы","В","А","П","Р","О","Л","Д","Ж","Э","Я","С","М","И","Т","Б"," ");
		$eng = array("1","2","3","4","5","6","7","8","9","0","yo","iy","yu","","ch","sh","c","u","k","e","n","g","sh","z","h","","f","y","v","a","p","r","o","l","d","j","е","ya","s","m","i","t","b","Yo","Iy","Yu","CH","","SH","C","U","K","E","N","G","SH","Z","H","","F","Y","V","A","P","R","O","L","D","J","E","YA","S","M","I","T","B","-");
		$string = str_replace($rus,$eng,$string);
		if(!empty($string)):
			$string = preg_replace('/[^a-z0-9,-]/','',strtolower($string));
			$string = preg_replace('/[-]+/','-',$string);
			$string = preg_replace('/[\.\?\!\)\(\,\:\;]/','',$string);
			return $string;
		else:
			return FALSE;
		endif;
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