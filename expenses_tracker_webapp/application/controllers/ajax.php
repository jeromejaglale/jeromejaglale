<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Ajax extends CI_Controller {

	public function add_expense()
	{
		$this->load->model('expense');
 
 		// get expenses
 		$expense_list_str = $this->input->post('expense_list_str');

 		// stop here if empty string
 		if ( ! $expense_list_str) {
 			return;
 		}

		$expense_list = json_decode($expense_list_str);

		// for each expense
		foreach ($expense_list as $expense) {

			// ignore if expense with same date already exists in DB
			if($this->expense->exists($expense->date)) {
				continue;
			}

			// add to DB
			$data = array();
			$data['date'] = $expense->date;
			$data['amount'] = $expense->amount;
			$data['note'] = $expense->note;

			$this->expense->insert($data);
		}
	}
}

/* End of file */