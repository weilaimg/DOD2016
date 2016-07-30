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
	 * 通过open_id查找用户
	 */
	public function check_by_open_id($open_id){
		$uid = $this -> db -> where(array('open_id'=>$open_id))->get('user')->result_array();
		return $uid;
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

	/**
	 * 调取全部用户信息
	 */
	public function check_all_users(){
		$data = $this -> db -> get('user') -> result_array();
		return $data;
	}

	/**
	 * 通过UID更改普通用户为超级用户
	 */
	public function to_be_superuser($uid){
		$this -> db -> update('user',array('rank'=>0),array('uid'=>$uid));
	}

	/**
	 * 通过UID更改超级用户为普通用户
	 */
	public function not_be_superuser($uid){
		$this -> db -> update('user',array('rank'=>1),array('uid'=>$uid));
	}


	/**
	 * 通过UID删除用户
	 */
	public function del_user($uid){
		$data['article'] = $this -> db -> select ('aid') -> from('article') ->where(array('uid'=>$uid))->get()->result_array();
		$data['comment'] = $this -> db -> select ('com_id') -> from('comment') ->where(array('uid'=>$uid))->get()->result_array();
		if(count($data['article'])){
			foreach($data['article'] as $v):
			$this -> db -> delete('article',array('aid'=>$v['aid']));
			endforeach;
		}
		if(count($data['comment'])){
			foreach($data['comment'] as $v):
			$this -> db -> delete('comment',array('com_id'=>$v['com_id']));
			endforeach;
		}
		$this -> db -> delete('user',array('uid'=>$uid));
	}


}