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
  <title>Fresh Prints | Delete Order</title>

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
<p>delete order form</p>
<form method="post" action="../controller/orderDeleteController.php">
  <?php

  $orderID = test_input($_GET['orderID']); //retrieve primary key from URL and sanitize

  if(isset($orderID)){

  $sql = 'SELECT * FROM productionOrder WHERE orderID = ' . $orderID;
  foreach ($pdo->query($sql) as $result) {
  // target DB col and echo out result
    echo "<strong>" . $result['orderID'] . " - " . $result['date'] . "</strong>";
      }
  }
  ?>
  <input type="hidden" id="orderID" name="orderID" value="<?php echo $result['orderID']; ?>"/ >

  <p>would you like to remove order #'<?php echo $result['orderID'] . " | placed on: " . $result['date']; ?>  ' from the databse</p>

  <button type="submit"> remove order </button>
</section>

<hr>

<?php require('footer.php');?>

</body>
</html>

<!-- <script type="text/javascript" src="js/functions.js"></script><!- -Javascript functions link -->
