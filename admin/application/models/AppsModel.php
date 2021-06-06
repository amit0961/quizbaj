<?php


class appsModel extends CI_Model{

 	function __construct()
 	{
    	// Call the Model constructor
    	parent::__construct();
 	}


/**
 ***********************************************************************
 * @Start Global Section of Reseller ***********************************
 ***********************************************************************
*/

function getRealIpAddr()
{
    if (!empty($_SERVER['HTTP_CLIENT_IP']))   //check ip from share internet
    {
      $ip=$_SERVER['HTTP_CLIENT_IP'];
    }
    elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR']))   //to check ip is pass from proxy
    {
      $ip=$_SERVER['HTTP_X_FORWARDED_FOR'];
    }
    else
    {
      $ip=$_SERVER['REMOTE_ADDR'];
    }
    return $ip;
}



		/**
		 ***********************************************************************
		 * @Get Total number of Subjects  ******************************************
		 ***********************************************************************
		*/

		 function getUserDetails(){
		        $this->db->select("*");        
		        $this->db->from('users');
		        $rs=$this->db->get();   
		        return $rs->result();    
		    }



/**
 ***********************************************************************
 * @Get Total number of Subjects  ******************************************
 ***********************************************************************
*/
 
 	function getTotalSubjects($subjectName, $campID)
 	{
		
		if($subjectName=="NULL")
		$subjectNameStr = "";
		else
		$subjectNameStr = "AND exam_name LIKE '$subjectName%'";

		if($campID=="NULL")
		$campIDStr = "";
		else
		$campIDStr = "AND camp_id = '$campID'";

	   	$sql="SELECT
	   	count(id) as totalrows
	   	FROM examinations WHERE status > -1 $subjectNameStr $campIDStr";
		$row = 0;
		$query = $this->db->query($sql);
		foreach($query->result() as $resultrow)
		{
			$row = $resultrow->totalrows;
		}
		return $row;
	}

/**
 ***********************************************************************
 * @Get Exam Subjects List  ********************************************
 ***********************************************************************
*/
 
 	function getSubjectsList($startoffset, $limit, $subjectName, $campID)
 	{

		$new_startoffset = $startoffset - 1;
		if($new_startoffset <0)
		$new_startoffset = 0;
		$startoffset1 = $limit * $new_startoffset;
	    $limit_string = "LIMIT $startoffset1,$limit";

		if($subjectName=="NULL")
		$subjectNameStr = "";
		else
		$subjectNameStr = "AND exam_name LIKE '$subjectName%'";

		if($campID=="NULL")
		$campIDStr = "";
		else
		$campIDStr = "AND camp_id = '$campID'";


	   	$sql="SELECT *FROM examinations WHERE status > -1 $subjectNameStr $campIDStr ORDER BY exam_name ASC $limit_string";
	    $query = $this->db->query($sql);
	    if($query->num_rows()>0)
		  return $query->result();
	    else
		 return 0;
	}

/**
 ***********************************************************************
 * @Insert Exam Subjects List  *****************************************
 ***********************************************************************
*/


 	function addSubject($userID)
 	{


		$data['exam_name']		= $this->input->post('exam_name');
		$data['exam_details']		= $this->input->post('syllabus');
		$data['syllabus']		= $this->input->post('syllabus');
		$data['camp_id']		= $this->input->post('campID');
		$data['no_question']		= $this->input->post('no_question');
		$data['correct_score']		= $this->input->post('correct_score');
		$data['incorrect_score']		= $this->input->post('incorrect_score');
		$data['pass_score']		= 100;
		$data['duration']		= $this->input->post('duration');
		$data['maximum_attempts']		= $this->input->post('maximum_attempts');
		$data['next_attempts']		= $this->input->post('next_attempts');
		$isEditable = $this->input->post('is_editable');
		if((strtoupper($isEditable) == 'ON') OR ($isEditable == 1))
		$isEditable = 1;
		else
		$isEditable = 0;
		$data['is_editable']		= $isEditable;

		$withLogin = $this->input->post('with_login');
		if((strtoupper($withLogin) == 'ON') OR ($withLogin == 1))
		$withLogin = 1;
		else
		$withLogin = 0;
		$data['with_login']		= $withLogin;
		$data['certificate_text']		= "";
		$status = $this->input->post('status');
		if((strtoupper($status) == 'ON') OR ($status == 1))
		$status = 1;
		else
		$status = 0;
		$data['status']		= $status;
		$data['user_id']		= $userID;
		$data['creationdate']		= date('Y-m-d H:i:s');
		$data['ipaddress']		= $this->getRealIpAddr();
		$sql = $this->db->insert_string("examinations", $data);
		$query = $this->db->query($sql);
		$insertId = $this->db->insert_id();
 	}


/**
 ***********************************************************************
 *@Exam Subjects Edit Information  *************************************
 ***********************************************************************
*/

	function subjectEditInfo($idElement)
	{
    	$query = $this->db->query("SELECT *FROM examinations WHERE id = '$idElement' AND status > -1 LIMIT 1");
    	if($query->num_rows()>0)
		{
			return $query->result();
		}
    	else
    	{
			return 0;
		}	
	}


/**
 ***********************************************************************
 *@Update Exam Subject Information  ************************************
 ***********************************************************************
*/

 	function updateSubject($userID)
 	{
		$keyvalue		= $this->input->post('id');

		$data['exam_name']		= $this->input->post('exam_name');
		$data['exam_details']		= $this->input->post('syllabus');
		$data['syllabus']		= $this->input->post('syllabus');
		$data['camp_id']		= $this->input->post('campID');
		$data['no_question']		= $this->input->post('no_question');
		$data['correct_score']		= $this->input->post('correct_score');
		$data['incorrect_score']		= $this->input->post('incorrect_score');
		$data['pass_score']		= 100;
		$data['duration']		= $this->input->post('duration');
		$data['maximum_attempts']		= $this->input->post('maximum_attempts');
		$data['next_attempts']		= $this->input->post('next_attempts');
		$isEditable = $this->input->post('is_editable');
		if((strtoupper($isEditable) == 'ON') OR ($isEditable == 1))
		$isEditable = 1;
		else
		$isEditable = 0;
		$data['is_editable']		= $isEditable;

		$withLogin = $this->input->post('with_login');
		if((strtoupper($withLogin) == 'ON') OR ($withLogin == 1))
		$withLogin = 1;
		else
		$withLogin = 0;
		$data['with_login']		= $withLogin;
		$data['certificate_text']		= "";
		$status = $this->input->post('status');
		if((strtoupper($status) == 'ON') OR ($status == 1))
		$status = 1;
		else
		$status = 0;
		$data['status']		= $status;


		$data['user_id']		= $userID;
		$data['ipaddress']		= $this->getRealIpAddr();
    	$where = "id = $keyvalue";
		$sql = $this->db->update_string("examinations", $data, $where);
		$query = $this->db->query($sql);
 	}


/**
 ***********************************************************************
 *@Delete Exam Subject Information  ************************************
 ***********************************************************************
*/

	function deleteSubjectInfo($idElement)
	{
    	$updateInfo = $this->db->query("UPDATE examinations SET status = -1 WHERE id = '$idElement'");
	}







/**
 ***********************************************************************
 *@Get Total Number of Question ****************************************
 ***********************************************************************
*/
 
 	function getTotalQuestion($examID, $campID, $question)
 	{

		if($examID == 0)
		$examIDStr = "";
		else
		$examIDStr = "AND exam_id = '$examID'";

		if($campID == '0')
		$campIDSTr = "";
		else
		$campIDSTr = "AND camp_id = '$campID'";

		if($question == 'NULL')
		$questionStr = "";
		else
		$questionStr = "AND question LIKE '$question%'";

	   	$sql="SELECT
	   	count(id) as totalrows
	   	FROM questions WHERE status > -1 $examIDStr $campIDSTr $questionStr";
		$row = 0;
		$query = $this->db->query($sql);
		foreach($query->result() as $resultrow)
		{
			$row = $resultrow->totalrows;
		}
		return $row;
	}

/**
 ***********************************************************************
 *@Get Question List ***************************************************
 ***********************************************************************
*/

 	function getQuestions($startoffset, $limit, $examID, $campID, $question)
 	{

		$new_startoffset = $startoffset - 1;
		if($new_startoffset <0)
		$new_startoffset = 0;
		$startoffset1 = $limit * $new_startoffset;
	    $limit_string = "LIMIT $startoffset1,$limit";

		if($examID == 0)
		$examIDStr = "";
		else
		$examIDStr = "AND exam_id = '$examID'";

		if($campID == 0)
		$campIDSTr = "";
		else
		$campIDSTr = "AND camp_id = '$campID'";

		if($question == 'NULL')
		$questionStr = "";
		else
		$questionStr = "AND question LIKE '$question%'";

	   	$sql="SELECT *FROM questions WHERE status > -1 $examIDStr $campIDSTr $questionStr ORDER BY creationdate DESC $limit_string";
	    $query = $this->db->query($sql);
	    if($query->num_rows()>0)
		  return $query->result();
	    else
		 return 0;
	}

/**
 ***********************************************************************
 *@Get Question List ***************************************************
 ***********************************************************************
*/

 	function addQuestion($userID)
 	{

		$questionOptions = array();
		$data['exam_id']		= $this->input->post('examID');
		$data['camp_id']		= $this->input->post('campID');
		$data['question']		= $this->input->post('question');
		$questionType		= $this->input->post('question_type');
		$data['question_type'] = $questionType;
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

		for ($i = 1; $i <= 4; $i++)
		{
			$option = $this->input->post('option'.$i);
			if(!empty($option))
			{
				$questionOptions[$i] = array('filedType' => $filedType, 'option' => $option);
			}
			else
			{
				$questionOptions[$i] = array('filedType' => $filedType, 'option' => '');
			}
		}

		$questionOptionsSerilize = serialize($questionOptions);
		$data['question_options'] = $questionOptionsSerilize;
		$data['answer']		= $this->input->post('answer');
		$data['user_id']		= $userID;
		$data['status']		= 1;
		$data['question_date']= date("Y-m-d", strtotime($this->input->post('question_date')));
		$data['creationdate']		= date('Y-m-d H:i:s');
		$data['ipaddress']		= $this->getRealIpAddr();

		$sql = $this->db->insert_string("questions", $data);
		$query = $this->db->query($sql);
		$insertId = $this->db->insert_id();
 	}

/**
 ***********************************************************************
 *@Get Question Information ********************************************
 ***********************************************************************
*/

	function questionEditInfo($idElement)
	{
    	$query = $this->db->query("SELECT *FROM questions WHERE id = '$idElement' AND status > -1 LIMIT 1");
    	if($query->num_rows()>0)
		{
			return $query->result();
		}
    	else
    	{
			return 0;
		}	
	}

/**
 ***********************************************************************
 @Update Question Information ********************************************
 ***********************************************************************
*/

 	function updateQuestionInfo($userID)
 	{
		$keyvalue		= $this->input->post('id');

		$questionOptions = array();
		$data['exam_id']		= $this->input->post('examID');
		$data['exam_id']		= $this->input->post('examID');
		$data['question']		= $this->input->post('question');
		$questionType		= $this->input->post('question_type');
		$data['question_type'] = $questionType;
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

		for ($i = 1; $i <= 4; $i++)
		{
			$option = $this->input->post('option'.$i);
			if(!empty($option))
			{
				$questionOptions[$i] = array('filedType' => $filedType, 'option' => $option);
			}
			else
			{
				$questionOptions[$i] = array('filedType' => $filedType, 'option' => '');
			}
		}

		$questionOptionsSerilize = serialize($questionOptions);
		$data['question_options'] = $questionOptionsSerilize;
		$data['answer']		= $this->input->post('answer');
		$data['user_id']		= $userID;
		$data['status']		= 1;
		//$data['creationdate']		= date('Y-m-d H:i:s');
		$data['ipaddress']		= $this->getRealIpAddr();
    	$where = "id = $keyvalue";
		$sql = $this->db->update_string("questions", $data, $where);
		$query = $this->db->query($sql);
 	}


/**
 ***********************************************************************
 @Delete Question Information ******************************************
 ***********************************************************************
*/

	function deleteQuestionInfo($idElement)
	{
    	$updateInfo = $this->db->query("UPDATE questions SET status = -1 WHERE id = '$idElement'");
	}


/**
 ***********************************************************************
 @Import Question Information ******************************************
 ***********************************************************************
*/


    function importQuestions($userID, $fileName, $examID, $campID, $questionType)
    {

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

        $fileDir = UPLOAD_DIR.$fileName;
        if (($handle = fopen($fileDir, "r")) !== FALSE)
        {
            $row = 0;
            while (($data = fgetcsv($handle, 900000, ",")) !== FALSE)
            {
                $num = count($data);
                $row++;
                if($num >= 4)
                {
                    if($row !=1)
                    {   
                        $question = $data[1];
                        $option1 = $data[2];
                        $option2 = $data[3];
                        $option3 = $data[4];
                        $option4 = $data[5];
                        $answer = $data[6];
                        
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
                    	$dataInset['ipaddress'] = $this->getRealIpAddr();

                        if((!empty($question)))
                        {       
                            $this->db->insert('questions', $dataInset);
                            //$this->db->last_query();
                        }   
                    } 
                }
            }
        }
    }



/**
 ***********************************************************************
 @Get Total number of Quiz Exams ***************************************
 ***********************************************************************
*/
 
 	function totalQuizExam($phoneNo, $examID, $campID)
 	{

		if($phoneNo=="NULL")
		$phoneNoStr = "";
		else
		$phoneNoStr = "AND b.phone_no LIKE '$phoneNo%'";

		if($examID=="NULL")
		$examIDStr = "";
		else
		$examIDStr = "AND a.exam_id = '$examID'";

		if($campID=="NULL")
		$campIDStr = "";
		else
		$campIDStr = "AND a.camp_id = '$examID'";

	   	$sql="SELECT
			  COUNT(a.id) as totalrows
			  FROM users_exams a
			  INNER JOIN users b 
			  ON a.user_id = b.id
			  WHERE b.status = 1  $phoneNoStr $examIDStr $campIDStr";

		$row = 0;
		$query = $this->db->query($sql);
		foreach($query->result() as $resultrow)
		{
			$row = $resultrow->totalrows;
		}
		return $row;
	}


/**
 ***********************************************************************
 @Get uiz Exam List  ***************************************************
 ***********************************************************************
*/
 
 	function quizExamList($startoffset, $limit, $phoneNo, $examID, $campID)
 	{

		$new_startoffset = $startoffset - 1;
		if($new_startoffset <0)
		$new_startoffset = 0;
		$startoffset1 = $limit * $new_startoffset;
	    $limit_string = "LIMIT $startoffset1,$limit";

		if($phoneNo=="NULL")
		$phoneNoStr = "";
		else
		$phoneNoStr = "AND b.phone_no LIKE '$phoneNo%'";

		if($examID=="NULL")
		$examIDStr = "";
		else
		$examIDStr = "AND a.exam_id = '$examID'";

		if($campID=="NULL")
		$campIDStr = "";
		else
		$campIDStr = "AND a.camp_id = '$examID'";

	    $sql="SELECT
			  a.id as examLogID,
			  a.exam_id as examID,
			  a.camp_id as campID,
			  a.points as points,
			  a.questions as questions,
			  a.correct as correct,
			  a.wrong as wrong,
			  a.rounds as rounds,
			  a.attempt_date as attemptTime,
			  a.submit_date as submitTime,
			  a.is_complete as isComplete,
			  b.full_name as fullName,
			  b.phone_no as phoneNo
			  FROM users_exams a
			  INNER JOIN users b 
			  ON a.user_id = b.id
			  WHERE b.status = 1  $phoneNoStr $examIDStr $campIDStr ORDER BY a.submit_date DESC $limit_string";
	    $query = $this->db->query($sql);
	    if($query->num_rows()>0)
		  return $query->result();
	    else
		 return 0;

	}





}

?>