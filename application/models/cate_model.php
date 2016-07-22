<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class Cate_model extends CI_Model{

	/**
	 * 调取数据库内的分类信息
	 */
	public function check(){
		$data = $this -> db -> get('cate') -> result_array();
		return $data;
	}

	/**
	 * 通过CID调取单个分类信息
	 */
	public function check_by_cid($cid){
		$data = $this -> db -> where (array('cid'=>$cid))->get ('cate')->result_array();
		return $data;
	}

	/**
	 * 通过CID修改分类信息
	 */
	public function update_by_cid($cid,$data){
		$this -> db -> update ('cate' , $data , array('cid' => $cid));
	}

	/**
	 * 添加分类
	 */
	public function add_cate($data){
		$this -> db -> insert ('cate',$data);
	}

	/**
	 * 删除分类
	 */
	public function del_cate($cid){
		$this -> db -> delete('cate' , array('cid' => $cid));
	}
}