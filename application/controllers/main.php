<?php

if (!defined('BASEPATH'))
	exit('No direct script access allowed');

class Main extends CI_Controller {

	function __construct() {
		parent::__construct();

		$bbb = 0;
		if(!empty($_SESSION['have_ask'])){
			$bbb = $_SESSION['have_ask'];
		}
		$ar = array('ask','setask','redirect');
		if(!in_array($this->router->method,$ar) && $bbb != '1'){
			header('Location: '.site_url('main/ask'));
		}

		$this->load->library('gd_creater');
		$this->gd_creater->delimg();
	}
	
	private function _getBaseData(){
		$fansInfoArray = $this->getFansInfo();
		$data = array(
				'fb_title' => $this->APPTITLE(),
				'page_id' => $fansInfoArray['page_id'],
				'page_url' => $fansInfoArray['page_url'],
				'images' => $this->preload_images()
		);
		return $data;
	}

	public function setask() {
		$_SESSION['have_ask'] = '1';
		redirect('/main/index', 'refresh');
	}
	
	public function delete_ask() {
		unset($_SESSION['have_ask']);
	}
	
	public function ask() {
		$this->load->view('ask_view');
	}

	public function permit(){
		redirect('Companta/index');
	}

	public function index() {
		$data = $this->_getBaseData();
		$fbid = $this->facebook->getUser();
		$data['fbid'] = $fbid;
		$data['tab'] = 0;
		$this->init_model->apply_template_with_ga($this->router->method . '_view', $data);
	}

	public function share(){
		$fbid = $this->facebook->getUser();
		$message = '2014年限量版Companta 搶先預約鑑賞，去年沒有機會品嚐到限量版，今年絕不能錯過！';
		
		$this->load->library('bitly');
		$url = SERVER_URL;
// 		$bitly = $url;
		$bitly = $this->bitly->shorten($url);
		$bitly = $bitly->$url->shortUrl;
		
		$args = array(
				'message' => $message,
				'name' => '搶先預約鑑賞格蘭傑 Companta 2014 私藏系列',
				'caption'=> $message,
				'link' => $bitly,
		);
		
		try {
			$success = $this->facebook->api($fbid . "/feed", "post", $args);
		} catch (Exception $e) {
				print_r($e);
		}

		$json = array(
			'success' => true
			);
		echo json_encode($json);
	}
	
	public function setMsg(){
		$table = 'tag_record';
		$params = array(
				'message' => $_POST['message']
				);
		unset($_POST['message']);
		$where = $_POST;
		$this->db->update($params,$where);
		$json = array(
				'success' => true
		);
		echo json_encode($json);
	}
	
	public function redirect($fbid=0){
		if($fbid==0):
			echo '<script>window.open("'.SERVER_URL.'","_top");</script>';
		else:
			echo '<script>window.open("'.APP_HOST.'index.php/main/message/'.$fbid.'","_top");</script>';
		endif;
		exit;
	}

	public function get_post($table)
	{
		$data = null;
		switch ($table){
			case 'user_info':
				$data['username'] = $this->input->post('username');
				$data['tel'] = $this->input->post('tel');
				$data['email'] = $this->input->post('email');
                $data['fbid'] = $this->facebook->getUser();
				break;
			case 'friend_info':
				$data['username'] = $this->input->post('username');
				$data['tel'] = $this->input->post('tel');
				$data['address'] = $this->input->post('address');
                $data['from_fbid'] = $this->facebook->getUser();
				$data['message'] = $this->input->post('message');
				break;
		};

		return $data;
	}
	
	public function setData(){
		$fbid = $this->facebook->getUser();
		$table = $_POST['table'];

		$params = $this->get_post($table);

		if($table == 'user_info'):
			$user = $this->facebook_model->getUser($fbid);
			$params['fbname'] = $user['name'];
			$this->user_info_md->insert($params);
		elseif($table == 'friend_info'):
			$this->friend_info_md->insert($params);
		endif;
		$json = array(
				'success' => 1
				);
		echo json_encode($json);
	}

	public function po_wall() {
		$fb_title = $this->APPTITLE();
		$fbid = $this->facebook->getUser();
		
		$fuser = $_SESSION[$fbid.'fuser'];
		
		$table = 'user_info';
		$params = array(
				'fbid' => $fbid,
				'is_join' => 'Y'
		);
		$rs = $this->db_md->getCount($params);
		if($rs==0){
			$params['is_join'] = 'N';
			$this->db->insert($params);
			foreach($fuser as $fk=>$fv):
				$table = 'tag_record';
				$params = array(
						'fbid' => $fbid,
						'tofbid' => $fv['uid']
						);
				$this->db->insert($params);
			endforeach;
		}
		
		$user = $this->facebook_model->getUser($fbid);
		$file = base_url().MERGE_PATH.$fbid.'_wall.jpg';
		$file = base_url().'images/wall-2.jpg';
		$file = str_replace('https','http',$file);
// 		$this->load->library('bitly');
		$url = site_url('main/redirect').'/'.$fbid;
// 		$bitly = '';
// 		$bitly = $this->bitly->shorten($url);
// 		$bitly = $bitly->$url->shortUrl;
		
		$message = '在家靠父母，出外靠朋友，是誰在你人生中的重要時刻為你撐腰，成為你的最佳戰友？

____是我的超完美強棒應援團，朋友們快來留言，讓我們一起擊出一支無人能擋的HOME RUN吧>>>'.$url;

		$params = array(
				'pic' => $file,
				'album_name' => $fb_title.' photos',
				'album_description' => $fb_title.' photos',
				'picture_description' => $message,
		);
		$pid = $this->facebook_model->album($params);
// 		foreach($fuser as $fk=>$fv):
// 			$params = array(
// 					'upload_photo_id' => $pid['id'],
// 					'x' => 5,
// 					'y' => 5,
// 					'uid' => $fv['uid']
// 			);
// 			$this->facebook_model->tag($params);
// 		endforeach;
		$json = array(
				'success' => true
		);
		echo json_encode($json);
	}

	public function ajaxrecord(){
		$table = $_POST['table'];
		$fbid = $this->facebook->getUser();
		$params = array(
				'fbid' => $fbid
		);
		$success = $this->db->insert($params);
		$json = array(
				'success' => $success
		);
		echo json_encode($json);
	}
	
	private function preload_images(){
		foreach (glob(IMAGE_PATH."/*") as $f) $images[]=  "'$f'";
		return implode(',',$images);
	}

	public function add_tab()
	{
		$url = "http://www.facebook.com/dialog/pagetab?app_id=" . FBAPP_ID . "&next=" . APP_HOST;
		echo "<a href='$url'>$url</a>";
		exit;
	}

	private function getFansInfo() {
		$rows['page_id'] = fans_page_id;
		$rows['page_url'] = fans_page;

		return $rows;
	}

	public function ajaxtouch(){
	}

	private function APPTITLE(){
		$fbapp_title = $this->facebook_model->getAPPTitle();
		return $fbapp_title[0]['display_name'];
	}
}

?>
