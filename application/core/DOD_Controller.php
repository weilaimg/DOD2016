<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class DOD_Controller extends CI_Controller{

	public function __construct (){
		parent::__construct();
		if(!isset($_SESSION)){
				session_start();
			}
		$nickname = $_SESSION['nickname'];
		$uid = $_SESSION['uid'];
		if(!$nickname || !$uid)
		{
			success('login/load_login','对不起，请先登录。');
			// pushs('对不起，请先登录。');
			// redirect ('');
		}
	}


}