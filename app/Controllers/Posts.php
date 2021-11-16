<?php 
namespace App\Controllers; 
use Kenjis\CI3Compatible\Core\CI_Controller; 

class Posts extends CI_Controller{

	public function __construct(){
		parent::__construct();

		$this->load->library('session');				//
		$this->load->library('form_validation');		//Can also be loaded with autoload.php or manually in each function
		$this->load->model('post_model');			//

//----- Set and retrieve session data
		$idiom = $_SESSION ['language'];

//----- Alternative to set and retrieve session data
//		$idiom = $this->session->userdata('language');

        $language = \Config\Services::language();
        $language->setLocale($idiom);

	}


	public function index(){

		$data['title'] = 'News';
		$data['posts'] = $this->post_model->get_posts();

		echo view('templates/header');
		echo view('posts/index', $data);
		echo view('templates/footer');
	}

	public function read($id = NULL){

		$data['post'] = $this->post_model->get_posts($id);
		$data['title'] = 'News';

		echo view('templates/header');
		echo view('posts/read', $data);
		echo view('templates/footer');
	}

	public function create(){

		$data['title'] = 'Create News';

		$this->form_validation->set_rules('title', 'Title', 'required');
		$this->form_validation->set_rules('body', 'body', 'required');

		if($this->form_validation->run() === FALSE){
			echo view('templates/header');
			echo view('posts/create', $data);
			echo view('templates/footer');
		} else {
			$this->post_model->create_post();

//--------- Set flashdata
			$this->session->set_flashdata('post_created', 'News created');
//--------- Alternative to set flashdata
//			$_SESSION['post_created'] = 'News created';

			return redirect()->to('posts');
		}
	}

	public function delete($id){

		$this->post_model->delete_post($id);

//----- Set flashdata
		$this->session->set_flashdata('post_delete', 'News deleted');
//----- Alternative to set flashdata
//		$_SESSION['post_delete'] = 'News deleted';

		return redirect()->to('posts');
	}

	public function edit($id){

		$data['post'] = $this->post_model->get_posts($id);
		$data['title'] = 'Edit Post';

		$this->form_validation->set_rules('title', 'Title', 'required');
		$this->form_validation->set_rules('body', 'body', 'required');

		if($this->form_validation->run() === FALSE){
			echo view('templates/header');
			echo view('posts/edit', $data);
			echo view('templates/footer');
		} else {
			$this->post_model->update_post($id);

//--------- Set flashdata
			$this->session->set_flashdata('post_edit', 'News edited');
//--------- Alternative to set flashdata
//			$_SESSION['post_edit'] = 'News edited';

			return redirect()->to('posts');
		}
	}
}
