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
		$this->load->view('safetrip/index.html');
	}
	public function create()
	{
		$this->load->view('safetrip/create.html');
	}
	public function statistics()
	{
		$this->load->view('safetrip/statistics.html');
	}
	public function view()
	{
		$this->load->view('safetrip/view.html');
	}

	public function validate(){
		$this->load->library("form_validation");

		$this->form_validation->set_rules("plateNum", "Plate number", "required|xss_clean");


		if (!empty($this->input->post("report")))
		{
		     echo $this->input->post('plateNum');
		}
		else if (!empty($this->input->post("search")))
		{
		     echo "search";
		}

		if(!$this->form_validation->run())
			$this->index();

			
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */