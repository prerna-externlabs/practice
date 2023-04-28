<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dynaminc_dependent extends CI_Controller {

        public function __construct()
        {
            parent::__construct();
            
            $this->load->model('Dynaminc_dependent_model');
        }
	public function index()
	{
        $data['country']= $this->Dynaminc_dependent_model->fetch_country();
		$this->load->view('user/dynaminc_dependent',$data);
	}
}
