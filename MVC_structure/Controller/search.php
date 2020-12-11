<?php
  session_start();
  $count = 0;
  // connecto database

  $title = "Index";

  include_once('C:\xampp\htdocs\pharmacy\MVCStructure\View\template\header.php');
  //require_once "./template/header.php";
  include_once('C:\xampp\htdocs\pharmacy\MVCStructure\Model\functions\database_functions.php');
  //require_once "./functions/database_functions.php";
  $conn = db_connect();
  //$row = select4LatestMedicine($conn);
?>
<h2>
  Search results
</h2>
<div class = "medicine-container">
  <?php
  if(isset($_POST['submit-search'])){
    $search = mysqli_real_escape_string($conn, $_POST['search']);
    $sql = "SELECT * FROM medicines WHERE medicine_title LIKE '%$search%' OR generic_name LIKE '%$search%' ";
    $result = mysqli_query($conn,$sql);
    $queryResult = mysqli_num_rows($result);

    echo "There are ".$queryResult." results!";

    if($queryResult>0){
      while($row = mysqli_fetch_assoc($result)){
        echo "<a href = 'medicineSearched.php?title=".$row['medicine_title']."&author=".$row['generic_name']." '><div class='medicine-box'>

        <h4>".$row['medicine_title']."</h4>
        <p>".$row['generic_name']."<p>
        <p>".$row['medicine_price']."<p>

        </div></a>";
      }
    }else{
      echo "There are no results matching your search :(";
    }
  }
   ?>
</div>
