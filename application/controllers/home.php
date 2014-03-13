<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -  
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in 
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see http://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{
		$this->load->view('safetrip/home');
	}
	public function create()
	{
		$this->load->view('safetrip/filereport');
	}
	public function statistics()
	{
		$this->load->view('safetrip/statistics');
	}
	public function view()
	{
		$this->load->view('safetrip/view');
	}

	public function validate(){
		$this->load->library("form_validation");

		$this->form_validation->set_rules("plateNum", "Plate number", "required|xss_clean");


		if ($this->input->post("search"))
		{
			$this->load->model("report_model");
			$platenum = $this->input->post('plateNum');

		/*  get violations	*/

			$violations = $this->report_model->get_violation_count($platenum);
			$totalViolation = 0;

			// get total violations of a vehicle
			foreach ($violations as $value)
				$totalViolation += $value['count'];
				
			// get total reports of a vehicle
			$nReport = $this->report_model->getTotalReport($platenum);

			
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

			/*
			if($report != null)
			{
				foreach ($result as $value) {
					echo $value['report']. '<br>';
					echo $value['datetime']. '<br>';
					echo $value['drivername']. '<br>';
					echo $value['company']. '<br>';
					echo $value['location']. '<br>';
					echo $value['picture'];
				}
			}*/
			
			$array = array('platenum' => $platenum,
				'violations' => $violations,
				'nViolation' => $totalViolation,
				'nReport' => $nReport,
				'reports' => $reports,
				'risk' => $risk,
				'frequentLocation' => $frequentLocation);
			$this->load->view('safetrip/view', $array);
		}
			
		else
		{
		     echo 'search ay '.$this->input->post('plateNum');;
		}

		if(!$this->form_validation->run())
			$this->index();

			
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */