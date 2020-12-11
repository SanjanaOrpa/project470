<?php
  session_start();
  $count = 0;
  // connecto database

  $title = "Index";

  include_once ('C:\xampp\htdocs\pharmacy\MVCStructure\View\template\header.php');
  //require_once "./template/header.php";

  include_once ('C:\xampp\htdocs\pharmacy\MVCStructure\Model\functions\database_functions.php');
  //require_once "./functions/database_functions.php";
  $conn = db_connect();
  $row = select4LatestMedicine($conn);
?>

<h2>Medicine page:</h2>


<div class ="medicine-container">
  <?php
  $title = mysqli_real_escape_string($conn, $_GET['title']);
  $author = mysqli_real_escape_string($conn, $_GET['author']);


  $sql = "SELECT * FROM medicines WHERE medicine_title='$title' AND generic_name='$author'";
  $result = mysqli_query($conn, $sql);
  $queryResult = mysqli_num_rows($result);

  if($queryResult>0){
    while ($row = mysqli_fetch_assoc($result)){
      echo "<div class='medicine-box'>

      <h4>".$row['medicine_title']."</h4>
      <p>".$row['generic_name']."<p>
      <p>".$row['medicine_price']."<p>


      </div>";
    }
  }

  include_once ('C:\xampp\htdocs\pharmacy\MVCStructure\View\template\footer.php');
	//require "./template/footer.php";
  ?>
  <form method="post" action="cart.php">
    <input type="hidden" name="medicineisbn" value="<?php echo $medicine_isbn;?>">
    <input type="submit" value="Purchase / Add to cart" name="cart" class="btn btn-primary">
  </form>
</div>
