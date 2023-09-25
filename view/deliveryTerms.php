<?php
session_start();
require('../model/pdo.php');
require('../model/functions.php')
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <meta charset="utf-8" />
  <title>Fresh Prints | Delete Product</title>

  <!-- link to CSS -->
  <link rel="stylesheet" href="../css/reset.css"><!--disable browser styling-->
  <link rel="stylesheet" href="../css/style.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"><!-- burger icon -->
</head>
<body>
<?php
require('navigation.php');
//require('subnav.php');
?>

<hr>

<!--<header>
  <div class='hero-img'>
    <div class='hero-text'>
      <p>WELCOME TO</p>
      <h1>FRESH PRINTS</h1>
    </div>
  </div>
</header>-->

<hr>
<?php require('section_account.php'); ?>


<section class="section_container">
<p>delete product form</p>
<form method="post" action="../controller/productDeleteController.php">
  <?php

  $productID = test_input($_GET['productID']); //rerieve primary key from URL/link and sanitise

  if(isset($productID)){

  $sql = 'SELECT * FROM product WHERE productID = ' . $productID;
  foreach ($pdo->query($sql) as $result) {
  // target DB col and echo out result
    echo "<strong>" . $result['productID'] . " - " . $result['productTitle'] . "</strong>";
      }
  }
  ?>
  <input type="hidden" id="productID" name="productID" value="<?php echo $result['productID']; ?>"/ >

  <p>would you like to remove <span class='error'>product# <?php echo $result['productID'] . " | title: " . $result['productTitle'] . " | description :" . $result['description']; ?></span> from the databse</p>

  <button type="submit"> remove product </button>
</section>

<hr>

<?php require('footer.php');?>

</body>
</html>

<!-- <script type="text/javascript" src="js/functions.js"></script><!- -Javascript functions link -->
