<?php
session_start();
require('../model/pdo.php');
require('../model/functions.php'); //place at start of html files, avoid calling from multiple php script locations
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <meta charset="utf-8" />
  <title>Fresh Prints | Homepage</title>

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

<header>
  <div class='hero-img'>
    <div class='hero-text'>
      <p>WELCOME TO</p>
      <h1>FRESH PRINTS</h1>
    </div>
  </div>
</header>

<hr>
<?php require('section_account.php'); ?>

<section class="section_container" id="instructions_container">
<h2>Ordering is as simple as...</h2>
 <div class="grid col3">

    <div class="">
    <img src="../images/iconT.png" alt="t-shirt icon" >
    <p>1.</p>
    <p>Choose from our merch</p>
    </div>

    <div class="">
    <img src="../images/iconFile.png" alt="file icon" >
    <p>2.</p>
    <p>Upload your design</p>
    </div>

    <div class="">
    <img src="../images/iconParcel.png" alt="parcel icon" >
    <p>3.</p>
    <p>Sit back & wait for your new threads to arrive!</p>
    </div>

  </div>
</section>

<hr>

<section class="section_container">

  <!-- change ot dynamic content -->
<h2>Current Collection!</h2>
   <div class="flexwrap center">

<div class="cat"><a href="categoryOne.php"><img src="../images/catMensT.jpg" alt="t-shirt generic">Mens Tees</a></div>
<div class="cat"><a href="categoryTwo.php"><img src="../images/catWomensT.jpg" alt="t shirt generic">Womens Tees</a></div>
<div class="cat"><a href="categoryThree.php"><img src="../images/catHoodies.jpg" alt="hoodie generic">Hoodies</a></div>
<div class="cat"><a href="categoryFour.php"><img src="../images/catKids.jpg" alt="kids t-shirt generic">Kids</a></div>
<!--<div class="cat"><a href="categoryFive.php"><img src="../images/catPrints.jpg">Flyers / Posters</a></div>-->
<!--<div class="cat"><a href="categorySix.php"><img src="../images/catPromo.jpg">Promotional</a></div>-->

   </div>

</section>

<hr>

<section class="section_container">


<p><h2>Bulk discounts</h2></p>

<div class="grid col3">
    <div class="accordian_wrap">
      <button class="accordion">5+ Items</button>
        <div class="panel">
        <ul>
          <li>Tees : 5% discount</li>
          <li>Hoodies 10% discount </li>
        </ul>
        </div>
    </div>
<div class="accordian_wrap">
<button class="accordion">10+ Items</button>
  <div class="panel">
    <ul>
      <li>Tees : 10% discount</li>
      <li>Hoodies  : 10% discount </li>
      <li>Prints : 15% discount </li>
    </ul>
  </div>
</div>
<div class="accordian_wrap">
<button class="accordion">25+ Items</button>
  <div class="panel">
    <ul>
      <li>Tees : 20% discount</li>
      <li>Promo items : 25% discount</li>
    </ul>
  </div>
</div>

</div>

</section>

<hr>

<?php require('footer.php'); ?>

</body>
</html>
<script type="text/javascript" src="js/functions.js"></script><!--Javascript functions link -->
