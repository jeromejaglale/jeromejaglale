<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Manifest extends CI_Controller {

	public function index()
	{
		$this->output->set_content_type('text/cache-manifest');
		$this->load->view('manifest') ;
	}
}

/* End of file */