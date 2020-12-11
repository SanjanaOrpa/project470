<?php
	/*
		loop through array of $_SESSION['cart'][medicine_isbn] => number
		get isbn => take from database => take medicine price
		price * number (quantity)
		return sum of price
	*/
	function total_price($cart){
		$price = 0.0;
		if(is_array($cart)){
		  	foreach($cart as $isbn => $qty){
		  		$medicineprice = getmedicineprice($isbn);
		  		if($medicineprice){
		  			$price += $medicineprice * $qty;
		  		}
		  	}
		}
		return $price;
	}

	/*
		loop through array of $_SESSION['cart'][medicine_isbn] => number
		$_SESSION['cart'] is associative array which is [medicine_isbn] => number of medicines for each medicine_isbn
		calculate sum of medicines 
	*/
	function total_items($cart){
		$items = 0;
		if(is_array($cart)){
			foreach($cart as $isbn => $qty){
				$items += $qty;
			}
		}
		return $items;
	}
?>