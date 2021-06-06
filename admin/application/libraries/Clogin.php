<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class clogin
{

	function __construct()
	{
		// parent::__construct();
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

	function login_routine()
	{

		$passwordPost = MD5($this->obj->input->post('password'));
		$usernamePost = $this->obj->input->post('username');
		$password = str_replace (" ", "", $passwordPost);
        $username = str_replace (" ", "", $usernamePost);
		$login_result = 0;
		$query = $this->obj->db->query("SELECT * FROM administrator WHERE login = '$username' AND password = '$password' AND status=1");
		//echo $this->obj->db->last_query();
		if($query->num_rows() == 1)
		 {
    		$row = $query->row();
    		$userID  =$row ->id;
    		$fullName  =$row ->full_name;
    		$login_result = 1;
		 }

		//If username and password match set the a logged in flag in 'ci_sessions'
		if ($login_result==1) {
		    // Add User Log //
		    //$this->obj->generallib->addUserLog($userID,-1,'Login','Admin Login');

			$credentials = array(
			                      'user_name' => $username,
								  'logged_in' => $login_result,
								  'userID'=> $userID,
								  'fullName'=> $fullName);

			$this->obj->session->set_userdata($credentials);			
			redirect('dashboard/index','location'); //On success redirect user to default page

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