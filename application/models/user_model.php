<?php

class User_model extends CI_Model
{
	public function __construct()
	{
		$this->load->database();
	}
	public function addUser()
	{
		$this->load->helper('url');

		// don't insert into username table if it already exists
		$insert_query = $this->db->insert_string('username', $data);
		$insert_query = str_replace('INSERT INTO', 'INSERT IGNORE INTO', $insert_query);
		$this->db->query($insert_query);

		//insert report
		
		$data1 = array(
			'username' => $this->input->post('user'),
			'password' => $this->input->post('pass'),
			'location' => $this->input->post('emailadd')
		);
		$this->db->insert('registered_users', $data1);

	}
	public function get_user_match($user, $pass)
	{
		$this->db->SELECT('*');
		$this->db->FROM('user');
		$this->db->where('username', $user);
		$this->db->where('password', $pass);
		
		//return if($this->db->get()->result_array()>0) $this;
	}
	
	public function hash_password($pass)
	{
	   return hash('md5', $pass);
	}
}