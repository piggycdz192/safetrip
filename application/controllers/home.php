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
		$this->load->model('report_model');
		$array['plateList'] = $this->report_model->get_all_platenum();
		$this->load->view('safetrip/home', $array);
	}
	// test
	public function demo(){
		$this->load->view('safetrip/demo');
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
		
		if ($this->input->post("search"))
		{
			$this->load->model("report_model");
			$platenum = strtoupper($this->input->post('plateNum'));
			
		/*  get violations	*/

			 // if the plate num is in the database, do this

			$this->load->library("form_validation");

			$this->form_validation->set_rules("plateNum", "Plate number", "required|xss_clean");

			$violations = $this->report_model->get_violation_count($platenum);
			$totalViolation = 0;

			// get total violations of a vehicle
			foreach ($violations as $value)
				$totalViolation += $value['count'];
				
			// get total reports of a vehicle
			$nReport = $this->report_model->getTotalReport($platenum);

			if($nReport > 0)
			{
				
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
				/* para san to?
				if(!$this->form_validation->run())
					$this->index();
				*/


				// generate vehicle risk
				$risk = $this->report_model->generate_risk($reports);

				//get most frequent location
				$frequentLocation = $this->report_model->get_most_frequence_location($platenum);

				
				$array = array('platenum' => $platenum,
					'violations' => $violations,
					'nViolation' => $totalViolation,
					'nReport' => $nReport,
					'reports' => $reports,
					'risk' => $risk,
					'frequentLocation' => $frequentLocation);

				$this->load->view('safetrip/view', $array);
			}

			// if the plate num is not inside the database, do this				
			else 
			{ 
				echo "<script>
				alert('There are no fields to generate a report');				
				</script>";
				$this->index();
			}
		}
		
		// maybe will remove this later
		else
		{
		     echo 'search ay '.$this->input->post('plateNum');;
		}		
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */