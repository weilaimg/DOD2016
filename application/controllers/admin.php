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
			if(isset($aid))
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
	 * 退出登陆
	 */
	public function log_out (){
		unset($_SESSION['nickname']);
		unset($_SESSION['uid']);
		unset($_SESSION['logtime']);
		p($_SESSION);
		success('index/first','登出成功');
	}

}