<?php 
namespace App\Models; 
use Kenjis\CI3Compatible\Core\CI_Model; 

	class Post_model extends CI_Model{

		public function __construct(){
			$this->load->database();
		}

		public function get_posts($id = FALSE){

			if($id === FALSE){
				$this->db->order_by('created_at', 'DESC');
				$query = $this->db->get('posts');
				return $query->result_array();
			}
			$query = $this->db->get_where('posts', array('id' => $id));
			return $query->row_array();
		}

		public function create_post(){

			$data = array(
				'title' => $this->input->post('title'),
				'body' => $this->input->post('body'),
			);
			return $this->db->insert('posts', $data);
		}

		public function delete_post($id){
			$this->db->where('id', $id)->delete('posts');
			return true;
		}

		public function update_post($id){

			$data = array(
				'title' => $this->input->post('title'),
				'body' => $this->input->post('body'),
			);
			$this->db->where('id', $this->input->post('id'));
			return $this->db->update('posts', $data);
		}

	}
