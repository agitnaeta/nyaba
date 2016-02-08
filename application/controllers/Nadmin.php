<?php 
	/**
	* 
	*/
	class Nadmin extends CI_Controller
	{
		
		function __construct()
		{
			parent::__construct();
			$admin=$this->session->userdata('admin');	
			if (!empty($admin)) {
				$this->load->model('user');
				$this->load->helper('level');
			}
			else
			{
				$this->session->set_flashdata('pesan','Silahkan Login Dulu');
				redirect('login');
			}
		}
		public function index()
		{
			$this->load->view('css');
			$this->load->view('js');
			$this->load->view('admin/navbar');

		}
		public function page_user()
		{
			$this->load->view('admin/page_user');
		}
		public function table_user()
		{
			$data['user']=$this->user->all();
			$this->load->view('admin/table_user',$data);
		}
		public function getUser($username)
		{
			$user=$this->user->one(trim($username));
			echo json_encode($user->result());
		}
		public function addUser()
		{
			$data = array(
				'username' => $this->input->post('username'), 
				'password' => $this->input->post('password'), 
				'level' => $this->input->post('level'), 
				);
			if($this->cekUser($data['username'])==true){
				echo 1;
			}
			else{
				$this->user->insert($data);	
			}
		}
		public function deleteUser($username)
		{
			$this->user->delete(trim($username));
		}
		public function cekUser($username)
		{
			if(!empty($username)){
				$data=$this->user->one($username);
				if($data->result()!=null){
					return true;
				}
				else{
					return false;
				}
			}
			else{
				redirect('nadmin');
			}
		}
		public function updateUser()
		{
			$data = array(
				'username' => $this->input->post('username'), 
				'password' => $this->input->post('password'), 
				'level' => $this->input->post('level'), 
				);
			if($this->cekUser($data['username'])->result()>1){
				print_r($this->cekUser($data['username'])->result());
			}
			else{
				$this->user->update($data);	
			}
		}
	}	