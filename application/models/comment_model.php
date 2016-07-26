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


	/**
	 * 通过UID查看所有评论
	 */
	public function check_by_uid($uid){
		$data = $this -> db -> select('comment,comment.time,com_id,title') -> from('comment')->where(array('comment.uid'=>$uid))->join('article','comment.aid=article.aid')->order_by('comment.time','desc')->get()->result_array();
		return $data;
	}


	/**
	 * 通过com_id删除评论
	 */
	public function del_comment($com_id){
		$this -> db -> delete('comment',array('com_id'=>$com_id));
	}

	/**
	 * 查看所有评论
	 */

	public function check_all_comment(){
		$data = $this -> db -> select('comment,comment.time,com_id,title,nickname') -> from('comment')->join('article','comment.aid=article.aid')->join('user','comment.uid=user.uid')->order_by('comment.time','desc')->get()->result_array();
		return $data;
	}



}