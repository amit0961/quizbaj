<?php
class login extends CI_Controller {
	function __construct()
 	{
    	parent::__construct();
    	$this->load->model('loginmodel');
 	}

	function index()
	{
		 $data['info'] = " If You are already memebr, Please login";
		 $data['title'] = "Login :: SymlexSwitch Billing System ";
		 $data['show_cat'] = "";
		 
		 
		 
		 $data = array('action'=>'get-subject');

		$data_string = json_encode($data);


		$url = "http://quizbaj.com/api/subject.php";
		//$url = "http://api.vjel.com/quiz/action.php";
		
		$ch = curl_init($url);
		curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");                                                                     
		curl_setopt($ch, CURLOPT_POSTFIELDS, $data_string);                                                                  
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);                                                                      
		curl_setopt($ch, CURLOPT_HTTPHEADER, array(                                                                          
			'Content-Type: application/json',                                                                                
			'Content-Length: ' . strlen($data_string))                                                                       
		);	
																				 
		$result = curl_exec($ch);

		$resultdata = json_decode($result);

		$data['subject'] = $resultdata[0];

		$lastUserInfo = $this->loginmodel->last_user_info();


		$leadInfo = array('userID'=>$lastUserInfo['id'], 'phoneNo'=>$lastUserInfo['phone_no'], 'secretKey'=>$lastUserInfo['secret_key'], 'action'=>'leader-board');

		$valueString = json_encode($leadInfo);

		$lurl = "http://quizbaj.com/api/action.php";
		
		$lch = curl_init($lurl);
		curl_setopt($lch, CURLOPT_CUSTOMREQUEST, "GET");                                                                     
		curl_setopt($lch, CURLOPT_POSTFIELDS, $valueString);                                                                  
		curl_setopt($lch, CURLOPT_RETURNTRANSFER, true);                                                                      
		curl_setopt($lch, CURLOPT_HTTPHEADER, array(                                                                          
			'Content-Type: application/json',                                                                                
			'Content-Length: ' . strlen($valueString))                                                                       
		);																							 
		$leadreresult = curl_exec($lch);

		$leaderresultdata = json_decode($leadreresult);

		///$data['leaderboard'] = $leaderresultdata[0]->accessInfo->topPoints;
		
		$data['dailyTopPoints'] = $leaderresultdata[0]->accessInfo->dailyTopPoints;
		$data['weeklyTopPoints'] = $leaderresultdata[0]->accessInfo->weeklyTopPoints;
		$data['monthlyPoints'] = $leaderresultdata[0]->accessInfo->topPoints;


		// *********Get total Current users *********

		$this->load->model('usermodel');
		$usersNo = $this->usermodel->get_totalUsers();
		$data['totalUsersNo'] = $usersNo[0]->no;

		// *********Get total Current users *********


		// *********Get total Players  *********
 		$this->db->select('count(*)');
    	$this->db->from('users_exams');
    	$this->db->group_by('user_id');
    	$query = $this->db->get();
   		// echo "<pre>";print_r($query);exit();
		// *********Get total Current users *********




		 //$this->load->view('login/loginviewnew',$data);	
		$this->load->view('login/loginviewnew',$data);	
	}

	function verify(){

		if($this->input->server('REQUEST_METHOD') == 'POST'){
			 
			 
			 $mobileno = $this->input->post('phone_number');
			 

			$data['phoneNo'] = "880" . $mobileno;
			
			$url = "http://quizbaj.com/api/login.php";
				
			$data_string = json_encode($data);
			
			$ch = curl_init($url);
			curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");                                                                     
			curl_setopt($ch, CURLOPT_POSTFIELDS, $data_string);                                                                  
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);                                                                      
			curl_setopt($ch, CURLOPT_HTTPHEADER, array(                                                                          
				'Content-Type: application/json',                                                                                
				'Content-Length: ' . strlen($data_string))                                                                       
			);																							 
			
			$result = curl_exec($ch);
			
			///echo "<pre>";print_r($result);exit;

			$resultdata = json_decode($result);
			
			
			////echo "<pre>";print_r($resultdata);exit;

			if($resultdata[0]->resultCode->code > 0){
				$array1 = array();
				foreach ($resultdata as $key => $val) {
					$array1[$key]['userid'] = $val->userInfo->userID;
					$array1[$key]['phoneNo'] = $val->userInfo->phoneNo;
					$array1[$key]['verifyCode'] = $val->userInfo->verifyCode;
					$array1[$key]['images'] = $val->userInfo->imagesUrl;
					$array1[$key]['birthDate'] = $val->userInfo->birthDate;
					$array1[$key]['fullName'] = $val->userInfo->fullName;
					$array1[$key]['secretKey'] = $val->userInfo->secretKey;

					$array1[$key]['code'] = $val->resultCode->code;

				}
				$data['info'] = "880" . $mobileno;
				$sessionArray = $array1[0];
				//$vericode = '123456';
				//$vcode = md5($vericode);

				$arraySession = array("userID"=>$sessionArray['userid'], "phone_number"=>$sessionArray['phoneNo'], "images"=>$sessionArray['images'], "fullName"=>$sessionArray['fullName'], "verifycode"=>$sessionArray['verifyCode'], "secretKey"=>$sessionArray['secretKey'], "birthDate"=>$sessionArray['birthDate'], "code"=>$sessionArray['code']);

				if($arraySession !=''){
					$this->session->set_userdata($arraySession);
				}
				
			////echo "<pre>";print_r($data);exit;$sessionArray['verifyCode']
				

				$this->load->view('login/verify', $data);
			}else{
				redirect('login/loginviewnew');
			}
		}

	}

	function editnumber(){
		$this->load->view('login/editnumber');
	}
	
	function help(){
		$this->load->view('login/help');
	}

	function processlogin()
	{
		if($this->input->server('REQUEST_METHOD') == 'POST'){

			// $verifyotp = md5($this->input->post('verifyotp'));
			$verifyotp = 123456;
			$userid =$this->session->userdata('userID');
			$phone_number =$this->session->userdata('phone_number');
			$images =$this->session->userdata('images');
			$fullName =$this->session->userdata('fullName');
			// $verifycode =$this->session->userdata('verifycode');
			$verifycode =123456;

			$secretKey =$this->session->userdata('secretKey');

			$code =$this->session->userdata('code');

			$birthDate =$this->session->userdata('birthDate');

			if($verifyotp == $verifycode){

				$data['userID'] = $userid;
				$data['phone_number'] = $phone_number;
				$data['images'] = $images;
				$data['fullName'] = $fullName;
				$data['secretKey'] = $secretKey;
				$data['birthDate'] = $birthDate;

				$this->clogin->login_routine($data);
				
				///print_r($code);print_r($fullName);exit;

				if($code == 1 AND $fullName != "NULL"){
					redirect('user'); 
				}else{
					redirect('login/signup/');
				}
			}else{
				//echo $verifycode;exit();
				//$array1 = array("phoneNo"=>$phone_number);
				$data['info'] = substr($phone_number,2);
			
				$data['message'] = 'Please enter a valid OTP number!';
				$this->load->view('login/verify', $data);
			}

		}
	 	
	}

	function signup(){
		if($this->input->server('REQUEST_METHOD') == 'POST'){

			if(trim($_FILES["photo"]["name"])!='')
			{
				$path =  $_FILES["photo"]["tmp_name"];;
				$type = pathinfo($path, PATHINFO_EXTENSION);
				$data = file_get_contents($path);
				$imgbase64 = base64_encode($data);	

			}else{
				$imgbase64 = $this->session->userdata('images');;
			}

			$full_name = $this->input->post('full_name');

			$username = array("fullName"=>$full_name);

			if($username !=''){
				$this->session->set_userdata($username);
			}


			$date_of_birth = date("Y-m-d", strtotime($this->input->post('date_of_birth')));
			$gender = $this->input->post('gender');
			$user_id = $this->session->userdata('userID');
			$phone_number = $this->session->userdata('phone_number');
			$secretKey = $this->session->userdata('secretKey');

			$user_data = array('userID'=>$user_id, 'phone'=>$phone_number, 'secretKey'=>$secretKey, 'name'=>$full_name, 'gender'=>$gender, 'dob'=>$date_of_birth, 'image'=>$imgbase64);


			$url = "http://quizbaj.com/api/profile_update.php";
				
			$data_string = json_encode($user_data, JSON_UNESCAPED_UNICODE);

			///echo "<pre>";print_r($data_string);exit();
			
			$ch = curl_init($url);
			curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");                                                                     
			curl_setopt($ch, CURLOPT_POSTFIELDS, $data_string);                                                                  
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);                                                                      
			curl_setopt($ch, CURLOPT_HTTPHEADER, array(                                                                          
				'Content-Type: application/json; charset=utf-8',                                                                                
				'Content-Length: ' . strlen($data_string))                                                                       
			);																							 
			$result = curl_exec($ch);
                
           ////echo "<pre>";print_r($result);exit();
                
			$resultdata = json_decode($result);

			////echo "<pre>";print_r($resultdata);exit();
			$this->session->set_flashdata('success', 'Completed Your Registration');

			redirect('user');
			
		}

		$this->load->view('login/signup');

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
		$sessiondata = array('logged_in' => 0,'userID' => '','phone_number' => '', 'fullName' => '','secretKey' => '','birthDate' => '', 'images'=>'');

		$this->session->set_userdata($sessiondata);

		$this->session->sess_destroy();
		//$this->no_cache();

		redirect('login/index');
	}
	
	

	

}
?>