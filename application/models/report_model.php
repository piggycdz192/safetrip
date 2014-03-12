<?php
class Report_model extends CI_Model {

	public function __construct()
	{
		$this->load->database();
	}

	public function generate_risk($violation){

	}

	public function get_most_frequence_location($platenum){

	}

	public function get_violation_count($condition){
		$this->db->SELECT('categoryname, COUNT(*) AS count');
		$this->db->FROM('category');
		$this->db->JOIN('report_category', 'report_category.idcategory = category.id');
		$this->db->JOIN('report', 'report_category.idreport = report.id');
		$this->db->WHERE('platenumber', $condition);
		$this->db->order_by('count', 'desc');
		$this->db->group_by('categoryname');

		$query = $this->db->get();
		return $query->result_array();

	}

	public function getTotalReport($condition){
		$this->db->SELECT('count(*) AS count');
		$this->db->FROM('report');
		$this->db->WHERE('platenumber', $condition);
		$query = $this->db->get();
		return $query->row()->count;
	}

	public function get_violation_detail($reportID){
		$this->db->SELECT('categoryname');
		$this->db->FROM('category');
		$this->db->JOIN('report_category', 'report_category.idcategory = category.id');
		$this->db->JOIN('report', 'report_category.idreport = report.id');
		$this->db->WHERE('report.id', $reportID);
		$query = $this->db->get();
		return $query->result_array();
	}

	public function get_report($condition)
	{
		$this->db->SELECT('id, report, drivername, company, location, datetime, picture');
		$this->db->FROM('report');
		$this->db->WHERE('platenumber', $condition);
		$query = $this->db->get();
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
		
		// insert vehicle 
		
		$data = array(
			'platenumber' => $this->input->post('platenumber'),
			'idvehicletype' => $this->input->post('vehicletype'),
		);

		// don't insert into vehicle table if it already exists
		$insert_query = $this->db->insert_string('vehicle', $data);
		$insert_query = str_replace('INSERT INTO', 'INSERT IGNORE INTO', $insert_query);
		$this->db->query($insert_query);


		//insert report
		
		$data1 = array(
			'report' => $this->input->post('report'),
			'platenumber' => $this->input->post('platenumber'),
			'datetime' => $this->input->post('datetime'),
			'location' => $this->input->post('location'),
			'drivername' => $driver,
			'company' => $company,
			'picture' => $picture_full_path
		);
		$this->db->insert('report', $data1);



		//insert report category
		$reportID = $this->db->insert_id();

		$violations = $this->input->post("category");

		$data2 = array();

		for($i = 0; $i < sizeof($violations); $i++)
		{

			//get category id from db
			$query = $this->db->query("SELECT id FROM category WHERE categoryname = '".$violations[$i]."'");
	        $result = $query->row()->id;
			$data2[$i] = array(
	           'idreport' => $reportID,
	           'idcategory' => $result
	        );
		}

		$this->db->insert_batch('report_category', $data2);

	}

}

