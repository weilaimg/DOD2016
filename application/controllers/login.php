<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login extends CI_Controller{

	/**
	 * 载入登录页面
	 */
	public function load_login (){
		session_start();
		if(isset($_SESSION['nickname'])){

			success('admin/load_admin','您已登录');

		}else {

			$this -> load -> helper('form');
			$this -> load -> model('cate_model','cate');
			$data['cate'] = $this -> cate ->check();
			$this -> load -> view ('admin/login',$data);
		}
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
			
			success('index/first','登录成功');

		} else {
			error('用户名或密码错误');
		}
	}


	/**
	 * 载入注册页面
	 */
	public function load_register(){
		$this -> load -> model('cate_model','cate');
		$data['cate'] = $this -> cate ->check();
		$this -> load -> helper('form');
		$this -> load -> view('admin/register',$data);
	}



	/**
	 * 验证注册输入
	 */
	public function check_register(){
		$this -> load -> helper('form');
		$this -> load -> library('form_validation');
		$status = $this-> form_validation ->run('register');
		if($status){
			$data = array(
				'username' => $this -> input -> post('username'),
				'nickname' => $this -> input -> post('nickname'),
				'password' => md5($this -> input -> post('password2')),
				'email'    => $this -> input -> post('email')
				);
			
			$this -> load -> model('login_model','login');
			$this -> login ->add_user($data);
			success('login/load_login','注册成功');
		} else {
			$this -> load -> model('cate_model','cate');
			$data['cate'] = $this -> cate ->check();
			$this -> load -> view('admin/register',$data);
		}

	}














}