<?php session_start();
// Include database connection
require_once('inc/global-connect.inc.php');
// Include functions
require_once('inc/functions.inc.php');
 // Include username functions
require_once('inc/usernamefun.php');


	$query_count = "SELECT MAX(ORDER_ID) FROM Order_Report";
				 /* check the sql statement for errors and if errors report them */
			  $stmt = OCIParse($db, $query_count); 

			  if(!$stmt)  {
				echo "An error occurred in parsing the sql string.\n"; 
				exit; 
			  }
			  OCIExecute($stmt);

			  if (OCIFetch($stmt))  {
				
				$count = OCIResult($stmt,1);
				//returns the data for column 1 
				//echo $count."</br>";

			  } else {
				echo "An error occurred in retrieving order id.\n"; 
				exit; 
			  }

			  $count++;

	$date=date("Ymd");	  
	$sname =$_POST['Givename'];
	$address =$_POST['Address'];
	$postcode =$_POST['Postcode'];
	$email =$_POST['Email'];
	$pay =$_POST['paymethond1'];
	$card =$_POST['card'];
	$expir =$_POST['Emonth']+$_POST['Eyear'];
	$scode =$_POST['Xcode'];
	$userID=$_SESSION['userid'];

$sqip = "insert into Order_Report values ('".$userID."','".$count."','".$_SESSION['cart']."','".$sname."','".$email."','".$pay."','".$card."','".$expir."','".$scode."','".$date."','".$total."')";
	
$sqmt = OCIParse($db, $sqip); 
  	if(!$sqmt)  {
		echo "An error occurred in parsing the sql string.\n"; 
		exit; 
	  }
	 OCIExecute($sqmt);
	 
	header("location:thanks.html");
	
	?>	