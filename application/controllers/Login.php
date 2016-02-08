<?php 
	/**
	* 
	*/
	class Login extends Ci_controller
	{
		
		function __construct()
		{
			parent::__construct();
			$this->load->model('user');
		}
		public function index()
		{
			$this->load->view('login');
		}
		public function auth()
		{
				$u=$this->input->post('username');
				$p=$this->input->post('password');
				$cek=$this->user->auth($u,$p);
				if($cek->result()!=null)
				{
					foreach ($cek->result() as $row)
					{
						$session = array(
							'username' => $row->username, 
							'password' => $row->password, 
							'level' => $row->level,
							);
						$this->redirect($session);
					}
				}
				else
				{
					$this->session->set_flashdata('pesan','Login Gagal');
					redirect('login');
				}
		}
		public function redirect($session)
		{
			$level=$session['level'];
			switch ($level) {
				case '1':
					$this->session->set_userdata('admin',$session);
					redirect('nadmin');
					break;
				case '2':
					$this->session->set_userdata('bisnis',$session);
					redirect('bisnis');
					break;
				case '3':
					$this->session->set_userdata('user',$session);
					redirect('user');
					break;
				default:
					$this->session->set_flashdata('pesan','Login Gagal');
					redirect('login');
					break;
			}
		}
	}
