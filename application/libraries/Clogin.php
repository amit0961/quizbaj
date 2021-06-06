<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class clogin
{

	function clogin()
	{
		$this->obj =& get_instance();
	}

	function is_logged_in()
	{


		if ($this->obj->session) {

			//If user has valid session, and such is logged in
			if ($this->obj->session->userdata('logged_in')) {
				return true;
			} else {
				return false;
			}
		} else {
			return false;
		}
	}

	function login_routine($data)
	{
		$login_result = 0;

		if($data['userID'] > 0){
    		$userID  = $data['userID'];
    		$login_result = 1;
		}
		if ($login_result==1) {
			$credentials = array(
				'logged_in' => $login_result,
				'userID'=> $data['userID'],
				'phone_number'=> $data['phone_number'],
				'images'=> $data['images'],
				'fullName'=> $data['fullName'],
				'secretKey'=> $data['secretKey'],
				'birthDate'=> $data['birthDate'],
			);
			$this->obj->session->set_userdata($credentials);			
			//redirect('user'); //On success redirect user to default page
		} 
		else 
		{
			//On error send user back to login page, and add error message
			//echo "I am here"; 
			redirect('login/login_fail', 'location'); //On success redirect user to default page
		}
	}

	function logout()
	{
		//$this->obj->load->library('session');
		$this->obj->session->destroy();
		redirect('login/logout', 'location');
	}





}
?>