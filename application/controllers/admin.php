<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class Admin extends DOD_Controller{

	/**
	 * 载入后台主页 
	 */

	public function load_admin(){
		$this -> load -> view ('admin/admin');
	}


	/**
	 * 载入分类页
	 */
	public function load_cate(){
		$this -> load -> model('cate_model','cate');
		$data['category'] = $this -> cate -> check();
		$this -> load -> view ('admin/cate',$data);

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
		$this -> load -> view ('admin/add_cate' ,$data);
		} else {
			$this -> load -> view ('admin/add_cate');
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
				$this -> load -> view ('admin/add_cate',$data);

			} else {

				$this -> load -> view ('admin/add_cate');
			
			}
		} else {

			if ($this -> input -> post('cid')){
				$cname = $this -> input -> post('cate');
				$cid = $this -> input -> post('cid');
				$data = array(
					'cname' => $cname
					);
				$this -> cate -> update_by_cid($cid,$data);
				success('admin/load_cate','修改成功');

			} else{
				$data = array(
					'cname' => $this -> input -> post('cate')
					);
				$this -> cate -> add_cate($data);
				success('admin/load_cate','添加成功');
			}
		}
	}

	/**
	 * 删除分类
	 */
	public function del_cate(){
		$this -> load -> model ('cate_model','cate');
		$cid = $this -> uri -> segment(3);
		$this -> cate -> del_cate($cid);
		success('admin/load_cate','删除成功');
	}

	/**
	 * 载入文章页面
	 */
	public function load_article(){
		$uid = $_SESSION['uid'];
		
		$this -> load -> model ('article_model','article');
		$data['article'] = $this -> article -> check_info($uid);
		
		$this -> load -> view('admin/article',$data);
	}


	/**
	 * 载入添加文章页
	 */
	public function edit_article(){
		$this -> load -> model ('cate_model','cate');
		$data['category'] = $this -> cate -> check();
		$this -> load -> helper('form');
		$this -> load -> view('admin/add_article',$data);
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

			$this -> load -> view ('admin/add_article',$data);

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
				success('admin/load_article','修改成功');

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
				success('admin/load_article','添加成功');
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
		$this -> load -> view ('admin/add_article',$data);
	}


	/**
	 * 删除文章动作
	 */
	public function del_article(){
		$aid = $this -> uri -> segment(3);
		$this -> load -> model ('article_model','article');
		$this -> article -> del_article($aid);
		success ('admin/load_article','删除文章成功');
	}



	/**
	 * 载入后台评论页面
	 */
	public function load_comment(){
		$this -> load -> model ('comment_model','comment');
		$uid = $_SESSION['uid'];
		$data['comment']= $this -> comment -> check_by_uid($uid);
		$this -> load -> view('admin/comment',$data);
	}

	/**
	 * 删除评论动作
	 */
	public function del_comment(){
		$com_id =  $this -> uri -> segment(3);
		$this -> load -> model ('comment_model','comment');
		$this -> comment -> del_comment($com_id);
		success('admin/load_comment','删除评论成功');

	}



	/**
	 * 载入个人信息页
	 */
	public function load_userinfo(){
		$uid = $_SESSION['uid'];
		$this -> load -> model ('login_model','login');
		$data['userinfo'] = $this -> login -> check_by_uid($uid);
		$this -> load -> view('admin/user',$data);
	}


	/**
	 * 载入修改个人信息页
	 */
	public function load_change_user(){
		$uid = $_SESSION['uid'];
		$this -> load -> helper('form');
		$this -> load -> model ('login_model','login');
		$data['userinfo'] = $this -> login -> check_by_uid($uid);
		$this -> load -> view('admin/change_user',$data);

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
			success('admin/load_userinfo','修改成功');
		} else {
			$this -> load -> view('admin/change_user');
		}
	}



	/**
	 * 载入密码修改页
	 */
	public function load_change_passwd(){
		$this -> load -> helper('form');
		$this -> load -> library('form_validation');
		$this -> load -> view('admin/change_passwd');
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
			$this -> load -> view('admin/change_passwd');
		}
	}


























	/**
	 * 退出登陆
	 */
	public function log_out (){
		unset($_SESSION['nickname']);
		unset($_SESSION['uid']);
		unset($_SESSION['logtime']);
		success('index/first','登出成功');
	}

}