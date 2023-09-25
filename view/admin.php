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
  <title>Fresh Prints | Admin Panel</title>

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
<h2>Product list</h2>

<?php

$result = get_products();

foreach($result as $row):
echo '<p> | ' . $row['productID'] . ' | ' . $row['productTitle'] . ' | ' . $row['description'] . ' | ' . $row['price'] . ' | ' . $row['qty'] . ' |';
echo ' <a href="form_productUpdate.php?productID=' . $row['productID'] . '"> &#8635; update </a> |  ';
echo ' <a href="deleteProduct.php?productID=' . $row['productID'] . '"> &#10006; delete </a> </p>' ;
endforeach;

?>

</section>

<hr>

<!--<section class="section_container">
<h2>Category list</h2>
<?php

/*$result = get_categories();

foreach($result as $row):

echo '<p>| ' . $row['catID'] . ' | ' . $row['catName'] . ' | ' . $row['catDescription'] . ' <a href="#"> &#8635; update </a> | <a href="#"> &#10006; delete </a></p>';

endforeach;*/
?>
</section>-->

<hr>

<section class="section_container">

<h2>New Orders</h2>
<table>
  <th>Order#</th><th>userID</th><th>print filepath</th><th>stock item</th><th>quantity</th><th>total price</th><th>Date</th><th></th>

<?php

$result = get_orders();

foreach ($result as $row):
echo '<tr> <td>' . $row['orderID'] . '</td><td>' . $row['userID'] . '</td><td>' . $row['artUpload'] . '</td><td>' . $row['productID'] . '</td><td>' . $row['orderQty'] . '</td>';
echo '<td>' . $row['orderPrice'] . '</td><td>' . $row['date'] . '</td> <td><a href="deleteOrder.php?orderID=' . $row['orderID'] . ' "> &#10006; delete </a></td></tr>';
endforeach;

?>
</table>
<!--<table>
  <th>Order#</th><th>Customer</th><th>Artwork filename</th><th>timestamp</th>
  <th>product description</th><th>Quantity</th><th>Cost</th><th></th>
  <tr>
    <td>1</td><td>Rick Sanchez</td><td>RayGun.jpg</td><td>12.14pm 14/02/2022</td><td>plain white T-shirt small</td><td>25</td><td>500</td><td><a href="#"> &#10006; delete </a></td>
    <tr>
</table>-->
</section>

<hr>

<?php require('footer.php');?>

</body>
</html>

<!-- <script type="text/javascript" src="js/functions.js"></script><!- -Javascript functions link -->
