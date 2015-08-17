<?php 
session_start();

	// ---------------------------------------------------------------- // 
	// DATABASE CONNECTION PARAMETER 									// 
	// ---------------------------------------------------------------- // 
	// Modify global-connect.inc.php with your DB connection parameters or add them //
	// directly below  					//
	
	//include('global-connect.inc.php'); 

  /* Set oracle user login and password info */
require_once('inc/global-connect.inc.php');

	
	// ---------------------------------------------------------------- // 
	// SET PHP VAR - CHANGE THEM										// 
	// ---------------------------------------------------------------- // 
	// You can use these variables to define Query Search Parameters:	//
	
	// 				field for example title  					//
	$myusername=$_POST['USERNAME'];
	$mypassword=$_POST['PASSWORD']; 
	$_SESSION['myname'] = $myusername;



	
	$sql="SELECT * FROM Account_Info WHERE USERNAME='".$myusername."' and PASSWORD='".$mypassword."'";

	$stmt = OCIParse($db, $sql); 

  
	if(!$stmt)  
	{
		echo "An error occurred in parsing the sql string.\n"; 
		exit; 
	  }
	
    	OCIExecute($stmt); 
	while(OCIFetch($stmt)) {
		
		$number= OCIResult($stmt,"USERNAME");//for valdation the password and username

		$key= OCIResult($stmt,"USERNAME");// for pass the session
	}
	
	if ($number==0)
	{
		header("location:myaccount.php?q=false");
	} 
	else
	{
		
	session_start();
    $_SESSION['key'] = $key;
	 header("location:portfolio.php");


	 
	}
	echo ("<br>");
	
		
?>