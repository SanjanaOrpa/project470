<?php
	session_start();

	include_once ('C:\xampp\htdocs\pharmacy\MVCStructure\Model\functions\database_functions.php');
	//require_once "./functions/database_functions.php";
	// get pubid
	if(isset($_GET['pubid'])){
		$pubid = $_GET['pubid'];
	} else {
		echo "Wrong query! Check again!";
		exit;
	}

	// connect database
	$conn = db_connect();
	$pubName = getPubName($conn, $pubid);

	$query = "SELECT medicine_isbn, medicine_title, medicine_image FROM medicines WHERE medicine_weight = '$pubid'";
	$result = mysqli_query($conn, $query);
	if(!$result){
		echo "Can't retrieve data " . mysqli_error($conn);
		exit;
	}
	if(mysqli_num_rows($result) == 0){
		echo "Empty medicines ! Please wait until new medicines coming!";
		exit;
	}

	$title = "medicines Per Publisher";

	include_once ('C:\xampp\htdocs\pharmacy\MVCStructure\View\template\header.php');
	//require "./template/header.php";
?>
	<p class="lead"><a href="publisher_list.php">Publishers</a> > <?php echo $pubName; ?></p>
	<?php while($row = mysqli_fetch_assoc($result)){
?>
	<div class="row">
		<div class="col-md-3">
			<img class="img-responsive img-thumbnail" src="./C:/xampp/htdocs/pharmacy/MVCStructure/View/bootstrap/img/<?php echo $row['medicine_image'];?>">
		</div>
		<div class="col-md-7">
			<h4><?php echo $row['medicine_title'];?></h4>
			<a href="medicine.php?medicineisbn=<?php echo $row['medicine_isbn'];?>" class="btn btn-primary">Get Details</a>
		</div>
	</div>
	<br>
<?php
	}
	if(isset($conn)) { mysqli_close($conn);}

	include_once ('C:\xampp\htdocs\pharmacy\MVCStructure\View\template\footer.php');
	//require "./template/footer.php";
?>