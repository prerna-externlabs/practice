<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

	
  public function login(){
  $this->form_validation->set_rules('uname','User Name','required');
  $this->form_validation->set_rules('pass','Password','required');
  $this->form_validation->set_error_delimiters('<div class="text-danger">', '</div>');
  if($this->form_validation->run())
  {
   $uname=$this->input->post('uname');
   $pass=$this->input->post('pass');
   $this->load->model('loginmodel');
   $login_id=$this->loginmodel->isvalidate($uname,$pass);
   if($login_id)
   {
       $this->session->set_userdata('id',$login_id);
       return redirect('admin/welcome');
  }
   else
   {
      $this->session->set_flashdata('Login_failed','Invalid Username/Password');
      return redirect('admin/login');
   }
  }
  else
  {
   $this->load->view('admin/login');
  }
 }
	public function welcome(){

		if(!$this->session->userdata('id'))
		return redirect('admin/login');
		$this->load->model('loginmodel');
		$articles = $this->loginmodel->articlelist();
		$this->load->view('admin/dashboard',['articles'=>$articles]);
	}
	

	public function adduser(){
		$this->load->view('admin/add_article');
	}
	
	public function uservalidation(){
		if($this->form_validation->run('add_article_rules')){
			$post=$this-> input->post();
			$this->load->model('loginmodel');
		    if($this->loginmodel->add_article($post)){
				$this->session->set_flashdata('msg','Article add succesfully');
				$this->session->set_flashdata('msg_class','alert-success');
				return redirect('admin/welcome');
			}else{
				$this->session->set_flashdata('msh','article not add try again !');
				$this->session->set_flashdata('msg_class','alert-danger');
				return redirect('admin/welcome');
			}

		}
		else{
			$this->load->view('admin/add_article');
		}
	}
	public function edituser($id)
	{
	$this->load->model('loginmodel');
	$article=$this->loginmodel->find_article($id);
	$this->load->view('admin/edit_article',['article'=>$article]);
   
	}
	public function updatearticle($article_id)
	{
		if($this->form_validation->run('add_article_rules'))
	 {
		 $post=$this->input->post(); 
		 $this->load->model('loginmodel');
		 if($this->loginmodel->update_article($article_id,$post))
		 {
			$this->session->set_flashdata('msg','Article Update successfully');
			 $this->session->set_flashdata('msg_class','alert-success');
		 }
		 else
		 {
			$this->session->set_flashdata('msg','Articles not update Please try again!!');
			$this->session->set_flashdata('msg_class','alert-danger');
		 }
		 return redirect('admin/welcome');
		}
	 else
	 {
	   $this->edituser($article_id);
	 }
   
	}
	public function deleteuser(){
		 
			$id=$this->input->post('id');
			$this->load->model('loginmodel');
		    if($this->loginmodel->del($id)){
				$this->session->set_flashdata('msg','delete succesfully');
				$this->session->set_flashdata('msg_class','alert-success');
				return redirect('admin/welcome');
			}else{
				$this->session->set_flashdata('msh','not delete  try again !');
				$this->session->set_flashdata('msg_class','alert-danger');
				return redirect('admin/welcome');
			}

		
		
	}
	public function logout(){
		$this->session->unset_userdata('id');
		return redirect('admin/login');
		
	}
	

	public function register(){
		$this->load->view('admin/register');
	}

	public function sendemail(){
		$this->form_validation->set_rules('username','Unmae','required');
		$this->form_validation->set_rules('password','Unmae','required');
		$this->form_validation->set_rules('fristname','Unmae','required');
		$this->form_validation->set_rules('lastname','Unmae','required');
		$this->form_validation->set_rules('email','Email','required');
		$this->form_validation->set_error_delimiters('<div class="text-danger">','</div>');  

		if($this->form_validation->run()){
			$post=$this-> input->post();
			$this->load->model('loginmodel');
			if($this->loginmodel->add_user($post)){
				$this->session->set_flashdata('msg','user added succesfully');
				$this->session->set_flashdata('msg_class','alert-success');
			}
			else{
				$this->session->set_flashdata('msg','not add user please try again!');
				$this->session->set_flashdata('msg_class','alert-success');
			}
			// $this->email->from(set_value('email'),set_value('fname')); 
			// $this->email->to('skprerna2412@gmail.com');
			// $this->email->subject('register email'); 
			// $this->email->message('thank you for register');
			// $this->email->set_newline("\r\n");
			// $this->email->send();

			// if($this->email->send()){
			// 	show_error($this->email->print_debugger());
			// }else{
			// 	echo "your email sent ";
			// }
		}
		else{
			$this->load->view('admin/register');
		}


	}
}
