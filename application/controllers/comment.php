<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Comment extends CI_Controller{

	/**
	 * 验证评论输入
	 */
	public function check_comment(){
		if(!isset($_SESSION)){
				session_start();
			}
			if(isset($_SESSION['nickname'])){
			$data['nickname']=$_SESSION['nickname'];
		}
		$this -> load -> helper('form');
		$this -> load -> library('form_validation');
		$status = $this-> form_validation ->run('comment');
		$aid = $this -> input -> post('aid');
		$this -> load -> model('cate_model','cate');
		$data['cate'] = $this -> cate ->check();
		$this -> load -> model ('article_model','article');
		$data['article'] = $this -> article -> full_by_aid($aid);
		$this -> load -> model ('comment_model','comment');
		$data['comment'] = $this -> comment -> check_by_aid($aid);
		if($status){
			$comment = array(
					'uid' => $_SESSION['uid'],
					'aid'=>$this -> input -> post('aid'),
					'comment'=>$this -> input -> post('comment'),
					'time'=> time()
				);
			$this -> load -> model('comment_model','comment');
			$this -> comment -> add_comment($comment);
			success("index/load_text/$aid",'评论成功');
		} else {
			$this -> load -> view('index/check_article',$data);
		}

	}
}