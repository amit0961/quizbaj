<?php
/**
 * @author: Md. Golam Rabbany
 * @email: mgrnahid@gmail.com
 * @IM: Skype: mgrnahid, Gtalk:mgrnahid
 * @WhatsApps: +8801714101351
 * @copyright 2018-2019
 */

/*
|--------------------------------------------------------------------------
| Pre Define Value Setting 
|--------------------------------------------------------------------------
*/
define('DB_HOST',    '192.168.1.51');
define('DB_NAME',     'quizbuzz');
define('DB_USER',     'remote');
define('DB_PASSWORD',   'n0@ccess4U');
//define('DB_PASSWORD',   '');
define('DB_DRIVER',   'mysql');
define('PROFILE_IMG_API',   'http://api.vjel.com/quiz/profile_picture.php?userID=');
define('PROFILE_IMG_PATH',   'http://api.vjel.com/quiz/images/');


/*
|--------------------------------------------------------------------------
| Start Billing Class 
|--------------------------------------------------------------------------
*/

 class QuizBuzz
 {
    /**
    * Define Global variables
    * @var string
    * @access public
    */
    var $mysqlConnectResult;
    var $campaignID = 0;
    var $numExams = 6;
    var $userImageName = 0;
    /*
    |--------------------------------------------------------------------------
    | CONSTRUCTOR Function
    |--------------------------------------------------------------------------
    */

    function QuizBuzz()
    {
        $conn = @mysql_connect(DB_HOST, DB_USER, DB_PASSWORD);
        $this->mysqlConnectResult = mysql_select_db(DB_NAME,$conn);
    }

    /*
    |--------------------------------------------------------------------------
    | Database Function
    |--------------------------------------------------------------------------
    */

    function dBConnect()
    {
        return 1;
    }


    /*
    |--------------------------------------------------------------------------
    | Get Running campaign
    |--------------------------------------------------------------------------
    */  

    function getLiveCampaignInfo()
    {
        $today = date('Y-m-d');
        $sql = "SELECT 
               camp_id,
               no_exams   
               FROM campaign WHERE start_date <= '$today' AND end_date >= '$today' AND status = 1 LIMIT 1";
        $result = mysql_query($sql);
        if(mysql_num_rows($result) == 1)
        {
             $row = mysql_fetch_row($result);
             $this->campaignID = $row[0];
             $this->numExams = $row[1];
        }
    }


    /*
    |--------------------------------------------------------------------------
    | Get Use Images
    |--------------------------------------------------------------------------
    */  

    function userProfilePImages($userID)
    {

        $sql = "SELECT pp_file_name FROM users WHERE id = '$userID' LIMIT 1";
        $result = mysql_query($sql);
        if(mysql_num_rows($result) == 1)
        {
             $row = mysql_fetch_row($result);
             return PROFILE_IMG_PATH.$row[0];
        }
        else
        {
            return PROFILE_IMG_PATH."male.png";
        }
    }




    /*
    |--------------------------------------------------------------------------
    | Get User campaign Earn Points
    |--------------------------------------------------------------------------
    */  

    function GetEarnPoints($userID)
    {
        $campaignID = $this->campaignID;
        $points = 0;
        $sqlPoints = "SELECT 
                      SUM(points) as points
                      FROM users_exams WHERE user_id = '$userID' AND camp_id = '$campaignID' LIMIT 1";
        $resultPoints = mysql_query($sqlPoints);
        if(mysql_num_rows($resultPoints) == 1)
        {
            $rowPoints = mysql_fetch_row($resultPoints);
            $points = $rowPoints[0];
            if(empty($points))
            $points = 0;    
        }

        return $points;
    }



    /*
    |--------------------------------------------------------------------------
    | Get User Total Questions
    |--------------------------------------------------------------------------
    */  

    function getTotalQuestions($userID, $examID)
    {
        $campaignID = $this->campaignID;

        $questions = 0;
        $sql = "SELECT 
                      SUM(questions) as questions
                      FROM users_exams WHERE user_id = '$userID' AND camp_id = '$campaignID' AND exam_id = '$examID'";
        $result = mysql_query($sql);
        if(mysql_num_rows($result) == 1)
        {
            $row = mysql_fetch_row($result);
            $questions = $row[0];
            if(empty($questions))
            $questions = 0;    
        }

        return $questions;
    }


    /*
    |--------------------------------------------------------------------------
    | Get User Total Correct Answer
    |--------------------------------------------------------------------------
    */  

    function getTotalCorrectAnswer($userID, $examID)
    {
        $campaignID = $this->campaignID;        
        $correct = 0;
        $sql = "SELECT 
                      SUM(correct) as correct
                      FROM users_exams WHERE user_id = '$userID' AND camp_id = '$campaignID' AND exam_id = '$examID'";
        $result = mysql_query($sql);
        if(mysql_num_rows($result) == 1)
        {
            $row = mysql_fetch_row($result);
            $correct = $row[0];
            if(empty($correct))
            $correct = 0;    
        }

        return $correct;
    }




    /*
    |--------------------------------------------------------------------------
    | Get User campaign Exams attempt Information
    |--------------------------------------------------------------------------
    */  

    function GetExamAttemptInfo($userID, $examID)
    {
        $campaignID = $this->campaignID;
        $attempts = 0;
        $sql = "SELECT 
                COUNT(id) as attempts
                FROM users_exams WHERE user_id = '$userID' AND camp_id = '$campaignID' AND exam_id = '$examID'";
        $result = mysql_query($sql);
        if(mysql_num_rows($result) == 1)
        {
            $row = mysql_fetch_row($result);
            $attempts = $row[0];
            if(empty($attempts))
            $attempts = 0;    
        }

        return $attempts;
    }



    /*
    |--------------------------------------------------------------------------
    | Check New Users or Old Users
    |--------------------------------------------------------------------------
    */  

    function checkNewExamUsers($userID, $examID, $campaignID)
    {
        $sql = "SELECT *FROM users_exams 
                WHERE user_id = '$userID' AND exam_id = '$examID' AND camp_id = '$campaignID' LIMIT 1";
        $result = mysql_query($sql); 
        $numRows = mysql_num_rows($result);
        if($numRows > 0)
            return 1;
        else
            return 0;    
    }


    /*
    |--------------------------------------------------------------------------
    | Action Controller 
    |--------------------------------------------------------------------------
    */  

    function actionController($inputStr)
    {
        $inputStrArray = json_decode($inputStr,true);
        if(is_array($inputStrArray))
        {
            $userID = $inputStrArray['userID'];
            $phoneNo = $inputStrArray['phoneNo'];
            $secretKey = $inputStrArray['secretKey'];
            $action = strtoupper($inputStrArray['action']);
            /*
            |--------------------------------------------------------------------------
            | User Authentication
            |--------------------------------------------------------------------------
            */  
            $sql = "SELECT *FROM users WHERE id = '$userID' AND phone_no = '$phoneNo' AND secret_key = '$secretKey' AND status = 1 LIMIT 1";
            $result = mysql_query($sql);
            $numRows = mysql_num_rows($result);
            if($numRows == 1)
            {
                $this->getLiveCampaignInfo();
                if($this->campaignID != '0')
                {    
                    if($action == 'DASHBOARD')
                    {
                        return $this->dashBoard($userID, $phoneNo);
                    }
                    elseif($action == 'EXAM-NAME') 
                    {
                        return $this->getExamNameInfo($userID, $phoneNo);
                    }
                    elseif($action == 'EXAM-SHEET') 
                    {
                       $examID = $inputStrArray['examID'];
                       $round = $inputStrArray['round'];
                       $userExamID = $inputStrArray['userExamID'];
                       //return $this->getExamSheet($userID, $examID, $round);
                       return $this->getExamAnswerPapers($userID, $examID, $userExamID, $round);
                    }
                    elseif($action == 'EXAM-RULES')
                    {
                       $examID = $inputStrArray['examID'];
                       return $this->getExamRules($userID, $examID);
                    } 
                    elseif($action == 'SUBMIT-ANSWER')
                    {
                       $examID = $inputStrArray['examID'];
                       $userExamID = $inputStrArray['userExamID'];
                       $sheetID = $inputStrArray['sheetID'];
                       $answer = $inputStrArray['answer'];
                       $isCorect = $inputStrArray['isCorect'];
                       $isComplete = $inputStrArray['isComplete'];
                       return $this->submitExamSheet($userExamID, $sheetID, $answer, $isCorect, $isComplete, $userID);
                    }
                    elseif($action == 'RESENT-EXAM-RESULT')
                    {
                        $userExamID = $inputStrArray['userExamID'];
                        return $this->getResentExamSheet($userID, $userExamID);
                    }                    
                    elseif($action == 'COMMON-RULES')
                    {
                       return $this->getExamCommonRules($userID);
                    }
                    elseif($action == 'HELP-POST')
                    {
                       $email = $inputStrArray['email'];
                       $message = $inputStrArray['message'];
                       $message = base64_encode($message);
                       return $this->helpPost($userID, $email, $message);
                    }
                    elseif($action == 'LEADER-BOARD')
                    {
                       return $this->leaderBoard($userID);
                    }
                    elseif($action == 'LEADER-BOARD-ALTIME')
                    {
                       return $this->leaderBoardAlTime($userID);
                    }                    
                    elseif($action == 'PROFILE-PICTURE')
                    {
                       return $this->profilePicture($userID);
                    }
                    else
                    {
                        echo "Action Not Found";
                    }

                }
                else
                {
                    /*
                    |--------------------------------------------------------------------------
                    | No Campaign Available
                    |--------------------------------------------------------------------------
                    */  
                    return $resultCode = array('code' => "-3", 'message' => 'No Campaign Available', 'accessInfo' => '');                    
                }    
            }
            else
            {
                /*
                |--------------------------------------------------------------------------
                | User Authentication Failed
                |--------------------------------------------------------------------------
                */  
                return $resultCode = array('code' => "-2", 'message' => 'Invalid Input', 'accessInfo' => '');
            }

        }
        else
        {
            /*
            |--------------------------------------------------------------------------
            | Invalid Input
            |--------------------------------------------------------------------------
            */ 
            return $resultCode = array('code' => "-1", 'message' => 'Invalid Input', 'accessInfo' => '');
        }
    }


    /*
    |--------------------------------------------------------------------------
    | dashboard Information
    |--------------------------------------------------------------------------
    */  

    function dashBoard($userID, $phoneNo)
    {
        $campaignID = $this->campaignID;
        $numExams = $this->numExams;

        /*
        |--------------------------------------------------------------------------
        | Get Earning Points
        |--------------------------------------------------------------------------
        */ 
        $totalEarnPorints = $this->GetEarnPoints($userID);
        /*
        |--------------------------------------------------------------------------
        | Get Leaderboard positions
        |--------------------------------------------------------------------------
        */ 
        $leaderboardPositions = 1;
        /*
        |--------------------------------------------------------------------------
        | Get Exams Name Information
        |--------------------------------------------------------------------------
        */
        $totalCompletedExam = 0; 
        $examInfoArray = array();
        $accessInfo = array(); 
        $sqlExamsInfo = "SELECT * FROM examinations WHERE status = 1 AND camp_id = '$campaignID'";
        $resultExamInfo = mysql_query($sqlExamsInfo);
        $numRowsExamInfo = mysql_num_rows($resultExamInfo);
        if($numRowsExamInfo > 0)
        {
            while ($rowExamInfo = mysql_fetch_assoc($resultExamInfo)) 
            {
                $examID = $rowExamInfo['id'];
                $examName = $rowExamInfo['exam_name'];

                $sqlQuestions = "SELECT questions, correct, is_complete, rounds 
                                 FROM users_exams WHERE user_id = '$userID' AND exam_id = '$examID' AND camp_id = '$campaignID' 
                                 ORDER BY prepare_times DESC LIMIT 1";
                $resultQuestion = mysql_query($sqlQuestions);
                $numRowsQuestion = mysql_num_rows($resultQuestion);
                if($numRowsQuestion == 1)
                {
                    while ($rowQuestion = mysql_fetch_assoc($resultQuestion)) 
                    {
                        //$questions = $rowQuestion['questions'];
                        //$correct = $rowQuestion['correct'];
                        $isComplete = $rowQuestion['is_complete'];
                        $rounds = $rowQuestion['rounds'];
                        $isFound  = 1;
                        if($isComplete == 1)
                        $totalCompletedExam = $totalCompletedExam + 1;

                        $questions = $this->getTotalQuestions($userID, $examID);
                        $correct = $this->getTotalCorrectAnswer($userID, $examID);


                    }    
                }
                else
                {
                    $questions = 10;
                    $correct = 0;
                    $isLock = 0;
                    $isComplete = 0;
                    $isFound = 0;
                    $rounds = 1;
                    $this->prepareExams($userID, $examID, $campaignID, $questions, $rounds);
                }
                    
                //$attempts = $this->GetExamAttemptInfo($userID, $examID);
                $examInfoArray[] = array('examID' => $examID, 'ExamName' => $examName, 'questions' => $questions, 'correct' => $correct, 'isComplete' => $isComplete);
                
                if($totalCompletedExam == $numExams)
                {    
                    $nextRound = $rounds + 1;
                    $this->prepareExamsNextRound($userID, $nextRound);
                }                  
            }    
        }
        else
        {
            $examInfoArray =  "NULL";
        }
        //$pp = PROFILE_IMG_API.$userID; 
        $pp = $this->userProfilePImages($userID);

        $userInfo = array('earnPoints' => $totalEarnPorints, 'positions' => $leaderboardPositions,'image' =>$pp);
        $accessInfo = array('examsSummary' => $examInfoArray, 'usersInfo' => $userInfo);
        $resultCode = array('code' => "1", 'message' => 'Success', 'accessInfo' => $accessInfo);
        return $resultCode; 
    }


    /*
    |--------------------------------------------------------------------------
    | Exam Name Information
    |--------------------------------------------------------------------------
    */  

    function getExamNameInfo($userID, $phoneNo)
    {
        $campaignID = $this->campaignID;
        $numExams = $this->numExams;

        /*
        |--------------------------------------------------------------------------
        | Get Exams Name Information
        |--------------------------------------------------------------------------
        */

        $examInfoArray = array();
        $accessInfo = array(); 
        $sqlExamsInfo = "SELECT * FROM examinations WHERE status = 1 AND camp_id = '$campaignID'";
        $resultExamInfo = mysql_query($sqlExamsInfo);
        $numRowsExamInfo = mysql_num_rows($resultExamInfo);
        if($numRowsExamInfo > 0)
        {
            while ($rowExamInfo = mysql_fetch_assoc($resultExamInfo)) 
            {
                $examID = $rowExamInfo['id'];
                $examName = $rowExamInfo['exam_name'];
                $sqlQuestions = "SELECT id as userExamID, questions, correct, is_complete, rounds FROM users_exams WHERE user_id = '$userID' AND exam_id = '$examID' ORDER BY prepare_times DESC LIMIT 1";
                $resultQuestion = mysql_query($sqlQuestions);
                $numRowsQuestion = mysql_num_rows($resultQuestion);
                if($numRowsQuestion == 1)
                {
                    while ($rowQuestion = mysql_fetch_assoc($resultQuestion)) 
                    {
                        $userExamID = $rowQuestion['userExamID'];
                        $questions = $rowQuestion['questions'];
                        $correct = $rowQuestion['correct'];
                        $isComplete = $rowQuestion['is_complete'];
                        $rounds = $rowQuestion['rounds'];
                        $isFound  = 1;
                    }    
                }
                else
                {
                    $userExamID = 0;
                    $questions = 0;
                    $correct = 0;
                    $isLock = 0;
                    $isComplete = 0;
                    $rounds = 1;
                    $isFound = 0;                  
                }

                $examInfoArray[] = array('examID' => $examID, 'ExamName' => $examName, 'userExamID' => $userExamID, 'questions' => $questions, 'correct' => $correct, 'isComplete' => $isComplete, 'round' => $rounds);
            }    
        }
        else
        {
            $examInfoArray =  "NULL";
        }
        $accessInfo = array('examsSummary' => $examInfoArray);
        $resultCode = array('code' => "1", 'message' => 'Success', 'accessInfo' => $accessInfo);
        return $resultCode; 

    }



    /*
    |--------------------------------------------------------------------------
    | Get Exam Sheet Information
    |--------------------------------------------------------------------------
    */  

    function getExamSheet($userID, $examID, $round = 0)
    {
        $questionSheet = array();
        $campaignID = $this->campaignID;
        $numExams = $this->numExams;
        
        $sqlCheck = "SELECT id FROM users_exams 
                         WHERE user_id = '$userID' AND exam_id = '$examID' AND camp_id = '$campaignID' AND is_complete = 0 LIMIT 1";
        $resultCheck = mysql_query($sqlCheck); 
        $numRowsCheck = mysql_num_rows($resultCheck);
        if($numRowsCheck == 1)
        {
            $rowCheck = mysql_fetch_row($resultCheck);
            $userExamID = $rowCheck[0];

            $sqlQustions = "SELECT 
                                a.id as questionsID,
                                a.question as question,
                                a.question_options as question_options,
                                a.answer as answer,
                                b.is_answer as is_answer,
                                b.id as sheetID
                                FROM questions a
                                INNER JOIN exam_sheets b
                                ON a.id = b.question_id
                                WHERE b.user_exams_id = '$userExamID' AND b.user_id = '$userID' AND a.exam_id = '$examID'  ORDER BY b.sequence ASC LIMIT 10";
            $resultQustions = mysql_query($sqlQustions);
            $numRowsQustions = mysql_num_rows($resultQustions);
            if($numRowsQustions > 0)
            {
                $sequence = 1;
                while ($rowQustions = mysql_fetch_assoc($resultQustions)) 
                {
                    $sheetID = $rowQustions["sheetID"];
                    $questionsID = $rowQustions["questionsID"];
                    $question = $rowQustions["question"];
                    $questionOptions = $rowQustions["question_options"];
                    $answer = $rowQustions["answer"];
                    $isAnswer = $rowQustions["is_answer"];
                    if($isAnswer == -1)
                    $isAnswer = 0;    

                    $questionSheet[] = array('examLogID' => $userExamID,
                                             'sheetID' => $sheetID,
                                             'questionsID' => $questionsID, 
                                             'question' => $question, 
                                             'questionOptions' => unserialize($questionOptions), 
                                             'answer' => $answer,
                                             'isAnswer' => $isAnswer);

                    $sequence = $sequence + 1;
                }
            }
            
           //return print_r($questionSheet); 
        }
        else
        {
            $userStatus = $this->checkNewExamUsers($userID, $examID, $campaignID);
            $toDay = date('Y-m-d H:i:s');
            $sqlInsertExams = "INSERT INTO users_exams (user_id, exam_id, camp_id, points, questions, correct, wrong, attempt_date, is_complete) 
                                   VALUES ('$userID', '$examID', '$campaignID', 0, 10, 0, 0, '$toDay', 0)";
            $resultInsertExams = mysql_query($sqlInsertExams);
            $userExamID = mysql_insert_id();
            if($userExamID)
            {
                if($userStatus == 0)
                {    
                    $sqlQustions = "SELECT 
                                    id,
                                    question,
                                    question_options,
                                    answer
                                    FROM questions
                                    WHERE exam_id = '$examID' AND camp_id = '$campaignID' ORDER BY RAND() LIMIT 10";
                }
                else
                {
                    $sqlQustions = "SELECT 
                                    a.id as id,
                                    a.question as question,
                                    a.question_options as question_options,
                                    a.answer as answer
                                    FROM questions a
                                    INNER JOIN exam_sheets b
                                    ON a.id != b.question_id
                                    WHERE a.exam_id = '$examID' AND a.camp_id = '$campaignID' AND b.user_id = '$userID' ORDER BY RAND() LIMIT 10";
                }                
                $resultQustions = mysql_query($sqlQustions);
                $numRowsQustions = mysql_num_rows($resultQustions);
                if($numRowsQustions > 0)
                {
                    $sequence = 1;
                    while ($rowQustions = mysql_fetch_assoc($resultQustions)) 
                    {
                        $questionsID = $rowQustions["id"];
                        $question = $rowQustions["question"];
                        $questionOptions = $rowQustions["question_options"];
                        $answer = $rowQustions["answer"];
                        //$isAnswer = $rowQustions["is_answer"];
                        // Insert ExamSheet
                        $sqlInsertSheet = "INSERT INTO exam_sheets (user_id, exam_id, camp_id, user_exams_id, sequence, question_id) 
                                           VALUES ('$userID', '$examID', '$campaignID', '$userExamID', '$sequence', '$questionsID')";
                        $resultInsertExamsSheet = mysql_query($sqlInsertSheet);
                        $examSheetID = mysql_insert_id();
                        if($examSheetID)
                        {
                            
                            $questionSheet[] = array('examLogID' => $userExamID,
                                             'sheetID' => $examSheetID,
                                             'questionsID' => $questionsID, 
                                             'question' => $question, 
                                             'questionOptions' => unserialize($questionOptions), 
                                             'answer' => $answer,
                                             'isAnswer' => 0);
                            $sequence = $sequence + 1;
                        }
                    }
                }
            }
        }

        $resultCode = array('code' => "1", 'message' => 'Success', 'accessInfo' => $questionSheet);
        return $resultCode; 

    }


    /*
    |--------------------------------------------------------------------------
    | Get Exam Sheet Information
    |--------------------------------------------------------------------------
    */  

    function getExamAnswerPapers($userID, $examID, $userExamID, $round = 0)
    {
        $questionSheet = array();
        $campaignID = $this->campaignID;
        $numExams = $this->numExams;
        $toDay = date('Y-m-d H:i:s');
        $sqlUpdate = "UPDATE users_exams SET attempt_date = '$toDay' WHERE id = '$userExamID' AND attempt_date = '0000-00-00 00:00:00'";
        $resultUpdate = mysql_query($sqlUpdate);

        $sqlQustions = "SELECT 
                        a.id as questionsID,
                        a.question as question,
                        a.question_options as question_options,
                        a.answer as answer,
                        b.is_answer as is_answer,
                        b.id as sheetID
                        FROM questions a
                        INNER JOIN exam_sheets b
                        ON a.id = b.question_id
                        WHERE b.user_exams_id = '$userExamID' AND b.user_id = '$userID' AND b.exam_id = '$examID'  ORDER BY b.sequence ASC LIMIT 10";
        $resultQustions = mysql_query($sqlQustions);
        $numRowsQustions = mysql_num_rows($resultQustions);
        if($numRowsQustions > 0)
        {
            $sequence = 1;
            while ($rowQustions = mysql_fetch_assoc($resultQustions)) 
            {
                $sheetID = $rowQustions["sheetID"];
                $questionsID = $rowQustions["questionsID"];
                $question = $rowQustions["question"];
                $questionOptions = $rowQustions["question_options"];
                $answer = $rowQustions["answer"];
                $isAnswer = $rowQustions["is_answer"];
                if($isAnswer == -1)
                $isAnswer = 0;    

                $questionSheet[] = array('examID' => $examID,
                                        'userExamID' => $userExamID,
                                        'sheetID' => $sheetID,
                                        'questionsID' => $questionsID, 
                                        'question' => $question, 
                                        'questionOptions' => unserialize($questionOptions), 
                                        'answer' => $answer,
                                        'isAnswer' => $isAnswer);

                $sequence = $sequence + 1;
            }
        }
        else
        {
            $sqlQustions = "SELECT 
                        id as questionsID,
                        question as question,
                        question_options as question_options,
                        answer as answer
                        FROM questions
                        WHERE exam_id = '$examID' ORDER BY RAND() LIMIT 10";
            $resultQustions = mysql_query($sqlQustions);
            $numRowsQustions = mysql_num_rows($resultQustions);
            if($numRowsQustions > 0)
            {
                $sequence = 1;
                while ($rowQustions = mysql_fetch_assoc($resultQustions))
                {
                    $questionsID = $rowQustions["questionsID"];
                    $question = $rowQustions["question"];
                    $questionOptions = $rowQustions["question_options"];
                    $answer = $rowQustions["answer"];
                    $isAnswer = 0;
                    $sqlInsertSheet = "INSERT INTO exam_sheets (user_id, exam_id, camp_id, user_exams_id, sequence, question_id) 
                                       VALUES ('$userID', '$examID', '$campaignID', '$userExamID', '$sequence', '$questionsID')";
                    $resultInsertExamsSheet = mysql_query($sqlInsertSheet);
                    $sheetID = mysql_insert_id();
                    $questionSheet[] = array('examID' => $examID,
                                            'userExamID' => $userExamID,
                                            'sheetID' => $sheetID,
                                            'questionsID' => $questionsID, 
                                            'question' => $question, 
                                            'questionOptions' => unserialize($questionOptions), 
                                            'answer' => $answer,
                                            'isAnswer' => $isAnswer);

                    $sequence = $sequence + 1;
                }
            }
            else
            {
                $questionSheet[] = "Questions are not available";
            } 
        }
 
        $resultCode = array('code' => "1", 'message' => 'Success', 'accessInfo' => $questionSheet);
        return $resultCode; 

    }



    /*
    |--------------------------------------------------------------------------
    | Get Exam Rules
    |--------------------------------------------------------------------------
    */  

    function getExamRules($userID, $examID)
    {
        $examRules = array();
        $examRules[1] = 'There are 10 multiple choice items in this park.';
        $examRules[2] = 'Time limit - 10 minutes for this subject.';
        $examRules[3] = 'Answer every questions correctly to complete the challenge.';
        $examRules[4] = 'The faster you beat the challenger, the higher your rank.';
        $examRules[5] = 'Able to select again this subject after completed others subject.';
        $examRules[6] = 'Enjoy and learn.';

        $accessInfo = array('title' => 'Subject wise Quiz Rules:', 'examID' => $examID, 'examRules' => $examRules);
        $resultCode = array('code' => "1", 'message' => 'Success', 'accessInfo' => $accessInfo);
        return $resultCode;    
    }


    /*
    |--------------------------------------------------------------------------
    | Get Exam Rules
    |--------------------------------------------------------------------------
    */  

    function getExamCommonRules($userID)
    {
        $examRules = array();
        $examRules[1] = 'There are 10 multiple choice items in any park.';
        $examRules[2] = 'Time limit - 10 minutes for Math & 5 minutes for other subjects.';
        $examRules[3] = 'Answer every questions correctly to complete the challenge.';
        $examRules[4] = 'The faster you beat the challenger, the higher your rank.';
        $examRules[5] = 'Able to select again any subject after completed others subject.';
        $examRules[6] = 'Enjoy and learn.';

        $accessInfo = array('title' => 'Quiz Rules:', 'examRules' => $examRules);
        $resultCode = array('code' => "1", 'message' => 'Success', 'accessInfo' => $accessInfo);
        return $resultCode;    
    }



    /*
    |--------------------------------------------------------------------------
    | Post Help Post
    |--------------------------------------------------------------------------
    */  

    function helpPost($userID, $email, $message)
    {
        
        $message = base64_decode($message);
        $accessInfo = "NULL";
        $resultCode = array('code' => "1", 'message' => 'Success', 'accessInfo' => $accessInfo);
        return $resultCode;    
    }



    /*
    |--------------------------------------------------------------------------
    | submit Exam Sheet
    |--------------------------------------------------------------------------
    */ 
    function submitExamSheet($userExamID, $sheetID, $answer, $isCorect, $isComplete, $userID)
    {
        // UPDATE EXAM SHHET
        $campaignID = $this->campaignID;
        $examResult = array();
        $ansTimeDate = date('Y-m-d H:i:s');
        $sqlExamSheet = "UPDATE exam_sheets SET answer = '$answer', is_answer = 1, is_correct = '$isCorect', answer_time = '$ansTimeDate', num_answer = num_answer + 1 
                         WHERE id = '$sheetID'";
        $resultExamSheet = mysql_query($sqlExamSheet);

        $sqlCheck = "SELECT * FROM exam_sheets WHERE id = $sheetID AND num_answer = 1";
        $resultCheck = mysql_query($sqlCheck);
        $numRows = mysql_num_rows($resultCheck);
        if($numRows == 1)
        {    
            if($isComplete == 1)
            $submitDate = date('Y-m-d H:i:s');
            else
            $submitDate = "0000-00-00 00:00:00";

            if($isCorect == 1)
            {    
                $sqlUserExam = "UPDATE users_exams SET correct = correct + 1, points = points + 10, is_complete = '$isComplete', submit_date = '$submitDate' 
                                WHERE id = '$userExamID'";
            }                    
            else
            {    
                $sqlUserExam = "UPDATE users_exams SET wrong = wrong + 1, is_complete = '$isComplete', submit_date = '$submitDate' 
                                WHERE id = '$userExamID'";
            }

            $resultUpdateUserExam = mysql_query($sqlUserExam);
        }

        if($isComplete == 1)
        {
            $sql = "SELECT * FROM users_exams WHERE id = '$userExamID'";
            $result = mysql_query($sql);
            $numRows = mysql_num_rows($result);
            if($numRows > 0)
            {
                while ($row = mysql_fetch_assoc($result)) 
                {
                    $points = $row['points'];
                    $questions = $row['questions'];
                    $correct = $row['correct'];
                    $wrong = $row['wrong'];
                    $startTime = $row['attempt_date'];
                    $endTime = $row['submit_date'];
                    $examResult = array('points' => $points, 'questions' => $questions, 'correct' => $correct, 'wrong' => $wrong, 'startTime' => $startTime, 'endTime' => $endTime);
                }    
            }
            else
            {
                $examResult = "NULL";
            }
            
            $totalEarnPorints = $this->GetEarnPoints($userID);
            $examSubmitInfo = array('userExamID' => $userExamID,'totalPoints' => $totalEarnPorints, 'examResult' => $examResult);
            return $resultCode = array('code' => "1", 'message' => 'Success', 'submitedAnswer' => $answer, 'accessInfo' => $examSubmitInfo);
        }
        else
        {
            return $resultCode = array('code' => "1", 'message' => 'Success', 'submitedAnswer' => $answer, 'accessInfo' => 'NULL');
        }
    

    }


    /*
    |--------------------------------------------------------------------------
    | leader board information
    |--------------------------------------------------------------------------
    */  

    function leaderBoard($userID)
    {
        
        $topThreeArray = array();
        $topPointArray = array();
        $myPositionArray = array();
        $currentMonth = date('Y-m');
        $campaignID = $this->campaignID;
        // Get Last Three Position

        $sqlMonthlyTop3 = "SELECT 
                      a.id as userID,
                      a.full_name as fullName,
                      a.phone_no as phoneNo,
                      a.images as image,
                      SUM(b.points) as points
                      FROM users a
                      INNER JOIN users_exams b
                      ON a.id = b.user_id
                      WHERE b.camp_id = '$campaignID' AND attempt_date LIKE '$currentMonth%'
                      GROUP BY a.id ORDER BY points DESC LIMIT 3";
        $resultMonthlyTop3 = mysql_query($sqlMonthlyTop3);
        $numRowsMonthlyTop3 = mysql_num_rows($resultMonthlyTop3);
        if($numRowsMonthlyTop3 > 0)
        {
            $k = 0; 
            while ($rowMonlthlyTop3 = mysql_fetch_assoc($resultMonthlyTop3)) 
            {   
                $top3UserID = $rowMonlthlyTop3['userID'];
                $top3FullName = $rowMonlthlyTop3['fullName'];
                $top3PhoneNo = $rowMonlthlyTop3['phoneNo'];
                //$top3Images = $rowMonlthlyTop3['image'];
                $top3Points = $rowMonlthlyTop3['points'];
                //$ppTop3 = PROFILE_IMG_API.$top3UserID;
                $ppTop3 = $this->userProfilePImages($top3UserID);
                $topThreeArray[$k] = array('userID' => $top3UserID, 'fullName' => $top3FullName, 'phoneNo' => $top3PhoneNo, 'image' => $ppTop3, 'point' => $top3Points, 'position' => $k);
                $k++; 

            }    
        }          

        $sqlMonthly = "SELECT 
                      a.id as userID,
                      a.full_name as fullName,
                      a.phone_no as phoneNo,
                      a.images as image,
                      SUM(b.points) as points
                      FROM users a
                      INNER JOIN users_exams b
                      ON a.id = b.user_id
                      WHERE b.camp_id = '$campaignID' AND attempt_date LIKE '$currentMonth%'
                      GROUP BY a.id ORDER BY points DESC LIMIT 100";
        $resultMonthly = mysql_query($sqlMonthly);
        $numRowsMonthly = mysql_num_rows($resultMonthly);
        if($numRowsMonthly > 0)
        {    $k = 0; 
            while ($rowMonlthly = mysql_fetch_assoc($resultMonthly)) 
            {   
                $topUserID = $rowMonlthly['userID'];
                $topFullName = $rowMonlthly['fullName'];
                $topPhoneNo = $rowMonlthly['phoneNo'];
                //$topImages = $rowMonlthly['image'];
                $topPoints = $rowMonlthly['points'];
                //$ppTop = PROFILE_IMG_API.$topUserID;
                $ppTop = $this->userProfilePImages($topUserID);
                $topPointArray[$k] = array('userID' => $topUserID, 'fullName' => $topFullName, 'phoneNo' => $topPhoneNo, 'image' => $ppTop, 'point' => $topPoints, 'position' => $k);
                if($userID == $topUserID)
                {    
                    $myPositionArray[] = array('userID' => $topUserID, 'fullName' => $topFullName, 'phoneNo' => $topPhoneNo, 'image' => $ppTop, 'point' => $topPoints, 'position' => $k);
                }        
                $k++;
            }    
        }      

                      
        $accessInfo = array('topPoints' => $topThreeArray, 'topPointArray' => $topPointArray, 'myPosition' => $myPositionArray);
        $resultCode = array('code' => "1", 'message' => 'Success', 'accessInfo' => $accessInfo);
        return $resultCode;    
    }



    /*
    |--------------------------------------------------------------------------
    | leader board (Al Time)information
    |--------------------------------------------------------------------------
    */  


    function leaderBoardAlTime($userID)
    {
        
        $topThreeArray = array();
        $topPointArray = array();
        $myPositionArray = array();
        $currentMonth = date('Y-m');
        $campaignID = $this->campaignID;
        // Get Last Three Position

        $sqlMonthlyTop3 = "SELECT 
                      a.id as userID,
                      a.full_name as fullName,
                      a.phone_no as phoneNo,
                      a.images as image,
                      SUM(b.points) as points
                      FROM users a
                      INNER JOIN users_exams b
                      ON a.id = b.user_id
                      WHERE b.camp_id = '$campaignID'
                      GROUP BY a.id ORDER BY points DESC LIMIT 3";
        $resultMonthlyTop3 = mysql_query($sqlMonthlyTop3);
        $numRowsMonthlyTop3 = mysql_num_rows($resultMonthlyTop3);
        if($numRowsMonthlyTop3 > 0)
        {
            $k = 0; 
            while ($rowMonlthlyTop3 = mysql_fetch_assoc($resultMonthlyTop3)) 
            {   
                $top3UserID = $rowMonlthlyTop3['userID'];
                $top3FullName = $rowMonlthlyTop3['fullName'];
                $top3PhoneNo = $rowMonlthlyTop3['phoneNo'];
                //$top3Images = $rowMonlthlyTop3['image'];
                $top3Points = $rowMonlthlyTop3['points'];
                //$ppTop3 = PROFILE_IMG_API.$top3UserID;
                $ppTop3 = $this->userProfilePImages($top3UserID);
                $topThreeArray[$k] = array('userID' => $top3UserID, 'fullName' => $top3FullName, 'phoneNo' => $top3PhoneNo, 'image' => $ppTop3, 'point' => $top3Points, 'position' => $k);
                $k++; 

            }    
        }          


        $sqlMonthly = "SELECT 
                      a.id as userID,
                      a.full_name as fullName,
                      a.phone_no as phoneNo,
                      a.images as image,
                      SUM(b.points) as points
                      FROM users a
                      INNER JOIN users_exams b
                      ON a.id = b.user_id
                      WHERE b.camp_id = '$campaignID'
                      GROUP BY a.id ORDER BY points DESC LIMIT 100";
        $resultMonthly = mysql_query($sqlMonthly);
        $numRowsMonthly = mysql_num_rows($resultMonthly);
        if($numRowsMonthly > 0)
        {    $k = 0; 
            while ($rowMonlthly = mysql_fetch_assoc($resultMonthly)) 
            {   
                $topUserID = $rowMonlthly['userID'];
                $topFullName = $rowMonlthly['fullName'];
                $topPhoneNo = $rowMonlthly['phoneNo'];
                //$topImages = $rowMonlthly['image'];
                $topPoints = $rowMonlthly['points'];
                //$ppTop = PROFILE_IMG_API.$topUserID;
                $ppTop = $this->userProfilePImages($topUserID);
                $topPointArray[$k] = array('userID' => $topUserID, 'fullName' => $topFullName, 'phoneNo' => $topPhoneNo, 'image' => $ppTop, 'point' => $topPoints, 'position' => $k);
                if($userID == $topUserID)
                {    
                    $myPositionArray[] = array('userID' => $topUserID, 'fullName' => $topFullName, 'phoneNo' => $topPhoneNo, 'image' => $ppTop, 'point' => $topPoints, 'position' => $k);
                }        
                $k++;
            }    
        }      

                      
        $accessInfo = array('topPoints' => $topThreeArray, 'topPointArray' => $topPointArray, 'myPosition' => $myPositionArray);
        $resultCode = array('code' => "1", 'message' => 'Success', 'accessInfo' => $accessInfo);
        return $resultCode;    
    }



    /*
    |--------------------------------------------------------------------------
    | Get Resent Exam Sheet Information
    |--------------------------------------------------------------------------
    */  

    function getResentExamSheet($userID, $userExamID)
    {
        $questionSheet = array();

        $sqlQustions = "SELECT 
                        a.id as questionsID,
                        a.question as question,
                        a.question_options as question_options,
                        a.answer as answer,
                        b.answer as submitAnswer,
                        b.id as sheetID,
                        b.is_answer as isAnswer
                        FROM questions a
                        INNER JOIN exam_sheets b
                        ON a.id = b.question_id
                        WHERE b.user_exams_id = '$userExamID' AND b.user_id = '$userID' ORDER BY b.sequence ASC LIMIT 100";
        
        $resultQustions = mysql_query($sqlQustions);
        $numRowsQustions = mysql_num_rows($resultQustions);
        if($numRowsQustions > 0)
        {
            while ($rowQustions = mysql_fetch_assoc($resultQustions)) 
            {
                $sheetID = $rowQustions["sheetID"];
                $question = $rowQustions["question"];
                $questionOptions = $rowQustions["question_options"];
                $answer = $rowQustions["answer"];
                $submitAnswer = $rowQustions["submitAnswer"];
                $isAnswer = $rowQustions["isAnswer"];
                if($isAnswer == -1)
                $isAnswer = 0;    
                $questionSheet[] = array('userExamID' => $userExamID,
                                        'sheetID' => $sheetID,
                                        'question' => $question, 
                                        'questionOptions' => unserialize($questionOptions), 
                                        'answer' => $answer,
                                        'submitAnswer' => $submitAnswer,
                                        'isAnswer' => $isAnswer);
            }
        }

        $resultCode = array('code' => "1", 'message' => 'Success', 'accessInfo' => $questionSheet);
        return $resultCode; 

    }



    /*
    |--------------------------------------------------------------------------
    | Get Profile Picture
    |--------------------------------------------------------------------------
    */  

    function profilePicture($userID)
    {        
        $accessInfo = array('pofilePictute' => 'http://202.126.123.152:8002/profile_picture.php?userID='.$userID);
        $resultCode = array('code' => "1", 'message' => 'Success', 'accessInfo' => $accessInfo);
        return $resultCode;    
    }


    /*
    |--------------------------------------------------------------------------
    | prepare exam sheets
    |--------------------------------------------------------------------------
    */  
    function prepareExams($userID, $examID, $campaignID, $questions, $round = 1)
    {
        $prepareTimes = date('Y-m-d H:i:s');
        $sqlInsertExams = "INSERT INTO users_exams (user_id, exam_id, camp_id, points, questions, correct, wrong, rounds, prepare_times) 
                           VALUES ('$userID', '$examID', '$campaignID', 0, '$questions', 0, 0, '$round', '$prepareTimes')";
        $resultInsertExams = mysql_query($sqlInsertExams);
        //return mysql_error();
    }

    /*
    |--------------------------------------------------------------------------
    | prepare exam sheets
    |--------------------------------------------------------------------------
    */  

    function prepareExamsNextRound($userID, $round = 1)
    {
        $campaignID = $this->campaignID;
        $prepareTimes = date('Y-m-d H:i:s');
        $sqlExamsInfo = "SELECT * FROM examinations WHERE status = 1 AND camp_id = '$campaignID'";
        $resultExamInfo = mysql_query($sqlExamsInfo);
        $numRowsExamInfo = mysql_num_rows($resultExamInfo);
        if($numRowsExamInfo > 0)
        {
            while ($rowExamInfo = mysql_fetch_assoc($resultExamInfo)) 
            {

                $examID = $rowExamInfo['id'];
                $questions = $rowExamInfo['no_question'];
                $sqlInsertExams = "INSERT INTO users_exams (user_id, exam_id, camp_id, points, questions, correct, wrong, rounds, prepare_times) 
                           VALUES ('$userID', '$examID', '$campaignID', 0, '$questions', 0, 0, $round, '$prepareTimes')";
                $resultInsertExams = mysql_query($sqlInsertExams);
                //return mysql_error();
             }
        }        
                
    }





}

?>
