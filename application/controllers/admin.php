<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class Admin extends CI_Controller{

	/**
	 * 载入登录页面
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
		$data['cname'] = '数据库回调';
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

		if($this->form_validation->run('cate')==false){
			if ($this -> input -> post('cid')){
				$data['cid'] = $this -> input -> post('cid');
				$this -> load -> view ('admin/add_cate',$data);
			} else {
				$this -> load -> view ('admin/add_cate');
			}
		} else {

			if ($this -> input -> post('cid')){
				echo '数据库操作cid';

			} else{
				echo '数据库操作添加';
				
			}
		}
	}



}