<?php
	session_start();

	include_once('C:\xampp\htdocs\pharmacy\MVCStructure\Model\functions\admin.php');
	//require_once "./functions/admin.php";
	$title = "List medicine";

	include_once('C:\xampp\htdocs\pharmacy\MVCStructure\View\template\header.php');
	//require_once "./template/header.php";

	include_once('C:\xampp\htdocs\pharmacy\MVCStructure\Model\functions\database_functions.php');
	//require_once "./functions/database_functions.php";
	$conn = db_connect();
	$result = getAll($conn);
?>
	<p class="lead"><a href="admin_add.php">Add new medicine</a></p>
	<a href="admin_signout.php" class="btn btn-primary">Sign out!</a>
	<table class="table" style="margin-top: 20px">
		<tr>
			<th>ISBN</th>
			<th>Title</th>
			<th>Author</th>
			<th>Image</th>
			<th>Description</th>
			<th>Price</th>
			<th>Publisher</th>
			<th>&nbsp;</th>
			<th>&nbsp;</th>
		</tr>
		<?php while($row = mysqli_fetch_assoc($result)){ ?>
		<tr>
			<td><?php echo $row['medicine_isbn']; ?></td>
			<td><?php echo $row['medicine_title']; ?></td>
			<td><?php echo $row['generic_name']; ?></td>
			<td><?php echo $row['medicine_image']; ?></td>
			<td><?php echo $row['medicine_descr']; ?></td>
			<td><?php echo $row['medicine_price']; ?></td>
			<td><?php echo getPubName($conn, $row['medicine_weight']); ?></td>
			<td><a href="admin_edit.php?medicineisbn=<?php echo $row['medicine_isbn']; ?>">Edit</a></td>
			<td><a href="admin_delete.php?medicineisbn=<?php echo $row['medicine_isbn']; ?>">Delete</a></td>
		</tr>
		<?php } ?>
	</table>

<?php
	if(isset($conn)) {mysqli_close($conn);}
	include_once('C:\xampp\htdocs\pharmacy\MVCStructure\View\template\footer.php');
	//require_once "./template/footer.php";
?>