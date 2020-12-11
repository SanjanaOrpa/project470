<?php
	// the shopping cart needs sessions, to start one
	/*
		Array of session(
			cart => array (
				medicine_isbn (get from $_POST['medicine_isbn']) => number of medicines
			),
			items => 0,
			total_price => '0.00'
		)
	*/
	session_start();

	include_once('C:\xampp\htdocs\pharmacy\MVCStructure\Model\functions\database_functions.php');
	//require_once "./functions/database_functions.php";
	
	include_once('C:\xampp\htdocs\pharmacy\MVCStructure\Model\functions\cart_functions.php');
	//require_once "./functions/cart_functions.php";

	// medicine_isbn got from form post method, change this place later.
	if(isset($_POST['medicineisbn'])){
		$medicine_isbn = $_POST['medicineisbn'];
	}

	if(isset($medicine_isbn)){
		// new iem selected
		if(!isset($_SESSION['cart'])){
			// $_SESSION['cart'] is associative array that medicineisbn => qty
			$_SESSION['cart'] = array();

			$_SESSION['total_items'] = 0;
			$_SESSION['total_price'] = '0.00';
		}

		if(!isset($_SESSION['cart'][$medicine_isbn])){
			$_SESSION['cart'][$medicine_isbn] = 1;
		} elseif(isset($_POST['cart'])){
			$_SESSION['cart'][$medicine_isbn]++;
			unset($_POST);
		}
	}

	// if save change button is clicked , change the qty of each medicineisbn
	if(isset($_POST['save_change'])){
		foreach($_SESSION['cart'] as $isbn =>$qty){
			if($_POST[$isbn] == '0'){
				unset($_SESSION['cart']["$isbn"]);
			} else {
				$_SESSION['cart']["$isbn"] = $_POST["$isbn"];
			}
		}
	}

	// print out header here
	$title = "Your shopping cart";

	include_once('C:\xampp\htdocs\pharmacy\MVCStructure\View\template\header.php');
	//require "./template/header.php";

	if(isset($_SESSION['cart']) && (array_count_values($_SESSION['cart']))){
		$_SESSION['total_price'] = total_price($_SESSION['cart']);
		$_SESSION['total_items'] = total_items($_SESSION['cart']);
?>
   	<form action="cart.php" method="post">
	   	<table class="table">
	   		<tr>
	   			<th>Item</th>
	   			<th>Price</th>
	  			<th>Quantity</th>
	   			<th>Total</th>
	   		</tr>
	   		<?php
		    	foreach($_SESSION['cart'] as $isbn => $qty){
					$conn = db_connect();
					$medicine = mysqli_fetch_assoc(getmedicineByIsbn($conn, $isbn));
			?>
			<tr>
				<td><?php echo $medicine['medicine_title'] . " by " . $medicine['generic_name']; ?></td>
				<td><?php echo "$" . $medicine['medicine_price']; ?></td>
				<td><input type="text" value="<?php echo $qty; ?>" size="2" name="<?php echo $isbn; ?>"></td>
				<td><?php echo "$" . $qty * $medicine['medicine_price']; ?></td>
			</tr>
			<?php } ?>
		    <tr>
		    	<th>&nbsp;</th>
		    	<th>&nbsp;</th>
		    	<th><?php echo $_SESSION['total_items']; ?></th>
		    	<th><?php echo "$" . $_SESSION['total_price']; ?></th>
		    </tr>
	   	</table>
	   	<input type="submit" class="btn btn-primary" name="save_change" value="Save Changes">
	</form>
	<br/><br/>
	<a href="checkout.php" class="btn btn-primary">Go To Checkout</a> 
	<a href="medicines.php" class="btn btn-primary">Continue Shopping</a>
<?php
	} else {
		echo "<p class=\"text-warning\">Your cart is empty! Please make sure you add some medicines in it!</p>";
	}
	if(isset($conn)){ mysqli_close($conn); }
	
	include_once('C:\xampp\htdocs\pharmacy\MVCStructure\View\template\footer.php');
    //require_once "./template/footer.php";
?>