<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login_model extends CI_Model{


	public function check_by_username($username){
		$data = $this -> db -> where (array('username'=>$username))->get ('user')->result_array();
		return $data;
	}




}