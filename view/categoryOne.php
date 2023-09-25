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
  <title>Fresh Prints | Mens Tee's</title>

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

<header>
  <div class='item-img img1'>
    <!--<img src="../images/itemHeroMensT.gif" >-->
    <div class='item-text'>
      <p>Mens Tees</p>
      <h1>Plain Crew Neck</h1>
    </div>
  </div>
</header>

<hr>
<?php require('section_account.php'); ?>



<section class="section_container" >
<h2></h2>
 <div class="grid col2">

    <div class="">
    <h2>Catalogue Item 1</h2>
    <hr>
    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed nec tellus vitae erat ornare venenatis. Etiam condimentum est lacus, sed euismod orci cursus id. Integer ut tellus quam. Praesent vitae nibh et magna tincidunt feugiat. Donec pharetra dolor ut massa tincidunt, vitae sodales orci dignissim. Integer porttitor nibh.</p>
    </div>

    <div class="itemDetails">
      <strong>Size Guide</strong>
      <hr>
      <table>
      <th>Size</th><th>Length</th><th>Chest</th><th>Shoulder</th>
      <tr>
        <td>small</td><td></td><td></td><td></td>
      <tr>
        <tr>
          <td>medium</td><td></td><td></td><td></td>
        <tr>
        <tr>
          <td>large</td><td></td><td></td><td></td>
        <tr>
          <tr>
          <td>exrta-large</td><td></td><td></td><td></td>
        <tr>
          <tr>
          <td>XXL</td><td></td><td></td><td></td>
        <tr>
        </table>
      <hr>

      <div class="flex split">

        <div><strong>Colours</strong></div>

        <div><ul><li class="colour1"></li>  <li class="colour2"></li></ul></div>

      </div>

      <hr>

      <a href="order.php?catID=1" class="canHide" >availability</a>
    </div>

  </div>
</section>

<hr>


<!--<section class="section_container">


<p><h2>Bulk discounts</h2></p>

<div class="grid">
some content
</div>

</section>

<hr>-->

<?php require('footer.php');?>

</body>
</html>
 <script type="text/javascript" src="js/functions.js"></script><!--Javascript functions link -->
