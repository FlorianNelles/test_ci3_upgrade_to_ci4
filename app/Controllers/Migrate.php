<?php 
namespace App\Controllers; 
use Kenjis\CI3Compatible\Core\CI_Controller; 



class Migrate extends CI_Controller {

	public function index() {
		$this->load->library('migration');
		if ($this->migration->current() === FALSE)
		{
			echo $this->migration->error_string();
		}else{
			echo "Table Migrated Successfully.";
		}
	}


}
