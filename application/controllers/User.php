<?php
class user extends CI_Controller {
	function __construct()
 	{
    	parent::__construct();
    	$this->load->model('usermodel');
 	}

	function index()
	{
		if($this->clogin->is_logged_in())
		{	
			$user_id = $this->session->userdata('userID');
			$phone_number = $this->session->userdata('phone_number');
			$secretKey = $this->session->userdata('secretKey');

			$data = array('userID'=>$user_id, 'phoneNo'=>$phone_number, 'secretKey'=>$secretKey, 'action'=>'dashboard');

			$data_string = json_encode($data);

			$url = "http://quizbaj.com/api/action.php";
			
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
			    
			   // echo "<pre>";print_r($resultdata);exit;
			
			$data['info'] = $resultdata;

			$userimage = array("images"=>$resultdata[0]->accessInfo->usersInfo->image);

			if($userimage !=''){
				$this->session->set_userdata($userimage);
			}
		
		
			$this->load->view('user/dashbord', $data);
		}
		else
		{
			redirect("login");
		}		
	}

	function subject()
	{
		if($this->clogin->is_logged_in())
		{	
			$user_id = $this->session->userdata('userID');
			$phone_number = $this->session->userdata('phone_number');
			$secretKey = $this->session->userdata('secretKey');

			$data = array('userID'=>$user_id, 'phoneNo'=>$phone_number, 'secretKey'=>$secretKey, 'action'=>'exam-name');

			$data_string = json_encode($data);

			$url = "http://quizbaj.com/api/action.php";
			
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

			///echo "<pre>dd";print_r($resultdata);exit();

			$data['subject'] = $resultdata;
			
			$this->load->view('user/subject', $data);
		}
		else
		{
			redirect("login");
		}		
	}

	//function exam_sheet($examid, $userExamID, $roundid)
	//{
	function exam_sheet()
	{
		if($this->clogin->is_logged_in())
		{	
			
			if($this->input->server('REQUEST_METHOD') == 'POST'){

			$examid = $this->input->post('examID');
			$userExamID = $this->input->post('userExamID');
			$roundid = $this->input->post('round');	
			
			$user_id = $this->session->userdata('userID');
			$phone_number = $this->session->userdata('phone_number');
			$secretKey = $this->session->userdata('secretKey');

			$examarray = array("userID"=> $user_id, "phoneNo"=>$phone_number, "action"=>"exam-sheet", "examID"=>$examid, "round"=>$roundid, "userExamID"=>$userExamID, "secretKey"=>$secretKey);


			$data_string = json_encode($examarray);

			$url = "http://quizbaj.com/api/action.php";
			
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
			

			$data['exam_sheet'] = $resultdata;
			$data['image'] = $this->session->userdata('images');
			$data['fullName'] = $this->session->userdata('fullName');

			//echo "<pre>";print_r($resultdata);exit();


			///========rule========\\

			$rules = array('userID'=>$user_id, 'phoneNo'=>$phone_number, 'secretKey'=>$secretKey, 'action'=>'common-rules');

			$rules_string = json_encode($rules);

			$url = "http://quizbaj.com/api/action.php";
			
			$chr = curl_init($url);
			curl_setopt($chr, CURLOPT_CUSTOMREQUEST, "GET");                                                                     
			curl_setopt($chr, CURLOPT_POSTFIELDS, $rules_string);                                                                  
			curl_setopt($chr, CURLOPT_RETURNTRANSFER, true);                                                                      
			curl_setopt($chr, CURLOPT_HTTPHEADER, array(                                                                          
				'Content-Type: application/json',                                                                                
				'Content-Length: ' . strlen($rules_string))                                                                       
			);																							 
			$result_rules = curl_exec($chr);

			$rulesresult = json_decode($result_rules);

			$data['rules_info'] = $rulesresult;

			$this->load->view('user/exam_sheet', $data);
                    }else{
		  	redirect('user/subject');
		  }
		}
		else
		{
			redirect("login");
		}		
	}

	function answer_submit(){

		$examID = $this->input->post('examID');
		$userExamID = $this->input->post('userExamID');
		$sheetID = $this->input->post('sheetID');
		$answer = $this->input->post('answer');
		$questionsID = $this->input->post('questionsID');
		$isComplete = $this->input->post('isComplete');
		$isCorect = $this->input->post('isCorect');

		$user_id = $this->session->userdata('userID');
		$phone_number = $this->session->userdata('phone_number');
		$secretKey = $this->session->userdata('secretKey');
		$action = "submit-answer";

		$data = array("userID"=>$user_id, "phoneNo"=>$phone_number, "secretKey"=>$secretKey, "action"=>$action, "examID"=>$examID, "userExamID"=>$userExamID, "sheetID"=>$sheetID, "answer"=>$answer, "Quistionno"=>$questionsID, "isComplete"=>$isComplete, "isCorect"=>$isCorect, "examLogID"=>$userExamID);

		

		$data_string = json_encode($data);

		///echo "<pre>";print_r($data_string);

		$url = "http://quizbaj.com/api/action.php";
			
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

		//echo "<pre>";print_r($resultdata);

		$daraarray['code'] = $resultdata[0]->code;
		$daraarray['message'] = $resultdata[0]->message;
		$daraarray['submitedAnswer'] = $resultdata[0]->submitedAnswer;
		$daraarray['accessInfo'] = $resultdata[0]->accessInfo;

		//echo "<pre>";print_r($daraarray);exit();

		echo json_encode($daraarray);

		exit();



	}

	function exam_history(){

		if($this->input->server('REQUEST_METHOD') == 'POST'){

			$userExamID = $this->input->post('userexami_ID');



			$user_id = $this->session->userdata('userID');
			$phone_number = $this->session->userdata('phone_number');
			$secretKey = $this->session->userdata('secretKey');

			$data = array("userID"=>$user_id, "phoneNo"=>$phone_number, "action"=>"resent-exam-result", "secretKey"=>$secretKey, "userExamID"=>$userExamID);
			//{"userID":"3","phoneNo":"8801945936934","action":"resent-exam-result","secretKey":"eccbc87e4b5ce2fe28308fd9f2a7baf3","userExamID":"28"}

			$data_string = json_encode($data);

			$url = "http://quizbaj.com/api/action.php";
			
			$ch = curl_init($url);
			curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "GET");                                                                     
			curl_setopt($ch, CURLOPT_POSTFIELDS, $data_string);                                                                  
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);                                                                      
			curl_setopt($ch, CURLOPT_HTTPHEADER, array(                                                                          
				'Content-Type: application/json',                                                                                
				'Content-Length: ' . strlen($data_string))                                                                       
			);																							 
			$result = curl_exec($ch);

			$resultdata = json_decode($result);

			$data['exam_history'] = $resultdata;

			$this->load->view('user/exam_history', $data);

		}
	}

	function leaderboard()
	{
		if($this->clogin->is_logged_in())
		{	
			$user_id = $this->session->userdata('userID');
			$phone_number = $this->session->userdata('phone_number');
			$secretKey = $this->session->userdata('secretKey');

			$data = array('userID'=>$user_id, 'phoneNo'=>$phone_number, 'secretKey'=>$secretKey, 'action'=>'leader-board');

			$data_string = json_encode($data);

			$url = "http://quizbaj.com/api/action.php";
			
			$ch = curl_init($url);
			curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "GET");                                                                     
			curl_setopt($ch, CURLOPT_POSTFIELDS, $data_string);                                                                  
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);                                                                      
			curl_setopt($ch, CURLOPT_HTTPHEADER, array(                                                                          
				'Content-Type: application/json',                                                                                
				'Content-Length: ' . strlen($data_string))                                                                       
			);																							 
			$result = curl_exec($ch);

			$resultdata = json_decode($result);

			$data['leaderboard'] = $resultdata;

			///echo "<pre>";print_r($resultdata);exit();

			$this->load->view('user/leaderboard', $data);
		}
		else
		{
			redirect("login");
		}		
	}

	function rules()
	{
		if($this->clogin->is_logged_in())
		{	
			$user_id = $this->session->userdata('userID');
			$phone_number = $this->session->userdata('phone_number');
			$secretKey = $this->session->userdata('secretKey');

			$data = array('userID'=>$user_id, 'phoneNo'=>$phone_number, 'secretKey'=>$secretKey, 'action'=>'common-rules');

			$data_string = json_encode($data);

			$url = "http://quizbaj.com/api/action.php";
			
			$ch = curl_init($url);
			curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "GET");                                                                     
			curl_setopt($ch, CURLOPT_POSTFIELDS, $data_string);                                                                  
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);                                                                      
			curl_setopt($ch, CURLOPT_HTTPHEADER, array(                                                                          
				'Content-Type: application/json',                                                                                
				'Content-Length: ' . strlen($data_string))                                                                       
			);																							 
			$result = curl_exec($ch);

			$resultdata = json_decode($result);

			$data['rules'] = $resultdata;

			//echo "<pre>";print_r($resultdata);exit();
			
			$this->load->view('user/rules', $data);
		}
		else
		{
			redirect("login");
		}		
	}

	function help()
	{
		if($this->clogin->is_logged_in())
		{	

			if($this->input->server('REQUEST_METHOD') == 'POST'){

				$email = $this->input->post('email');
				$maessage = $this->input->post('maessage');

				$user_id = $this->session->userdata('userID');
				$phone_number = $this->session->userdata('phone_number');
				$secretKey = $this->session->userdata('secretKey');

				$data = array('userID'=>$user_id, 'phoneNo'=>$phone_number, 'secretKey'=>$secretKey, 'action'=>'help-post', 'email'=>$email, 'message'=>$maessage);

				$data_string = json_encode($data);

				$url = "http://quizbaj.com/api/action.php";
				
				$ch = curl_init($url);
				curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "GET");                                                                     
				curl_setopt($ch, CURLOPT_POSTFIELDS, $data_string);                                                                  
				curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);                                                                      
				curl_setopt($ch, CURLOPT_HTTPHEADER, array(                                                                          
					'Content-Type: application/json',                                                                                
					'Content-Length: ' . strlen($data_string))                                                                       
				);																							 
				$result = curl_exec($ch);

				$resultdata = json_decode($result);

				$data['massage'] = $resultdata;

			}else{
				$data['massage'] = "";
			}
			$this->load->view('user/help', $data);
		}
		else
		{
			redirect("login");
		}		
	}

	


}
?>