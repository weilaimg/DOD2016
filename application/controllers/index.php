<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Index extends CI_Controller {


	public function first(){
		// $this -> load -> model('cate_model','cate');
		// $data['cate'] = $this -> cate ->check();
		$this -> load -> view('index/index');
	}


}