<?php
if (!defined('BASEPATH'))
	exit('No direct script access allowed');
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
class Employee extends CI_Controller {
	public function __construct() {
        parent::__construct();
		$this->load->model('EmployeeModel');
    }    
	public function index() {
        $data['page'] = 'export-excel';
        $data['title'] = 'Export Excel data';
        $data['employeeData'] = $this->EmployeeModel->employeeList();
		$this->load->view('employee/login', $data);
    }
    public function dashboard() {
        $this->load->view('employee/employee');
    }
	public function createExcel() {
		$fileName = 'user.xlsx';  
		$employeeData = $this->EmployeeModel->employeeList();
		$spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();
        $sheet->setCellValue('A1', 'First Name');
		$sheet->setCellValue('B1', 'Last Name');
        $sheet->setCellValue('C1', 'Email');
        $rows = 2;
        foreach ($employeeData as $val){
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
}
?>