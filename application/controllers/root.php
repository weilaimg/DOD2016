<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class Root extends CI_Controller{

	function __construct(){
		parent::__construct();
		if(!isset($_SESSION)){
				session_start();
			}
		$uid = $_SESSION['uid'];
		$this -> load -> model ('login_model','login');
		$data = $this -> login ->check_by_uid($uid);
		$rank = $data[0]['rank'] ; 

		if($rank != 0 ){
			success('index/first','对不起，您没有权限登入此页面');
		}
	}

	/**
	 * 载入后台主页 
	 */

	public function load_admin(){
		$this -> load -> view ('root/admin');
	}


	/**
	 * 载入分类页
	 */
	public function load_cate(){
		$this -> load -> model('cate_model','cate');
		$data['category'] = $this -> cate -> check();
		$this -> load -> view ('root/cate',$data);

	}


	/**
	 * 载入修改分类页
	 */
	public function edit_cate(){
		$this -> load -> helper('form');
		if($this -> uri -> segment(3)){
		$data['cid'] = $this -> uri -> segment(3);
		$this -> load -> model ('cate_model','cate');
		$cname = $this -> cate -> check_by_cid($data['cid']);

		$data['cname'] = $cname['0']['cname'];
		$this -> load -> view ('root/add_cate' ,$data);
		} else {
			$this -> load -> view ('root/add_cate');
		}
	}


	/**
	 * 验证分类输入
	 */
	public function check_cate(){
		$this -> load -> helper('form');
		$this -> load -> library('form_validation');
		$this -> load -> model ('cate_model','cate');
		if($this->form_validation->run('cate')==false){

			if ($this -> input -> post('cid')){
				$data['cid'] = $this -> input -> post('cid');
				$this -> load -> view ('root/add_cate',$data);

			} else {

				$this -> load -> view ('root/add_cate');
			
			}
		} else {

			if ($this -> input -> post('cid')){
				$cname = $this -> input -> post('cate');
				$cid = $this -> input -> post('cid');
				$data = array(
					'cname' => $cname
					);
				$this -> cate -> update_by_cid($cid,$data);
				success('root/load_cate','修改成功');

			} else{
				$data = array(
					'cname' => $this -> input -> post('cate')
					);
				$this -> cate -> add_cate($data);
				success('root/load_cate','添加成功');
			}
		}
	}

	/**
	 * 删除分类确认弹窗
	 */
	public function del_cate(){
		$cid = $this -> uri -> segment (3);
		$this -> load -> model('cate_model','cate');
		$data = $this -> cate -> check_by_cid($cid);
		$catename = $data[0]['catename'];
		$Msg = '确认删除分类'.$catename.'么？\n若确认，则该分类下的所有文章及评论都将被删除';
		confirm('root/drop_cate'.'/'.$cid,'root/load_cate',$Msg);
	}

	/**
	 * 删除分类动作
	 */
	public function drop_cate(){
		$cid = $this -> uri -> segment(3);
		$this -> load -> model ('cate_model','cate');
		$this -> cate -> del_cate($cid);
		success('root/load_cate','分类删除成功');
	}

	/**
	 * 载入文章页面
	 */
	public function load_article(){
		$uid = $_SESSION['uid'];
		
		$this -> load -> library('pagination');
		$perPage = 3;

		$config['base_url'] = site_url('root/load_article');
		$config['total_rows'] = count($this -> db->get_where('article',array('uid'=> $uid))->result_array());
		$config['per_page'] = $perPage;
		$config['uri_segment'] = 3;
		$config['num_tag_open'] = '<li>';
		$config['num_tag_close'] = '</li>';
		$config['full_tag_open'] = '<ul class="pagination" style="margin-left:40px">';
		$config['full_tag_close'] = '</ul>';
		$config['prev_tag_open'] = '<li>';
		$config['prev_tag_close'] = '</li>';
		$config['next_tag_open'] = '<li>';
		$config['next_tag_close'] = '</li>';
		$config['cur_tag_open'] = '<li><a style="color:#000">';
		$config['cur_tag_close'] = '</a></li>';
		$config['first_link'] = '第一页';
		$config['first_tag_open'] = '<li>';
		$config['first_tag_close'] = '</li>';
		$config['last_link'] = '最后一页';
		$config['last_tag_open'] = '<li>';
		$config['last_tag_close'] = '</li>';

		$this -> pagination -> initialize($config);
		$data ['links'] = $this -> pagination -> create_links();
		// p($data);die;
		$offset = $this -> uri ->segment(3);
		$this -> db -> limit($perPage,$offset);


		$this -> load -> model ('article_model','article');
		$data['article'] = $this -> article -> check_info($uid);
		
		$this -> load -> view('root/article',$data);
	}




	/**
	 * 载入查看全部文章页面
	 */
	public function load_all_article(){

		$this -> load -> library('pagination');
		$perPage = 3;

		$config['base_url'] = site_url('root/load_article');
		$config['total_rows'] =  $this -> db -> count_all_results('article');
		$config['per_page'] = $perPage;
		$config['uri_segment'] = 3;
		$config['num_tag_open'] = '<li>';
		$config['num_tag_close'] = '</li>';
		$config['full_tag_open'] = '<ul class="pagination" style="margin-left:40px">';
		$config['full_tag_close'] = '</ul>';
		$config['prev_tag_open'] = '<li>';
		$config['prev_tag_close'] = '</li>';
		$config['next_tag_open'] = '<li>';
		$config['next_tag_close'] = '</li>';
		$config['cur_tag_open'] = '<li><a style="color:#000">';
		$config['cur_tag_close'] = '</a></li>';
		$config['first_link'] = '第一页';
		$config['first_tag_open'] = '<li>';
		$config['first_tag_close'] = '</li>';
		$config['last_link'] = '最后一页';
		$config['last_tag_open'] = '<li>';
		$config['last_tag_close'] = '</li>';

		$this -> pagination -> initialize($config);
		$data ['links'] = $this -> pagination -> create_links();
		// p($data);die;
		$offset = $this -> uri ->segment(3);
		$this -> db -> limit($perPage,$offset);


		$this -> load -> model ('article_model','article');
		$data['article'] = $this -> article -> check_all_article();
		
		$this -> load -> view('root/all_article',$data);
	}




	/**
	 * 载入添加文章页
	 */
	public function edit_article(){
		$this -> load -> model ('cate_model','cate');
		$data['category'] = $this -> cate -> check();
		$this -> load -> helper('form');
		$this -> load -> view('root/add_article',$data);
	}

	/**
	 * 验证文章输入
	 */
	public function check_article(){
		
		$this -> load -> model ('cate_model','cate');
		$data['category'] = $this -> cate -> check();
		$this -> load -> helper('form');
		$this -> load -> library('form_validation');
		$status = $this->form_validation->run('article');
		if(!$status){

			$this -> load -> view ('root/add_article',$data);

		} else {
			$aid = $this -> input -> post('aid');
			
			if($aid)
			{
				$article =array(
					'title' => $this -> input -> post('title'),
					'info' => $this -> input -> post('info'),
					'cid' => $this -> input -> post('cid'),
					'text' => $this -> input -> post('text'),
					'time' => time()
					);

				$this -> load -> model ('article_model','article');
				$this -> article -> update_by_aid($aid,$article);
				success('root/load_article','修改成功');

			} else {
				$article = array (
				'uid'=> $_SESSION['uid'],
				'title' => $this -> input -> post('title'),
				'info' => $this -> input -> post('info'),
				'cid' => $this -> input -> post('cid'),
				'text' => $this -> input -> post('text'),
				'time' => time()
				);
				$this -> load -> model ('article_model','article');
				$this -> article -> add_artile($article);
				success('root/load_article','添加成功');
			}
		}
	}


	/**
	 * 载入修改页面
	 */
	public function change_article(){
		$this -> load -> helper('form');
		$aid = $this -> uri ->segment(3);
		$this -> load -> model('article_model','article');
		$this -> load -> model ('cate_model','cate');
		$data['category'] = $this -> cate -> check();
		$data['article'] = $this -> article ->check_by_aid($aid);
		$this -> load -> view ('root/add_article',$data);
	}


	/**
	 * 删除文章确认弹窗
	 */
	public function del_article(){
		// $aid = $this -> uri -> segment(3);
		// $this -> load -> model ('article_model','article');
		// $this -> article -> del_article($aid);
		// success ('root/load_article','删除文章成功');
		$aid = $this -> uri -> segment (3);
		$url = $this -> uri ->segment(2);
		$Msg = '确认该文章么？\n若确认，则该文章下的所有评论都将被删除';
		confirm('root/drop_article'.'/'.$aid,'root/load_artilce',$Msg);
	}

	/**
	 * 删除文章动作
	 */
	public function drop_article(){
		$aid = $this -> uri -> segment(3);
		$this -> load -> model('article_model','article');
		$this -> article -> del_article($aid);
		success('root/load_article','删除文章成功');
	}




	/**
	 * 载入后台评论页面
	 */
	public function load_comment(){
		$this -> load -> model ('comment_model','comment');
		$uid = $_SESSION['uid'];

		$this -> load -> library('pagination');
		$perPage = 3;

		$config['base_url'] = site_url('root/load_comment');
		$config['total_rows'] = count($this -> db->get_where('comment',array('uid'=> $uid))->result_array());
		$config['per_page'] = $perPage;
		$config['uri_segment'] = 3;
		$config['num_tag_open'] = '<li>';
		$config['num_tag_close'] = '</li>';
		$config['full_tag_open'] = '<ul class="pagination" style="margin-left:40px">';
		$config['full_tag_close'] = '</ul>';
		$config['prev_tag_open'] = '<li>';
		$config['prev_tag_close'] = '</li>';
		$config['next_tag_open'] = '<li>';
		$config['next_tag_close'] = '</li>';
		$config['cur_tag_open'] = '<li><a style="color:#000">';
		$config['cur_tag_close'] = '</a></li>';
		$config['first_link'] = '第一页';
		$config['first_tag_open'] = '<li>';
		$config['first_tag_close'] = '</li>';
		$config['last_link'] = '最后一页';
		$config['last_tag_open'] = '<li>';
		$config['last_tag_close'] = '</li>';


		$this -> pagination -> initialize($config);
		$data ['links'] = $this -> pagination -> create_links();
		// p($data);die;
		$offset = $this -> uri ->segment(3);
		$this -> db -> limit($perPage,$offset);



		$data['comment']= $this -> comment -> check_by_uid($uid);
		$this -> load -> view('root/comment',$data);
	}


	/**
	 * 载入后台全部评论页面
	 */
	public function load_all_comment(){
		$this -> load -> model ('comment_model','comment');
		$this -> load -> library('pagination');
		$perPage = 3;

		$config['base_url'] = site_url('root/load_all_comment');
		$config['total_rows'] =  $this -> db -> count_all_results('comment');
		$config['per_page'] = $perPage;
		$config['uri_segment'] = 3;
		$config['num_tag_open'] = '<li>';
		$config['num_tag_close'] = '</li>';
		$config['full_tag_open'] = '<ul class="pagination" style="margin-left:40px">';
		$config['full_tag_close'] = '</ul>';
		$config['prev_tag_open'] = '<li>';
		$config['prev_tag_close'] = '</li>';
		$config['next_tag_open'] = '<li>';
		$config['next_tag_close'] = '</li>';
		$config['cur_tag_open'] = '<li><a style="color:#000">';
		$config['cur_tag_close'] = '</a></li>';
		$config['first_link'] = '第一页';
		$config['first_tag_open'] = '<li>';
		$config['first_tag_close'] = '</li>';
		$config['last_link'] = '最后一页';
		$config['last_tag_open'] = '<li>';
		$config['last_tag_close'] = '</li>';


		$this -> pagination -> initialize($config);
		$data ['links'] = $this -> pagination -> create_links();
		// p($data);die;
		$offset = $this -> uri ->segment(3);
		$this -> db -> limit($perPage,$offset);



		$data['comment']= $this -> comment -> check_all_comment();
		$this -> load -> view('root/all_comment',$data);
	}

	/**
	 * 删除评论动作
	 */
	public function del_comment(){
		$com_id =  $this -> uri -> segment(3);
		$this -> load -> model ('comment_model','comment');
		$this -> comment -> del_comment($com_id);
		success('root/load_comment','删除评论成功');

	}



	/**
	 * 载入个人信息页
	 */
	public function load_userinfo(){
		$uid = $_SESSION['uid'];
		$this -> load -> model ('login_model','login');
		$data['userinfo'] = $this -> login -> check_by_uid($uid);
		$this -> load -> view('root/user',$data);
	}


	/**
	 * 载入修改个人信息页
	 */
	public function load_change_user(){
		$uid = $_SESSION['uid'];
		$this -> load -> helper('form');
		$this -> load -> model ('login_model','login');
		$data['userinfo'] = $this -> login -> check_by_uid($uid);
		$this -> load -> view('root/change_user',$data);

	}

	/**
	 * 验证用户信息修改
	 */
	public function check_userinfo(){
		$this -> load -> library('form_validation');
		$status = $this->form_validation->run('userinfo');

		if($status){
			$uid = $_SESSION['uid'];
			$data = array(
				'uid' => $uid,
				'username' => $this -> input -> post('username'),
				'nickname' => $this -> input -> post('nickname'),
				'email' => $this -> input -> post('email')
				);
			p($_SESSION);
			$this -> load -> model ('login_model','login');
			$this -> login -> update_userinfo_by_uid($uid,$data);
			$_SESSION['nickname'] = $this -> input -> post('nickname');
			success('root/load_userinfo','修改成功');
		} else {
			$this -> load -> view('root/change_user');
		}
	}



	/**
	 * 载入密码修改页
	 */
	public function load_change_passwd(){
		$this -> load -> helper('form');
		$this -> load -> library('form_validation');
		$this -> load -> view('root/change_passwd');
	}

	/**
	 * 验证新密码动作
	 */
	public function check_passwd(){
		$this -> load -> helper('form');
		$this -> load -> library('form_validation');
		$status = $this -> form_validation -> run('passwd');
		if($status){
			
			$uid = $_SESSION['uid'];
			$this -> load -> model('login_model','login');
			$old_passwd = $this -> login ->select_passwd_by_uid($uid);

			if(md5($this->input->post('old_passwd'))!==$old_passwd[0]['password']){
				error('原密码输入错误');die;
			}
			else{
				$data['password'] = md5 ($this -> input -> post('new_passwd2'));
				$this -> login -> update_passwd_by_uid($uid,$data);
				unset($_SESSION['nickname']);
				unset($_SESSION['uid']);
				unset($_SESSION['logtime']);
				success('login/load_login','密码修改成功');
			}
			
		} else {
			$this -> load -> view('root/change_passwd');
		}
	}


	/**
	 * 加载全部用户
	 */
	public function load_all_users(){
		$this -> load -> model ('login_model','login');
		$data['users'] = $this -> login -> check_all_users();
		// p($data);
		$this -> load -> view ('root/all_users',$data);
	}

	/**
	 * 添加超级用户确认弹窗
	 */
	public function to_be_superuser(){
		$uid = $this -> uri -> segment (3);
		$this -> load -> model('login_model','login');
		$data = $this -> login -> check_by_uid($uid);
		$nickname = $data[0]['nickname'];
		$Msg = '确认将'.$nickname.'设为超级管理么？';
		confirm('root/superuser'.'/'.$uid,'root/load_all_users',$Msg);
	}

	/**
	 * 取消超级用户确认弹窗
	 */
	public function not_be_superuser(){
		$uid = $this -> uri -> segment (3);
		$this -> load -> model('login_model','login');
		$data = $this -> login -> check_by_uid($uid);
		$nickname = $data[0]['nickname'];
		$Msg = '确认取消用户'.$nickname.'的超级管理权限么？';
		confirm('root/gen_user/'.$uid,'root/load_all_users',$Msg);
	}

	/**
	 * 添加超级用户动作
	 */
	public function superuser(){
		$uid = $this -> uri -> segment(3);
		$this -> load -> model ('login_model','login');
		$this -> login -> to_be_superuser($uid);
		success('root/load_all_users','成功添加管理员');
	}

	/**
	 * 取消超级用户动作
	 */
	public function gen_user(){
		$uid = $this -> uri -> segment(3);
		$this -> load -> model ('login_model','login');
		$this -> login -> not_be_superuser($uid);
		success('root/load_all_users','成功删除管理员');
	}



	/**
	 * 删除用户确认弹窗
	 */

	public function del_user(){
		$uid = $this -> uri -> segment(3);
		$this -> load -> model('login_model','login');
		$data = $this -> login -> check_by_uid($uid);
		$nickname = $data[0]['nickname'];
		$Msg = '确认删除用户：'.$nickname.'？\n若确认删除，则该用户的所有评论及文章都将被删除';
		confirm('root/goodbye/'.$uid,'root/load_all_users',$Msg);
	}

	/**
	 * 删除用户动作
	 */
	public function goodbye(){
		$uid = $this -> uri -> segment(3);
		$this -> load -> model ('login_model','login');
		$this -> login -> del_user($uid);
		success('root/load_all_users','删除用户成功');
	}




}