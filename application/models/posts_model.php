<?php
	class posts_model extends CI_Model{
		public function __construct(){
			$this->load->database();
		}

		public function get_posts($Shared_by = FALSE){
			if($Shared_by === FALSE){
				$this->db->order_by('id', 'DESC');
				$query = $this->db->get('posts');
				return $query->result_array();
			}

			$query = $this->db->get_where('posts', array('Shared_by' => $Shared_by));
			return $query->row_array();
		}

		public function create_post(){
			$Shared_by = url_title($this->input->post('Shared_by'));

			$data = array(
				'title' => $this->input->post('title'),
				'Shared_by' => $Shared_by,
				'body' => $this->input->post('body')
				);

			return $this->db->insert('posts', $data);
		}

		public function delete_post($id){
			$this->db->where('id', $id);
			$this->db->delete('posts');
			return true;
		}

		public function update_post(){
			$Shared_by = url_title($this->input->post('Shared_by'));

			$data = array(
				'title' => $this->input->post('title'),
				'Shared_by' => $Shared_by,
				'body' => $this->input->post('body')
				);

			$this->db->where('id', $this->input->post('id'));
			return $this->db->update('posts', $data);
		}
	}