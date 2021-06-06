<?php
class examination extends CI_Controller {

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
 * @Start Examination Section ******************************************
 ***********************************************************************
*/


/**
 * @author: Md. Golam Rabbany
 * @email: mgrnahid@gmail.com
 * @description: Examination List
 * @copyright 24 Match 2017
 */

	function examinationsList($errorMessage=0)
	{
		if($this->clogin->is_logged_in())
		{
			$userID = $this->session->userdata('userID');

			$examName = 'NULL';
			$idCourse = 'NULL';
			$startoffset = 0;
			$limit = LIMIT_PERPAGE;
			$data['openTag'] = "examination";
			$data['activeTag'] = "examination-list";

			$data['examName'] =$examName;
			$data['idCourse'] =$idCourse;
			$data['startoffset'] = $startoffset;
			$data['limit'] = $limit;
			$data['courseList']		= $this->generallib->getCourseList($idCourse = 0);
			$data['total'] = $this->examinationModel->getTotalnumExaminations($examName, $idCourse);
			$data['queryList'] = $this->examinationModel->getExaminationsList($startoffset, $limit, $examName, $idCourse);
			if($errorMessage ==-1)
			$data['titleErrorMessage'] = FROMMESSAGE004;
			elseif($errorMessage == 1)
			$data['titleErrorMessage'] = FROMMESSAGE0001;
			elseif($errorMessage == 2)
			$data['titleErrorMessage'] = FROMMESSAGE0002;
			elseif($errorMessage == 3)
			$data['titleErrorMessage'] = FROMMESSAGE0005;
			elseif($errorMessage ==24)
			$data['titleErrorMessage'] = FROMMESSAGE024;
			else
			$data['titleErrorMessage'] = "";

			$this->load->view('examination/examination_list',$data);
		}
		else
		{
			redirect("logout", "Location");
		}
	}


/**
 * @author: Md. Golam Rabbany
 * @email: mgrnahid@gmail.com
 * @description: Examination List
 * @copyright 24 Match 2017
 */

	function examinationsListPagination($startoffset, $limit, $examName, $idCourse, $myRandom = 0)
	{
		if($this->clogin->is_logged_in())
		{
			$userID = $this->session->userdata('userID');
			$data['openTag'] = "examination";
			$data['activeTag'] = "examination-list";

			$data['examName'] =$examName;
			$data['idCourse'] =$idCourse;
			$data['startoffset'] = $startoffset;
			$data['limit'] = $limit;

			$data['total'] = $this->examinationModel->getTotalnumExaminations($examName, $idCourse);
			$data['queryList'] = $this->examinationModel->getExaminationsList($startoffset, $limit, $examName, $idCourse);
			$data['titleErrorMessage'] = "";
			$this->load->view('examination/examination_list_pagination',$data);
		}
		else
		{
			redirect("logout", "Location");
		}
	}




/**
 * @author: Md. Golam Rabbany
 * @email: mgrnahid@gmail.com
 * @description: Show Add Form of Examination
 * @copyright 14 Jan 2017
 */
 
	function addFormExamination($errorMesssage=0)
	{
		if($this->clogin->is_logged_in())
		{
			$userID = $this->session->userdata('userID');
			$data['openTag'] = "examination";
			$data['activeTag'] = "examination-list";

			$data['id']		= "";	
			$data['exam_name']		= "";
			$data['exam_details']		= "";
			$data['exam_type']		= 2;
			$data['courseList']		= $this->generallib->getCourseList($idCourse = 0);
			$data['start_date']		= date('Y-m-d');
			$data['end_date']		= date('Y-m-d');
			$data['no_question']		= 15;
			$data['correct_score']		= 5.00;
			$data['incorrect_score']		= 0.00;
			$data['pass_score']		= 50.00;
			$data['duration']		= 30;
			$data['maximum_attempts']		= 10;
			$data['next_attempts']		 = 72;
			$data['is_editable']		 = 0;
			$data['with_login']		= 1;
			$data['pre_selection']		= 0;
			$data['certificate_text']		= "";
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
			$this->load->view('examination/examination_from',$data);
		}
		else
		{
			redirect("logout", "Location");
		}
	}




/**
 * @author: Md. Golam Rabbany
 * @email: mgrnahid@gmail.com
 * @description: Add/Edit Examination Information 
 * @copyright 15 Jan 2017
 */

 
	function addEditExamination()
	{
		if($this->clogin->is_logged_in())
		{
			$userID = $this->session->userdata('userID');
            $id = $this->input->post('id');
            $action = $this->input->post('action');
            $exam_name = $this->input->post('exam_name');
            $exam_type = $this->input->post('exam_type');
            $idCourse = $this->input->post('idCourse');
            $email = $this->input->post('email');

            if($action=="Add")
            {
               	if(empty($exam_name))
                redirect("examination/addFormExamination/-1", "Location");
            	if($exam_type == SELECTION)
            	{
            		$checkExam =$this->examinationModel->checkUniqueSelectionExamPapers($idCourse);
            		if($checkExam == 1)
            		redirect("examination/addFormExamination/-5", "Location"); 
            	}	
                $this->examinationModel->addExamination($userID);
                redirect("examination/examinationsList/1", "Location");
            }
            else
            {
            	if(empty($exam_name))
                redirect("examination/editInstructorForm/-1/".$id, "Location");
                
                $this->examinationModel->updateExamination($userID);
                redirect("examination/examinationsList/2", "Location");
            }
        }
		else
		{
			redirect("logout", "Location");
		}        
    }

 
/**
 * @author: Md. Golam Rabbany
 * @email: mgrnahid@gmail.com
 * @description: Show Edit Form of Examination
 * @copyright 16 Jan 2018
 */

	function editExaminationForm($errorMesssage = 0, $idElement)
	{
		if($this->clogin->is_logged_in())
		{
			$userID = $this->session->userdata('userID');
			$data['openTag'] = "examination";
			$data['activeTag'] = "examination-list";
			$data['errorMesssage'] = $errorMesssage;

			$editInfo = $this->examinationModel->examinationEditInfo($idElement);
            if($editInfo==0)
            {
                redirect("examination/examinationsList/0", "Location");
            }
            else
            {
                foreach($editInfo as $row)
                {

					$data['id']		 = $row->id;
					$data['exam_name']		 = $row->exam_name;
					$data['syllabus']		 = $row->syllabus;
					$data['exam_details']		 = $row->exam_details;
					$data['exam_type']		 = $row->exam_type;
					$data['courseList']		= $this->generallib->getCourseList($row->id_course);
					$data['start_date']		 = $row->start_date;
					$data['end_date']		 = $row->end_date;
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
				$this->load->view('examination/examination_from',$data);

            }
		}
		else
		{
			redirect("logout", "Location");
		}
	}



/**
 * @author: Md. Golam Rabbany
 * @email: mgrnahid@gmail.com
 * @description: Delete all Examination Information
 * @copyright 28 March 2017
 */
 
	function deleteExamination($idElement)
	{
		set_time_limit(36000);
		if($this->clogin->is_logged_in())
		{
			$userID = $this->session->userdata('userID');
			$this->examinationModel->deleteExaminationInfo($idElement);
			redirect("examination/examinationsList/3", "Location");			
		}
		else
		{
			redirect("logout", "Location");
		}
	}




/**
 ***********************************************************************
 * @Start Question Bank Section ****************************************
 ***********************************************************************
*/




/**
 * @author: Md. Golam Rabbany
 * @email: mgrnahid@gmail.com
 * @description: Examination List
 * @copyright 24 Match 2017
 */

	function  questionBanks($errorMessage=0, $examID = 0, $idCourse = 0)
	{
		if($this->clogin->is_logged_in())
		{
			$userID = $this->session->userdata('userID');

			$startoffset = 0;
			$limit = LIMIT_PERPAGE;
			$data['openTag'] = "examination";
			$data['activeTag'] = "question-list";

			$data['examID'] =$examID;
			$data['idCourse'] =$idCourse;
			$data['startoffset'] = $startoffset;
			$data['limit'] = $limit;
			$data['courseList']		= $this->generallib->getCourseList($idCourse);
			$data['total'] = $this->examinationModel->getTotalnumQuestion($examID, $idCourse);
			$data['queryList'] = $this->examinationModel->getQuestions($startoffset, $limit, $examID, $idCourse);
			if($errorMessage ==-1)
			$data['titleErrorMessage'] = FROMMESSAGE004;
			elseif($errorMessage == 1)
			$data['titleErrorMessage'] = FROMMESSAGE0001;
			elseif($errorMessage == 2)
			$data['titleErrorMessage'] = FROMMESSAGE0002;
			elseif($errorMessage == 3)
			$data['titleErrorMessage'] = FROMMESSAGE0005;
			elseif($errorMessage ==24)
			$data['titleErrorMessage'] = FROMMESSAGE024;
			else
			$data['titleErrorMessage'] = "";

			$this->load->view('examination/question_list',$data);
		}
		else
		{
			redirect("logout", "Location");
		}
	}




/**
 * @author: Md. Golam Rabbany
 * @email: mgrnahid@gmail.com
 * @description: Examination List
 * @copyright 24 Match 2017
 */

	function  questionBanksPagination($startoffset, $limit, $examName, $idCourse, $examID, $myRandom = 0)
	{
		if($this->clogin->is_logged_in())
		{
			$userID = $this->session->userdata('userID');
			$data['openTag'] = "examination";
			$data['activeTag'] = "question-list";

			$data['examID'] =$examID;
			$data['idCourse'] =$idCourse;
			$data['startoffset'] = $startoffset;
			$data['limit'] = $limit;
			//$data['courseList']		= $this->generallib->getCourseList($idCourse);
			$data['total'] = $this->examinationModel->getTotalnumQuestion($examID, $idCourse);
			$data['queryList'] = $this->examinationModel->getQuestions($startoffset, $limit, $examID, $idCourse);
			$data['titleErrorMessage'] = "";

			$this->load->view('examination/question_list_pagination',$data);
		}
		else
		{
			redirect("logout", "Location");
		}
	}


/**
 * @author: Md. Golam Rabbany
 * @email: mgrnahid@gmail.com
 * @description: Show Add Form of Examination
 * @copyright 14 Jan 2017
 */
 
	function addFormQuestion($errorMesssage = 0, $examID = 0, $idCourse = 0)
	{
		if($this->clogin->is_logged_in())
		{
			$userID = $this->session->userdata('userID');
			$data['openTag'] = "examination";
			$data['activeTag'] = "question-list";

			$data['id']		= "";
			$data['examName'] = $this->generallib->getExamName($examID);
			$data['examinationList']		= $this->generallib->getExaminationList($examID);
			$data['courseList']		= $this->generallib->getCourseList($idCourse);
			$data['categroyList'] = $this->generallib->getQuestionsCatList($catID = 0);	
			$data['examID']		= $examID;
			$data['idCourse']		= $idCourse;
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
			$this->load->view('examination/question_from',$data);
		}
		else
		{
			redirect("logout", "Location");
		}
	}




/**
 * @author: Md. Golam Rabbany
 * @email: mgrnahid@gmail.com
 * @description: Add/Edit Examination Question Information 
 * @copyright 15 Jan 2017
 */

 
	function addEditExaminationQuestion()
	{
		if($this->clogin->is_logged_in())
		{
			$userID = $this->session->userdata('userID');
            $id = $this->input->post('id');
            $examID = $this->input->post('examID');
            $idCourse = $this->input->post('idCourse');
            $question = $this->input->post('question');
            $action = $this->input->post('action');
            
            $email = $this->input->post('email');

            if($action=="Add")
            {
               	if((empty($examID)) OR (empty($idCourse)) OR (empty($question)))
                redirect("examination/addFormQuestion/-1/".$examID.'/'.$idCourse, "Location");

                $this->examinationModel->addExaminationQuestion($userID);
                redirect("examination/addFormQuestion/1/".$examID.'/'.$idCourse, "Location");
            }
            else
            {
            	if((empty($examID)) OR (empty($idCourse)) OR (empty($question)))
                redirect("examination/editQuestionBankForm/-1/".$id, "Location");
                
                $this->examinationModel->updateExaminationQuestion($userID);
                redirect("examination/questionBanks/2/".$examID.'/'.$idCourse, "Location");
            }
        }
		else
		{
			redirect("logout", "Location");
		}        
    }



 
/**
 * @author: Md. Golam Rabbany
 * @email: mgrnahid@gmail.com
 * @description: Show Edit Form of Examination Question Bank
 * @copyright 16 Jan 2018
 */

	function editQuestionBankForm($errorMesssage = 0, $idElement)
	{
		if($this->clogin->is_logged_in())
		{
			$userID = $this->session->userdata('userID');
			$data['openTag'] = "examination";
			$data['activeTag'] = "question-list";
			$data['errorMesssage'] = $errorMesssage;

			$editInfo = $this->examinationModel->questionBankEditInfo($idElement);
            if($editInfo==0)
            {
                redirect("examination/questionBanks/0/0/0", "Location");
            }
            else
            {
                foreach($editInfo as $row)
                {

					$data['id']		 = $row->id;
					$data['examinationList']		= $this->generallib->getExaminationList($row->exam_id);
					$data['courseList']		= $this->generallib->getCourseList($row->id_course);
					$data['categroyList'] = $this->generallib->getQuestionsCatList($row->category_id);	
					$data['question']		 = $row->question;
					$data['question_type']		 = $row->question_type;
					$questionOptions		 = unserialize($row->question_options);
					$data['answer']		 = $row->answer;
					$data['status']		 = $row->status;
                    if(is_array($questionOptions))
                    {
                        //echo "<pre>";
                        //echo print_r($questionOptions);
                        //echo "</pre>";
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
				$this->load->view('examination/question_from',$data);
            }
		}
		else
		{
			redirect("logout", "Location");
		}
	}




/**
 * @author: Md. Golam Rabbany
 * @email: mgrnahid@gmail.com
 * @description: Delete all Examination Qustion Bank Information
 * @copyright 28 March 2017
 */
 
	function deleteQuestionBank($idElement = 0, $examID = 0, $idCourse = 0)
	{
		set_time_limit(36000);
		if($this->clogin->is_logged_in())
		{
			$userID = $this->session->userdata('userID');
			$this->examinationModel->deleteQuestionBankInfo($idElement);
			redirect("examination/questionBanks/3/".$examID.'/'.$idCourse, "Location");
		}
		else
		{
			redirect("logout", "Location");
		}
	}




/**
 ***********************************************************************
 * @Start Pre-Selection Examination Result *****************************
 ***********************************************************************
*/



/**
 * @author: Md. Golam Rabbany
 * @email: mgrnahid@gmail.com
 * @description: Pre-Selection Examination Result
 * @copyright 24 Match 2017
 */

	function preSelectionExamResult($errorMessage=0)
	{
		if($this->clogin->is_logged_in())
		{
			$userID = $this->session->userdata('userID');

			$studentID = 'NULL';
			$studentName = 'NULL';
			$districtID = "NULL";
			$examDate = "NULL";
			$startoffset = 0;
			$limit = LIMIT_PERPAGE;
			$shorting = 0;
			$marks = 0;
			$shortingMarksField = 1;
			$data['openTag'] = "examination";
			$data['activeTag'] = "selection-exam-result-list";
			$data['startoffset'] = $startoffset;
			$data['limit'] = $limit;
			$data['shorting'] = $shorting;
			$data['shortingMarksField'] = $shortingMarksField;
			$data['studentID'] = $studentID;
			$data['studentName'] = $studentName;
			$data['districtID'] = $districtID;
			$data['marks'] = $marks;
			$data['examDate'] = $examDate;
			$data['districtList']		= $this->generallib->getDistrictList($districtID);
			$data['total'] = $this->examinationModel->getTotalnumPreSelectionExamStudent($studentID, $studentName, $districtID, $marks, $examDate);
			$data['queryList'] = $this->examinationModel->getStudentPreSelectionExamResultList($startoffset, $limit, $studentID, $studentName, $districtID, $shorting, $marks, $examDate, $shortingMarksField);
			//$data['queryList'] = 0;

			if($errorMessage == 1)
			$data['titleErrorMessage'] = FROMMESSAGE0009;
			else
			$data['titleErrorMessage'] = "";

			$this->load->view('examination/selection_exam_result_list',$data);
		}
		else
		{
			redirect("logout", "Location");
		}
	}




/**
 * @author: Md. Golam Rabbany
 * @email: mgrnahid@gmail.com
 * @description: Pre-Selection Examination Result
 * @copyright 24 Match 2017
 */

	function preSelectionExamResultPagi($startoffset, $limit, $studentID, $studentName, $districtID, $shortingMarksField, $marks,$shorting,  $examDate, $myRandom = 0)
	{
		if($this->clogin->is_logged_in())
		{
			$userID = $this->session->userdata('userID');
			$data['openTag'] = "examination";
			$data['activeTag'] = "selection-exam-result-list";
			$data['startoffset'] = $startoffset;
			$data['limit'] = $limit;
			$data['shorting'] = $shorting;
			$data['shortingMarksField'] = $shortingMarksField;
			$data['studentID'] = $studentID;
			$data['studentName'] = $studentName;
			$data['districtID'] = $districtID;
			$data['examDate'] = $examDate;
			$data['marks'] = $marks;
			$data['total'] = $this->examinationModel->getTotalnumPreSelectionExamStudent($studentID, $studentName, $districtID, $marks, $examDate);
			$data['queryList'] = $this->examinationModel->getStudentPreSelectionExamResultList($startoffset, $limit, $studentID, $studentName, $districtID, $shorting, $marks, $examDate, $shortingMarksField);
			$data['titleErrorMessage'] = "";

			$this->load->view('examination/selection_exam_result_list_pagi',$data);
		}
		else
		{
			redirect("logout", "Location");
		}
	}





/**
 * @author: Md. Golam Rabbany
 * @email: mgrnahid@gmail.com
 * @description: Pre-Selection Examination Result
 * @copyright 24 Match 2017
 */

	function preSelectionExamResultExport($studentID, $studentName, $districtID, $shortingMarksField, $marks,$shorting,  $examDate, $myRandom = 0)
	{
		if($this->clogin->is_logged_in())
		{
			$userID = $this->session->userdata('userID');
			$data['openTag'] = "examination";
			$data['activeTag'] = "selection-exam-result-list";
			$strStudents = "STD ID, Name, Phone, Email, Education, Location, 1st Preference, 2nd Preference, 3rd preference, Attempt, Exam Score, Certification Score, Interview Score, Total Score, Attend Date"."\n";

			$queryList = $this->examinationModel->getStudentPreSelectionExamResultList($startoffset = 0, $limit = 50000, $studentID, $studentName, $districtID, $shorting, $marks, $examDate, $shortingMarksField);
		
			if(is_array($queryList))
			{
				foreach ($queryList as $row) 
				{
					$studentID = $row->studentID;
					$fullName = $row->full_name;
					//$phone = $row->phone;
					$email = $row->email;
					$interviewScore = $row->interview_score;
					$certificateScore = $row->certificate_score;
					$education = $row->education;
					$totalExam = $row->totalExam;
					$marksAchieved = $row->marks_achieved;
					$examTime = $row->exam_time;
					$districtID = $row->district_id;

					$phoneNoStr = str_replace("-", "", $row->phone);
					if(strlen($phoneNoStr) == 11)
					$phoneNo = "88".$phoneNoStr;
					else
					$phoneNo = $phoneNoStr;	

					if($education == 1)
					$educationStr = "SSC or Equivalent";
					elseif ($education == 2)
					$educationStr = "HSC or Equivalent";
					elseif ($education == 3)
					$educationStr = "Bachelor  or Equivalent"; 
					elseif ($education == 4)
					$educationStr = "Masters  or Equivalent";
					elseif ($education == 6)
					$educationStr = "Dakhil  or Equivalent";
					elseif ($education == 6)
					$educationStr = "Fazil or Equivalent";
					else
					$educationStr = "Others";

					$districtName = $this->generallib->getDistrictName($row->district_id);
					$districtName1 = $this->generallib->getDistrictName($row->district1_id);
					$districtName2 = $this->generallib->getDistrictName($row->district2_id);
					$districtName3 = $this->generallib->getDistrictName($row->district3_id);

					if($row->education == 1)
					    $certificateScore = 5;
					elseif($row->education == 2)
					    $certificateScore = 10;
					elseif($row->education == 3)
					    $certificateScore = 15;
					elseif($row->education == 4)
					    $certificateScore = 20;
					elseif ($row->education == 5) 
					    $certificateScore = 5;
					elseif ($row->education == 6) 
					    $certificateScore = 15;
					else
					    $certificateScore = 5;

                    $numberExamPerform = $row->totalExam;
                    if($numberExamPerform > 3)
                    $numberExamPerform = 3; 

                    $getPreSelectionMarks = $this->generallib->getSelectionScore($row->idStudent);
                    $totalScore = $getPreSelectionMarks + $certificateScore + $row->interview_score;

					$strStudents .=$studentID.",".$fullName.",'".$phoneNo.",".$email.",".$educationStr.",".$districtName.",".$districtName1.",".$districtName2.",".$districtName3.",";
					$strStudents .=$numberExamPerform.",".$getPreSelectionMarks.",".$certificateScore.",".$row->interview_score.",".$totalScore.",".$examTime.",";
					$strStudents .="\n";
				}
			}
		
			header("Content-type: application/vnd.ms-excel");
  			header("Content-disposition: csv; filename=export_selection_students_".date('YmdHis').".csv");
  			print $strStudents;
  			exit;

			//echo "I am here";
		}
		else
		{
			redirect("logout", "Location");
		}
	}








/**
 * @author: Md. Golam Rabbany
 * @email: mgrnahid@gmail.com
 * @description: Pre-Selection Examination Result
 * @copyright 24 Match 2017
 */

	function admittedBulkStudent($startoffset, $limit, $studentID, $studentName, $districtID, $shorting, $marks, $shortingMarksField, $examDate)
	{
		if($this->clogin->is_logged_in())
		{
			$userID = $this->session->userdata('userID');
			$queryList = $this->examinationModel->getStudentPreSelectionExamResultList($startoffset, $limit, $studentID, $studentName, $districtID, $shorting, $marks, $examDate, $shortingMarksField);
            if(is_array($queryList))
            {

                foreach($queryList as $row)
                {
                	$id = $row->idStudent;
                	$marks_achieved = $row->marks_achieved;

                	$creationdate = date('Y-m-d H:i:s');
                	$sqlUpdate = "UPDATE student_info SET allow_traning = 1, selection_score = '$marks_achieved', creationdate = '$creationdate' WHERE id = '$id' AND allow_traning != 1";
                	$queryUpdate = $this->db->query($sqlUpdate);
                }
                redirect("examination/preSelectionExamResult/1", "Location");
            }
            redirect("examination/preSelectionExamResult/0", "Location");    			
		}
		else
		{
			redirect("logout", "Location");
		}
	}



/**
 * @author: Md. Golam Rabbany
 * @email: mgrnahid@gmail.com
 * @description: Pre-Selection Examination Result
 * @copyright 24 Match 2017
 */

	function directAdmission($studentID)
	{
		if($this->clogin->is_logged_in())
		{
			$userID = $this->session->userdata('userID');
			$creationdate = date('Y-m-d H:i:s');
            $sqlUpdate = "UPDATE student_info SET allow_traning = 1, creationdate = '$creationdate' WHERE id = '$studentID'";
            $queryUpdate = $this->db->query($sqlUpdate);
            redirect("examination/preSelectionExamResult/1", "Location");

		}
		else
		{
			redirect("logout", "Location");
		}
	}



/**
 * @author: Md. Golam Rabbany
 * @email: mgrnahid@gmail.com
 * @description: Pre Selection Exam Result List
 * @copyright 24 Match 2017
 */

	function preSelectionStudentExamResult($studentID)
	{
		if($this->clogin->is_logged_in())
		{
			$userID = $this->session->userdata('userID');
			$data['openTag'] = "examination";
			$data['activeTag'] = "selection-exam-result-list";			
			$data['queryList'] = $this->examinationModel->preSelectionExamResult($courseID = 1, $studentID);
			$data['titleErrorMessage'] = "";
			$this->load->view('examination/student_pre_selection_exam_result',$data);
		}
		else
		{
			redirect("logout", "Location");
		}
	}




/**
 * @author: Md. Golam Rabbany
 * @email: mgrnahid@gmail.com
 * @description: View Submitted Exam Result
 * @copyright 24 Match 2017
 */

	function viewSubmittedExamResult($resultID = 0, $examID = 0, $studentID = 0)
	{
		if($this->clogin->is_logged_in())
		{
			$userID = $this->session->userdata('userID');
			$data['openTag'] = "examination";
			$data['activeTag'] = "selection-exam-result-list";

			$data['examID'] = $examID;
			$data['resultID'] = $resultID;
			$data['userID'] = $userID;
			$data['studentID'] = $studentID;
			$data['linkEnable'] = 1;	
			$data['examTestInfo'] = $this->examinationModel->getExamTestResult($resultID, $studentID, $examID);
			$data['passScore'] = $this->generallib->getExamPassScore($examID);
			$data['questionLogCategory'] = $this->examinationModel->getExamResultQuestionsCategory($studentID, $resultID);
			$this->load->view('examination/view_submitted_exam_result',$data); 				
		}
		else
		{
			redirect("logout", "Location");
		}	
	}





}
?>