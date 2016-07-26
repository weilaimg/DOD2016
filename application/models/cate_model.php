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
		$data = $this -> db -> select ('aid') -> from('article') ->where(array('cid'=>$cid))->get()->result_array();
		foreach($data as $v):
			$aid = $v['aid'];
			$this -> db -> delete('comment' , array('aid' => $aid));
		endforeach;
		$this -> db -> delete('article' , array('cid' => $cid));
		$this -> db -> delete('cate' , array('cid' => $cid));
	}









}