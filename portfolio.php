<?php
// Start the session
session_start();
// Include database connection
require_once('inc/global-connect.inc.php');
// Include functions
require_once('inc/functions.inc.php');
 // Include username functions
require_once('inc/usernamefun.php');

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=windows-1252" />
<title>Pet Shop</title>
<link rel="stylesheet" type="text/css" href="style.css" />
<script src="js/register_validation.js" type = "text/javascript"></script>

</head>
<body>
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
              <div class="title"><span class="title_icon"><img src="images/bullet1.gif" alt="" title="" /></span>My account</div>
            <div class="feat_prod_box_details">
            <p class="details">
             <h1>Wellcome!!<?php if ($_SESSION['myname']=""){echo "Guest!";}
			 else{
			 echo $username;}?></h1>
            </p>
            
              	<div class="contact_form">
                <div class="form_subtitle">My detail</div>
                 	 

                   <div class="form_row">
                    <p><font size="+1">Username:  
                    <?php
					echo $username;
					?>
                    
                    </font></p> 
                  </div>  


                    <div class="form_row">
                    <p><font size="+1">Email:  
                    <?php
					echo $email;
					?>
                    </font></p> 
                    </div>  
                    
                   <div class="form_row">
                    <p><font size="+1">company: 
                     <font style="margin-left:50">
                    <?php
					echo $company;
					?>
                    </font>
                     </font></p> 
                  </div>  
                  <div class="form_row">
                    <p><font size="+1">Phone:  
                    <?php
					echo $phone;
					?>
                    
                    </font></p> 
                    </div>
                  
					<div class="form_row">
                    <p><font size="+1">Address:  
                    <?php
					echo $address;
					?>
                    
                    </font></p> 
                    </div>
                    
                    <div class="form_row">
                    
                    <a href="ass2.html"><input type="submit" class="register" value="HomePage" /></a>
                    </div>   
                    
                   
                    
                </div>  
            
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
       	&quot;&copy;Deakin University, School of Information Technology. This web page has been developed as a student assignment for the unit SIT203: Web Programming. Therefore it is not part of the University's authorised web site. DO NOT USE THE INFORMATION CONTAINED ON THIS WEB PAGE IN ANY WAY.
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