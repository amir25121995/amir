<?php
defined('BASEPATH') OR exit('No direct script access allowed');
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class Main_Controller extends CI_Controller {
	function index(){
		$this->load->view('dashboard');
	}
	function export_user(){
		$fileName = 'user.xlsx';  
		$user_data = $this->main_model->export_user();
		$spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();
        $sheet->setCellValue('A1', 'First Name');
		$sheet->setCellValue('A1', 'Last Name');
        $sheet->setCellValue('B1', 'Email');

        $rows = 2;
        foreach ($user_data as $val){
            $sheet->setCellValue('A' . $rows, $val['first_name']);
            $sheet->setCellValue('B' . $rows, $val['last_name']);
            $sheet->setCellValue('C' . $rows, $val['email']);
            $rows++;
        } 
        $writer = new Xlsx($spreadsheet);
		$writer->save("upload/".$fileName);
		header("Content-Type: application/vnd.ms-excel");
        redirect(base_url()."/upload/".$fileName);
	}
	function update_user(){
		$id=strtoupper($this->input->post('update_id'));
		$first_name=strtoupper($this->input->post('first_name_update'));
		$last_name=strtoupper($this->input->post('last_name_update'));
		$email=$this->input->post('email_update');
		$password=$this->input->post('password_update');
		echo $this->main_model->update_user($id,$first_name,$last_name,$email,$password);
	}
	function delete_user(){
		$id=$this->input->post('id');
		echo $this->main_model->delete_user($id);
	}	
	function add_user(){
		$first_name=strtoupper($this->input->post('first_name'));
		$last_name=strtoupper($this->input->post('last_name'));
		$email=$this->input->post('email');
		$password=$this->input->post('password');

		$config['upload_path'] = './image/';
        $config['allowed_types'] = 'jpg|jpeg|png|gif';
        $this->load->library('upload', $config);
        $this->upload->do_upload('image_file');
        $data = $this->upload->data();
  //       if (!$this->upload->do_upload('image_file')) 
		// {
  //           print_r($this->upload->display_errors());
  //       } 
    	$field=array(
        'first_name	'=>$first_name,
        'last_name'=>$last_name,
        'email'=>$email,
        'password'=>$password,
        'image'=>$data["file_name"],
        'status'=>'1',
        'created_at'=>date('Y-m-d')
            );
    	
		echo $this->main_model->add_user($field);
	}
	function get_user(){
		echo $this->main_model->get_user();
	}
}
