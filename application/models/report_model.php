<?php
class Report_model extends CI_Model {

	public function __construct()
	{
		$this->load->database();
	}

	/* This returns the statistics for taxi violations from highest to lowest */
	public function stat_violations($data = 'Taxi') {
		$str_query =
			'SELECT `categoryname` AS `name`, COUNT(*) AS `count` '.
			'FROM `category` '.
			'INNER JOIN `report_category` ON `category`.`id` = `report_category`.`idcategory` '.
			'WHERE `idreport` IN '.
				'(SELECT `id` FROM `report` '.
				'WHERE platenumber IN '.
					'(SELECT `platenumber` FROM `vehicle` '.
					'WHERE `idvehicletype` = '.
						'(SELECT `id` FROM `vehicletype` '.
						'WHERE `typename` = ?))) '.
			'GROUP BY `category`.`id` '.
			'ORDER BY `count` DESC';
		$query = $this->db->query($str_query, $data);
		return $query->result_array();
	}

	public function stat_companies($data = 'Taxi') {
		$str_query =
			'SELECT `company` AS `name`, COUNT(*) AS `count` '.
			'FROM `report` '.
			'WHERE `platenumber` IN '.
				'(SELECT `platenumber` '.
				'FROM `vehicle` '.
				'WHERE `idvehicletype` = '.
					'(SELECT `id` '.
					'FROM `vehicletype` '.
					'WHERE `typename` = ?)) '.
			'GROUP BY `company` '.
			'ORDER BY `count` DESC';
		$query = $this->db->query($str_query, array($data));
		return $query->result_array();
	}

	public function generate_risk($reports){
		$mid = FALSE;
		$high = FALSE;
		foreach ($reports as $value)
		{
			if (in_array('Sexual Harassment', $value['violations']) || in_array('Kidnapping', $value['violations']) || in_array('Attempted Murder', $value['violations'])) 
			{
				    $high = TRUE;
				    break;
			}

			else if(in_array('Rude Behavior', $value['violations']) || in_array('Refused Boarding', $value['violations']) || in_array('Contracting', $value['violations']))
					$mid = TRUE;
		}

		if($high)
			return 'High Risk';

		else if($mid)
			return 'Mid Risk';

		else
			return 'Low Risk';

	}

	public function get_all_platenum(){
		$this->db->SELECT('distinct(platenumber) as platenum');
		$this->db->FROM('report');
		$query = $this->db->get()->result_array();
		 
		$result = array();
		foreach ($query as $value) {
			$result[] = $value['platenum'];
		}
		return $result;
	}

	public function get_most_frequence_location($platenum){
		$this->db->SELECT('upper(location) as location');
		$this->db->FROM('report');
		$this->db->WHERE('platenumber', $platenum);
		$this->db->group_by('location');
		$this->db->order_by('count(location)', 'desc');
		$this->db->limit(1);
		$query = $this->db->get();
		$location = $query->row()->location;
		if($location == null)
			$location = 'UNKNOWN';
		return $location;
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
		$this->db->order_by('id', 'desc');
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
			'platenumber' => strtoupper($this->input->post('platenumber')),
			'idvehicletype' => $this->input->post('vehicletype'),
		);

		// don't insert into vehicle table if it already exists
		$insert_query = $this->db->insert_string('vehicle', $data);
		$insert_query = str_replace('INSERT INTO', 'INSERT IGNORE INTO', $insert_query);
		$this->db->query($insert_query);


		//insert report
		
		$data1 = array(
			'report' => $this->input->post('report'),
			'platenumber' => strtoupper($this->input->post('platenumber')),
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

