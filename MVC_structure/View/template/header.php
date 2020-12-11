<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title><?php echo $title; ?></title>

    <link href= "./C:/xampp/htdocs/pharmacy/MVCStructure/View/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href= "./C:/xampp/htdocs/pharmacy/MVCStructure/View/bootstrap/css/bootstrap-theme.min.css"rel="stylesheet">
    <link href= "./C:/xampp/htdocs/pharmacy/MVCStructure/View/bootstrap/css/jumbotron.css" rel="stylesheet">
  </head>

  <body>

    <nav class="navbar navbar-inverse navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="index.php"><span class="glyphicon glyphicon-home"></span>&nbsp; Pharma Help</a>
        </div>

        <!--/.navbar-collapse -->
        <div id="navbar" class="navbar-collapse collapse">
          <ul class="nav navbar-nav navbar-left">
              <!-- link to publiser_list.php -->
              <li><a href="./C:/xampp/htdocs/pharmacy/MVCStructure/Controller/publisher_list.php"><span class="glyphicon glyphicon-map-marker"></span>&nbsp; Stores</a></li>
              <!-- link to medicines.php -->
              <li><a href= "./C:/xampp/htdocs/pharmacy/MVCStructure/Controller/medicines.php"><span class="glyphicon glyphicon-plus-sign"></span>&nbsp; Medicines</a></li>
              <!-- link to contacts.php -->
              <li><a href="./C:/xampp/htdocs/pharmacy/MVCStructure/Controller/contact.php"><span class="glyphicon glyphicon-phone-alt"></span>&nbsp; Contact</a></li>
              <!-- link to shopping cart -->
              <li><a href="./C:/xampp/htdocs/pharmacy/MVCStructure/Controller/cart.php"><span class="glyphicon glyphicon-shopping-cart"></span>&nbsp; My Cart</a></li>

              <form action="./C:/xampp/htdocs/pharmacy/MVCStructure/Controller/search.php" class="pull right" method="POST">
               <fieldset class="right">
                          <input type="text" maxlength="100" placeholder="Medicine Name" name="Search" autocomplete="off">
                          <button type="submit" name="submit-search"><span class="glyphicon glyphicon-search"></span>&nbsp; Search</button>
                        </fieldset>
                      </form>
            </ul>
        </div>
      </div>
    </nav>

    <?php
      if(isset($title) && $title == "Index") {
    ?>
    <!-- Main jumbotron for a primary marketing message or call to action -->
    <div class="jumbotron">
      <div class="container">
        <h1 style="background-color:tomato;">Welcome to Pharma Help!</h1>
        <p class="lead"><h3> The pharmacy you trust at your doorstep!</h3></p>
      </div>
    </div>
    <?php } ?>

    <div class="container" id="main">
