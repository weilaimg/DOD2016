<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login_model extends CI_Model{

	/**
	 * 通过用户名查找用户信息
	 */
	public function check_by_username($username){
		$data = $this -> db -> where (array('username'=>$username))->get ('user')->result_array();
		return $data;
	}

	/**
	 * 添加用户
	 */
	public function add_user($data){
		$this -> db -> insert ('user',$data);
	}

	/**
	 * 通过UID查找用户信息
	 */
	public function check_by_uid($uid){
		$data = $this -> db -> where (array('uid'=>$uid))->get('user')->result_array();
		return $data;

	}

	/**
	 * 通过UID更新用户信息
	 */
	public function update_userinfo_by_uid($uid,$data){
		$this -> db -> update ('user' , $data , array('uid' => $uid));

	}

	/**
	 * 通过UID调用用户旧密码
	 */
	public function select_passwd_by_uid($uid){
		$data = $this -> db -> select ('password') -> from('user') ->where(array('uid'=>$uid))->get()->result_array();
		return $data;
	}


	/**
	 * 通过UID更新用户密码
	 */
	public function update_passwd_by_uid($uid,$data){
		$this -> db -> update('user',$data,array('uid' => $uid));
	}





}