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
		$this -> load -> model ('article_model','article');
		$data['article'] = $this -> article -> check_by_cid($cid);
		$this -> load -> view ('index/index_cate',$data);

	}


	/**
	 * 载入文章内容页
	 */

	public function load_text(){
		$this -> load -> model('cate_model','cate');
		$data['cate'] = $this -> cate ->check();
		$aid = $this -> uri ->segment(3);
		$this -> load -> model ('article_model','article');
		$data['article'] = $this -> article -> check_by_aid($aid);
		$this -> load -> view('index/check_article',$data);
	}






}