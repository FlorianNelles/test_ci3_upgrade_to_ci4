<?php 
namespace App\Controllers; 
use Kenjis\CI3Compatible\Core\CI_Controller; 


class Languages extends CI_Controller{

	public function __construct(){
		parent::__construct();

		$this->load->library('session');			//Can also be loaded with autoload.php or manually in both functions
	}

	public function english(){
//----- Unset and set session data
		unset($_SESSION['language']);
		$_SESSION['language'] = 'english';


		return redirect()->to($_SERVER['HTTP_REFERER']);
	}

	public function german(){
//----- Alternative to unset and set session data
		$this->session->unset_userdata('language');
		$this->session->set_userdata('language', 'german');

		return redirect()->to($_SERVER['HTTP_REFERER']);
	}
}

