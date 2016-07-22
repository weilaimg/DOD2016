<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Index extends CI_Controller {


	public function first(){
		$this -> load -> view('index/index');
	}


}