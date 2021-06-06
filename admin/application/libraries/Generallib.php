<?php 
class generallib{

var $resultString = "Rows 0 - 0 from 0.";
var $pagingString = "";
var $limitString  = "";
var $startPositition = 0;

function __construct()
        {
        		// parent::__construct();
                $this->obj1 =& get_instance();
        }




function showPaginationmy($url, $totalRow,  $limit=10 , $startOffset=0,$planid)
 {


   $totalPage 		= 1;
   $currentPage  	= 1;
   $prevPage 		= 0;
   $nextPage 		= 1;


	$totalPage 		= ceil($totalRow/$limit);
	$currentPage 	= ceil($startOffset);
	$prevPage 		= ($currentPage - 1) * $limit;
	$nextPage 		= ($currentPage + 1) * $limit;

	$starting 		= $startOffset * $limit  + 1;

	$ending 		= $starting+10;

//echo "<<<".$startOffset;
	if($ending>= $totalRow)
	 {
	   $ending 		= $totalRow;
	 }

    if($prevPage < 0)
     {
       $prevPage 	= 0;
     }

	if($nextPage >= $totalRow)
	 {
	   $nextPage 	= $startOffset;
	 }



$startPage = 1;

if($currentPage/2 > 10 )
{
  $startPage = $currentPage - 10;
}

if($totalPage>20)
{
  $totalPage = $startPage + 20;
}



	$txt ="";



	 if($currentPage >0)
       $txt .= "&nbsp;&nbsp;<a href='#' onclick = 'dopagination($planid,".($currentPage-1).",$limit)'  style='text-decoration:none;'>Previous</a>&nbsp;&nbsp;";

	for($i=$startPage;$i<$totalPage;$i++)
	    {
	     // echo $i." = ".$currentPage."<BR>";

	      $sta = ($i * $limit);
	      if($i-1==$currentPage)
	       {
	       //$txt .= "&nbsp;<a href='#' onclick = 'dopagination($planid,".($i-1).",$limit)' style='text-decoration:none;color:blue'><b><u>$i</u></b></a>&nbsp;";
$txt .= "&nbsp;<spin style='text-decoration:none;color:blue'><b><u>$i</u></b></spin>&nbsp;";
	       }
	      else
	       $txt .= "&nbsp;<a href='#' onclick = 'dopagination($planid,".($i-1).",$limit)' style='text-decoration:none;color:Black'><b>$i</b></a>&nbsp;";
	       //$txt .= "&nbsp; style='text-decoration:none;color:Black'><b>$i</b>&nbsp;";
        }




 if($currentPage + 1 < $totalPage)
	$txt .= "&nbsp;&nbsp;<a href='#' onclick = 'dopagination($planid,".($currentPage+1).",$limit)'  style='text-decoration:none;'>Next</a>&nbsp;&nbsp;";


return $txt;
//echo $txt;


 }






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




function sec_to_time($seconds) {
    $hours = floor($seconds / 3600);
    $minutes = floor($seconds % 3600 / 60);
    $seconds = $seconds % 60;

    return sprintf("%02d:%02d:%02d", $hours, $minutes, $seconds);
}



/**
 ***********************************************************************
 *@get Campaign List ***************************************************
 ***********************************************************************
*/
	
	function getCampaignList($campID)
	{
		$str = "";
		$query = $this->obj1->db->query("SELECT * FROM campaign WHERE camp_id = '$campID'");
		if($query->num_rows() > 0)
		{
			$row = $query->row();
			$str .="<option value='$row->camp_id'>$row->description - $row->camp_id</option>";
		}
		$str .="<option value=''>-- Select Campaign -- </option>";
		$queryAll = $this->obj1->db->query("SELECT * FROM campaign WHERE status > -1 ORDER BY description ASC");
		if($queryAll->num_rows() > 0)
		{
			foreach ($queryAll->result() as $rowAll)
			{
				$str .="<option value='$rowAll->camp_id'>$rowAll->description - $rowAll->camp_id</option>";
			}
		}

		return $str;
	}


/**
 ***********************************************************************
 *@get Subject List ***************************************************
 ***********************************************************************
*/
	
	function getSubjectList($examID)
	{

		$str = "";
		$query = $this->obj1->db->query("SELECT * FROM examinations WHERE id = '$examID'");
		if($query->num_rows() > 0)
		{
			$row = $query->row();
			$str .="<option value='$row->id'>$row->exam_name</option>";
		}
		$str .="<option value=''>-- Select Subject -- </option>";
		$queryAll = $this->obj1->db->query("SELECT * FROM examinations WHERE status > -1 ORDER BY exam_name ASC");
		if($queryAll->num_rows() > 0)
		{
			foreach ($queryAll->result() as $rowAll)
			{
				$str .="<option value='$rowAll->id'>$rowAll->exam_name</option>";
			}
		}

		return $str;
	}


/**
 ***********************************************************************
 *@get Exam Subject List ***************************************************
 ***********************************************************************
*/

	function getExamSubjectName($idExam)
	{
 		$query = $this->obj1->db->query("SELECT exam_name FROM examinations WHERE id = '$idExam'");
		if ($query->num_rows() > 0)
	 	{
	 		$row = $query->row();
	  		return $row->exam_name;
	 	}
	 	else
	 	return "N/A";
	}












}
?>