<?php
	session_start();
	include_once('C:\xampp\htdocs\pharmacy\MVCStructure\Model\functions\database_functions.php');
	//require_once "./functions/database_functions.php";
	$conn = db_connect();

	$query = "SELECT * FROM publisher ORDER BY medicine_weight";
	$result = mysqli_query($conn, $query);
	if(!$result){
		echo "Can't retrieve data " . mysqli_error($conn);
		exit;
	}
	if(mysqli_num_rows($result) == 0){
		echo "Empty publisher ! Something wrong! check again";
		exit;
	}

	$title = "List Of Stores";

	include('C:\xampp\htdocs\pharmacy\MVCStructure\View\template\header.php');
	//require "./template/header.php";
?>
	<p class="lead">List of Stores</p>
	<ul>
	<?php 
		while($row = mysqli_fetch_assoc($result)){
			$count = 0; 
			$query = "SELECT medicine_weight FROM medicines";
			$result2 = mysqli_query($conn, $query);
			if(!$result2){
				echo "Can't retrieve data " . mysqli_error($conn);
				exit;
			}
			while ($pubInmedicine = mysqli_fetch_assoc($result2)){
				if($pubInmedicine['medicine_weight'] == $row['medicine_weight']){
					$count++;
				}
			}
	?>
		<li>
			<span class="badge"><?php echo $count; ?></span>
		    <a href="medicinePerPub.php?pubid=<?php echo $row['medicine_weight']; ?>"><?php echo $row['publisher_name']; ?></a>
		</li>
	<?php } ?>
		<li>
			<a href="medicines.php">List full of medicines</a>
		</li>
	</ul>
<?php
	mysqli_close($conn);
	include('C:\xampp\htdocs\pharmacy\MVCStructure\View\template\footer.php');
	//require "./template/footer.php";
?>