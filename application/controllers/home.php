<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Store into the constant 'IS_AJAX' whether the request was made via AJAX or not
 * http://phpsblog.agustinvillalba.com/sending-forms-ajax-codeigniter/
 */
define('IS_AJAX', isset($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest');

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
		$array['loadError'] = FALSE;

		$array1['loadError']= FALSE;
		$array1['loadError1']= FALSE;
		$this->load->view('safetrip/home', $array1);
	}
	// test
	public function demo()
	{
		$this->load->view('safetrip/demo');
	}
	
	public function login()
	{   
	    
	    $user = $this->session->flashdata('user');
		$pass = $this->session->flashdata('pass');
		if($user=="" && $pass==""){
		$array1['loadError'] = TRUE;
		$array1['error'] = 'Missing Username.';
		$array1['loadError1'] = TRUE;
		$array1['error1'] = 'Missing Password.';
		$this->load->view('safetrip/home', $array1);
		}
		elseif($user==""){
		$array1['loadError'] = TRUE;
		$array1['error'] = 'Missing Username.';
		$array1['loadError1'] = FALSE;
		$array1['error1'] = 'Missing Password.';
		$this->load->view('safetrip/home', $array1);
		}
		elseif($pass==""){
		$array1['loadError'] = FALSE;
		$array1['error'] = 'Missing Username.';
		$array1['loadError1'] = TRUE;
		$array1['error1'] = 'Missing Password.';
		$this->load->view('safetrip/home', $array1);
		}
		else{
		$this->load->model('user_model');
		$match = $this->user_model->get_user_match($this->user_model->hash_password($pass));
		if($match== FALSE){
		$array1['loadError'] = TRUE;
		$array1['error'] = 'Username does not exist.';
		$array1['loadError1'] = FALSE;
		$array1['error1'] = 'Missing Password.';
		$this->load->view('safetrip/home', $array1);
		}
		else{
		$array['plateList'] = $this->report_model->get_all_platenum();
		$array['loadError'] = FALSE;
		$this->load->view('safetrip/home3', $array);
		}
		
		}
	}
		
	public function signup()
	{
		$this->load->view('safetrip/signup');
		$this->load->model('user_model');

		// when sign in is clicked
		if ($this->input->post("signin"))
		{   
		
			$this->load->library("form_validation");

			$this->form_validation->set_rules("user", "Username", "required|xss_clean");
			$this->form_validation->set_rules("pass", "Password", "required|xss_clean");
			
			$this->session->set_flashdata('user', $user);
			$this->session->set_flashdata('pass', $pass);
			
			redirect('login/');	

	}
	public function view($platenum = FALSE)
	{
		$this->load->model("report_model");

		// get total reports of a vehicle
		$nReport = $this->report_model->getTotalReport($platenum);

		if($nReport > 0 && $platenum !== FALSE)
		{
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

			//get company name
			$company = $this->report_model->get_company($platenum);

			if($company == null)
				$company = "Not Specified";

			// describe risk
			$riskdescription = 'Riding a <strong>'.$risk.'</strong> '.$type;
			
			if ($risk === 'HIGH RISK')
				$riskdescription = $riskdescription.' may put you in life-threatening situations, and should be avoided as much as possible.';
			else if ($risk === 'MEDIUM RISK')
				$riskdescription = $riskdescription.' may cause you major discomfort and may potentially put you in a vehicular accident.';
			else if ($risk === 'LOW RISK')
				$riskdescription = $riskdescription.' may cause you minor discomfort.';

			$array = array('platenum' => $platenum,
				'type' => $type,
				'company' => $company,
				'violations' => $violations,
				'nViolation' => $totalViolation,
				'nreport' => $nReport,
				'reports' => $reports,
				'risk' => $risk,
				'riskdescription' => $riskdescription,
				'frequentLocation' => $frequentLocation);

			$this->load->view('safetrip/view', $array);
		}
		elseif ($platenum == "") {
			$array['plateList'] = $this->report_model->get_all_platenum();
			$array['loadError'] = TRUE;
			$array['error'] = 'Please enter a plate number.';
			$this->load->view('safetrip/home3', $array);
		}
		// if the plate num is not inside the database, do this				
		else 
		{
			$array['plateList'] = $this->report_model->get_all_platenum();
			$array['loadError'] = TRUE;
			$array['error'] = 'This plate number does not have any existing reports.';
			$this->load->view('safetrip/home3', $array);
		}
	}

	public function validate()
	{
		$platenum = strtoupper($this->input->post('plateNum'));

		// when search is clicked
		if ($this->input->post("search"))
		{
			$this->load->library("form_validation");

			$this->form_validation->set_rules("plateNum", "Plate number", "required|xss_clean");

			redirect('view/'.$platenum);
		}
		
		// when file report is clicked
		elseif ($this->input->post("report"))
		{
			redirect('report/'.$platenum);
		}		
	}
		public function validate2()
	{
		$user = $this->input->post('user');
		$pass = $this->input->post('pass');
		// when sign in is clicked
		if ($this->input->post("signin"))
		{   
			$this->load->library("form_validation");

			$this->form_validation->set_rules("user", "Username", "required|xss_clean");
			$this->form_validation->set_rules("pass", "Password", "required|xss_clean");
			
			$this->session->set_flashdata('user', $user);
			$this->session->set_flashdata('pass', $pass);
			
			redirect('login/');	
		}
				
	}
	public function statistics($selected = false)
	{
		$this->load->model('report_model');

		if ($selected === false || $selected == 'taxi_violation')
		{
			$selected = 'taxi_violation';
			$data['head'] = 'Taxi Violation';
			$data['rows'] = $this->report_model->stat_violations();
		}
		else if ($selected == 'bus_violation')
		{
			$data['head'] = 'Bus Violation';
			$data['rows'] = $this->report_model->stat_violations('Bus');
		}
		else if ($selected == 'taxi_company')
		{
			$data['head'] = 'Taxi Company';
			$data['rows'] = $this->report_model->stat_companies();
			$data = $this->report_model->removeNull($data);
		}
		else if ($selected == 'bus_company')
		{
			$data['head'] = 'Bus Company';
			$data['rows'] = $this->report_model->stat_companies('Bus');
			$data = $this->report_model->removeNull($data);
		}
		$data['selected'] = $selected;
		$data['nrow'] = 0;
		$this->load->view('safetrip/statistics', $data);
	}

	public function login()
	{   
	    
	    $user = $this->session->flashdata('user');
		$pass = $this->session->flashdata('pass');
		
		if($user=="" && $pass==""){
			$array1['loadError'] = TRUE;
			$array1['error'] = 'Missing Username.';
			$array1['loadError1'] = TRUE;
			$array1['error1'] = 'Missing Password.';
			$this->load->view('safetrip/home', $array1);
		}
		elseif($user==""){
			$array1['loadError'] = TRUE;
			$array1['error'] = 'Missing Username.';
			$array1['loadError1'] = FALSE;
			$array1['error1'] = 'Missing Password.';
			$this->load->view('safetrip/home', $array1);
		}
		elseif($pass==""){
			$array1['loadError'] = FALSE;
			$array1['error'] = 'Missing Username.';
			$array1['loadError1'] = TRUE;
			$array1['error1'] = 'Missing Password.';
			$this->load->view('safetrip/home', $array1);
		}
		else{
			$this->load->model('user_model');
			$match = $this->user_model->get_user_match($this->user_model->hash_password($pass));
			if($match== FALSE){
				$array1['loadError'] = TRUE;
				$array1['error'] = 'Username does not exist.';
				$array1['loadError1'] = FALSE;
				$array1['error1'] = 'Missing Password.';
				$this->load->view('safetrip/home', $array1);
			}
			else{
				$array['plateList'] = $this->report_model->get_all_platenum();
				$array['loadError'] = FALSE;
				$this->load->view('safetrip/home3', $array);
			}
		}
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */