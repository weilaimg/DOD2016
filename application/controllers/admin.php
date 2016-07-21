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
		// echo '<pre>';
		// print_r($data);
		// echo '</pre>';die;
		$this -> load -> view ('admin/cate',$data);

	}


	/**
	 * 载入修改分类页
	 */
	public function edit_cate(){

		$this -> load -> view ('admin/add_cate');
	}


	/**
	 * 验证分类输入
	 */
	public function _cate(){
		echo 1;
	}



}