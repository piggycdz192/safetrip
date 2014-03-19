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

				$upload_data = $this->upload->data();
				if(strlen($upload_data['file_name']) == 0)
					$this->report_model->add_report(null);
				$this->load_view(strtoupper($this->input->post('platenumber')));
			}

			else $this->report_model->add_report($config['upload_path'] . $upload_data['file_name']);
			// $this->load->view('safetrip/success');
		}

	}

	public function load_view($platenum){
		    $this->load->model("report_model");

		// get total reports of a vehicle
			$nReport = $this->report_model->getTotalReport($platenum);

			$violations = $this->report_model->get_violation_count($platenum);
			$totalViolation = 0;

			// get total violations of a vehicle
			foreach ($violations as $value)
				$totalViolation += $value['count'];
			
			//  get report detail of a vehicle
			$reports = $this->report_model->get_report($platenum);

			//	get violation detail of each report
			$count = 0;
			foreach ($reports as $value) 
			{
				$temp[$count] = $this->report_model->get_violation_detail($value['id']);
				$reports[$count]['violations'] = array();
				
				// store violations in format
				foreach ($temp[$count] as $violate)
				{
					$reports[$count]['violations'][] = $violate['categoryname'];
				}

				$count++;
			}

			// generate vehicle risk
			$risk = $this->report_model->generate_risk($reports);

			//get most frequent location
			$frequentLocation = $this->report_model->get_most_frequence_location($platenum);

			//get type of vehicle
			$type = $this->report_model->get_vehicle_type($platenum);
			$array = array('platenum' => $platenum,
				'type' => $type,
				'violations' => $violations,
				'nViolation' => $totalViolation,
				'nReport' => $nReport,
				'reports' => $reports,
				'risk' => $risk,
				'frequentLocation' => $frequentLocation);

			$this->load->view('safetrip/view', $array);
	}


}