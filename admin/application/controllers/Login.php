<?php
class login extends CI_Controller {


	function index()
	{
		 $data['info'] = " If You are already memebr, Please login";
		 $data['title'] = "Login :: SymlexSwitch Billing System ";
		 $data['show_cat'] = "";
		 $this->load->view('login/loginview',$data);		
	}


	function processlogin()
	{

	 $this->clogin->login_routine();
	 //echo "I am here";

	}




	function login_fail()
	{

		redirect("login/index", "Location");
	}



	function login_first()
	{

		redirect("login/index", "Location");

	}


	function logout() 
	{


		$userID = $this->session->userdata('userID');
		$this->load->helper('cookie');
		//$this->update_logout();
		delete_cookie('userID');
		delete_cookie('logged_in');
		$sessiondata = array('logged_in' => 0,'user_name' => '','userID' => '', 'fullName' => '');

		$this->session->set_userdata($sessiondata);

		$this->session->sess_destroy();
		//$this->no_cache();

		redirect('login/index');
	}


}
?>