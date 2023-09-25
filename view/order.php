<?php
session_start();
require('../model/pdo.php');
require('../model/functions.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <meta charset="utf-8" />
  <title>Fresh Prints | Order</title>

  <!-- link to CSS -->
  <link rel="stylesheet" href="../css/reset.css"><!--disable browser styling-->
  <link rel="stylesheet" href="../css/style.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"><!-- burger icon -->
  <!--- social icons link -->
  <script defer src="https://use.fontawesome.com/releases/v5.0.8/js/all.js"></script>

</head>
<body>
<?php
require('navigation.php');
?>

<hr>
<?php require('section_account.php'); ?>

<section class="section_container formbkg">
<?php //load order/quote form logic
if(isset($_SESSION['loggedin'])){
  require('form_order.php');
} else {
  require('form_quote.php');
}
?>
</section>

<hr>

<?php require('footer.php');?>

</body>
</html>
<script type="text/javascript" src="js/functions.js"></script><!--Javascript functions link -->
