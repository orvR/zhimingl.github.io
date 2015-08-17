<?php 	// Include database connection
session_start();
 /* Set oracle user login and password info */
require_once('inc/global-connect.inc.php');


	
	// ---------------------------------------------------------------- // 
	// SET PHP VAR - CHANGE THEM										// 
	// ---------------------------------------------------------------- // 
	// You can use these variables to define Query Search Parameters:	//
	

	
	$Username=$_POST['username'];
	$Password=$_POST['password']; 
	$Email=$_POST['email'];
	$Phone=$_POST['phone']; 
	$Company=$_POST['company'];
	$Address=$_POST['address'];
	// insert value
				  $query_count = "SELECT MAX(ID) FROM MEMBERS";
	/* check the sql statement for errors and if errors report them */
			  $stmt = OCIParse($db, $query_count); 

			  if(!$stmt)  {
				echo "An error occurred in parsing the sql string.\n"; 
				exit; 
			  }

			  OCIExecute($stmt);			  

			  if (OCIFetch($stmt))  {
				
				$count = OCIResult($stmt,1);//returns the data for column 1 
		//echo $count."</br>";

			  } else {
				echo "An error occurred in retrieving order id.\n"; 
				exit; 
			  }

			  $count++;
		// build INSERT query
               $query = "INSERT INTO Account_Info VALUES ('".$Username."','".$Password."','".$Email."',".$Phone.",'".$Company."','".$Address."')";
				  
		//echo "$query";
				  

		/* check the sql statement for errors and if errors report them */
			  $stmt = OCIParse($db, $query); 
			  //echo "SQL: $query<br>";
			  if(!$stmt)  {
				echo "An error occurred in parsing the sql string.\n"; 
				exit; 
			  }
			  OCIExecute($stmt); 
			  header("location:showregister.php?q=".$Username);
?>