<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Comment_model extends CI_Model{

	/**
	 * 添加评论
	 */

	public function add_comment ($data){
		$this -> db-> insert ('comment',$data);

	}


	/**
	 * 通过AID查看所有评论
	 */
	public function check_by_aid($aid){
		$data = $this -> db -> select ('com_id,comment,nickname,time')->from('comment')->where(array('aid'=>$aid))->join('user','comment.uid=user.uid')->order_by('time','desc')->get()->result_array();
		return $data;
	}
}