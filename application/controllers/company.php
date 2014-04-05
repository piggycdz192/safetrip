<?php
class Company extends CI_Controller {

	public function index($company){
		// controller for search company 
		$this->load->model('report_model');
		$array['loadError'] = FALSE;


		$data['company'] = $company;
		//get vehicle list
		$data['platenum'] = $this->report_model->get_company_vehicle($company);
		$data['violation'] = array();

		//get most frequent violation of each vehicle
		foreach ($data['platenum'] as $vehicle) 
			$data['violation'][] = $this->report_model->get_vehicle_mostviolation($vehicle->platenum);
		
		
		echo (sizeof($data['platenum']));

		$this->load->view('safetrip/company', $data);
	}
}

?>