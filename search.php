<?php
// Start the session
session_start();
// Include database connection
require_once('inc/global-connect.inc.php');
// Include functions
require_once('inc/functions.inc.php');
 // Include username functions
//require_once('inc/usernamefun.php');
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=windows-1252" />
<title>Pet Shop</title>
<link rel="stylesheet" type="text/css" href="style.css" />

</head>
<body>
<?php
$inputV= $_REQUEST["search1"];
$userid="zhimingl";
$passwd="WEt6Kn6h";
$db="SSID";

$connect= OCILogon($userid, $passwd, $db);

if(!$connect) {
	echo "error. couldnot connect to oracle database! ";
	exit;
}
$sql = "SELECT * FROM product WHERE REGEXP_LIKE(Name,'".$inputV."','i')";


$stmt = OCIParse($connect, $sql);
if (!$stmt) {
	echo "error. there are some errors in parsing the sql statement.";
	exit;
}

OCIExecute($stmt);

?>
<div id="wrap">

       <div class="header">
       		<div class="logo"><a href="index.html"><img src="images/logo.gif" alt="" title="" border="0" /></a></div>            
        <div id="menu">
            <ul>                                                                       
            <li><a href="ass2.html">home</a></li>
            <li><a href="about.html">about us</a></li>
            <li><a href="category.html">category</a></li>
            <li><a href="specials.html">specials</a></li>
            <li><a href="search.php">Search</a></li>
            <li><a href="myaccount.php">my accout</a></li>
            <li class="selected"><a href="register.html">register</a></li>            
            <li><a href="contact.html">contact</a></li>
            </ul>
        </div>     
       </div> 
       
       
       <div class="center_content">
       	<div class="left_content">
                    <div class="title"><span class="title_icon"><img src="images/bullet1.gif" alt="" title="" /></span>Search</div>
        
        	<div class="feat_prod_box_details">
            <p class="details">
            <form name="search_form" action="search.php" method="post">
       <table class="table">
       <tr>
        <td><img src="images/search.gif" width="20" height="20" alt=""/> </td>
        <td><input type="text" size="20" onkeyup="showliveResult(this.value)" name="search1"/>
        <td><input type="submit" value="Search"/></td>
       </tr>
       </table>
       </form>
            </p>
			<div id="livesearch"></div>
            </div>
            
              	
                <div class="feat_prod_box_details">
 <?php
while (OCIFetch($stmt)) {
	
		$Name1= OCIResult($stmt,"NAME");		
		$Type1= OCIResult($stmt,"TYPE");	
		$price1= OCIResult($stmt,"PRICE");
		$Photo1=OCIResult($stmt,"PHOTO");
		$Link1= OCIResult($stmt,"LINK");
		
		echo '<div class="prod_img"><a href="'.$Link1.'"><img src="'.$Photo1.'" width="100" height="75" alt="" /></a></div>
		<div class="prod_det_box">
                	<div class="box_top"></div>
                    <div class="box_center">
                    <div align="center" class="prod_title">
					'.$Name1.'</div>
                    <div align="center">
						<table border="0">
							<tr>
								<td>Type : </td><td>
								'.$Type1.'</td>
								</tr>
							
							<tr>
								<td>Price : </td><td>$
								'.$price1.'</td>
								</tr>
							</table>
					<a class="more" href="'.$Link1.'">- more details -</a>
					</div>
                    <div class="clear"></div>
                    </div>
                	<div class="box_bottom"></div>
                </div>    
            <div class="clear"><br /></div>';
	
}
OCILogOff($connect);
?>
                </div>  
            
          	
            
              

            

            
        <div class="clear"></div>	
           
        </div><!--end of left content-->
        
        <div class="right_content">
        	
            <div class="languages_box">
                <span class="red">Languages:</span>
                <a href="#"><img src="images/au.gif" alt="" title="" border="0" height="12px" width="15px"/></a>
                <!-- commented out by Shang 10/07/2014
                <a href="#"><img src="images/gb.gif" alt="" title="" border="0" /></a>
                <a href="#"><img src="images/fr.gif" alt="" title="" border="0" /></a>
                <a href="#"><img src="images/de.gif" alt="" title="" border="0" /></a>
                -->
                </div>
            
                <div class="currency">
                <span class="red">Currency: </span>
                <!-- commented by shang 10/07/2014 
                <a href="#">GBP</a>
                <a href="#">EUR</a> -->
                <a href="#" class="selected">AUD</a>
                </div>
                
                
              <div class="cart">
                  <div class="title"><span class="title_icon"><img src="images/cart.gif" alt="" title="" /></span>My cart</div>
                  <div class="home_cart_content">
                  3 x items | <span class="red">TOTAL: 100$</span>
                  </div>
                  <a href="cart.php" class="view_cart">view cart</a>
              
              </div>
                       
            	
        
        
             <div class="title"><span class="title_icon"><img src="images/bullet3.gif" alt="" title="" /></span>About Our Shop</div> 
             <div class="about">
             <p>
             <img src="images/about.gif" alt="" title="" class="right" />
             The staff at Pet Shop is well-trained and always friendly.             </p>
             <p>Our store is clean and well-maintained. We were even voted the best pet shop in Melbourne! If you have questions about our pet shop or have a customer service request, please contact us today.
             </p>
             
             </div>
             
             <div class="right_box">
             
             	<div class="title"><span class="title_icon"><img src="images/bullet4.gif" alt="" title="" /></span>Promotions</div> 
                    <div class="new_prod_box">
                        <a href="p3.php">Parson Jack Russell</a>
                        <div class="new_prod_bg">
                        <span class="new_icon"><img src="images/promo_icon.gif" alt="" title="" /></span>
                        <a href="p3.php"><img src="images/thumb1.gif" alt="" title="" class="thumb" border="0" /></a>
                        </div>           
                    </div>
                    
                    <div class="new_prod_box">
                        <a href="p4.php">Pet house</a>
                        <div class="new_prod_bg">
                        <span class="new_icon"><img src="images/promo_icon.gif" alt="" title="" /></span>
                        <a href="p4.php"><img src="images/thumb2.gif" alt="" title="" class="thumb" border="0" /></a>
                        </div>           
                    </div>                    
                    
                    <div class="new_prod_box">
                        <a href="p5.php">Ribbit pet food</a>
                        <div class="new_prod_bg">
                        <span class="new_icon"><img src="images/promo_icon.gif" alt="" title="" /></span>
                        <a href="p5.php"><img src="images/thumb3.gif" alt="" title="" class="thumb" border="0" /></a>
                        </div>           
                    </div>                     
             
             </div>
             
             <div class="right_box">
             
             	<div class="title"><span class="title_icon"><img src="images/bullet5.gif" alt="" title="" /></span>Categories</div> 
                
               <div class="right_box">
             
             	<div class="title"><span class="title_icon"><img src="images/bullet5.gif" alt="" title="" /></span>Categories</div> 
                
                <ul class="list">
                <li><a href="Parson Jack Russe.html">Parson Jack Russe</a><a href="#"></a></li>
                <li><a href="Pet House.html">Pet House</a><a href="#"></a></li>
                <li><a href="Ribbit pet food.html">Ribbit pet food</a><a href="#"></a></li>
                <li><a href="Flat-Coated Retriever.html">Flat-Coated Retriever</a><a href="#"></a></li>
                <li><a href="Black Scorpion.html">Black Scorpion</a><a href="#"></a></li>
                <li><a href="boxer dog.html">boxer dog</a><a href="#"></a></li>
                <li><a href="Maine Coon.html">Maine Coon </a><a href="#"></a></li>
                <li><a href="Afghan Hound.html">Afghan Hound</a><a href="#"></a></li>
                <li><a href="Siberian Husky.html">Siberian Husky </a><a href="#"></a></li>
                <li><a href="Black-billed Amazon.html">Black-billed Amazon</a><a href="#"></a></li>
                <li><a href="Birman.html">Birman</a><a href="#"></a></li>                                              
                </ul>
                
             	<!-- commented out by Shang 10/07/2014 
             	<div class="title"><span class="title_icon"><img src="images/bullet6.gif" alt="" title="" /></span>Partners</div> 
                
                <ul class="list">
                <li><a href="#">accesories</a></li>
                <li><a href="#">pets gifts</a></li>
                <li><a href="#">specials</a></li>
                <li><a href="#">hollidays gifts</a></li>
                <li><a href="#">accesories</a></li>
                <li><a href="#">pets gifts</a></li>
                <li><a href="#">specials</a></li>
                <li><a href="#">hollidays gifts</a></li>
                <li><a href="#">accesories</a></li>                              
                </ul>      
                
                -->
             
             </div>         
             
        
        </div><!--end of right content-->
        
        
       
       
       <div class="clear"></div>
       </div><!--end of center content-->
       
              
       <div class="footer">
       	<div class="left_footer"><img src="images/footer_logo.gif" alt="" title="" /><br /> <a href="http://csscreme.com/freecsstemplates/" title="free css templates"><img src="images/csscreme.gif" alt="free css templates" border="0" /></a></div>
        <div class="right_footer">
        <a href="#">home</a>
        <a href="#">about us</a>
        <a href="#">services</a>
        <a href="#">privacy policy</a>
        <a href="#">contact us</a>
       
        </div>
        
       
       </div>
    

</div>

</body>
</html>