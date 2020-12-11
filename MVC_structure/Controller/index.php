<?php
  session_start();
  $count = 0;
  // connecto database
  
  $title = "Index";

  include_once('C:\xampp\htdocs\pharmacy\MVCStructure\View\template\header.php');
//require_once "./template/header.php";

include_once('C:\xampp\htdocs\pharmacy\MVCStructure\Model\functions\database_functions.php');
 // require_once "./functions/database_functions.php";
  $conn = db_connect();
  $row = select4Latestmedicine($conn);
?>
      <!-- Example row of columns -->
      <p class="lead text-center text-muted">Latest medicines</p>
      <div class="row">
        <?php foreach($row as $medicine) { ?>
      	<div class="col-md-3">
      		<a href="medicine.php?medicineisbn=<?php echo $medicine['medicine_isbn']; ?>">
           <img class="img-responsive img-thumbnail" src="./C:/xampp/htdocs/pharmacy/MVCStructure/View/bootstrap/img/<?php echo $medicine['medicine_image']; ?>">
          </a>
      	</div>
        <?php } ?>
      </div>
<?php
  if(isset($conn)) {mysqli_close($conn);}

  include_once('C:\xampp\htdocs\pharmacy\MVCStructure\View\template\footer.php');
 // require_once "./template/footer.php";
?>