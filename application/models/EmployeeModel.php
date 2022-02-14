<?php
if (!defined('BASEPATH'))
exit('No direct script access allowed');
class EmployeeModel extends CI_Model {
	public function employeeList() {
		$this->db->select(array('first_name', 'last_name', 'email'));
		$this->db->from('user');
		// $this->db->limit(10);  
		$query = $this->db->get();
		return $query->result_array();
	}
}
?>