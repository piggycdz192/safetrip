<?php
class Report extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('report_model');
	}

	public function create()
	{
		$this->load->helper('form');
		$this->load->library('form_validation');

		$this->form_validation->set_rules('report', 'Report', 'required');
		$this->form_validation->set_rules('platenumber', 'Plate Number', 'required');
		$this->form_validation->set_rules('vehicletype', 'Vehicle Type', 'required');
		$this->form_validation->set_rules('datetime', 'Date and Time', 'required');
		$this->form_validation->set_rules('location', 'Location', 'required');
		$this->form_validation->set_rules('category[]', 'Violations', 'required');


		if ($this->form_validation->run() === FALSE)
		{
			$this->load->view('safetrip/filereport');
		}
		else
		{
			$this->report_model->add_report();
			$this->load->view('safetrip/success');
		}

	}
}