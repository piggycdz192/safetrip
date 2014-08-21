<?php
class Register extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('user_model');
		$this->load->helper(array('form', 'url'));
	}
	public function register()
	{
		$this->load->library('form_validation');

		$this->form_validation->set_rules('username', 'Username', 'required');
		$this->form_validation->set_rules('password', 'Password', 'required');
		$this->form_validation->set_rules('email', 'Email Address', 'required');

		// A required field is not filled
		/*if ($this->form_validation->run() === FALSE)
		{
			if ($this->input->post('username') === FALSE)
				$data['username'] = $username;
*/
			$this->load->view('safetrip/signin', $data);
//		}
	}
}
?>