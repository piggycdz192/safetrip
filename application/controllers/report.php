<?php
class Report extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('report_model');
	}

	public function create()
	{
		$config['upload_path'] = './uploads/';
		$config['allowed_types'] = 'gif|jpg|png|jpeg';

		$this->load->helper('form');
		$this->load->library('form_validation');
		$this->load->library('upload', $config);
 
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
			if (!$this->upload->do_upload("picture")) {
				$this->load->view('safetrip/success');
			}

			$upload_data = $this->upload->data();
			if(strlen($upload_data['file_name']) == 0)
				$this->report_model->add_report(null);
			else $this->report_model->add_report($config['upload_path'] . $upload_data['file_name']);
			// $this->load->view('safetrip/success');
		}

	}


}