<?php
class apps extends CI_Controller {

 	function __construct()
 	{
    	// Call the Model constructor
    	parent::__construct();
    	$data['activeMainMenu'] = "";
		$data['activeSubMenu'] = "";
		
 	}

	function index()
	{
	    if($this->clogin->is_logged_in())
		{
			redirect("admin/cpanel", "Location");
		}
		else
		{
			redirect("login/index", "Location");
		}
	}


/**
*User Name Validation
*By Md. Golam Robbany
*Date : 2010-08-07
*Email : mgrnahid@gmail.com
*/

	function validateUser()
	{
	/* RECEIVE VALUE */
	$validateValue=$_POST['validateValue'];
	$validateId=$_POST['validateId'];
	$validateError=$_POST['validateError'];
	/* RETURN VALUE */
	$arrayToJs = array();
	$arrayToJs[0] = $validateId;
	$arrayToJs[1] = $validateError;
	if($this->resellerModel->checkResellerLogin($validateValue) =="0"){		// validate??
	$arrayToJs[2] = "true";			// RETURN TRUE
	echo '{"jsonValidateReturn":'.json_encode($arrayToJs).'}';			// RETURN ARRAY WITH success
	}else{
	for($x=0;$x<1000000;$x++){
		if($x == 990000){
			$arrayToJs[2] = "false";
			echo '{"jsonValidateReturn":'.json_encode($arrayToJs).'}';		// RETURN ARRAY WITH ERROR
			}
		}
	}
}


/**
 ***********************************************************************
 * @Get Exam Subjects List  ********************************************
 ***********************************************************************
*/


	function subjects($errorMessage=0)
	{
		if($this->clogin->is_logged_in())
		{
			$userID = $this->session->userdata('userID');

			$subjectName = 'NULL';
			$campID = 'NULL';
			$startoffset = 0;
			$limit = LIMIT_PERPAGE;
			$data['openTag'] = "quiz";
			$data['activeTag'] = "subject-list";

			$data['subjectName'] =$subjectName;
			$data['campID'] =$campID;
			$data['startoffset'] = $startoffset;
			$data['limit'] = $limit;
			$data['campaignList']		= $this->generallib->getCampaignList($campID);
			$data['total'] = $this->appsModel->getTotalSubjects($subjectName, $campID);
			$data['queryList'] = $this->appsModel->getSubjectsList($startoffset, $limit, $subjectName, $campID);
			if($errorMessage ==-1)
			$data['titleErrorMessage'] = FROMMESSAGE004;
			elseif($errorMessage == 1)
			$data['titleErrorMessage'] = FROMMESSAGE0001;
			elseif($errorMessage == 2)
			$data['titleErrorMessage'] = FROMMESSAGE0002;
			elseif($errorMessage == 3)
			$data['titleErrorMessage'] = FROMMESSAGE0003;
			elseif($errorMessage ==24)
			$data['titleErrorMessage'] = FROMMESSAGE024;
			else
			$data['titleErrorMessage'] = "";

			$this->load->view('apps/subjects_list',$data);
		}
		else
		{
			redirect("logout", "Location");
		}
	}

/**
 ***********************************************************************
 * @Get Exam Subjects List  ********************************************
 ***********************************************************************
*/


	function subjectsPagination($startoffset, $limit, $subjectName, $campID, $myRandom = 0)
	{
		if($this->clogin->is_logged_in())
		{
			$userID = $this->session->userdata('userID');
			$data['openTag'] = "quiz";
			$data['activeTag'] = "subject-list";

			$data['subjectName'] =$subjectName;
			$data['campID'] =$campID;
			$data['startoffset'] = $startoffset;
			$data['limit'] = $limit;
			$data['campaignList']		= $this->generallib->getCampaignList($campID);
			$data['total'] = $this->appsModel->getTotalSubjects($subjectName, $campID);
			$data['queryList'] = $this->appsModel->getSubjectsList($startoffset, $limit, $subjectName, $campID);
			$data['titleErrorMessage'] = "";

			$this->load->view('apps/subjects_list_pagi',$data);
		}
		else
		{
			redirect("logout", "Location");
		}
	}

/**
 ***********************************************************************
 * @Get Exam Subject Form  *********************************************
 ***********************************************************************
*/

 	function addFormSubject($errorMesssage=0)
	{
		if($this->clogin->is_logged_in())
		{
			$userID = $this->session->userdata('userID');
			$data['openTag'] = "quiz";
			$data['activeTag'] = "subject-list";

			$data['id']		= "";	
			$data['exam_name']		= "";
			$data['syllabus']		= "";
			$data['exam_details']		= "";
			$data['campaignList']		= $this->generallib->getCampaignList($campID = 0);
			$data['no_question']		= 10;
			$data['correct_score']		= 10.00;
			$data['incorrect_score']		= 0.00;
			$data['pass_score']		= 50.00;
			$data['duration']		= 5;
			$data['maximum_attempts']		= 10;
			$data['next_attempts']		 = 72;
			$data['is_editable']		 = 0;
			$data['with_login']		= 1;
			$data['status']		= 1; 
			$data['action']		= 'Add';

			$data['errorMesssage']		= $errorMesssage;
			if($errorMesssage==0)
			$data['titleErrorMessage'] = FROMMESSAGE001;
			elseif($errorMesssage==-1)
			$data['titleErrorMessage'] = FROMMESSAGE001;
			elseif($errorMesssage==-2)
			$data['titleErrorMessage'] = FROMMESSAGE002;
			elseif($errorMesssage==-3)
			$data['titleErrorMessage'] = FROMMESSAGE003;
			elseif($errorMesssage==-5)
			$data['titleErrorMessage'] = FROMMESSAGE005;		
			else
			$data['titleErrorMessage'] = "";
			$this->load->view('apps/subject_from',$data);
		}
		else
		{
			redirect("logout", "Location");
		}
	}


/**
 ***********************************************************************
 * @Add/Edit Exam Subject   ********************************************
 ***********************************************************************
*/
 
	function addEditSubject()
	{
		if($this->clogin->is_logged_in())
		{
			$userID = $this->session->userdata('userID');
            $id = $this->input->post('id');
            $action = $this->input->post('action');
            $exam_name = $this->input->post('exam_name');
            $campID = $this->input->post('campID');

            if($action=="Add")
            {
               	if(empty($exam_name))
                redirect("apps/addFormSubject/-1", "Location");

                $this->appsModel->addSubject($userID);
                redirect("apps/subjects/1", "Location");
            }
            else
            {
            	if(empty($exam_name))
                redirect("apps/addFormSubject/-1/".$id, "Location");
                
                $this->appsModel->updateSubject($userID);
                redirect("apps/subjects/2", "Location");
            }
        }
		else
		{
			redirect("logout", "Location");
		}        
    }


/**
 ***********************************************************************
 * @Edit Exam Subject Form   *******************************************
 ***********************************************************************
*/

	function editSubjectForm($errorMesssage = 0, $idElement)
	{
		if($this->clogin->is_logged_in())
		{
			$userID = $this->session->userdata('userID');
			$data['openTag'] = "quiz";
			$data['activeTag'] = "subject-list";

			$data['errorMesssage'] = $errorMesssage;

			$editInfo = $this->appsModel->subjectEditInfo($idElement);
            if($editInfo==0)
            {
                redirect("apps/subjects/0", "Location");
            }
            else
            {
                foreach($editInfo as $row)
                {

					$data['id']		 = $row->id;
					$data['exam_name']		 = $row->exam_name;
					$data['syllabus']		 = $row->syllabus;
					$data['exam_details']		 = $row->exam_details;
					$data['campaignList']		= $this->generallib->getCampaignList($row->camp_id);
					$data['no_question']		 = $row->no_question;
					$data['correct_score']		 = $row->correct_score;
					$data['incorrect_score']		 = $row->incorrect_score;
					$data['pass_score']		 = $row->pass_score;
					$data['duration']		 = $row->duration;
					$data['maximum_attempts']		 = $row->maximum_attempts;
					$data['next_attempts']		 = $row->next_attempts;
					$data['is_editable']		 = $row->is_editable;
					$data['with_login']		 = $row->with_login;
					$data['certificate_text']		 = $row->certificate_text;
					$data['status']		 = $row->status;
					$data['action']		= 'Edit';
                }

				if($errorMesssage==0)
				$data['titleErrorMessage'] = FROMMESSAGE001;
				elseif($errorMesssage==-1)
				$data['titleErrorMessage'] = FROMMESSAGE001;
				else
				$data['titleErrorMessage'] = "";
				$this->load->view('apps/subject_from',$data);

            }
		}
		else
		{
			redirect("logout", "Location");
		}
	}

/**
 ***********************************************************************
 * @Delete Exam Subject  ***********************************************
 ***********************************************************************
*/
 
	function deleteSubject($idElement)
	{
		set_time_limit(36000);
		if($this->clogin->is_logged_in())
		{
			$userID = $this->session->userdata('userID');
			$this->appsModel->deleteSubjectInfo($idElement);
			redirect("apps/subjects/3", "Location");			
		}
		else
		{
			redirect("logout", "Location");
		}
	}


/**
 ***********************************************************************
 *@question Bank List  *************************************************
 ***********************************************************************
*/
 
	function  questionBanks($errorMessage=0, $examID = 0, $campID = 0)
	{
		if($this->clogin->is_logged_in())
		{
			$userID = $this->session->userdata('userID');

			$question ="NULL";
			$startoffset = 0;
			$limit = LIMIT_PERPAGE;
			$data['openTag'] = "quiz";
			$data['activeTag'] = "question-list";

			$data['question'] =$question;
			$data['examID'] =$examID;
			$data['campID'] =$campID;
			$data['startoffset'] = $startoffset;
			$data['limit'] = $limit;
			$data['subjectList']		= $this->generallib->getSubjectList($examID);
			$data['campaignList']		= $this->generallib->getCampaignList($campID);
			$data['total'] = $this->appsModel->getTotalQuestion($examID, $campID, $question);
			$data['queryList'] = $this->appsModel->getQuestions($startoffset, $limit, $examID, $campID, $question);
			if($errorMessage ==-1)
			$data['titleErrorMessage'] = FROMMESSAGE004;
			elseif($errorMessage == 1)
			$data['titleErrorMessage'] = FROMMESSAGE0001;
			elseif($errorMessage == 2)
			$data['titleErrorMessage'] = FROMMESSAGE0002;
			elseif($errorMessage == 3)
			$data['titleErrorMessage'] = FROMMESSAGE0003;
			elseif($errorMessage ==24)
			$data['titleErrorMessage'] = FROMMESSAGE024;
			else
			$data['titleErrorMessage'] = "";
			
			
			////echo '<pre>';print_r($data);exit;

			$this->load->view('apps/question_list',$data);
		}
		else
		{
			redirect("logout", "Location");
		}
	}


/**
 ***********************************************************************
 @question Bank Pagination  ********************************************
 ***********************************************************************
*/
 
	function  questionBanksPagination($startoffset, $limit, $question, $campID, $examID, $myRandom = 0)
	{
		if($this->clogin->is_logged_in())
		{
			$userID = $this->session->userdata('userID');

			$data['openTag'] = "quiz";
			$data['activeTag'] = "question-list";

			$data['question'] =$question;
			$data['examID'] =$examID;
			$data['campID'] =$campID;
			$data['startoffset'] = $startoffset;
			$data['limit'] = $limit;
			$data['total'] = $this->appsModel->getTotalQuestion($examID, $campID, $question);
			$data['queryList'] = $this->appsModel->getQuestions($startoffset, $limit, $examID, $campID, $question);
			$data['titleErrorMessage'] = "";
			$this->load->view('apps/question_list_pagi',$data);
		}
		else
		{
			redirect("logout", "Location");
		}
	}


/**
 ***********************************************************************
 *@question Bank Form  *************************************************
 ***********************************************************************
*/
	function addFormQuestion($errorMesssage = 0, $examID = 0, $campID = 0)
	{
		if($this->clogin->is_logged_in())
		{
			$userID = $this->session->userdata('userID');
			$data['openTag'] = "quiz";
			$data['activeTag'] = "question-list";

			$data['id']		= "";
			$data['subjectList']		= $this->generallib->getSubjectList($examID);
			$data['campaignList']		= $this->generallib->getCampaignList($campID);
			$data['question']		= "";
			$data['question_type']		= 3;
			$data['question_options'] = "";

			$data['option1'] = "";
			$data['option2'] = "";
			$data['option3'] = "";
			$data['option4'] = "";
			$data['answer'] = "";
			$data['status']		= 1;
			$data['action']		= 'Add';
			$data['errorMesssage']		= $errorMesssage;
			if($errorMesssage==0)
			$data['titleErrorMessage'] = FROMMESSAGE001;
			elseif($errorMesssage==-1)
			$data['titleErrorMessage'] = FROMMESSAGE001;
			elseif($errorMesssage==-2)
			$data['titleErrorMessage'] = FROMMESSAGE002;
			elseif($errorMesssage==-3)
			$data['titleErrorMessage'] = FROMMESSAGE003;
			else
			$data['titleErrorMessage'] = "";
			$this->load->view('apps/question_from',$data);
		}
		else
		{
			redirect("logout", "Location");
		}
	}

/**
 ***********************************************************************
 *@Add/Edit question Bank  *********************************************
 ***********************************************************************
*/
 
	function addEditQuestion()
	{
		if($this->clogin->is_logged_in())
		{
			$userID = $this->session->userdata('userID');
            $id = $this->input->post('id');
            $examID = $this->input->post('examID');
            $campID = $this->input->post('campID');
            $question = $this->input->post('question');
            $action = $this->input->post('action');   
            
            if($action=="Add")
            {
               	if((empty($examID)) OR (empty($campID)) OR (empty($question)))
                redirect("apps/addFormQuestion/-1/".$examID.'/'.$campID, "Location");

                $this->appsModel->addQuestion($userID);
                redirect("apps/questionBanks/1/".$examID.'/'.$campID, "Location");
            }
            else
            {
            	if((empty($examID)) OR (empty($campID)) OR (empty($question)))
                redirect("apps/editQuestionForm/-1/".$id, "Location");
                
                $this->appsModel->updateQuestionInfo($userID);
                redirect("apps/questionBanks/2/".$examID.'/'.$campID, "Location");
            }
        }
		else
		{
			redirect("logout", "Location");
		}        
    }



/**
 ***********************************************************************
 @Edit question Bank Form  *********************************************
 ***********************************************************************
*/

	function editQuestionForm($errorMesssage = 0, $idElement)
	{
		if($this->clogin->is_logged_in())
		{
			$userID = $this->session->userdata('userID');
			$data['openTag'] = "quiz";
			$data['activeTag'] = "question-list";
			$data['errorMesssage'] = $errorMesssage;

			$editInfo = $this->appsModel->questionEditInfo($idElement);
            if($editInfo==0)
            {
                redirect("apps/questionBanks/0/0/0", "Location");
            }
            else
            {
                foreach($editInfo as $row)
                {
                	
					$data['id']		 = $row->id;
					$data['subjectList']		= $this->generallib->getSubjectList($row->exam_id);
					$data['campaignList']		= $this->generallib->getCampaignList($row->camp_id);
					$data['question']		 = $row->question;
					$data['question_type']		 = $row->question_type;
					$questionOptions		 = unserialize($row->question_options);
					$data['answer']		 = $row->answer;
					$data['status']		 = $row->status;
                    if(is_array($questionOptions))
                    {

                        $countOption = COUNT($questionOptions);
                        if($countOption > 0)
                        {	
                        	for($qc = 1; $qc <= $countOption; $qc++)
                        	{
                        		$data['option'.$qc] = $questionOptions[$qc]['option'];
                        	}
                        }
                        else
                        {
                    		$data['option1'] = "";
                    		$data['option2'] = "";
                    		$data['option3'] = "";
                    		$data['option4'] = "";                        	
                        }	
                    }
                    else
                    {
                    	$data['option1'] = "";
                    	$data['option2'] = "";
                    	$data['option3'] = "";
                    	$data['option4'] = "";
                    }    	


					$data['action']		= 'Edit';
                }

				if($errorMesssage==0)
				$data['titleErrorMessage'] = FROMMESSAGE001;
				elseif($errorMesssage==-1)
				$data['titleErrorMessage'] = FROMMESSAGE001;
				else
				$data['titleErrorMessage'] = "";
				$this->load->view('apps/question_from',$data);
            }
		}
		else
		{
			redirect("logout", "Location");
		}
	}


/**
 ***********************************************************************
 @Delete question Bank Form  *********************************************
 ***********************************************************************
*/
 
	function deleteQuestion($idElement = 0, $examID = 0, $campID = 0)
	{
		set_time_limit(36000);
		if($this->clogin->is_logged_in())
		{
			$userID = $this->session->userdata('userID');
			$this->appsModel->deleteQuestionInfo($idElement);
			redirect("apps/questionBanks/3/".$examID.'/'.$campID, "Location");
		}
		else
		{
			redirect("logout", "Location");
		}
	}


/**
 ***********************************************************************
 *@question Improt Form  ***********************************************
 ***********************************************************************
*/
	function questionImportForm($errorMesssage = 0, $examID = 0, $campID = 0)
	{
		if($this->clogin->is_logged_in())
		{
			$userID = $this->session->userdata('userID');
			$data['openTag'] = "quiz";
			$data['activeTag'] = "question-list";
			$data['subjectList']		= $this->generallib->getSubjectList($examID);
			$data['campaignList']		= $this->generallib->getCampaignList($campID);
			$data['examID'] = $examID;
			$data['campID'] = $campID;
			$data['question_type']		= 3;
			$data['action']		= 'Add';
			$data['errorMesssage']		= $errorMesssage;
			if($errorMesssage==0)
			$data['titleErrorMessage'] = FROMMESSAGE001;
			elseif($errorMesssage==-1)
			$data['titleErrorMessage'] = FROMMESSAGE001;
			elseif($errorMesssage==-2)
			$data['titleErrorMessage'] = FROMMESSAGE002;
			elseif($errorMesssage==-3)
			$data['titleErrorMessage'] = FROMMESSAGE003;
			else
			$data['titleErrorMessage'] = "";
			$this->load->view('apps/question_import_from',$data);
		}
		else
		{
			redirect("logout", "Location");
		}
	}


/*
|--------------------------------------------------------------------------
| Import questions Information
|--------------------------------------------------------------------------
|
|  @author: Md. Golam Rabbany
|  @email: mgrnahid@gmail.com
|  @description: This function Import question Information
*/

	function importQuestions()
	{
		
		ini_set('max_execution_time', 1800);
		ini_set('memory_limit', '-1');
		$userID = $this->session->userdata('userID');

        $examID = $this->input->post('examID');
        $campID = $this->input->post('campID');
        $questionType = $this->input->post('question_type');
		if($questionType == LONG_ANSWER)
		{
			$filedType = "textarea";
		}
		elseif($questionType == SHORT_ANSWER)
		{
			$filedType = "text";
		}
		elseif($questionType == MCQSA)
		{
			$filedType = "radio";
		}
		else
		{
			$filedType = "checkbox";
		}

		// echo "button clicked"; exit(); 
		// echo "<pre>
		// 	$examID , $campID,  $questionType
		// </pre>";



        require_once(APPPATH.'third_party/simplexls/src/SimpleXLS.php');
        $config['upload_path'] = UPLOAD_DIR;
		$config['encrypt_name']  = TRUE;
		$config['remove_spaces']  = TRUE;
		$config['allowed_types'] =  'xls|txt|csv';
		$this->load->library('upload', $config);
			echo "<pre>
				$config
			</pre>"; exit();

		if ($this->upload->do_upload())
		{
			// echo "I am here"; exit();

			$dataFile = array('upload_data' => $this->upload->data());
			$fileName = $dataFile['upload_data']['file_name'];
			$rawname = $dataFile['upload_data']['raw_name'];


			if ( $xlsArray = SimpleXLS::parse(UPLOAD_DIR.$fileName) ) 
			{
				$infoAraay = $xlsArray->rows();
				$nums = count($infoAraay);
				for ($i = 1; $i < $nums; $i++) 
				{
					
					$infomations = $infoAraay[$i];
					$question = $infomations[1];
                    $option1 = $infomations[2];
                    $option2 = $infomations[3];
                    $option3 = $infomations[4];
                    $option4 = $infomations[5];
                    $answer = $infomations[6];

                    if(!empty($option1))
                    $questionOptions[1] = array('filedType' => $filedType, 'option' => $option1);
                   	else
                    $questionOptions[1] = array('filedType' => $filedType, 'option' => '');	

                    if(!empty($option2))
                    $questionOptions[2] = array('filedType' => $filedType, 'option' => $option2);
                   	else
                    $questionOptions[2] = array('filedType' => $filedType, 'option' => '');	

                    if(!empty($option3))
                    $questionOptions[3] = array('filedType' => $filedType, 'option' => $option3);
                   	else
                    $questionOptions[3] = array('filedType' => $filedType, 'option' => '');	

                    if(!empty($option4))
                    $questionOptions[4] = array('filedType' => $filedType, 'option' => $option4);
                   	else
                    $questionOptions[4] = array('filedType' => $filedType, 'option' => '');	
                    
                    $questionOptionsSerilize = serialize($questionOptions);
                    $dataInset['exam_id'] = $examID;
                    $dataInset['camp_id'] = $campID;
                    $dataInset['question'] = $question;
                    $dataInset['question_type'] = $questionType; 
                    $dataInset['question_options'] = $questionOptionsSerilize;
                    $dataInset['answer'] = $answer;
                    $dataInset['user_id'] = $userID;
                    $dataInset['status'] = 1;
                    $dataInset['creationdate'] = date('Y-m-d H:i:s');
                    $dataInset['ipaddress'] = $this->appsModel->getRealIpAddr();
                    if((!empty($question)))
                    {       
                        $this->db->insert('questions', $dataInset);
                        //$this->db->last_query();
                    } 
					
				}
			} 
			else 
			{
				echo SimpleXLS::parseError();
			}
			redirect("apps/questionBanks/1/".$examID.'/'.$campID, "Location");
			//$xlsx = new SimpleXLSX(UPLOAD_DIR.$fileName);
			//echo ">>>>>>>>>>>>>".print_r( $xlsx->rows() );


			//$this->appsModel->importQuestions($userID, $fileName, $examID, $campID, $questionType);
			//redirect("apps/questionBanks/1/".$examID.'/'.$campID, "Location");

		}
		else
		{
			
			$error = array('error' => $this->upload->display_errors());
			echo "<pre>";
			echo print_r($error);
			echo "</pre>";
			
			//redirect("tariffs/importTariffChartForm/-1/".$idTariff."/".$tariffType, "Location");	
		}
	}


/*
 ***********************************************************************
 ***************@Describes:Registered Users Information  ****************
 ***********************************************************************
*/
	function getUserDetails()
	{
		if($this->clogin->is_logged_in())
		{
			$data['total'] = $this->appsModel->getUserDetails();

			// echo "<pre>";print_R($data);exit;
			$this->load->view('apps/users_details',$data);
		}
		else
		{
			redirect("logout", "Location");
		}
	}

/*
 ***********************************************************************
 ***************@Describes:Registered Users Information  ****************
 ***********************************************************************
*/
	function qusImport()
	{
		if($this->clogin->is_logged_in())
		{
			// $data['total'] = $this->appsModel->getUserDetails();

			// echo "<pre>";print_R($data);exit;
			$this->load->view('apps/qus_import');
		}
		else
		{
			redirect("logout", "Location");
		}
	}

/**
 *============ ********************* ============
 @Quiz Result Information  **********************
 *============ ********************* ============
*/
	function quizResultNew()
	{
		if($this->clogin->is_logged_in())
		{
			$userID = $this->session->userdata('userID');
			$fullName = 'NULL';
			$phoneNo = 'NULL';
			$examID = 'NULL';
			$campID = 'NULL';
			$startoffset = 0;
			$limit = LIMIT_PERPAGE;

			$data['openTag'] = "quiz";
			$data['activeTag'] = "quiz-result";
			$data['examID'] =$examID;
			$data['campID'] =$campID;
			
			$data['phoneNo'] =$phoneNo;
			$data['fullName'] =$fullName;
			$data['startoffset'] = $startoffset;
			$data['limit'] = $limit;
			$data['subjectList']		= $this->generallib->getSubjectList($examID);
			$data['campaignList']		= $this->generallib->getCampaignList($campID);

			

			$data['total'] = $this->appsModel->totalQuizExam($phoneNo, $examID, $campID);
			$data['queryList'] = $this->appsModel->quizExamList($startoffset, $limit, $phoneNo,$fullName, $examID, $campID);
			$data['titleErrorMessage'] = "";
			
			
			/////echo "<pre>";print_R($data);exit;

			$this->load->view('apps/quizResultNew',$data);
		}
		else
		{
			redirect("logout", "Location");
		}
	}

/**
 ***********************************************************************
 @Quiz Result Information  *********************************************
 ***********************************************************************
*/
	function quizResult()
	{
		if($this->clogin->is_logged_in())
		{
			$userID = $this->session->userdata('userID');
			$fullName = 'NULL';
			$phoneNo = 'NULL';
			$examID = 'NULL';
			$campID = 'NULL';
			$startoffset = 0;
			$limit = LIMIT_PERPAGE;

			$data['openTag'] = "quiz";
			$data['activeTag'] = "quiz-result";
			$data['examID'] =$examID;
			$data['campID'] =$campID;
			
			$data['phoneNo'] =$phoneNo;
			$data['fullName'] =$fullName;
			$data['startoffset'] = $startoffset;
			$data['limit'] = $limit;
			$data['subjectList']		= $this->generallib->getSubjectList($examID);
			$data['campaignList']		= $this->generallib->getCampaignList($campID);

			

			$data['total'] = $this->appsModel->totalQuizExam($phoneNo, $examID, $campID);
			$data['queryList'] = $this->appsModel->quizExamList($startoffset, $limit, $phoneNo,$fullName, $examID, $campID);
			$data['titleErrorMessage'] = "";
			
			
			/////echo "<pre>";print_R($data);exit;

			$this->load->view('apps/quiz_result',$data);
		}
		else
		{
			redirect("logout", "Location");
		}
	}


	function quizResultPagination($startoffset, $limit,$fullName,  $phoneNo, $campID, $examID, $myRandom = 0)
	{
		if($this->clogin->is_logged_in())
		{
			$userID = $this->session->userdata('userID');
			$data['openTag'] = "quiz";
			$data['activeTag'] = "quiz-result";
			$data['examID'] =$examID;
			$data['campID'] =$campID;
			$data['phoneNo'] =$phoneNo;
			$data['startoffset'] = $startoffset;
			$data['limit'] = $limit;
			$data['total'] = $this->appsModel->totalQuizExam($phoneNo, $examID, $campID);
			$data['queryList'] = $this->appsModel->quizExamList($startoffset, $limit, $fullName, $phoneNo, $examID, $campID);
			$data['titleErrorMessage'] = "";

			$this->load->view('apps/quiz_result_pagi',$data);
		}
		else
		{
			redirect("logout", "Location");
		}
	}







}
?>