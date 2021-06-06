<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
|--------------------------------------------------------------------------
| Display Debug backtrace
|--------------------------------------------------------------------------
|
| If set to TRUE, a backtrace will be displayed along with php errors. If
| error_reporting is disabled, the backtrace will not display, regardless
| of this setting
|
*/
defined('SHOW_DEBUG_BACKTRACE') OR define('SHOW_DEBUG_BACKTRACE', TRUE);

/*
|--------------------------------------------------------------------------
| File and Directory Modes
|--------------------------------------------------------------------------
|
| These prefs are used when checking and setting modes when working
| with the file system.  The defaults are fine on servers with proper
| security, but you may wish (or even need) to change the values in
| certain environments (Apache running a separate process for each
| user, PHP under CGI with Apache suEXEC, etc.).  Octal values should
| always be used to set the mode correctly.
|
*/
defined('FILE_READ_MODE')  OR define('FILE_READ_MODE', 0644);
defined('FILE_WRITE_MODE') OR define('FILE_WRITE_MODE', 0666);
defined('DIR_READ_MODE')   OR define('DIR_READ_MODE', 0755);
defined('DIR_WRITE_MODE')  OR define('DIR_WRITE_MODE', 0755);

/*
|--------------------------------------------------------------------------
| File Stream Modes
|--------------------------------------------------------------------------
|
| These modes are used when working with fopen()/popen()
|
*/
defined('FOPEN_READ')                           OR define('FOPEN_READ', 'rb');
defined('FOPEN_READ_WRITE')                     OR define('FOPEN_READ_WRITE', 'r+b');
defined('FOPEN_WRITE_CREATE_DESTRUCTIVE')       OR define('FOPEN_WRITE_CREATE_DESTRUCTIVE', 'wb'); // truncates existing file data, use with care
defined('FOPEN_READ_WRITE_CREATE_DESTRUCTIVE')  OR define('FOPEN_READ_WRITE_CREATE_DESTRUCTIVE', 'w+b'); // truncates existing file data, use with care
defined('FOPEN_WRITE_CREATE')                   OR define('FOPEN_WRITE_CREATE', 'ab');
defined('FOPEN_READ_WRITE_CREATE')              OR define('FOPEN_READ_WRITE_CREATE', 'a+b');
defined('FOPEN_WRITE_CREATE_STRICT')            OR define('FOPEN_WRITE_CREATE_STRICT', 'xb');
defined('FOPEN_READ_WRITE_CREATE_STRICT')       OR define('FOPEN_READ_WRITE_CREATE_STRICT', 'x+b');

/*
|--------------------------------------------------------------------------
| Exit Status Codes
|--------------------------------------------------------------------------
|
| Used to indicate the conditions under which the script is exit()ing.
| While there is no universal standard for error codes, there are some
| broad conventions.  Three such conventions are mentioned below, for
| those who wish to make use of them.  The CodeIgniter defaults were
| chosen for the least overlap with these conventions, while still
| leaving room for others to be defined in future versions and user
| applications.
|
| The three main conventions used for determining exit status codes
| are as follows:
|
|    Standard C/C++ Library (stdlibc):
|       http://www.gnu.org/software/libc/manual/html_node/Exit-Status.html
|       (This link also contains other GNU-specific conventions)
|    BSD sysexits.h:
|       http://www.gsp.com/cgi-bin/man.cgi?section=3&topic=sysexits
|    Bash scripting:
|       http://tldp.org/LDP/abs/html/exitcodes.html
|
*/
defined('EXIT_SUCCESS')        OR define('EXIT_SUCCESS', 0); // no errors
defined('EXIT_ERROR')          OR define('EXIT_ERROR', 1); // generic error
defined('EXIT_CONFIG')         OR define('EXIT_CONFIG', 3); // configuration error
defined('EXIT_UNKNOWN_FILE')   OR define('EXIT_UNKNOWN_FILE', 4); // file not found
defined('EXIT_UNKNOWN_CLASS')  OR define('EXIT_UNKNOWN_CLASS', 5); // unknown class
defined('EXIT_UNKNOWN_METHOD') OR define('EXIT_UNKNOWN_METHOD', 6); // unknown class member
defined('EXIT_USER_INPUT')     OR define('EXIT_USER_INPUT', 7); // invalid user input
defined('EXIT_DATABASE')       OR define('EXIT_DATABASE', 8); // database error
defined('EXIT__AUTO_MIN')      OR define('EXIT__AUTO_MIN', 9); // lowest automatically-assigned error code
defined('EXIT__AUTO_MAX')      OR define('EXIT__AUTO_MAX', 125); // highest automatically-assigned error code

defined('DATABASE_HOST')      OR define('DATABASE_HOST', 'localhost');
defined('DATABASE_USER')      OR define('DATABASE_USER', 'rabby456_quser');
defined('DATABASE_PASSWORD')  OR define('DATABASE_PASSWORD', '7eiHpPCL57GrC');
defined('DATABASE_NAME')      OR define('DATABASE_NAME', 'rabby456_quizbuzz');


$base_url = ((isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] == "on") ? "https" : "http");
$base_url .= "://".$_SERVER['HTTP_HOST'];
if (!isset($_SERVER['ORIG_SCRIPT_NAME'])) {
	$base_url .= str_replace(basename($_SERVER['SCRIPT_NAME']),"",$_SERVER['SCRIPT_NAME']);
}
else {
	$base_url .= str_replace(basename($_SERVER['ORIG_SCRIPT_NAME']),"",$_SERVER['ORIG_SCRIPT_NAME']);
}
defined('BASE_URL')      OR define('BASE_URL', $base_url);

defined('UPLOAD_DIR')      OR define('UPLOAD_DIR', './upload/');
defined('LIMIT_PERPAGE')      OR define('LIMIT_PERPAGE', 20);
defined('LOGIN_TITLE')      OR define('LOGIN_TITLE', 'Quiz - Administrator Login');
defined('SITE_TITLE')      OR define('SITE_TITLE', 'Quiz Buzz Admin Admin Panel');
defined('COM_NAME')      OR define('COM_NAME', 'Arena Phone BD Ltd');
defined('FAVICON')      OR define('FAVICON', 'favicon.ico');
defined('LOGO_IMG')      OR define('LOGO_IMG', 'arena.png');
defined('LOGO_WHITE')      OR define('LOGO_WHITE', 'logo_white.png');
defined('SWITCH_SITE_URL')      OR define('SWITCH_SITE_URL', 'http://www.arena.com.bd');


/************* User Type **************/
defined('AMIN_TYPE')      OR define('AMIN_TYPE', 0);
defined('EMPLOYEE_TYPE')      OR define('EMPLOYEE_TYPE', 1);
defined('INSTRUCTOR_TYPE')      OR define('INSTRUCTOR_TYPE', 2);
defined('STUDENT_TYPE')      OR define('STUDENT_TYPE', 3);


/************* Exam Type **************/
defined('ACADEMIC')      OR define('ACADEMIC', 1);
defined('SELECTION')      OR define('SELECTION', 0);

/************* Question Bank Type **************/
defined('LONG_ANSWER')      OR define('LONG_ANSWER', 1);
defined('SHORT_ANSWER')      OR define('SHORT_ANSWER', 2);
defined('MCQSA')      OR define('MCQSA', 3); // Multiple Choice Single Answer
defined('MCQMA')      OR define('MCQMA', 4); // Multiple Choice Multiple Answer


/************* Education Type **************/
defined('HIGHER_SECONDARY')      OR define('HIGHER_SECONDARY', 1);
defined('GRADUATES')      OR define('GRADUATES', 2);
defined('MASTERS')      OR define('MASTERS', 3); 


/************* Current Position **************/
defined('STUDENT')      OR define('STUDENT', 1);
defined('FREELANCER')      OR define('FREELANCER', 2);
defined('SERVICE_HOLDER')      OR define('SERVICE_HOLDER', 3);
defined('LOOKING_JOB')      OR define('LOOKING_JOB', 4); 


 
/************* Form Validtion **************/
define('MIN_USER_NAME_LEN',   '6');
define('MAX_USER_NAME_LEN',   '15');
define('MIN_PASSWORD_NAME_LEN',   '6');
define('MAX_PASSWORD_NAME_LEN',   '15');

/************* Form Message **************/

define('FROMMESSAGE001',        'please fill in all required fields');
define('FROMMESSAGE002',        'CourseID already assign. Please try others ID');
define('FROMMESSAGE005',        'Selection Exam already exists. Please try others');
define('FROMMESSAGE007',        'Email address already taken training program');
define('FROMMESSAGE008',        'Phone number already taken training program');
define('FROMMESSAGE009',        'This Routine already assign for the Batch');


define("FROMMESSAGE0001",		"<div class='alert alert-success fade in'>
    								<button class='close' data-dismiss='alert'>×</button>
   									<i class='fa-fw fa fa-check'></i>
    								<strong>Success</strong> You have successfully inserted information
								</div>");


define("FROMMESSAGE0002",		"<div class='alert alert-success fade in'>
    								<button class='close' data-dismiss='alert'>×</button>
   									<i class='fa-fw fa fa-check'></i>
    								<strong>Success</strong> You have successfully updated information
								</div>");


define("FROMMESSAGE0003",		"<div class='alert alert-success fade in'>
    								<button class='close' data-dismiss='alert'>×</button>
   									<i class='fa-fw fa fa-check'></i>
    								<strong>Success</strong> You have successfully deleted information
								</div>");

define("FROMMESSAGE0005",   "<div class='alert alert-warning fade in'>
                                <button class='close' data-dismiss='alert'>×</button>
                                <i class='fa-fw fa fa-warning'></i>
                                <strong>Warning</strong> Selection Exam already exists. Please try others.
                            </div>");

define("FROMMESSAGE0006",   "<div class='alert alert-success fade in'>
                    <button class='close' data-dismiss='alert'>�</button>
                    <i class='fa-fw fa fa-check'></i>
                    <strong>Success</strong> You have successfully sent email for Pre-Selection Test
                </div>");

define("FROMMESSAGE0007",   "<div class='alert alert-warning fade in'>
                                <button class='close' data-dismiss='alert'>×</button>
                                <i class='fa-fw fa fa-warning'></i>
                                <strong>Warning</strong> Email address already taken training program.
                            </div>");

define("FROMMESSAGE0008",   "<div class='alert alert-warning fade in'>
                                <button class='close' data-dismiss='alert'>×</button>
                                <i class='fa-fw fa fa-warning'></i>
                                <strong>Warning</strong> Phone number already taken training program.
                            </div>");

define("FROMMESSAGE0009",       "<div class='alert alert-success fade in'>
                                    <button class='close' data-dismiss='alert'>×</button>
                                    <i class='fa-fw fa fa-check'></i>
                                    <strong>Success</strong> Admission has been successfully completed
                                </div>");

define("FROMMESSAGE0010",       "<div class='alert alert-success fade in'>
                                    <button class='close' data-dismiss='alert'>×</button>
                                    <i class='fa-fw fa fa-check'></i>
                                    <strong>Success</strong> You have successfully Drop Out
                                </div>");

