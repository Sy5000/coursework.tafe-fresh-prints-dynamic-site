<?php

$productID = $productTitle = $description = $price = $qty = $colourID = $sizeID = $catID = '';

$productTitleErr = $descriptionErr = $priceErr = $qtyErr = '';

if ($_SERVER["REQUEST_METHOD"] == "POST"){
//pass user data through sanitise function then assign to vars
$productID = test_input($_POST['productID']);

if(empty($_POST['productTitle'])){
  $productTitleErr = "Do not leave blank";
} else {
  $productTitle = test_input($_POST['productTitle']);
}

if(empty($_POST['description'])){
  $descriptionErr = "Do not leave blank";
} else {
  $description = test_input($_POST['description']);
}

if(empty($_POST['price'])){
  $priceErr = "Do not leave blank";
} elseif(!is_numeric($_POST['price'])) {
  $priceErr = "numeric input only";
} else {
  $price = test_input($_POST['price']);
}

if(empty($_POST['qty'])){
  $qtyErr = "Do not leave blank";
} elseif(!is_numeric($_POST['qty'])) {
  $qtyErr = "numeric input only";
} else {
  $qty = test_input($_POST['qty']);
}

$colourID = test_input($_POST['colourID']);
$sizeID = test_input($_POST['sizeID']);
$catID = test_input($_POST['catID']);


}

if($productTitle != '' && $description != '' && $price != '' && $qty != ''){ //conditions to meet before writing to db

//call function to pass variable data to database
$result = update_product($productID, $productTitle, $description, $price, $qty, $colourID, $sizeID, $catID);

//user feedback logic
if($result){

 header('location: ../view/admin.php');
//  echo 'updated following record';
//  echo '<p> Product : ' . $productTitle . '</p>';
//  echo '<p> Description : ' . $description . '</p>';
//  echo '<p> Price : ' . $price . '</p>';
//  echo '<p> Qty : ' . $qty . '</p>';
//  echo '<p> Colour : ' . $colourID . '</p>';
//  echo '<p> Size : ' . $sizeID . '</p>';
//  echo '<p> Cat : ' . $catID . '</p>';
} else {

  echo "could not update record";

}

}
