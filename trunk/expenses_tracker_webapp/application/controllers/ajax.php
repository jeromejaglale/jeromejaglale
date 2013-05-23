<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Ajax extends CI_Controller {

	public function add_expense()
	{
		$this->load->model('expense');
 
		$expense = array();
		$expense['amount'] = '45';
		$expense['note'] = 'James Ellroy';
		 
		$this->expense->insert($expense);
	}
}

/* End of file */