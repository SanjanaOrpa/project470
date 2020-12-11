<?php
  session_start();
  $medicine_isbn = $_GET['medicineisbn'];
  // connecto database

  include_once ('C:\xampp\htdocs\pharmacy\MVCStructure\Model\functions\database_functions.php');
  //require_once "./functions/database_functions.php";
  $conn = db_connect();

  $query = "SELECT * FROM medicines WHERE medicine_isbn = '$medicine_isbn'";
  $result = mysqli_query($conn, $query);
  if(!$result){
    echo "Can't retrieve data " . mysqli_error($conn);
    exit;
  }

  $row = mysqli_fetch_assoc($result);
  if(!$row){
    echo "Empty medicine";
    exit;
  }

  $title = $row['medicine_title'];

  include_once ('C:\xampp\htdocs\pharmacy\MVCStructure\View\template\header.php');
  //require "./template/header.php";
?>
      <!-- Example row of columns -->
      <p class="lead" style="margin: 25px 0"><a href="medicines.php">medicines</a> > <?php echo $row['medicine_title']; ?></p>
      <div class="row">
        <div class="col-md-3 text-center">
          <img class="img-responsive img-thumbnail" src="./C:/xampp/htdocs/pharmacy/MVCStructure/View/bootstrap/img/<?php echo $row['medicine_image']; ?>">
        </div>
        <div class="col-md-6">
          <h4>medicine Description</h4>
          <p><?php echo $row['medicine_descr']; ?></p>
          <h4>medicine Details</h4>
          <table class="table">
          	<?php foreach($row as $key => $value){
              if($key == "medicine_descr" || $key == "medicine_image" || $key == "medicine_weight" || $key == "medicine_title"){
                continue;
              }
              switch($key){
                case "medicine_isbn":
                  $key = "ISBN";
                  break;
                case "medicine_title":
                  $key = "Title";
                  break;
                case "generic_name":
                  $key = "Author";
                  break;
                case "medicine_price":
                  $key = "Price";
                  break;
              }
            ?>
            <tr>
              <td><?php echo $key; ?></td>
              <td><?php echo $value; ?></td>
            </tr>
            <?php 
              } 
              if(isset($conn)) {mysqli_close($conn); }
            ?>
          </table>
          <form method="post" action="cart.php">
            <input type="hidden" name="medicine_isbn" value="<?php echo $medicine_isbn;?>">
            <input type="submit" value="Purchase / Add to cart" name="cart" class="btn btn-primary">
          </form>
       	</div>
      </div>
<?php

include_once ('C:\xampp\htdocs\pharmacy\MVCStructure\View\template\footer.php');
  //require "./template/footer.php";
?>