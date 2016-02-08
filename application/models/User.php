<?php 
	/**
	* Use By All User
	*/
	class User extends CI_Model
	{
		
		public function auth($u,$p)
		{
			$this->db->where('username',$u);
			$this->db->where('password',$p);
			return $this->db->get('user');
		}
		public function all()
		{
			return $this->db->get('user');
		}
		public function one($username)
		{
			$this->db->where('username',$username);
			return $this->db->get('user');
		}
		public function insert($data)
		{
			$this->db->insert('user',$data);
		}
		public function delete($username)
		{
			$this->db->where('username',$username);
			$this->db->delete('user');
		}
		public function update($data)
		{
			$this->db->where('username',$data['username']);
			$this->db->update('user',$data);
		}
	}