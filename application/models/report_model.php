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

	public function add_report($picture_full_path)
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

		// if there is picture uploaded

		    if($picture_full_path != null)
		    {
		    	$fp = fopen($picture_full_path, 'r');
				$image = fread($fp, filesize($picture_full_path));
				fclose($fp);	
			}
		

		$data = array(
			'report' => $this->input->post('report'),
			'platenumber' => $this->input->post('platenumber'),
			'datetime' => $this->input->post('datetime'),
			'drivername' => $driver,
			'company' => $company,
			'picture' => $picture_full_path
		);

		$data2 = array(
			'platenumber' => $this->input->post('platenumber'),
			'idvehicletype' => $this->input->post('vehicletype'),
		);

		// don't insert into vehicle table if it already exists
		$insert_query = $this->db->insert_string('vehicle', $data2);
		$insert_query = str_replace('INSERT INTO', 'INSERT IGNORE INTO', $insert_query);
		$this->db->query($insert_query);
		$this->db->insert('report', $data);
	}

}

