<?php
  /* Set oracle user login and password info */
  $dbuser = "zhimingl";  /* your deakin login */
  $dbpass = "WEt6Kn6h";  /* your deakin password */
  $dbname = "SSID"; 
  $db = OCILogon($dbuser, $dbpass, $dbname); 

  if (!$db)  {
    echo "An error occurred connecting to the database"; 
    exit; 
  }

?>