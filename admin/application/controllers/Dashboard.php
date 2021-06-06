<?php
class dashboard extends CI_Controller {

 function __construct()
 {
    // Call the Model constructor
    parent::__construct();
 }

/**
 * @author: Md. Golam Rabbany
 * @email: mgrnahid@gmail.com
 * @description: This function Default Page
 * @copyright 14 Jan 2017
 */
 

function index()
{

	if($this->clogin->is_logged_in())
	{

		$userID = $this->session->userdata('userID');
		$user_name = $this->session->userdata('user_name');
		$fullName = $this->session->userdata('fullName');		
		$today = date('Y-m-d');
		$starDate = "2018-01-01";

		$data['openTag'] = "dashboard";
		$data['activeTag'] = "dashboard";		
		$data['userID'] = $userID;
		$data['userName'] = $user_name;
		$data['title'] = "Billing ";
		$data['active_tab'] = "billing";
		$data['today'] = $today;
		$data['starDate'] = $starDate;
		$this->load->view('dashboard/dashboard',$data);
    }
    else
    {

		redirect("login/login_first", "Location");

	}

}




/**
 * @author: Md. Golam Rabbany
 * @email: mgrnahid@gmail.com
 * @description: This function Default Page
 * @copyright 2011
 */
 

function accessDenied()
{

	if($this->clogin->is_logged_in())
	{

		$data['accessDenied'] = "Access Denied";
		$this->load->view('cpanel/not_allow',$data);

    }
    else
    {

		redirect("login/login_first", "Location");

	}

}






function passwordFrom()
{

	if($this->clogin->is_logged_in())
	{

		$userID = $this->session->userdata('userID');
		$user_name = $this->session->userdata('user_name');
		$level = $this->session->userdata('userID');

		$data['userID'] = $userID;
		$data['userName'] = $user_name;
		$data['title'] = "Billing ";
		$data['message'] = "Change Password Form";
		$data['titleErrorMessage'] = FROMMESSAGE001;
		$data['active_tab'] = "billing";

		$this->load->view('login/change_pwd_form',$data);

    }
    else
    {

		redirect("login/login_first", "Location");

	}

}





function changePassword()
{

	if($this->clogin->is_logged_in())
	{

		$userID = $this->session->userdata('userID');
		$user_name = $this->session->userdata('user_name');

		$oldpwd = md5($this->input->post('oldpwd'));
		$newPwd = $this->input->post('newPwd');
		$repwd = $this->input->post('repwd');
		$checkPassword = $this->dashboardModel->checkPassword($userID,$oldpwd);
		$errorMessage = "";

		if($checkPassword == 1)
		{
			if($newPwd == $repwd)
			{
				$newPassword = md5($newPwd);
				$sqlUpdate = "UPDATE admin set password = '$newPassword', hidden = '$newPwd' where id = '$userID'";
		        $query = $this->db->query($sqlUpdate);
		        $errorMessage = FROMMESSAGE053;
			}
			else
			{
			  $errorMessage = FROMMESSAGE052;
			}
		}
		else
		$errorMessage = FROMMESSAGE051;


		$data['userID'] = $userID;
		$data['userName'] = $user_name;
		$data['title'] = "Billing ";
		$data['message'] = "Password Change Form";
		$data['titleErrorMessage'] = $errorMessage;
		$data['active_tab'] = "billing";

		$this->load->view('login/change_pwd_form',$data);

    }
    else
    {

		redirect("login/login_first", "Location");

	}

}




}
?>