<?php 
namespace App\Controllers; 
use Kenjis\CI3Compatible\Core\CI_Controller; 


namespace App\Controllers;

class Home extends BaseController
{
    public function index()
    {
        return view('welcome_message');
    }
}
