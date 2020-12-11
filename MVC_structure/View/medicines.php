<?php
  session_start();
  $count = 0;
  // connecto database
  include('C:\xampp\htdocs\pharmacy\MVCStructure\Model\functions\database_functions.php');
  //require_once "./functions/database_functions.php";
  $conn = db_connect();

  $query = "SELECT medicine_isbn, medicine_image FROM medicines";
  $result = mysqli_query($conn, $query);
  if(!$result){
    echo "Can't retrieve data " . mysqli_error($conn);
    exit;
  }

  $title = "Full Catalogs of medicines";

  include('C:\xampp\htdocs\pharmacy\MVCStructure\View\template\header.php');
  //require_once "./template/header.php";
?>
  <p class="lead text-center text-muted">Full Catalogs of medicines</p>
    <?php for($i = 0; $i < mysqli_num_rows($result); $i++){ ?>
      <div class="row">
        <?php while($query_row = mysqli_fetch_assoc($result)){ ?>
          <div class="col-md-3">
            <a href="medicine.php?medicineisbn=<?php echo $query_row['medicine_isbn']; ?>">
              <img class="img-responsive img-thumbnail" src="./C:/xampp/htdocs/pharmacy/MVCStructure/View/bootstrap/img/<?php echo $query_row['medicine_image']; ?>">
            </a>
          </div>
        <?php
          $count++;
          if($count >= 4){
              $count = 0;
              break;
            }
          } ?> 
      </div>
<?php
      }
  if(isset($conn)) { mysqli_close($conn); }
  include('C:\xampp\htdocs\pharmacy\MVCStructure\View\template\footer.php');
  //require_once "./template/footer.php";
?>