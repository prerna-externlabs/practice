<!-- downlod all recode in excel 
frist downlod phpexcel in github and this folder attache application-libarry aka under and create 2 file excel and iofactory name sa 

in excel file 
if(!defined('BASEPATH')) exit('No direct script access allowed');
require_once('PHPExcel.php');
class Excel  extends PHPExcel{
    public function __construct()
    {
        parent::__construct();
        
    }
}

in iofactory file
if(!defined('BASEPATH')) exit('No direct script access allowed');
require_once('PHPExcel/IOFactory.php');
class IOFactory  extends PHPExcel_IOFactory{
    public function __construct()
    {
        parent::__construct();
    }
}
and create a controller and view and model 
-->




<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Export extends CI_Controller {
    public function __construct()
    {
        parent::__construct();
        
        $this->load->model('Export_model');
    }
    

	public function index()
	{
        $data['title'] = 'Display Feedback Data';
        $data['feedbackInfo'] = $this->Export_model->employeelist();

        $this->load->view('user/feedbacklist',$data);
	}

    public function createXLS()
	{
       $this->load->library("excel");
       $object = new PHPExcel();
       $object->setActiveSheetIndex(0);

       $table_columns = array("Name","Email","Feedback");
       $column = 0;
       foreach($table_columns as $field)
       {
        $object->getActiveSheet()->setCellValueByColumnAndRow($column,1,$field);
        $column++;
       }
       $feedbackInfo= $this->Export_model->employeelist();
       $excel_row = 2;

       foreach($feedbackInfo as $row)
       {
        $object->getActiveSheet()->setCellValueByColumnAndRow(0,$excel_row,$row->name);
        $object->getActiveSheet()->setCellValueByColumnAndRow(1,$excel_row,$row->email);
        $object->getActiveSheet()->setCellValueByColumnAndRow(2,$excel_row,$row->feedback);
        $excel_row++;
        

       $object_writer = PHPExcel_IOFactory::createWriter($object,'Excel5');
       header('Content-Type: appliction/vnd.ms-excel');
       header('Content-Disposition: attachment;filename="feedbackData.xls"');
       $object_writer->save('php://output');


	}
}
}