<?php
// Start the session
session_start();
// Include database connection
require_once('inc/global-connect.inc.php');
// Include functions
require_once('inc/functions.inc.php');
 // Include username functions
require_once('inc/usernamefun.php');

$cart = $_SESSION['cart'];
$action = $_GET['action'];

switch ($action) {
	case 'add':
		if ($cart) {
			$cart .= ','.$_GET['id'];
		} else {
			$cart = $_GET['id'];
		}
		break;
	case 'delete':
		if ($cart) {
			$items = explode(',',$cart);
			$newcart = '';
			foreach ($items as $item) {
				if ($_GET['id'] != $item) {
					if ($newcart != '') {
						$newcart .= ','.$item;
					} else {
						$newcart = $item;
					}
				}
			}
			$cart = $newcart;
		}
		break;
	case 'update':
	if ($cart) {
		$newcart = '';
		foreach ($_POST as $key=>$value) {
			if (stristr($key,'qty')) {
				$id = str_replace('qty','',$key);
				$items = ($newcart != '') ? explode(',',$newcart) : explode(',',$cart);
				$newcart = '';
				foreach ($items as $item) {
					if ($id != $item) {
						if ($newcart != '') {
							$newcart .= ','.$item;
						} else {
							$newcart = $item;
						}
					}
				}
				for ($i=1;$i<=$value;$i++) {
					if ($newcart != '') {
						$newcart .= ','.$id;
					} else {
						$newcart = $id;
					}
				}
			}
		}
	}
	$cart = $newcart;
	break;
}
$_SESSION['cart'] = $cart;
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=windows-1252" />
<title>Pet Shop</title>
<link rel="stylesheet" type="text/css" href="style.css" />
<script src="js/order_validation.js" type = "text/javascript"></script>
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
          <div class="title"><span class="title_icon"><img src="images/bullet1.gif" alt="" title="" /></span>My cart</div>
        
        	<div class="feat_prod_box_details">
            
            <?php echo showCart(); ?>
             <div class="contact_form">
                <div class="form_subtitle">Confirm your order</div>
                <?php
				  if (!isset($_SESSION['key']))
				  {
				echo'<form name="register"  action="OrderConfirm.php" method="post" >
                <div class="form_row">
                    <label class="contact"><strong>Surname:</strong></label>
                    <input type="text" size="20" name="Surname" onblur = "validateNotEmpty( this.value, \'nameError\' )"/>
                    </div> 
					<span id = "nameError" class = "errorMessage"></span>
                 <div class="form_row">
                    <label class="contact"><strong>Givename:</strong></label>
                    <input type="text" size="20" name="Givename" onblur = "validateNotEmpty( this.value, \'gnameError\' )"/>
                    </div>
					<span id = "gnameError" class = "errorMessage"></span>
                   <div class="form_row">
                   <table>
                   <tr>
                   <td>
                    <label class="contact"><strong>Deliver Address:</strong></label>
                    </td>
                    <td><textarea name="Address" rows="3" cols="30" onblur = "validateAddress( this.value, \'addError\' )"></textarea></td>
                    </tr>
                    </table>
                    </div>
					<span id = "addError" class = "errorMessage"></span>
                    <div class="form_row">
                    <label class="contact"><strong>Postcode:</strong></label>
                    <input type="text" size="6" name="Postcode" onblur = "validatepost( this.value, \'postError\' )"/>
                    </div>
					<span id = "postError" class = "errorMessage"></span>
                    <div class="form_row">
                    <label class="contact"><strong>Email:</strong></label>
                    <input type="text" size="30" name="Email" onblur = "validateEmail( this.value )"/>
                    </div>
					<span id = "emailEmptyError" class = "errorMessage"></span>
        			<span id = "emailFormatError" class = "errorMessage"></span>
        			<span id = "emailNotAllowedError" class = "errorMessage"></span>
                    <div class="form_row">
                    <table>
                    <tr>
                    <td rowspan="2">
                    <label class="contact"><strong>Payment Type:</strong></label>
                    </td>
                    <td>
                    <input type="radio" name="paymethond1"  value="Credit_card">Credit Card<img src="images/visaAmastercard.jpg" width="100" height="30" />
                    </td>
                    </tr>
                    <tr>
                    <td>
                    <input type="radio" name="paymethond1" value="Member_card">Member card
                    </td>
                    </tr>
                    </table>
                    </div>
                     <div class="form_row">
                    <label class="contact"><strong>Card Number:</strong></label>
                    <table>
					<tr>
					<td>Please input your card number</td>
					<td><input name="card" size="16" maxlength="16" onblur = "validateCard( this.value, \'cardError\' )"/></td>
					
					</tr>
					</table>
                    </div>
					<span id = "cardError" class = "errorMessage"></span>
                    <div class="form_row">
                    <table>
                    <tr>
                    <td>
                    <label class="contact"><strong>Expiry Date:</strong></label>
                    </td>
                    <td>
                    Month
                    </td>
                    <td>
                    <input type="text" size="2" maxlength="2" name="Emonth" onblur = "validateexpire( this.value, \'expireError\' )"/>
                    </td>
                    <td>
							Year:<select name="Eyear">
							<option value="2014">2014</option>
							<option value="2015">2015</option>
							<option value="2016">2016</option>
							<option value="2017">2017</option>
							<option value="2018">2018</option>
							</select>
					</td>
                    </tr>
                    </table>
                    </div>
					<span id = "expireError" class = "errorMessage"></span>
                    <div class="form_row">
                    <label class="contact"><strong>Secure Code:</strong></label>
                    <input type="text" size="3" maxlength="3" name="Xcode" onblur = "validatescure( this.value, \'scurError\' )"/>
                    </div>
					<span id = "scurError" class = "errorMessage"></span>
					<div>
            <a href="cart.php" class="continue">&lt;Back cart</a>
            <div align="right">
            <input type="submit" align="left" value="Confirm"></div>
            </div>
                </form>
                ';
				  }
				  else{
					  echo '<form name="register"  action="OrderConfirm.php" method="post" >
                <div class="form_row">
                    <label class="contact"><strong>Surname:</strong></label>
                    <input type="text" size="20" name="Surname" onblur = "validateNotEmpty( this.value, \'nameError\' )"/>
                    </div> 
					<span id = "nameError" class = "errorMessage"></span>
                 <div class="form_row">
                    <label class="contact"><strong>Givename:</strong></label>
                    <input type="text" size="20" name="Givename" onblur = "validateNotEmpty( this.value, \'gnameError\' )"/>
                    </div>
					<span id = "gnameError" class = "errorMessage"></span>
                   <div class="form_row">
                   <table>
                   <tr>
                   <td>
                    <label class="contact"><strong>Deliver Address:</strong></label>
                    </td>
                    <td><textarea name="Address" rows="3" cols="30" onblur = "validateAddress( this.value, \'addError\')">'.$address.'</textarea></td>
                    </tr>
                    </table>
                    </div>
					<span id = "addError" class = "errorMessage"></span>
                    <div class="form_row">
                    <label class="contact"><strong>Postcode:</strong></label>
                    <input type="text" size="6" name="Postcode" onblur = "validatepost( this.value, \'postError\' )"/>
                    </div>
					<span id = "postError" class = "errorMessage"></span>
                    <div class="form_row">
                    <label class="contact"><strong>Email:</strong></label>
                    <input type="text" size="30" name="Email" value="'.$email.'" onblur = "validateEmail( this.value )"/>
                    </div>
					<span id = "emailEmptyError" class = "errorMessage"></span>
        			<span id = "emailFormatError" class = "errorMessage"></span>
        			<span id = "emailNotAllowedError" class = "errorMessage"></span>
                    <div class="form_row">
                    <table>
                    <tr>
                    <td rowspan="2">
                    <label class="contact"><strong>Payment Type:</strong></label>
                    </td>
                    <td>
                    <input type="radio" name="paymethond1"  value="Credit_card">Credit Card<img src="images/visaAmastercard.jpg" width="100" height="30" />
                    </td>
                    </tr>
                    <tr>
                    <td>
                    <input type="radio" name="paymethond1" value="Member_card">Member card
                    </td>
                    </tr>
                    </table>
                    </div>
                     <div class="form_row">
                    <label class="contact"><strong>Card Number:</strong></label>
                    <table>
					<tr>
					<td>Please input your card number</td>
					<td><input name="card" size="16" maxlength="16" onblur = "validateCard( this.value, \'cardError\' )"/></td>
					
					</tr>
					</table>
                    </div>
					<span id = "cardError" class = "errorMessage"></span>
                    <div class="form_row">
                    <table>
                    <tr>
                    <td>
                    <label class="contact"><strong>Expiry Date:</strong></label>
                    </td>
                    <td>
                    Month
                    </td>
                    <td>
                    <input type="text" size="2" maxlength="2" name="Emonth" onblur = "validateexpire( this.value, \'expireError\' )"/>
                    </td>
                    <td>
							Year:<select name="Eyear">
							<option value="2014">2014</option>
							<option value="2015">2015</option>
							<option value="2016">2016</option>
							<option value="2017">2017</option>
							<option value="2018">2018</option>
							</select>
					</td>
                    </tr>
                    </table>
                    </div>
					<span id = "expireError" class = "errorMessage"></span>
                    <div class="form_row">
                    <label class="contact"><strong>Secure Code:</strong></label>
                    <input type="text" size="3" maxlength="3" name="Xcode" onblur = "validatescure( this.value, \'scurError\' )"/>
                    </div>
					<span id = "scurError" class = "errorMessage"></span>
					<div>
            <a href="cart.php" class="continue">Back cart</a>
            <div align="right">
            <input type="submit" align="left" value="Confirm"></div>
            </div>
                </form>
                ';
					  }
				  ?>
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