<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class Article_model extends CI_Model{

	/**
	 * 添加文章
	 */
	public function add_artile($data){
		$this -> db -> insert ('article',$data);
	}

	/**
	 * 查看摘要
	 */
	public function check_info($uid){
		$data = $this -> db ->select('title,info,aid')->order_by('time','desc')-> get_where('article',array('uid' => $uid))->result_array();
		return $data;
	}

	/**
	 * 按AID查看文章信息
	 */

	public function check_by_aid($aid){
		$data = $this -> db -> where (array('aid'=>$aid))->get ('article')->result_array();
		return $data;
	}


	/**
	 * 通过AID修改文章
	 */
	public function update_by_aid($aid,$data){
		$this -> db -> update ('article' , $data , array('aid' => $aid));
	}





















}