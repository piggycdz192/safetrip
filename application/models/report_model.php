<?php

class Report_model extends CI_Model
{

	public function __construct()
	{
		$this->load->database();
	}

	public function get_vehicle_mostviolation($platenumber)
	{
		$this->db->SELECT('categoryname');
		$this->db->FROM('category');
		$this->db->JOIN('report_category','category.id = report_category.idcategory');
		$this->db->JOIN('report','report.id = report_category.idreport');
		$this->db->where('platenumber', $platenumber);
		$this->db->group_by('categoryname');
		$this->db->order_by('count(categoryname)', 'desc');
		$this->db->limit(3);

		return $this->db->get()->result_array();
	}

	public function get_company_vehicle($companyname)
	{
		$this->db->SELECT('distinct(platenumber) as platenum');
		$this->db->FROM('report');
		$this->db->WHERE('company',$companyname);
		return $query = $this->db->get()->result();
	}

	public function get_vehicletype($platenumber)
	{
		$this->db->select('idvehicletype');
		$this->db->from('vehicle');
		$this->db->where('platenumber', $platenumber);
		return $this->db->get()->result();
	}

	/* This removes null companies from the array */
	public function removeNull($data = FALSE)
	{
		if ($data === FALSE)
			return;
		
		for ($i = 0; $i < sizeof($data['rows']); $i++)
		{
			if ($data['rows'][$i]['name'] === NULL)
				unset($data['rows'][$i]);
		}
		return $data;
	}

	/* This returns the statistics for taxi violations from highest to lowest */
	public function stat_violations($data = 'Taxi')
	{
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

	public function stat_companies($data = 'Taxi')
	{
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
		$query = $this->db->query($str_query, $data);
		return $query->result_array();
	}

	public function generate_risk($reports)
	{
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
			return 'HIGH RISK';

		else if($mid)
			return 'MEDIUM RISK';

		else
			return 'LOW RISK';

	}

	public function get_all_platenum()
	{
		$this->db->SELECT('distinct(platenumber) as platenum');
		$this->db->FROM('report');
		$query = $this->db->get()->result_array();
		 
		$result = array();
		foreach ($query as $value) {
			$result[] = $value['platenum'];
		}
		return $result;
	}

	public function get_vehicle_type($platenum)
	{
		$this->db->SELECT('lower(typename) as typename');
		$this->db->FROM('vehicle');
		$this->db->JOIN('vehicletype', 'vehicle.idvehicletype = vehicletype.id');
		$this->db->WHERE('platenumber', $platenum);
		$query = $this->db->get();
		return $query->row()->typename;

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

	public function get_violation_count($condition)
	{
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

	public function getTotalReport($condition)
	{
		$this->db->SELECT('count(*) AS count');
		$this->db->FROM('report');
		$this->db->WHERE('platenumber', $condition);
		$query = $this->db->get();
		return $query->row()->count;
	}

	public function get_violation_detail($reportID)
	{
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
		$this->db->SELECT("id, report, drivername, company, location, DATE_FORMAT(datetime,('%b %d %Y %h:%i %p')) as datetime, picture");
		$this->db->FROM('report');
		$this->db->WHERE('platenumber', $condition);
		$this->db->order_by('datetime', 'desc');
		$query = $this->db->get();
		return $query->result_array();
	}

	public function get_company($condition)
	{
		$this->db->SELECT('distinct(company) as company');
		$this->db->FROM('report');
		$this->db->WHERE('platenumber', $condition);
		$this->db->WHERE('company is not null', null, false);
		$this->db->ORDER_BY('datetime', 'desc');
		$query = $this->db->get();
		if ($query->row())
			return $query->row()->company;
		return null;
	}

	public function add_report($picture_full_path)
	{
		$this->load->helper('url');

		if(empty($this->input->post('driver')))
			$driver = null;
		else if(!empty($this->input->post('driver')))
			$driver = $this->input->post('driver');

		if(empty($this->input->post('company')))
			$company = null;
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
			$str_query =
				'SELECT `id` '.
				'FROM `category` '.
				'WHERE `categoryname` = ?';
			$query = $this->db->query($str_query, $violations[$i]);
	        $result = $query->row()->id;
			$data2[$i] = array(
	           'idreport' => $reportID,
	           'idcategory' => $result
	        );
		}

		$this->db->insert_batch('report_category', $data2);

	}

}

