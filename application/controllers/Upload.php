<?php

class Upload extends CI_Controller {

public function index() {

		$this->load->helper(array('Form', 'Url'));
		$this->load->view('Upload_form', array('error' => ' ' ));

	function do_upload()
	{
		$config['upload_path'] = 'uploads/';
		$config['allowed_types'] = 'gif|jpg|png';
		$config['max_size']	= '100';
		$config['max_width']  = '1024';
		$config['max_height']  = '768';

		$this->load->library('Upload', $config);

		if ( ! $this->upload->do_upload())
		{
			$error = array('error' => $this->upload->display_errors());

			$this->load->view('Upload_form', $error);
		}
		else
		{
			$data = array('upload_data' => $this->upload->data());

			$this->load->view('Upload_success', $data);
		}
	}
}
}
?>
