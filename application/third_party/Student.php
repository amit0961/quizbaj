<?php
class student extends CI_Controller {

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
 * @Start Student Section **********************************************
 ***********************************************************************
*/




/**
 * @author: Md. Golam Rabbany
 * @email: mgrnahid@gmail.com
 * @description: Student List
 * @copyright 24 Match 2017
 */

	function regStudentList($errorMessage=0, $districtID = 'NULL')
	{
		if($this->clogin->is_logged_in())
		{
			$userID = $this->session->userdata('userID');
			$studentID = 'NULL';
			$studentName = 'NULL';
			$startoffset = 0;
			$limit = LIMIT_PERPAGE;
			$idBatch = "NULL";
			$phoneNo = "NULL";
			$statusDate = "NULL";
			$email = "NULL";
			$data['openTag'] = "student";
			$data['activeTag'] = "regStudent-list";
			$data['actionLevel'] = "Reg. Date";
			$data['titleLevel'] = "Registration Students Information";
			$data['titleListLevel'] = "Registration Students List";
			$data['batchList']		= $this->generallib->getBatchList($idBatch);
			$data['districtList']		= $this->generallib->getDistrictList($districtID);

			$data['idBatch'] =$idBatch;
			$data['districtID'] =$districtID;
			$data['studentID'] =$studentID;
			$data['studentName'] =$studentName;
			$data['startoffset'] = $startoffset;
			$data['limit'] = $limit;
			$data['phoneNo'] = $phoneNo;
			$data['statusDate'] = $statusDate;
			$data['email'] = $email;

			$data['total'] = $this->studentModel->getTotalnumRegStudent($studentID, $studentName, $idBatch, $districtID, $phoneNo, $statusDate, $email);
			$data['queryList'] = $this->studentModel->getRegStudentList($startoffset, $limit, $studentID, $studentName, $idBatch, $districtID, $phoneNo, $statusDate, $email);
			if($errorMessage ==-1)
			$data['titleErrorMessage'] = FROMMESSAGE004;
			elseif($errorMessage == 1)
			$data['titleErrorMessage'] = FROMMESSAGE0001;
			elseif($errorMessage == 2)
			$data['titleErrorMessage'] = FROMMESSAGE0002;
			elseif($errorMessage == 3)
			$data['titleErrorMessage'] = FROMMESSAGE0003;
			elseif($errorMessage == 4)
			$data['titleErrorMessage'] = FROMMESSAGE0006;		
			elseif($errorMessage ==24)
			$data['titleErrorMessage'] = FROMMESSAGE024;
			else
			$data['titleErrorMessage'] = "";

			$this->load->view('student/reg_student_list',$data);
		}
		else
		{
			redirect("logout", "Location");
		}
	}




/**
 * @author: Md. Golam Rabbany
 * @email: mgrnahid@gmail.com
 * @description: Student List
 * @copyright 24 Match 2017
 */

	function regStudentListPagination($startoffset, $limit, $studentName, $studentID, $idBatch = "NULL", $districtID = 'NULL', $phoneNo= 'NULL', $statusDate = 'NULL', $email = 'NULL', $myRandom = 0)
	{
		if($this->clogin->is_logged_in())
		{
			$userID = $this->session->userdata('userID');
			$data['openTag'] = "student";
			$data['activeTag'] = "regStudent-list";
			$data['actionLevel'] = "Reg. Date";
			$data['titleLevel'] = "Registration Students Information";
			$data['titleListLevel'] = "Registration Students List";			
			$data['idBatch'] =$idBatch;
			$data['districtID'] =$districtID;
			$data['studentID'] =$studentID;
			$data['studentName'] =$studentName;
			$data['startoffset'] = $startoffset;
			$data['phoneNo'] = $phoneNo;
			$data['statusDate'] = $statusDate;
			$data['email'] = $email;
			$data['limit'] = $limit;
			$data['total'] = $this->studentModel->getTotalnumRegStudent($studentID, $studentName, $idBatch, $districtID, $phoneNo, $statusDate, $email);
			$data['queryList'] = $this->studentModel->getRegStudentList($startoffset, $limit, $studentID, $studentName, $idBatch, $districtID, $phoneNo, $statusDate, $email);
			$data['titleErrorMessage'] = "";
			$this->load->view('student/reg_student_list_pagi',$data);
		}
		else
		{
			redirect("logout", "Location");
		}
	}


/**
 * @author: Md. Golam Rabbany
 * @email: mgrnahid@gmail.com
 * @description: Add/Edit Student Information 
 * @copyright 15 Jan 2017
 */

 
	function addEditStudent()
	{
		if($this->clogin->is_logged_in())
		{
			$userID = $this->session->userdata('userID');
            $id = $this->input->post('id');
            $action = $this->input->post('action');
            $student_id = $this->input->post('student_id');
            $email = $this->input->post('email');
            $phone = $this->input->post('phone');
            $districtIDSearch = $this->input->post('districtIDSearch');
            $districtID = $this->input->post('districtID');
            $allowTraning = $this->input->post('allow_traning');
            $allowTraningOld = $this->input->post('allowTraningOld');

            $config['upload_path'] = './material/student/';
		    $config['allowed_types'] = '*';
			$config['overwrite']  = FALSE;
			$config['encrypt_name']  = TRUE;
			$config['remove_spaces']  = TRUE;
			$this->load->library('upload', $config);
			if ($this->upload->do_upload())
			{
				$dataFile = array('upload_data' => $this->upload->data());
				$fileName = basename($dataFile['upload_data']['full_path']);
			}
			else
			{
				$fileName = 0;	
			}

            if($action=="Add")
            {

               	$checkEmail = $this->studentModel->checkEmailID($email);
               	if($checkEmail == 1)
               	redirect("student/addFormStudent/-7/".$allowTraning.'/'.$districtID, "Location");

               	$checkPhone = $this->studentModel->checkEmailID($phone);
               	if($checkPhone == 1)
               	redirect("student/addFormStudent/-8/".$allowTraning.'/'.$districtID, "Location");

               	if((empty($email)) OR (empty($phone)))
                redirect("student/addFormStudent/-1/".$allowTraning.'/'.$districtID, "Location");


                $insertID = $this->studentModel->addStudent($userID, $fileName);
                // Email Sent //
                if(($insertID) AND ($allowTraning == 2))
                $this->sendSingleEmailPreSelectionTest($insertID);
                redirect("student/studentList/1/".$allowTraning.'/'.$districtID, "Location");	
            }
            else
            {
            	if(($allowTraning == 2) AND ($allowTraningOld !=2))
            	{
            		 $this->sendSingleEmailPreSelectionTest($id);
            	}	
            	$this->studentModel->updateStudent($userID, $fileName);
            	redirect("student/editStudentForm/2/".$id."/".$districtIDSearch, "Location");
            	//redirect("student/regStudentList/2/".$districtIDSearch, "Location");

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
 * @description: Show Edit Form of Student
 * @copyright 16 Jan 2018
 */

	function editStudentForm($errorMesssage = 0, $idElement, $districtID = 'NULL')
	{
		if($this->clogin->is_logged_in())
		{
			$userID = $this->session->userdata('userID');
			$data['openTag'] = "student";
			$data['activeTag'] = "regStudent-list";

			$data['errorMesssage'] = $errorMesssage;

			$editInfo = $this->studentModel->studentEditInfo($idElement);
            if($editInfo==0)
            {
                redirect("student/studentList/0", "Location");
            }
            else
            {
                foreach($editInfo as $row)
                {
					$data['id']		 = $row->id;
					$data['student_id']		 = $row->student_id;
					$data['password']		 = $row->password;
					$data['full_name']		 = $row->full_name;
					$data['father_name']		 = $row->father_name;
					$data['mother_name']		 = $row->mother_name;
					$data['birthday']		 = $row->birthday;
					$data['email']		 = $row->email;
					$data['phone']		 = $row->phone;
					$data['gender']		 = $row->gender;
					$data['nid']		 = $row->nid;
					$data['birth_certificate']		 = $row->birth_certificate;
					$data['education']		 = $row->education;
					$data['current_position']		 = $row->current_position;
					$applicable_you		 = $row->applicable_you;
					$applicable_you_array = explode(',', $applicable_you);
					if(is_array($applicable_you_array))
					{
						$data['applicable_you_1'] = $applicable_you_array[0];
						$data['applicable_you_2'] = $applicable_you_array[1];
						$data['applicable_you_3'] = $applicable_you_array[2];
						$data['applicable_you_4'] = $applicable_you_array[3];
						$data['applicable_you_5'] = $applicable_you_array[4];
						$data['applicable_you_6'] = $applicable_you_array[5];
					}
					else
					{
						$data['applicable_you_1'] = 0;
						$data['applicable_you_2'] = 0;
						$data['applicable_you_3'] = 0;
						$data['applicable_you_4'] = 0;
						$data['applicable_you_5'] = 0;
						$data['applicable_you_6'] = 0;						
					}
					$data['organization']		 = $row->organization;
					$data['designation']		 = $row->designation;
					$data['courseList']		= $this->generallib->getCourseList($row->area_interest);
					$data['divisionList']		= $this->generallib->getDivisionList($row->division_id);
					$data['districtList']		= $this->generallib->getDistrictList($row->district_id);
					$data['districtList2']		= $this->generallib->getDistrictList($row->district2_id);
					$data['districtList3']		= $this->generallib->getDistrictList($row->district3_id);
					$data['upazilaList']		= $this->generallib->getUpazilaList($row->upazila_id);
					$data['address']		 = $row->address;
					$data['address1']		 = $row->address1;
					$data['file_name']		 = $row->file_name;
					$data['allow_traning']		 = $row->allow_traning;
					if($row->selection_score == 0)
					$data['selection_score'] = $this->generallib->getSelectionScore($row->id);
					else	
					$data['selection_score']		 = $row->selection_score;
					if($row->certificate_score == 0)
					{
						if($row->education == 1)
						{
							$certificateScore = 5;
						}
						elseif($row->education == 2)
						{
							$certificateScore = 10;
						}
						elseif($row->education == 3)
						{
							$certificateScore = 15;
						}
						elseif($row->education == 4)
						{
							$certificateScore = 20;
						}
						elseif ($row->education == 5) 
						{
							$certificateScore = 5;
						}
						elseif ($row->education == 6) 
						{
							$certificateScore = 15;
						}
						else
						{
							$certificateScore = 5;
						}
						$data['certificate_score']		 = $certificateScore;
					}
					else	
					$data['certificate_score']		 = $row->certificate_score;

					$data['interview_score']		 = $row->interview_score;
					$data['batchList']		= $this->generallib->getBatchList($row->id_batch);
					$data['status']		 = $row->status;
					$data['action']		= 'Edit';
                }
                $data['districtIDSearch']		 = $districtID;
				if($errorMesssage == 0)
				$data['titleErrorMessage'] = FROMMESSAGE001;
				elseif($errorMesssage== -1)
				$data['titleErrorMessage'] = FROMMESSAGE001;
				elseif($errorMesssage== 2)
				$data['titleErrorMessage'] = FROMMESSAGE0002;			
				else
				$data['titleErrorMessage'] = "";
				$this->load->view('student/student_from',$data);
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
 * @description: Delete all Student Information
 * @copyright 28 March 2017
 */
 
	function deleteStudent($idElement, $districtID)
	{
		set_time_limit(36000);
		if($this->clogin->is_logged_in())
		{
			$userID = $this->session->userdata('userID');
			$this->studentModel->deleteStudentInfo($idElement);
			redirect("student/regStudentList/3/".$districtID, "Location");			
		}
		else
		{
			redirect("logout", "Location");
		}
	}




/**
 * @author: Md. Golam Rabbany
 * @email: mgrnahid@gmail.com
 * @description: Send EMail for Preselction Exam
 * @copyright 28 March 2017
 */


	function sendEmailPreSelectionTest($idBatch, $districtID, $studentID, $studentName, $phoneNo='NULL', $statusDate='NULL', $email = 'NULL')
	{
		if($this->clogin->is_logged_in())
		{
			$userID = $this->session->userdata('userID');
			$data['openTag'] = "student";
			$data['activeTag'] = "student-list";
 	 		$this->load->library('email');
			//SMTP & mail configuration
			$config = array(
    			'protocol'  => 'smtp',
    			'smtp_host' => 'mail.gameanimation.net',
    			'smtp_port' => "26",
    			'smtp_user' => 'noreply@gameanimation.net',
    			'smtp_pass' => 'f@ceb00k.c0m',
    			'mailtype'  => 'html',
    			'charset'   => 'utf-8',
    			'validate'  => FALSE
				);
			$this->email->initialize($config);
			$this->email->set_mailtype("html");
			$this->email->set_newline("\r\n");
			$queryList = $this->studentModel->getRegStudentsForAllowExam($startoffset=0, $limit=15, $studentID, $studentName, $idBatch, $districtID, $phoneNo, $statusDate, $email);
			if(is_array($queryList))
			{
				foreach ($queryList as $row) 
				{
					$idStudent = $row->id;
					$studentID = $row->student_id;
					$fullName = $row->full_name;
					$email = $row->email;
					$password = $row->password;
					$htmlContent = "Dear $fullName,<br><br>
									<b>Congratulation!</b><br/><br/>
									You are preselected for Mobile Game Animation training program. Due to government policy, 
									to start your training program you have to pass eligibility examination test. <br><br>
									Please login below link for eligibility test and enjoy our training program<br><br><hr>
									URL: http://gameanimation.net/login<br>
									Student ID : $studentID <br>
									User Name : $email <br>
									Password : $password <br><br>
									Thanks<br>
									Mobile Game Animation Training";
					$this->email->to($email);
					$this->email->from('noreply@gameanimation.net','Mobile Game Animation Training Program');
					$this->email->subject('Access for Pre-Selection Test');
					$this->email->message($htmlContent);
					//Send email
					$this->email->send();
					$nowTime = date('Y-m-d H:i:s');
					$sqlUpdate = "UPDATE student_info SET allow_traning = 2, status = 1, shortlisted_date = '$nowTime' WHERE id = '$idStudent'";
					$query = $this->db->query($sqlUpdate);
				}
			}
			redirect("student/regStudentList/4/".$districtID, "Location");
		}
		else
		{
			redirect("logout", "Location");
		}
	}




/**
 * @author: Md. Golam Rabbany
 * @email: mgrnahid@gmail.com
 * @description: Send EMail for Preselction Exam
 * @copyright 28 March 2017
 */


	function exportRegStudentInfo($studentName, $studentID, $idBatch = "NULL", $districtID = 'NULL', $phoneNo= 'NULL', $statusDate = 'NULL', $email = 'NULL', $myRandom = 0)
	{
		set_time_limit(600000);
		if($this->clogin->is_logged_in())
		{
			$userID = $this->session->userdata('userID');
			$data['openTag'] = "student";
			$data['activeTag'] = "student-list";
	
			$fileName = "Export_Students_".date('YmdHis').".csv";
			$strStudents = "STD ID, Name, Phone, Email, Address, Education, Location, 1st Preference, 2nd Preference, 3rd preference, Attempt, Exam Score, Certification Score, Interview Score, Total Score, Signup Date, Shortlisted Date, Admission Date"."\n";
			$queryList = $this->studentModel->getRegStudentList($startoffset = 0, $limit = 50000, $studentID, $studentName, $idBatch, $districtID, $phoneNo, $statusDate, $email);

			if(is_array($queryList))
			{
				foreach ($queryList as $row) 
				{
					$idStudent = $row->id;
					$studentID = $row->student_id;
					$fullName = $row->full_name;
					$email = $row->email;
					$education = $row->education;
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

					$phoneNoStr = str_replace("-", "", $row->phone);
					if(strlen($phoneNoStr) == 11)
					$phoneNo = "88".$phoneNoStr;
					else
					$phoneNo = $phoneNoStr;	

					$districtName = $this->generallib->getDistrictName($row->district_id);
					$districtName1 = $this->generallib->getDistrictName($row->district1_id);
					$districtName2 = $this->generallib->getDistrictName($row->district2_id);
					$districtName3 = $this->generallib->getDistrictName($row->district3_id);
                    $numberExamPerform = $this->generallib->getCountExamPerfrom($row->student_id);
                    if($numberExamPerform > 3)
                    $numberExamPerform = 3;

                    $selectionScore = $this->generallib->studentSelectionScore($row->id);
                    //$selectionScore = 0;
                    $totalScore =  $selectionScore + $row->certificate_score + $row->interview_score;
                    $signupDate = $row->creationdate;
                    $shortlistedDate = $row->shortlisted_date;
                    $admissionDate = $row->admission_date;
                    $address = str_replace(",", " ", $row->address);


					$strStudents .=$studentID.",".$fullName.",'".$phoneNo.",".$email.",".$address.",".$educationStr.",".$districtName.",".$districtName1.",".$districtName2.",".$districtName3.",";
					$strStudents .=$numberExamPerform.",".$selectionScore.",".$row->certificate_score.",".$row->interview_score.",".$totalScore.",".$signupDate.",";
					$strStudents .=$shortlistedDate.",".$admissionDate."\n";
				}
			}

			header("Content-type: application/vnd.ms-excel");
  			header("Content-disposition: csv; filename=".$fileName);
  			print $strStudents;
  			exit;
		}
		else
		{
			redirect("logout", "Location");
		}
	}




/**
 * @author: Md. Golam Rabbany
 * @email: mgrnahid@gmail.com
 * @description: Student List
 * @copyright 24 Match 2017
 */

	function enlistedStudentList($errorMessage=0, $districtID = 'NULL')
	{
		if($this->clogin->is_logged_in())
		{
			$userID = $this->session->userdata('userID');
			$studentID = 'NULL';
			$studentName = 'NULL';
			$startoffset = 0;
			$limit = LIMIT_PERPAGE;
			$idBatch = "NULL";
			$phoneNo = "NULL";
			$statusDate = "NULL";
			$email = "NULL";
			$data['openTag'] = "student";
			$data['activeTag'] = "enlisted-list";
			$data['actionLevel'] = "Enlisted Date";
			$data['titleLevel'] = "Enlisted Students Information";
			$data['titleListLevel'] = "Enlisted Students List";
			$data['batchList']		= $this->generallib->getBatchList($idBatch);
			$data['districtList']		= $this->generallib->getDistrictList($districtID);

			$data['idBatch'] =$idBatch;
			$data['districtID'] =$districtID;
			$data['studentID'] =$studentID;
			$data['studentName'] =$studentName;
			$data['startoffset'] = $startoffset;
			$data['limit'] = $limit;
			$data['phoneNo'] = $phoneNo;
			$data['statusDate'] = $statusDate;
			$data['email'] = $email;

			$data['total'] = $this->studentModel->getTotalnumEnlistedStudent($studentID, $studentName, $idBatch, $districtID, $phoneNo, $statusDate, $email);
			$data['queryList'] = $this->studentModel->getEnlistedStudentList($startoffset, $limit, $studentID, $studentName, $idBatch, $districtID, $phoneNo, $statusDate, $email);
			if($errorMessage ==-1)
			$data['titleErrorMessage'] = FROMMESSAGE004;
			elseif($errorMessage == 1)
			$data['titleErrorMessage'] = FROMMESSAGE0001;
			elseif($errorMessage == 2)
			$data['titleErrorMessage'] = FROMMESSAGE0002;
			elseif($errorMessage == 3)
			$data['titleErrorMessage'] = FROMMESSAGE0003;
			elseif($errorMessage == 4)
			$data['titleErrorMessage'] = FROMMESSAGE0006;		
			elseif($errorMessage ==24)
			$data['titleErrorMessage'] = FROMMESSAGE024;
			else
			$data['titleErrorMessage'] = "";

			$this->load->view('student/enlisted_student_list',$data);
		}
		else
		{
			redirect("logout", "Location");
		}
	}




/**
 * @author: Md. Golam Rabbany
 * @email: mgrnahid@gmail.com
 * @description: Student List
 * @copyright 24 Match 2017
 */

	function enlistedStudentListPagination($startoffset, $limit, $studentName, $studentID, $idBatch = "NULL", $districtID = 'NULL', $phoneNo= 'NULL', $statusDate = 'NULL', $email = 'NULL', $myRandom = 0)
	{
		if($this->clogin->is_logged_in())
		{
			$userID = $this->session->userdata('userID');
			$data['openTag'] = "student";
			$data['activeTag'] = "enlisted-list";
			$data['actionLevel'] = "Enlisted Date";
			$data['titleLevel'] = "Enlisted Students Information";
			$data['titleListLevel'] = "Enlisted Students List";
			$data['idBatch'] =$idBatch;
			$data['districtID'] =$districtID;
			$data['studentID'] =$studentID;
			$data['studentName'] =$studentName;
			$data['startoffset'] = $startoffset;
			$data['phoneNo'] = $phoneNo;
			$data['statusDate'] = $statusDate;
			$data['email'] = $email;
			$data['limit'] = $limit;

			$data['total'] = $this->studentModel->getTotalnumEnlistedStudent($studentID, $studentName, $idBatch, $districtID, $phoneNo, $statusDate, $email);
			$data['queryList'] = $this->studentModel->getEnlistedStudentList($startoffset, $limit, $studentID, $studentName, $idBatch, $districtID, $phoneNo, $statusDate, $email);
			$data['titleErrorMessage'] = "";
			$this->load->view('student/enlisted_student_list_pagi',$data);
		}
		else
		{
			redirect("logout", "Location");
		}
	}





/**
 * @author: Md. Golam Rabbany
 * @email: mgrnahid@gmail.com
 * @description: Send EMail for Preselction Exam
 * @copyright 28 March 2017
 */


	function exportEnlistedStudentInfo($studentName, $studentID, $idBatch = "NULL", $districtID = 'NULL', $phoneNo= 'NULL', $statusDate = 'NULL', $email = 'NULL', $myRandom = 0)
	{
		set_time_limit(600000);
		if($this->clogin->is_logged_in())
		{
			$userID = $this->session->userdata('userID');
			$data['openTag'] = "student";
			$data['activeTag'] = "student-list";
	
			$fileName = "Export_Students_".date('YmdHis').".csv";
			$strStudents = "STD ID, Name, Phone, Email, Address, Education, Location, 1st Preference, 2nd Preference, 3rd preference, Attempt, Exam Score, Certification Score, Interview Score, Total Score, Signup Date, Shortlisted Date, Admission Date"."\n";
			$queryList = $this->studentModel->getEnlistedStudentList($startoffset = 0, $limit = 50000, $studentID, $studentName, $idBatch, $districtID, $phoneNo, $statusDate, $email);

			if(is_array($queryList))
			{
				foreach ($queryList as $row) 
				{
					$idStudent = $row->id;
					$studentID = $row->student_id;
					$fullName = $row->full_name;
					$email = $row->email;
					$education = $row->education;
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

					$phoneNoStr = str_replace("-", "", $row->phone);
					if(strlen($phoneNoStr) == 11)
					$phoneNo = "88".$phoneNoStr;
					else
					$phoneNo = $phoneNoStr;	

					$districtName = $this->generallib->getDistrictName($row->district_id);
					$districtName1 = $this->generallib->getDistrictName($row->district1_id);
					$districtName2 = $this->generallib->getDistrictName($row->district2_id);
					$districtName3 = $this->generallib->getDistrictName($row->district3_id);
                    $numberExamPerform = $this->generallib->getCountExamPerfrom($row->student_id);
                    if($numberExamPerform > 3)
                    $numberExamPerform = 3;

                    $selectionScore = $this->generallib->studentSelectionScore($row->id);
                    //$selectionScore = 0;
                    $totalScore =  $selectionScore + $row->certificate_score + $row->interview_score;
                    $signupDate = $row->creationdate;
                    $shortlistedDate = $row->shortlisted_date;
                    $admissionDate = $row->admission_date;
                    $address = str_replace(",", " ", $row->address);


					$strStudents .=$studentID.",".$fullName.",'".$phoneNo.",".$email.",".$address.",".$educationStr.",".$districtName.",".$districtName1.",".$districtName2.",".$districtName3.",";
					$strStudents .=$numberExamPerform.",".$selectionScore.",".$row->certificate_score.",".$row->interview_score.",".$totalScore.",".$signupDate.",";
					$strStudents .=$shortlistedDate.",".$admissionDate."\n";
				}
			}

			header("Content-type: application/vnd.ms-excel");
  			header("Content-disposition: csv; filename=".$fileName);
  			print $strStudents;
  			exit;
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

	function enrolledStudentList($errorMessage=0, $districtID = 'NULL')
	{
		if($this->clogin->is_logged_in())
		{
			$userID = $this->session->userdata('userID');

			$studentID = 'NULL';
			$studentName = 'NULL';
			$startoffset = 0;
			$limit = LIMIT_PERPAGE;
			$idBatch = "NULL";
			$phoneNo = "NULL";
			$statusDate = "NULL";
			$email = "NULL";
			$data['openTag'] = "student";
			$data['activeTag'] = "enrolled-list";
			$data['actionLevel'] = "Enrolled Date";
			$data['titleLevel'] = "Enrolled Students Information";
			$data['titleListLevel'] = "Enrolled Students List";
			$data['batchList']		= $this->generallib->getBatchList($idBatch);
			$data['districtList']		= $this->generallib->getDistrictList($districtID);

			$data['idBatch'] =$idBatch;
			$data['districtID'] =$districtID;
			$data['studentID'] =$studentID;
			$data['studentName'] =$studentName;
			$data['startoffset'] = $startoffset;
			$data['limit'] = $limit;
			$data['phoneNo'] = $phoneNo;
			$data['statusDate'] = $statusDate;
			$data['email'] = $email;

			$data['total'] = $this->studentModel->getTotalnumEnrolledStudent($studentID, $studentName, $idBatch, $districtID, $phoneNo, $statusDate, $email);
			$data['queryList'] = $this->studentModel->getEnrolledStudentList($startoffset, $limit, $studentID, $studentName, $idBatch, $districtID, $phoneNo, $statusDate, $email);
			//$data['queryList'] = 0;

			if($errorMessage == 1)
			$data['titleErrorMessage'] = FROMMESSAGE0009;
			else
			$data['titleErrorMessage'] = "";

			$this->load->view('student/enrolled_student_list',$data);
		}
		else
		{
			redirect("logout", "Location");
		}
	}



/**
 * @author: Md. Golam Rabbany
 * @email: mgrnahid@gmail.com
 * @description: Student List
 * @copyright 24 Match 2017
 */

	function enrolledStudentListPagination($startoffset, $limit, $studentName, $studentID, $idBatch = "NULL", $districtID = 'NULL', $phoneNo= 'NULL', $statusDate = 'NULL', $email = 'NULL', $myRandom = 0)
	{
		if($this->clogin->is_logged_in())
		{
			$userID = $this->session->userdata('userID');
			$data['openTag'] = "student";
			$data['activeTag'] = "enrolled-list";
			$data['actionLevel'] = "Enrolled Date";
			$data['titleLevel'] = "Enrolled Students Information";
			$data['titleListLevel'] = "Enrolled Students List";
			$data['idBatch'] =$idBatch;
			$data['districtID'] =$districtID;
			$data['studentID'] =$studentID;
			$data['studentName'] =$studentName;
			$data['startoffset'] = $startoffset;
			$data['phoneNo'] = $phoneNo;
			$data['statusDate'] = $statusDate;
			$data['email'] = $email;
			$data['limit'] = $limit;

			$data['total'] = $this->studentModel->getTotalnumEnrolledStudent($studentID, $studentName, $idBatch, $districtID, $phoneNo, $statusDate, $email);
			$data['queryList'] = $this->studentModel->getEnrolledStudentList($startoffset, $limit, $studentID, $studentName, $idBatch, $districtID, $phoneNo, $statusDate, $email);
			$data['titleErrorMessage'] = "";
			$this->load->view('student/enrolled_student_list_pagi',$data);
		}
		else
		{
			redirect("logout", "Location");
		}
	}



/**
 * @author: Md. Golam Rabbany
 * @email: mgrnahid@gmail.com
 * @description: Send EMail for Preselction Exam
 * @copyright 28 March 2017
 */


	function exportEnrolledStudentInfo($studentName, $studentID, $idBatch = "NULL", $districtID = 'NULL', $phoneNo= 'NULL', $statusDate = 'NULL', $email = 'NULL', $myRandom = 0)
	{
		set_time_limit(600000);
		if($this->clogin->is_logged_in())
		{
			$userID = $this->session->userdata('userID');
			$data['openTag'] = "student";
			$data['activeTag'] = "student-list";
	
			$fileName = "Export_Students_".date('YmdHis').".csv";
			$strStudents = "STD ID, Batch ID, Name, Phone, Email, Education, Location, 1st Preference, 2nd Preference, 3rd preference, Attempt, Exam Score, Certification Score, Interview Score, Total Score, Signup Date, Shortlisted Date, Admission Date"."\n";
			$queryList = $this->studentModel->getEnrolledStudentList($startoffset = 0, $limit = 10000, $studentID, $studentName, $idBatch, $districtID, $phoneNo, $statusDate, $email);

			if(is_array($queryList))
			{
				foreach ($queryList as $row) 
				{
					$idStudent = $row->idStudent;
					$studentID = $row->student_id;
					$fullName = $row->full_name;
					$email = $row->email;
					$education = $row->education;
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

					$phoneNoStr = str_replace("-", "", $row->phone);
					if(strlen($phoneNoStr) == 11)
					$phoneNo = "88".$phoneNoStr;
					else
					$phoneNo = $phoneNoStr;	

					$batchID = $this->generallib->getBatchID($row->id_batch);

					$districtName = $this->generallib->getDistrictName($row->district_id);
					$districtName1 = $this->generallib->getDistrictName($row->district1_id);
					$districtName2 = $this->generallib->getDistrictName($row->district2_id);
					$districtName3 = $this->generallib->getDistrictName($row->district3_id);
                    $numberExamPerform = $this->generallib->getCountExamPerfrom($row->student_id);
                    if($numberExamPerform > 3)
                    $numberExamPerform = 3;

                    $selectionScore = $this->generallib->studentSelectionScore($row->idStudent);
                    //$selectionScore = 0;
                    $totalScore =  $selectionScore + $row->certificate_score + $row->interview_score;
                    $signupDate = $row->creationdate;
                    $shortlistedDate = $row->shortlisted_date;
                    $admissionDate = $row->admission_date;


					$strStudents .=$studentID.",".$batchID.",".$fullName.",'".$phoneNo.",".$email.",".$educationStr.",".$districtName.",".$districtName1.",".$districtName2.",".$districtName3.",";
					$strStudents .=$numberExamPerform.",".$selectionScore.",".$row->certificate_score.",".$row->interview_score.",".$totalScore.",".$signupDate.",";
					$strStudents .=$shortlistedDate.",".$admissionDate."\n";
				}
			}

			header("Content-type: application/vnd.ms-excel");
  			header("Content-disposition: csv; filename=".$fileName);
  			print $strStudents;
  			exit;
		}
		else
		{
			redirect("logout", "Location");
		}
	}




/**
 * @author: Md. Golam Rabbany
 * @email: mgrnahid@gmail.com
 * @description: Student List
 * @copyright 24 Match 2017
 */

	function admittedStudentList($errorMessage=0, $districtID = 'NULL')
	{
		if($this->clogin->is_logged_in())
		{
			$userID = $this->session->userdata('userID');
			$studentID = 'NULL';
			$studentName = 'NULL';
			$startoffset = 0;
			$limit = LIMIT_PERPAGE;
			$idBatch = "NULL";
			$phoneNo = "NULL";
			$statusDate = "NULL";
			$email = "NULL";
			$data['openTag'] = "student";
			$data['activeTag'] = "admitted-list";
			$data['actionLevel'] = "Admitted Date";
			$data['titleLevel'] = "Admitted Students Information";
			$data['titleListLevel'] = "Admitted Students List";
			$data['batchList']		= $this->generallib->getBatchList($idBatch);
			$data['districtList']		= $this->generallib->getDistrictList($districtID);

			$data['idBatch'] =$idBatch;
			$data['districtID'] =$districtID;
			$data['studentID'] =$studentID;
			$data['studentName'] =$studentName;
			$data['startoffset'] = $startoffset;
			$data['limit'] = $limit;
			$data['phoneNo'] = $phoneNo;
			$data['statusDate'] = $statusDate;
			$data['email'] = $email;

			$data['total'] = $this->studentModel->getTotalnumAdmittedStudent($studentID, $studentName, $idBatch, $districtID, $phoneNo, $statusDate, $email);
			$data['queryList'] = $this->studentModel->getAdmittedStudentList($startoffset, $limit, $studentID, $studentName, $idBatch, $districtID, $phoneNo, $statusDate, $email);
			if($errorMessage ==-1)
			$data['titleErrorMessage'] = FROMMESSAGE004;
			elseif($errorMessage == 1)
			$data['titleErrorMessage'] = FROMMESSAGE0001;
			elseif($errorMessage == 2)
			$data['titleErrorMessage'] = FROMMESSAGE0002;
			elseif($errorMessage == 3)
			$data['titleErrorMessage'] = FROMMESSAGE0003;
			elseif($errorMessage == 4)
			$data['titleErrorMessage'] = FROMMESSAGE0006;		
			elseif($errorMessage ==24)
			$data['titleErrorMessage'] = FROMMESSAGE024;
			else
			$data['titleErrorMessage'] = "";

			$this->load->view('student/admitted_student_list',$data);
		}
		else
		{
			redirect("logout", "Location");
		}
	}





/**
 * @author: Md. Golam Rabbany
 * @email: mgrnahid@gmail.com
 * @description: Student List
 * @copyright 24 Match 2017
 */

	function admittedStudentListPagination($startoffset, $limit, $studentName, $studentID, $idBatch = "NULL", $districtID = 'NULL', $phoneNo= 'NULL', $statusDate = 'NULL', $email = 'NULL', $myRandom = 0)
	{
		if($this->clogin->is_logged_in())
		{
			$userID = $this->session->userdata('userID');
			$data['openTag'] = "student";
			$data['activeTag'] = "admitted-list";
			$data['actionLevel'] = "Admitted Date";
			$data['titleLevel'] = "Admitted Students Information";
			$data['titleListLevel'] = "Admitted Students List";
			$data['idBatch'] =$idBatch;
			$data['districtID'] =$districtID;
			$data['studentID'] =$studentID;
			$data['studentName'] =$studentName;
			$data['startoffset'] = $startoffset;
			$data['phoneNo'] = $phoneNo;
			$data['statusDate'] = $statusDate;
			$data['email'] = $email;
			$data['limit'] = $limit;

			$data['total'] = $this->studentModel->getTotalnumAdmittedStudent($studentID, $studentName, $idBatch, $districtID, $phoneNo, $statusDate, $email);
			$data['queryList'] = $this->studentModel->getAdmittedStudentList($startoffset, $limit, $studentID, $studentName, $idBatch, $districtID, $phoneNo, $statusDate, $email);
			$data['titleErrorMessage'] = "";
			$this->load->view('student/admitted_student_list_pagi',$data);
		}
		else
		{
			redirect("logout", "Location");
		}
	}




/**
 * @author: Md. Golam Rabbany
 * @email: mgrnahid@gmail.com
 * @description: Send EMail for Preselction Exam
 * @copyright 28 March 2017
 */


	function exportAdmittedStudentInfo($studentName, $studentID, $idBatch = "NULL", $districtID = 'NULL', $phoneNo= 'NULL', $statusDate = 'NULL', $email = 'NULL', $myRandom = 0)
	{
		set_time_limit(600000);
		if($this->clogin->is_logged_in())
		{
			$userID = $this->session->userdata('userID');
			$data['openTag'] = "student";
			$data['activeTag'] = "student-list";
	
			$fileName = "Export_Students_".date('YmdHis').".csv";
			$strStudents = "STD ID, Name, Phone, Email, Education, Location, 1st Preference, 2nd Preference, 3rd preference, Attempt, Exam Score, Certification Score, Interview Score, Total Score, Signup Date, Shortlisted Date, Admission Date"."\n";
			$queryList = $this->studentModel->getAdmittedStudentList($startoffset = 0, $limit = 50000, $studentID, $studentName, $idBatch, $districtID, $phoneNo, $statusDate, $email);

			if(is_array($queryList))
			{
				foreach ($queryList as $row) 
				{
					$idStudent = $row->id;
					$studentID = $row->student_id;
					$fullName = $row->full_name;
					$email = $row->email;
					$education = $row->education;
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

					$phoneNoStr = str_replace("-", "", $row->phone);
					if(strlen($phoneNoStr) == 11)
					$phoneNo = "88".$phoneNoStr;
					else
					$phoneNo = $phoneNoStr;	

					$districtName = $this->generallib->getDistrictName($row->district_id);
					$districtName1 = $this->generallib->getDistrictName($row->district1_id);
					$districtName2 = $this->generallib->getDistrictName($row->district2_id);
					$districtName3 = $this->generallib->getDistrictName($row->district3_id);
                    $numberExamPerform = $this->generallib->getCountExamPerfrom($row->student_id);
                    if($numberExamPerform > 3)
                    $numberExamPerform = 3;

                    $selectionScore = $this->generallib->studentSelectionScore($row->id);
                    //$selectionScore = 0;
                    $totalScore =  $selectionScore + $row->certificate_score + $row->interview_score;
                    $signupDate = $row->creationdate;
                    $shortlistedDate = $row->shortlisted_date;
                    $admissionDate = $row->admission_date;


					$strStudents .=$studentID.",".$fullName.",'".$phoneNo.",".$email.",".$educationStr.",".$districtName.",".$districtName1.",".$districtName2.",".$districtName3.",";
					$strStudents .=$numberExamPerform.",".$selectionScore.",".$row->certificate_score.",".$row->interview_score.",".$totalScore.",".$signupDate.",";
					$strStudents .=$shortlistedDate.",".$admissionDate."\n";
				}
			}

			header("Content-type: application/vnd.ms-excel");
  			header("Content-disposition: csv; filename=".$fileName);
  			print $strStudents;
  			exit;
		}
		else
		{
			redirect("logout", "Location");
		}
	}































































































/**
 * @author: Md. Golam Rabbany
 * @email: mgrnahid@gmail.com
 * @description: Student List
 * @copyright 24 Match 2017
 */

	function studentList($errorMessage=0, $isAdmitted = 0, $districtID = 'NULL')
	{
		if($this->clogin->is_logged_in())
		{
			$userID = $this->session->userdata('userID');

			$studentID = 'NULL';
			$studentName = 'NULL';
			$startoffset = 0;
			$limit = LIMIT_PERPAGE;
			$idBatch = "NULL";
			$phoneNo = "NULL";
			$statusDate = "NULL";
			$email = "NULL";
			//$districtID = "NULL";
			$data['openTag'] = "student";
			if($isAdmitted == 0)
			$data['activeTag'] = "student-list";
			elseif($isAdmitted == 2)
			$data['activeTag'] = "sstudent-list";		
			else
			$data['activeTag'] = "astudent-list";

			if($isAdmitted == 0)
			{		
				$data['actionLevel'] = "Reg. Date";
				$data['titleLevel'] = "Registration Students Information";
				$data['titleListLevel'] = "Registration Students List";
			}	
			elseif ($isAdmitted == 1) 
			{
				$data['actionLevel'] = "Enrolled Date";
				$data['titleLevel'] = "Enrolled Students Information";
				$data['titleListLevel'] = "Enrolled Students List";
			}
			elseif ($isAdmitted == 2) 
			{
				$data['actionLevel'] = "Enlisted Date";
				$data['titleLevel'] = "Enlisted Students Information";
				$data['titleListLevel'] = "Enlisted Students List";
			}
			else
			{
				$data['actionLevel'] = "Reg. Date";
				$data['titleLevel'] = "Registration Students Information";
				$data['titleListLevel'] = "Registration Students List";
			}				

			$data['batchList']		= $this->generallib->getBatchList($idBatch);
			$data['districtList']		= $this->generallib->getDistrictList($districtID);

			$data['isAdmitted'] =$isAdmitted;
			$data['idBatch'] =$idBatch;
			$data['districtID'] =$districtID;
			$data['studentID'] =$studentID;
			$data['studentName'] =$studentName;
			$data['startoffset'] = $startoffset;
			$data['limit'] = $limit;
			$data['phoneNo'] = $phoneNo;
			$data['statusDate'] = $statusDate;
			$data['email'] = $email;

			$data['total'] = $this->studentModel->getTotalnumStudent($studentID, $studentName, $isAdmitted, $idBatch, $districtID, $phoneNo, $statusDate, $email);
			$data['queryList'] = $this->studentModel->getStudentList($startoffset, $limit, $studentID, $studentName, $isAdmitted, $idBatch, $districtID, $phoneNo, $statusDate, $email);
			if($errorMessage ==-1)
			$data['titleErrorMessage'] = FROMMESSAGE004;
			elseif($errorMessage == 1)
			$data['titleErrorMessage'] = FROMMESSAGE0001;
			elseif($errorMessage == 2)
			$data['titleErrorMessage'] = FROMMESSAGE0002;
			elseif($errorMessage == 3)
			$data['titleErrorMessage'] = FROMMESSAGE0003;
			elseif($errorMessage == 4)
			$data['titleErrorMessage'] = FROMMESSAGE0006;		
			elseif($errorMessage ==24)
			$data['titleErrorMessage'] = FROMMESSAGE024;
			else
			$data['titleErrorMessage'] = "";

			$this->load->view('student/student_list',$data);
		}
		else
		{
			redirect("logout", "Location");
		}
	}



/**
 * @author: Md. Golam Rabbany
 * @email: mgrnahid@gmail.com
 * @description: Student List
 * @copyright 24 Match 2017
 */

	function studentListPagination($startoffset, $limit, $studentName, $studentID, $isAdmitted = 0, $idBatch = "NULL", $districtID = 'NULL', $phoneNo= 'NULL', $statusDate = 'NULL', $email = 'NULL', $myRandom = 0)
	{
		if($this->clogin->is_logged_in())
		{
			$userID = $this->session->userdata('userID');
			$data['openTag'] = "student";
			$data['activeTag'] = "student-list";

			$data['isAdmitted'] =$isAdmitted;
			$data['idBatch'] =$idBatch;
			$data['districtID'] =$districtID;
			$data['studentID'] =$studentID;
			$data['studentName'] =$studentName;
			$data['startoffset'] = $startoffset;
			$data['phoneNo'] = $phoneNo;
			$data['statusDate'] = $statusDate;
			$data['email'] = $email;
			$data['limit'] = $limit;

			if($isAdmitted == 0)
			{		
				$data['actionLevel'] = "Reg. Date";
				$data['titleLevel'] = "Registration Students Information";
				$data['titleListLevel'] = "Registration Students List";
			}	
			elseif ($isAdmitted == 1) 
			{
				$data['actionLevel'] = "Enrolled Date";
				$data['titleLevel'] = "Enrolled Students Information";
				$data['titleListLevel'] = "Enrolled Students List";
			}
			elseif ($isAdmitted == 2) 
			{
				$data['actionLevel'] = "Enlisted Date";
				$data['titleLevel'] = "Enlisted Students Information";
				$data['titleListLevel'] = "Enlisted Students List";
			}
			else
			{
				$data['actionLevel'] = "Reg. Date";
				$data['titleLevel'] = "Registration Students Information";
				$data['titleListLevel'] = "Registration Students List";
			}	

			$data['total'] = $this->studentModel->getTotalnumStudent($studentID, $studentName, $isAdmitted, $idBatch, $districtID, $phoneNo, $statusDate, $email);
			$data['queryList'] = $this->studentModel->getStudentList($startoffset, $limit, $studentID, $studentName, $isAdmitted, $idBatch, $districtID, $phoneNo, $statusDate, $email);
			$data['titleErrorMessage'] = "";
			$this->load->view('student/student_list_pagi',$data);
		}
		else
		{
			redirect("logout", "Location");
		}
	}



/**
 * @author: Md. Golam Rabbany
 * @email: mgrnahid@gmail.com
 * @description: Show Add Form of Student
 * @copyright 14 Jan 2017
 */
 
	function addFormStudent($errorMesssage = 0, $isAdmitted = 0, $districtID = 0)
	{
		if($this->clogin->is_logged_in())
		{
			$userID = $this->session->userdata('userID');
			$data['openTag'] = "student";
			if($isAdmitted == 0)
			$data['activeTag'] = "student-list";
			elseif($isAdmitted == 2)
			$data['activeTag'] = "sstudent-list";		
			else
			$data['activeTag'] = "astudent-list";

			$data['id']		= "";	
			$data['student_id']		= "DONT CHANGE";
			$data['password']		= "";
			$data['full_name']		= "";
			$data['father_name']		= "";
			$data['mother_name']		= "";
			$data['birthday']		= "";
			$data['email']		= "";
			$data['phone']		= "";
			$data['gender']		= "M";
			$data['nid'] = "";
			$data['birth_certificate'] = "";
			$data['education'] = "NULL";
			$data['current_position'] = 2;
			$data['applicable_you_1'] = 0;
			$data['applicable_you_2'] = 0;
			$data['applicable_you_3'] = 0;
			$data['applicable_you_4'] = 0;
			$data['applicable_you_5'] = 0;
			$data['applicable_you_6'] = 0;
			$data['organization']		= "";
			$data['designation']		= "";
			$data['courseList']		= $this->generallib->getCourseList($courseID = 0);
			//$data['divisionList']		= $this->generallib->getDivisionList($divisionID = 0);
			$data['districtList']		= $this->generallib->getDistrictList($districtID);
			$data['districtList2']		= $this->generallib->getDistrictList($districtID2 = 0);
			$data['districtList3']		= $this->generallib->getDistrictList($districtID3 = 0);
			//$data['upazilaList']		= $this->generallib->getUpazilaList($upazilaID = 0);
			$data['batchList']		= $this->generallib->getBatchList($idBatch = 0);
			$data['address']		= "";
			$data['address1']		= "";
			$data['file_name']		= "";
			$data['allow_traning']		= $isAdmitted;
			$data['allowPreselectionTestOld']		= 0;
			$data['selection_score'] = "0.00";
			$data['certificate_score'] = "0.00";
			$data['interview_score'] = "0.00";
			$data['status']		= 1;
			$data['action']		= 'Add';
			$data['isAdmitted']		= $isAdmitted;
			$data['errorMesssage']		= $errorMesssage;
			
			if($errorMesssage==0)
			$data['titleErrorMessage'] = FROMMESSAGE001;
			elseif($errorMesssage==-1)
			$data['titleErrorMessage'] = FROMMESSAGE001;
			elseif($errorMesssage==-2)
			$data['titleErrorMessage'] = FROMMESSAGE002;
			elseif($errorMesssage==-7)
			$data['titleErrorMessage'] = FROMMESSAGE007;
			elseif($errorMesssage==-8)
			$data['titleErrorMessage'] = FROMMESSAGE008;		
			else
			$data['titleErrorMessage'] = "";
			$this->load->view('student/student_from',$data);
		}
		else
		{
			redirect("logout", "Location");
		}
	}





 












/**
 * @author: Md. Golam Rabbany
 * @email: mgrnahid@gmail.com
 * @description: Send EMail for Preselction Exam
 * @copyright 28 March 2017
 */


	function sendEmailPreSelectionTestAuto($isAdmitted=0, $idBatch='NULL', $districtID='NULL', $studentID='NULL', $studentName='NULL', $phoneNo='NULL', $statusDate='NULL')
	{
		//if($this->clogin->is_logged_in())
		//{
			date_default_timezone_set("Asia/Dhaka");
			$userID = $this->session->userdata('userID');
			$data['openTag'] = "student";
			$data['activeTag'] = "student-list";
 	 		$this->load->library('email');
 	 		
			
			$fromEmail = "gameanimation2018@gmail.com";
			$config = array(
    		'protocol'  => 'TLS',
    		'smtp_host' => 'ssl://smtp.gmail.com',
    		'smtp_port' => 587,
    		'smtp_user' => 'gameanimation2018@gmail.com',
    		'smtp_pass' => 'n0@ccess4U',
    		'auth' => true,
    		'mailtype'  => 'html',
    		'charset'   => 'utf-8'
			);
			
			/*
			$fromEmail = "gameanimation012018@gmail.com";
			$config = array(
    		'protocol'  => 'TLS',
    		'smtp_host' => 'ssl://smtp.gmail.com',
    		'smtp_port' => 587,
    		'smtp_user' => 'gameanimation012018@gmail.com',
    		'smtp_pass' => 'n0@ccess4U',
    		'auth' => true,
    		'mailtype'  => 'html',
    		'charset'   => 'utf-8'
			);
			*/
			/*
			$config = array(
    			'protocol'  => 'smtp',
    			'smtp_host' => 'mail.gameanimation.net',
    			'smtp_port' => "26",
    			'smtp_user' => 'noreply@gameanimation.net',
    			'smtp_pass' => 'f@ceb00k.c0m',
    			'mailtype'  => 'html',
    			'charset'   => 'utf-8',
    			'validate'  => FALSE
				);
			*/	
			$this->email->initialize($config);
			$this->email->set_mailtype("html");
			$this->email->set_newline("\r\n");

			$queryList = $this->studentModel->getStudentListAuto($startoffset=0, $limit=25, $studentID, $studentName, $isAdmitted, $idBatch, $districtID, $phoneNo, $statusDate);
			if(is_array($queryList))
			{
				foreach ($queryList as $row) 
				{
					$idStudent = $row->id;
					$studentID = $row->student_id;
					$fullName = $row->full_name;
					$email = $row->email;
					//$email = "mgrnahid@gmail.com";
					$password = $row->password;
					$htmlContent = "Dear $fullName,<br><br>
									<b>Congratulation!</b><br/><br/>
									You are preselected for Mobile Game Animation training program. Due to government policy, 
									to start your training program you have to pass eligibility examination test. <br><br>
									Please login below link for eligibility test and enjoy our training program<br><br><hr>
									URL: http://gameanimation.net/login<br>
									Student ID : $studentID <br>
									User Name : $email <br>
									Password : $password <br><br>
									Thanks<br>
									Mobile Game Animation Training";
					$this->email->to($email);
					$this->email->reply_to($fromEmail);
					$this->email->from($fromEmail,'Mobile Game Animation Training Program');
					$this->email->bcc($fromEmail);
					$this->email->subject('Access for Pre-Selection Test');
					$this->email->message($htmlContent);
					//Send email
					$this->email->send();
					$nowTime = date('Y-m-d H:i:s');
					echo $sqlUpdate = "UPDATE student_info SET allow_traning = 2, status = 1, shortlisted_date = '$nowTime' WHERE id = '$idStudent'";
					$query = $this->db->query($sqlUpdate);
					//echo $this->email->print_debugger(array('headers'));
					sleep(1);
					echo "<br>";
				}
			}
			//redirect("student/studentList/4/0/.".$districtID, "Location");
		//}
		
		//else
		//{
			//redirect("logout", "Location");
		//}
	}








/**
 * @author: Md. Golam Rabbany
 * @email: mgrnahid@gmail.com
 * @description: Send EMail for Preselction Exam
 * @copyright 28 March 2017
 */


	function sendSingleEmailPreSelectionTest($idStudent)
	{

		$config = array(
    			'protocol'  => 'smtp',
    			'smtp_host' => 'mail.gameanimation.net',
    			'smtp_port' => "26",
    			'smtp_user' => 'noreply@gameanimation.net',
    			'smtp_pass' => 'f@ceb00k.c0m',
    			'mailtype'  => 'html',
    			'charset'   => 'utf-8',
    			'validate'  => FALSE
				);
		$this->email->initialize($config);
		$this->email->set_mailtype("html");
		$this->email->set_newline("\r\n");

		$queryList = $this->studentModel->studentEditInfo($idStudent);
		if(is_array($queryList))
		{
			foreach ($queryList as $row) 
			{
				$idStudent = $row->id;
				$studentID = $row->student_id;
				$fullName = $row->full_name;
				$email = $row->email;
				$password = $row->password;
				
				$htmlContent = "Dear $fullName,<br><br>
									<b>Congratulation!</b><br/><br/>
									You are preselected for Mobile Game Animation training program. Due to government policy, 
									to start your training program you have to pass eligibility examination test. <br><br>
									Please login below link for eligibility test and enjoy our training program<br><br><hr>
									URL: http://gameanimation.net/login<br>
									Student ID : $studentID <br>
									User Name : $email <br>
									Password : $password <br><br>
									Thanks<br>
									Mobile Game Animation Training";
				$this->email->to($email);
				$this->email->from('noreply@gameanimation.net','Mobile Game Animation Training Program');
				$this->email->subject('Access for Pre-Selection Test');
				$this->email->message($htmlContent);
				//Send email
				$this->email->send();
				$nowTime = date('Y-m-d H:i:s');
				$sqlUpdate = "UPDATE student_info SET allow_traning = 2, status = 1, creationdate = '$nowTime' WHERE id = '$idStudent'";
				$query = $this->db->query($sqlUpdate);
			}
		}
	}





}
?>