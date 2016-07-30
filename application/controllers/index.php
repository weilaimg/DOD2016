<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Index extends CI_Controller {

	/**
	 * 载入前台首页
	 */
	public function first(){
		$this -> load -> model('cate_model','cate');
		$data['cate'] = $this -> cate ->check();
		if(!isset($_SESSION)){
				session_start();
			}
		if(isset($_SESSION['nickname'])){
		$data['nickname']=$_SESSION['nickname'];
		$this -> load -> view('index/index',$data);
		} else {
			$this -> load -> view('index/index',$data);
		}
	}

	/**
	 * 载入分类查看文章页
	 */
	public function load_article(){
		if(!isset($_SESSION)){
				session_start();
			}
		if(isset($_SESSION['nickname'])){
			$data['nickname']=$_SESSION['nickname'];
		}
		$this -> load -> model('cate_model','cate');
		$data['cate'] = $this -> cate ->check();
		$cid = $this -> uri -> segment(3);

		$this -> load -> library('pagination');
		$perPage = 5;

		$config['base_url'] = site_url('index/load_article').'/'.$cid;
		$config['total_rows'] = count($this -> db->get_where('article',array('cid'=> $cid))->result_array());
		$config['per_page'] = $perPage;
		$config['uri_segment'] = 4;
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
		$offset = $this -> uri ->segment(4);
		$this -> db -> limit($perPage,$offset);


		$this -> load -> model ('article_model','article');
		$data['article'] = $this -> article -> check_by_cid($cid);

		$data['top_10'] = $this -> article -> top_10();

		$this -> load -> view ('index/index_cate',$data);

	}


	/**
	 * 载入文章内容页
	 */

	public function load_text(){
		if(!isset($_SESSION)){
				session_start();
			}
		if(isset($_SESSION['nickname'])){
			$data['nickname']=$_SESSION['nickname'];
		}
		$this -> load -> helper('form');
		$this -> load -> model('cate_model','cate');
		$data['cate'] = $this -> cate ->check();
		$aid = $this -> uri ->segment(3);
		$this -> load -> model ('article_model','article');
		$data['article'] = $this -> article -> full_by_aid($aid);

		$this -> load -> library('pagination');
		$perPage = 5;

		$config['base_url'] = site_url('index/load_text').'/'.$aid;
		$config['total_rows'] = count($this -> db->get_where('comment',array('aid'=> $aid))->result_array());
		$config['per_page'] = $perPage;
		$config['uri_segment'] = 4;
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
		$offset = $this -> uri ->segment(4);
		$this -> db -> limit($perPage,$offset);





		$this -> load -> model ('comment_model','comment');
		$data['comment'] = $this -> comment -> check_by_aid($aid);
		

		$this -> load -> view('index/check_article',$data);
	}

	public function qq_login(){
		$url = 'Connect2.1/API/qqConnectAPI.php';
		require_once($url);

		// 访问QQ登录页面
		$oauth = new Oauth();
		$oauth -> qq_login();

	}

	public function callback(){
		if(!isset($_SESSION)){
				session_start();
			}
		$url = 'Connect2.1/API/qqConnectAPI.php';
		require_once($url);	
		//请求AccessToken

		$oauth = new Oauth();
		$accesstoken = $oauth -> qq_callback();
		$openid = $oauth -> get_openid();
		$url = site_url();

		$qc = new QC($accesstoken,$openid);
		$userinfo = $qc -> get_user_info ();

		$this -> load -> model ('login_model','login');
		$uid = $this -> login -> check_by_open_id($openid);
		if(count($uid)){
			$data = array(
				'nickname' = $userinfo['nickname'],
				);
			$this -> login -> update_userinfo_by_uid($uid,$data);
			$_SESSION['uid'] = $uid;
			$_SESSION['nickname'] = $userinfo['nickname'];
		} else {
			$data = array(
			'nickname' = $userinfo['nickname'],
			'open_id' = $openid
			);

			$this -> login -> add_user($data);
			$uid = $this -> login -> check_by_open_id($openid);
			$_SESSION['uid'] = $uid;
			$_SESSION['nickname'] = $userinfo['nickname'];
		}
		success('index/first','登录成功！');
	}

}