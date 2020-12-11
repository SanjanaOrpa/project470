<?php
	session_start();

	include('C:\xampp\htdocs\pharmacy\MVCStructure\Model\functions\admin.php');
	//require_once "./functions/admin.php";

	$title = "Edit medicine";

	include('C:\xampp\htdocs\pharmacy\MVCStructure\View\template\header.php');
	//require_once "./template/header.php";

	include('C:\xampp\htdocs\pharmacy\MVCStructure\Model\functions\database_functions.php');
	//require_once "./functions/database_functions.php";
	$conn = db_connect();

	if(isset($_GET['medicineisbn'])){
		$medicine_isbn = $_GET['medicineisbn'];
	} else {
		echo "Empty query!";
		exit;
	}

	if(!isset($medicine_isbn)){
		echo "Empty isbn! check again!";
		exit;
	}

	// get medicine data
	$query = "SELECT * FROM medicines WHERE medicine_isbn = '$medicine_isbn'";
	$result = mysqli_query($conn, $query);
	if(!$result){
		echo "Can't retrieve data " . mysqli_error($conn);
		exit;
	}
	$row = mysqli_fetch_assoc($result);
?>
	<form method="post" action="edit_medicine.php" enctype="multipart/form-data">
		<table class="table">
			<tr>
				<th>ISBN</th>
				<td><input type="text" name="isbn" value="<?php echo $row['medicine_isbn'];?>" readOnly="true"></td>
			</tr>
			<tr>
				<th>Title</th>
				<td><input type="text" name="title" value="<?php echo $row['medicine_title'];?>" required></td>
			</tr>
			<tr>
				<th>Author</th>
				<td><input type="text" name="author" value="<?php echo $row['generic_name'];?>" required></td>
			</tr>
			<tr>
				<th>Image</th>
				<td><input type="file" name="image"></td>
			</tr>
			<tr>
				<th>Description</th>
				<td><textarea name="descr" cols="40" rows="5"><?php echo $row['medicine_descr'];?></textarea>
			</tr>
			<tr>
				<th>Price</th>
				<td><input type="text" name="price" value="<?php echo $row['medicine_price'];?>" required></td>
			</tr>
			<tr>
				<th>Publisher</th>
				<td><input type="text" name="publisher" value="<?php echo getPubName($conn, $row['medicine_weight']); ?>" required></td>
			</tr>
		</table>
		<input type="submit" name="save_change" value="Change" class="btn btn-primary">
		<input type="reset" value="cancel" class="btn btn-default">
	</form>
	<br/>
	<a href="admin_medicine.php" class="btn btn-success">Confirm</a>
<?php
	if(isset($conn)) {mysqli_close($conn);}

	include('C:\xampp\htdocs\pharmacy\MVCStructure\View\template\footer.php');
	//require "./template/footer.php"
?>