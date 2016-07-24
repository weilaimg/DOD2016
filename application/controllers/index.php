<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Index extends CI_Controller {


	public function first(){
		// $this -> load -> model('cate_model','cate');
		// $data['cate'] = $this -> cate ->check();
		session_start();
		if(isset($_SESSION['nickname'])){
		$data['nickname']=$_SESSION['nickname'];
		$this -> load -> view('index/index',$data);
		} else {
			$this -> load -> view('index/index');
		}
	}


}