<?php
class Expense extends MY_Model {
 
	function __construct()
	{
		parent::__construct();
		$this->table = 'expense';
	}
 }
/* End of file */