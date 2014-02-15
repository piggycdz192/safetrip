<?php
class Report_model extends CI_Model {

	public function __construct()
	{
		$this->load->database();
	}

	public function get_report()
	{
		$query = $this->db->get('report');
		return $query->result_array();
	}

	public function add_report()
	{
		$this->load->helper('url');

		if(empty($this->input->post('driver')))
			$driver = 'N/A';
		else if(!empty($this->input->post('driver')))
			$driver = $this->input->post('driver');

		if(empty($this->input->post('company')))
			$company = 'N/A';
		else if(!empty($this->input->post('company')))
			$company = $this->input->post('company');

		$data = array(
			'report' => $this->input->post('report'),
			'platenumber' => $this->input->post('platenumber'),
			'datetime' => $this->input->post('datetime'),
			'drivername' => $driver,
			'company' => $company
		);

		$data2 = array(
			'platenumber' => $this->input->post('platenumber'),
			'idvehicletype' => $this->input->post('vehicletype'),
		);

		$this->db->insert('vehicle', $data2);
		$this->db->insert('report', $data);
	}

}

