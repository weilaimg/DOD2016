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
		//$data = $this -> db ->select('title,info,aid')->order_by('time','desc')-> get_where('article',array('uid' => $uid))->result_array();
		$data = $this -> db -> select ('title,info,aid,cname')->from('article')->where(array('uid'=>$uid)) -> join('cate','article.cid=cate.cid')->order_by('time','desc')->get()->result_array();
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
	 * 摘取时间排名前10的文章
	 */
	public function top_10(){
		$data = $this -> db -> select('title,aid,time')->from('article')->limit(10)->order_by('time','desc')->get()->result_array();
		return $data;
	}


	/**
	 * 通过AID修改文章
	 */
	public function update_by_aid($aid,$data){
		$this -> db -> update ('article' , $data , array('aid' => $aid));
	}


	/**
	 * 通过CID获取相关分类全部文章 
	 */
	public function check_by_cid($cid){
		$data = $this -> db -> select ('aid,title,nickname,info,time')->from('article')->where(array('cid'=>$cid))->join('user','article.uid=user.uid')->order_by('time','desc')->get()->result_array();
		return $data;
	}



	/**
	 * 通过AID查询文章作者
	 */
	public function check_author_by_aid($aid){
		$data = $this -> db -> select ('uid')->from('article')->where(array('aid'=>$aid))->get()->result_array(); 
		return $data;
	}


	/**
	 * 前台通过AID关联3表
	 */
	public function full_by_aid($aid){
		$data = $this -> db -> select ('aid,title,nickname,info,text,time,cname,article.cid')->from('article')->where(array('aid'=>$aid))->join('user','article.uid=user.uid')->join('cate','article.cid=cate.cid')->get()->result_array();
		return $data;
	}


	/**
	 * 通过AID删除文章
	 */
	public function del_article($aid){
		$this -> db -> delete('comment', array('aid' => $aid));
		$this -> db -> delete('article',array('aid'=>$aid));
	}



	/**
	 * 查看全部文章
	 */
	public function check_all_article(){
		$data = $this -> db -> select ('title,info,aid,cname,nickname')->from('article')->join('user','article.uid=user.uid')-> join('cate','article.cid=cate.cid')->order_by('time','desc')->get()->result_array();
		return $data;

	}

}