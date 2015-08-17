<?php 
	// ---------------------------------------------------------------- // 
	// DATABASE CONNECTION PARAMETER 									// 
	
	

  /* Set oracle user login and password info */
	$userid="zhimingl";
	$passwd="WEt6Kn6h";
	$db="SSID";
    $db = OCILogon($dbuser, $dbpass, $dbname); 

  if (!$db)  {
    echo "An error occurred connecting to the database"; 
    exit; 
  }

	

	
	$inputV =	strip_tags($_GET['s']);

	$sql = "SELECT * FROM product WHERE REGEXP_LIKE(Name,'".$inputV."','i')";
		
	$stmt = OCIParse($db, $sql); 
  
	if(!$stmt)  {
		echo "An error occurred in parsing the sql string.\n"; // error message for wrong sql language
		exit; 
	  }
	OCIExecute($stmt); 

	$output[] = '<ul>';

	while(OCIFetch($stmt)) {

		$Name1= OCIResult($stmt,"NAME"); // write output as a list select from "Name"
		$output[] = '<li><small>'.$Name1.'</small></li>';
	}
	$output[] = '</ul>';
	$message =  join('',$output);// join element together
	if ($Name1 == '')
	echo "No Suggestion";// error message if there is nothing match in database
	else	
	echo $message;
?>
