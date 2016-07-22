<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login extends CI_Controller{

	/**
	 * 载入登录页面
	 */
	public function load_login (){

		$this -> load -> helper('form');
		$this -> load -> view ('admin/login');

	}

	/**
	 * 登录验证页面
	 */
	public function check_login(){
		if(!isset($_SESSION)){
				session_start();
			}
		$this -> load -> helper('form');
		$this -> load -> library('form_validation');
		$this -> load -> model('login_model','login');
		$this-> form_validation ->run('login');
		$username = $this -> input -> post('username');
		$data = $this -> login -> check_by_username($username);
		$password = md5($this -> input -> post('password'));
		if($password == $data[0]['password']){
			

			$_SESSION['uid'] = $data[0]['uid'];
			$_SESSION['nickname'] = $data[0]['nickname'];
			$_SESSION['logtime'] = time();
			
			success('admin/load_admin','登录成功');

		} else {
			error('用户名或密码错误');
		}
	}




	















}