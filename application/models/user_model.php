<?php

class Report_model extends CI_Model
{

	public function __construct()
	{
		$this->load->database();
	}

	public function get_user_match($user, $pass)
	{
		$this->db->SELECT('*');
		$this->db->FROM('user');
		$this->db->where('username', $user);
		$this->db->where('password', $pass);
		
		return if($this->db->get()->result_array()>0);
	}
	
	public function hash_password($pass)
	{
	   return hash('md5', $pass);
	}