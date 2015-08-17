<?php 
session_start();
$pass=$_SESSION['myname'];

$sql="SELECT * FROM Account_Info WHERE username='".$pass."'";

	$stmt = OCIParse($db, $sql); 
  
	if(!$stmt)  
	{
		echo "An error occurred in parsing the sql string.\n"; 
		exit; 
	  }
	OCIExecute($stmt); 
    
	while(OCIFetch($stmt)) {

		$username= OCIResult($stmt,"USERNAME");
		$email= OCIResult($stmt,"EMAIL");
		$phone= OCIResult($stmt,"PHONE");
		$company= OCIResult($stmt,"COMPANY");
		$address= OCIResult($stmt,"ADDRESS");
		
	}
	$_SESSION['userid']=$id;
?>