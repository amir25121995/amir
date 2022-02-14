<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	function __construct()
	{
		parent :: __construct();
		// $this->load->model('login_model');		
	}

	function index()
	{
		$this->load->view('employee/login');
	}

	function validate()
	{
		$id=$this->input->post('id');
		$password=$this->input->post('password');
		if($id == 'admin@admin.com' AND $password == '123456'){
			return redirect('employee/dashboard');
		}else{
			return redirect('login');
		}
	}
	public function logout()
	{
		return redirect('login');
	}
}
?>