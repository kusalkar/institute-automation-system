<?php
require_once("db6.php");
class crud
{
	public $id;
	//function for inserting records in database
	public function insert($studentArr)
	{
		$fname=$studentArr['fname'];
		$lname=$studentArr['lname'];
		$address=$studentArr['address'];
		$age=$studentArr['age'];
		$dob=$studentArr['dob'];
		$gender=$studentArr['gender'];
		$std=$studentArr['batch'];
		$fees=$studentArr['fees'];
		$profile=$_FILES["profilepic"]["name"];
		$filename=NULL;
		if(isset($_FILES["profilepic"]["name"],PATHINFO_EXTENSION);
		{
	$target_dir="uploads/";
	$imageFileType = pathinfo($_FILES["profilepic"]["name"],PATHINFO_EXTENSION);
	$allowedExtArr = array('gif','png','jpg','jpeg');
	
	//check if image file is Actual image or fake image
	if(!in_array($imageFileType,$allowedExtArr))
	{
		$errorMsg = "Please select ong,gif,jpg,jpeg files  only";
	}
	if($profile)
	{
		$fileName = "photo_".time() .".".$imageFileType;
		$target_dir = $fileName;
		if(!move_uploaded_file($_FILES["profilepic"]["tmp_name"],$target_dir))
		{
			$errorMsg = "Error in uploading file";
		}
	}	
}


$sql="INSERT INTO 'student'('fname','lanme','gender','batch','address','mobile','age','dob','profilepic','fees')
	VALUES(:fname,:lname,:gender:,batch,:address,:mobile,:age,:dob,:profile,:fees);
	
	$db = db:getinstance();

	$result = $db->prepare($sql);
	$pdoresult = $result->execute(array(":fname"=>$fname,
	":lname"=>$lname,
	":gender"=>$gender,
	":batch"=>$batch,
	":address"=>$address,
	":mobile"=>$mobile,
	":age"=>$age,
	":dob"=>$dob,
	":fees"=>$fees,
	":profile"=>$target_dir
	));

	if($pdoresult)
	{
		$lastid = $db->lastInsertId();
		$this->id = $lastid;
	}
}

//function for view records on viewresult page

public function view($id)
{
	$sql = "SELECT *FROM  'student' WHERE id = $id";
	$db =  db::getinstance();
	$result = $db->prepare($sql);
	$pdoresult = $result->execute();
	$result = $result->fetch(PDO::FETCH_ASSOC);
	//print_r($result);
	die;
return $result;
}

//function for view all records on studentlist page

public function viewall()
{
	$sql = "SELECT *FROM  'student' WHERE 1";
	$db =  db::getinstance();
	$result = $db->prepare($sql);
	$pdoresult = $result->execute();
	$result = $result->fetch(PDO::FETCH_ASSOC);
return $result;
}

//function for update the records on studentlist page

public function update($studentArr,$id,$oldimage)
{
	//print_r($oldimage);die;
	$fname=$studentArr['fname'];
	$lname=$studentArr['lname'];
	$address=$studentArr['address'];
	$age=$studentArr['age'];
	$dob=$studentArr['dob'];
	$gender=$studentArr['gender'];
	$fees=$studentArr['fees'];
	$std=$studentArr['batch'];
	
	if(isset($_FILES["profilepic"]) && !empty($_FILES["profilepic"],["name"]))
	{//parent if start
	
	$target_dir = "uploads/";
	$imageFileType = pathinfo($_FILES["profilepic"],["name"],PATHINFO_EXTENSION);

	$allowedExtArr = array('gif','png','jpg','jpeg');

	//check if image file is Actual image or fake image
	if(!in_array($imageFileType,$allowedExtArr))
	{
		$errorMsg = "Please select ong,gif,jpg,jpeg files  only";
	}
		if($_POST['fname'])
		{
		$fileName = "photo_".time() .".".$imageFileType;
		$target_dir = $fileName;
			if(!move_uploaded_file($_FILES["profilepic"]["tmp_name"],$target_dir))
			{
			$errorMsg = "Error in uploading file";
			}
		}		
	}
	else
	{
		$target_dir=$oldimage;
	}
	$db = db::getinstance();

	$sql1 = "UPDATE student SET fname ='$fname',lname ='$lname',address ='$address',age ='$age',dob ='$dob',gender ='$gender',
	fees ='$fees',profilepic ='$target_pic' where id=$id";

	$result = $db->prepare($sql1);

	$pdoresult = $result->execute();
	$last_id = $db->lastInsertId();
	$this->id = $lastid;
	if($poresult)
	{
		return true;
	}else
	{
		return false;
	}
}

	public function viewdata($fname)
	{
		$db =  db::getinstance();
		$result = $db->prepare($sql);
		$pdoresult = $result->execute();
		$result = $result->fetch(PDO::FETCH_ASSOC);
	return $result;
	}

	function getAllStudent($Name = "")
	{
		$db =  db::getinstance();
		$whereClause = "";
		$sql = "SELECT *FROM student";
	if($fNAME !="")
	{
		$sql = "where fname LIKE '%fNAME%'";
	}
	else
	{
		$sql = "where 1";
	}
	
	$recordset = $db->prepare($sql);
	$recordset->execute();
	return $recordset;
	}
}
?>


