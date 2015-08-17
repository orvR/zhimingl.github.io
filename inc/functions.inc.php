<?php
function writeShoppingCart() {
	global $db;
	$cart = $_SESSION['cart'];
	if (!$cart) {
		return '<p>0 x items | <span class="red">TOTAL: $ 0</span></p>';
	} else {
		// Parse the cart session variable
		$items = explode(',',$cart);
		$s = (count($items) > 1) ? 's':'';
		$contents = array();
		foreach ($items as $item) {
			$contents[$item] = (isset($contents[$item])) ? $contents[$item] + 1 : 1;
		}
		$output[] = '<form action="cart.php?action=update" method="post" id="cart">';
		$output[] = '<table>';
		foreach ($contents as $id=>$qty) {
		
			$sql = 'SELECT * FROM PRODUCT WHERE id = '.$id;
			
			// modified by Ning			
			$stmt = OCIParse($db, $sql); 
  
			if(!$stmt)  {
				echo "An error occurred in parsing the sql string.\n"; 
				exit; 
			  }
			OCIExecute($stmt); 

			while(OCIFetch($stmt)) {

				$namec= OCIResult($stmt,"NAME");
				$photoc = OCIResult($stmt,"PHOTO");
				$price = OCIResult($stmt,"PRICE");
				$id = OCIResult($stmt,"ID");				
			}
			($price * $qty);
			$total += $price * $qty;
		}
		return '<p>'.count($items).' x items | TOTAL: $'.$total.' </p>';
	}
}

function showCart() {
	global $db;
	$cart = $_SESSION['cart'];
	if ($cart) {
		$items = explode(',',$cart);
		$contents = array();
		foreach ($items as $item) {
			$contents[$item] = (isset($contents[$item])) ? $contents[$item] + 1 : 1;
		}
		$output[] = '<form action="cart.php?action=update" method="post" id="cart">';
		$output[] = '<table class="cart_table">';
		$output[] = '<tr class="cart_title">
                	<td>Delete</td>
					<td>Item</td>
                	<td>Name</td>
                    <td>Unit price</td>
                    <td>Qty</td>
                    <td>Total</td>               
                </tr>';
		foreach ($contents as $id=>$qty) {
		
			$sql = 'SELECT * FROM PRODUCT WHERE id = '.$id;
			
			// modified by Ning			
			$stmt = OCIParse($db, $sql); 
  
			if(!$stmt)  {
				echo "An error occurred in parsing the sql string.\n"; 
				exit; 
			  }
			OCIExecute($stmt); 

			while(OCIFetch($stmt)) {

				$namec= OCIResult($stmt,"NAME");
				$photoc = OCIResult($stmt,"PHOTO");
				$price = OCIResult($stmt,"PRICE");
				$id = OCIResult($stmt,"ID");				
			}
			$output[] = '<tr class="cart_total">';
			$output[] = '<td><a href="cart.php?action=delete&id='.$id.'" class="r">Remove</a></td>';
			$output[] = '<td><img width="50" height="50" src="'.$photoc.' "/></td>';
			$output[] = '<td>'.$namec.' </td>';
			$output[] = '<td>AU$ '.$price.'</td>';
			$output[] = '<td><input type="text" name="qty'.$id.'" value="'.$qty.'" size="2" maxlength="2" /></td>';
			$output[] = '<td>AU$ '.($price * $qty).'</td>';
			$total += $price * $qty;
			$output[] = '</tr>';
			
		}
		$tax=$total*0.1;
		$output[] = '<tr>';
		$output[] = '<td colspan="4" class="cart_total"><span class="red">GST:</span></td>'; 
		$output[] = '<th ><strong>AU$ '.$tax.'</strong></th>';
		$output[] = '</tr>';
		$output[] = '<tr>';
		$output[] = '<td colspan="4" class="cart_total"><span class="red">TOTAL:</span></td>'; 
		$output[] = '<th ><strong>AU$ '.$total.'</strong></th>';
		$output[] = '</tr>';
		$output[] = '<div><button type="submit">Update cart</button></div>';
		$output[] = '</form>';
		$output[] = '</table>';
		$_SESSION['total']=$total;
		
	} else {
		$output[] = '<p>You shopping cart is empty.</p>';
	}
	return join('',$output);
}
?>
