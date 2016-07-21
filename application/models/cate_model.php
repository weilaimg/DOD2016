<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class Cate_model extends CI_Model{


	public function check(){
		$data = $this -> db -> get('cate') -> result_array();
		return $data;
	}
}