<?php
require('../model/pdo.php');
require('../model/functions.php');

//echo "<table>
//  <tr>
//  <th>id</th> <th>title</th> <th>desc</th> <th>price</th> <th>qty</th> <th>colour</th> <th>size</th> <th>cat</th>
//  <tr>";

//$result = get_product_by_size(); //development, pull all results and display in table

//foreach($result as $row):
//  echo "<tr>";
//  echo "<td id='productID' name='productID' >" . $row['productID'] . "</td>";
//  echo "<td>" . $row['productTitle'] . "</td>";
//  echo "<td>" . $row['description'] . "</td>";
//  echo "<td>" . $row['price'] . "</td>";
//  echo "<td>" . $row['qty'] . "</td>";
//  echo "<td>" . $row['colourID'] . "</td>";
//  echo "<td>" . $row['sizeID'] . "</td>";
//  echo "<td>" . $row['catID'] . "</td>";
//  echo "</tr>";
//endforeach;
//echo "</table>";

echo "<div class='flex split'>
<label>Product ID</label>";

$result = get_product_by_size();

foreach ($result as $row)://show value for dev environment, make hidden for production

  echo "<input type='text' id='productID' name='productID' value=' " . $row['productID'] . " ' /></div>";
  echo "<div class='flex split'><label>Price per item</label> <input type='text' id='pricePerItem' name='pricePerItem' value=' " . $row['price'] . " ' />
  </div>";
  echo "<div class='flex split'><label>Currrent stock levels</label> <input type='text' id='stockQty' name='stockQty' value=' " . $row['qty'] . " ' /></div>";

endforeach;

?>
