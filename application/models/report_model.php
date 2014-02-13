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

		$data = array(
			'report' => $this->input->post('report'),
			'platenumber' => $this->input->post('platenumber'),
		);

		$data2 = array(
			'platenumber' => $this->input->post('platenumber'),
			'idvehicletype' => $this->input->post('vehicletype'),
		);

		$this->db->insert('vehicle', $data2);
		$this->db->insert('report', $data);
	}

}

