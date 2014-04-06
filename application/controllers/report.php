<?php
class Report extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('report_model');
		$this->load->helper(array('form', 'url'));
	}

	public function create($platenum = NULL)
	{
		$fieldname = 'picture';
		$config['upload_path'] = './uploads/';
		$config['allowed_types'] = 'gif|jpg|png|jpeg';

		$this->load->library('form_validation');
		$this->load->library('upload', $config);
 
		$this->form_validation->set_rules('report', 'Report', 'required');
		$this->form_validation->set_rules('platenumber', 'Plate Number', 'required');
		$this->form_validation->set_rules('vehicletype', 'Vehicle Type', 'required');
		$this->form_validation->set_rules('datetime', 'Date and Time', 'required');
		$this->form_validation->set_rules('location', 'Location', 'required');
		$this->form_validation->set_rules('category[]', 'Violations', 'required');

		// A required field is not filled
		if ($this->form_validation->run() === FALSE)
		{
			if ($this->input->post('platenumber') === FALSE)
				$data['platenum'] = $platenum;
			else
				$data['platenum'] = strtoupper($this->input->post('platenumber'));

			$this->load->view('safetrip/filereport', $data);
		}

		// All required fields are filled
		else
		{
			// A file is set for upload
			if (isset($_FILES[$fieldname]) && $_FILES[$fieldname]['size'] > 0)
			{
				// Upload is successful
				if ($this->upload->do_upload($fieldname))
				{
					$upload_data = $this->upload->data();
					if(strlen($upload_data['file_name']) == 0)
						$this->report_model->add_report(NULL);
					else
						$this->report_model->add_report($config['upload_path'] . $upload_data['file_name']);
					redirect('view/'.strtoupper($this->input->post('platenumber')));
				}

				// Upload failed
				else
				{
					if ($this->input->post('platenumber') === FALSE)
						$data['platenum'] = $platenum;
					else
						$data['platenum'] = strtoupper($this->input->post('platenumber'));

					$this->load->view('safetrip/filereport', $data);
				}
			}

			// No file is set for upload
			else
			{
				$this->report_model->add_report(NULL);
				redirect('view/'.strtoupper($this->input->post('platenumber')));
			}
		}

	}

}