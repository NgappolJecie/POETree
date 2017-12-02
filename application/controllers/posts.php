<?php
	class posts extends CI_Controller{
		public function index(){
			$data['title'] = 'POEntry';

			$data['posts'] = $this->posts_model->get_posts();

			$this->load->view('templates/header');
			$this->load->view('posts/index', $data);
			$this->load->view('templates/footer');
		}

		public function view($Shared_by = NULL){
			$data['post'] = $this->posts_model->get_posts($Shared_by);

			if(empty($data['post'])){
				show_404();
			}

			$data['title'] = $data['post']['title'];

			$this->load->view('templates/header');
			$this->load->view('posts/view', $data);
			$this->load->view('templates/footer');
		}

		public function create(){
			$data['title'] = 'Create Entry';

			$this->form_validation->set_rules('title', 'Title', 'required');
			$this->form_validation->set_rules('Shared_by', 'Distributor', 'required');
			$this->form_validation->set_rules('body', 'Body', 'required');

			if($this->form_validation->run() === FALSE){
				$this->load->view('templates/header');
				$this->load->view('posts/create', $data);
				$this->load->view('templates/footer');
			} else {
				$this->posts_model->create_post();
				redirect('posts');
			}
		}

		public function delete($id){
			$this->posts_model->delete_post($id);
			redirect('posts');
		}

		public function edit($Shared_by){
			$data['post'] = $this->posts_model->get_posts($Shared_by);

			if(empty($data['post'])){
				show_404();
			}

			$data['title'] = 'Edit Entry';

			$this->load->view('templates/header');
			$this->load->view('posts/edit', $data);
			$this->load->view('templates/footer');
		}

		public function update(){
			$this->posts_model->update_post();
			redirect('posts');
		}
	}