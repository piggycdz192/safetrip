<?php
class Company extends CI_Controller {

	public function index($company){
		$this->load->model('report_model');
		$vehicle = $this->report_model->get_company_vehicle($company);
		$array['loadError'] = FALSE;

		// controller for search company 
		print_r($vehicle);
		print_r($company);
		$data['company'] = $company;
		
		$this->load->view('safetrip/company', $data);
	}
}

?>