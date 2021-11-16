<?php 
namespace App\Controllers; 
use Kenjis\CI3Compatible\Core\CI_Controller; 

class Pages extends CI_Controller{


	public function view($page = 'home'){

		$this->load->library('session');			//Can also be loaded with autoload.php

//----- Set and retrieve session data
		if (!isset($_SESSION['language'])){
			$_SESSION['language'] = 'english';}
		$idiom = $_SESSION ['language'];

//----- Alternative to set and retrieve session data
//        if (!isset($_SESSION['language'])){
//			$this->session->set_userdata('language', 'english');}
//		$idiom = $this->session->userdata('language');

        $language = \Config\Services::language();
        $language->setLocale($idiom);

		$data['title'] = ucfirst($page);

		echo view('templates/header');
		echo view('pages/'.$page, $data);
		echo view('templates/footer');
	}
}
