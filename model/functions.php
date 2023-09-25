<?php

//custom functions

//sanitise function
function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}

/* CMS complete product list  */
function get_products(){

  global $pdo;
  $sql = 'SELECT * FROM product';
  $result = $pdo->query($sql);
  return $result;

}
/* CMS complete function list */
function get_categories(){

  global $pdo;
  $sql = 'SELECT * FROM category';
  $result = $pdo->query($sql);
  return $result;
}
// drop down menu for forms
function get_category_dropdown()
{
  global $pdo;
  $sql = 'SELECT * FROM category WHERE catID >0 ORDER BY catID';
    //use a prepared statement to enhance security
  $statement = $pdo->prepare($sql);
  $statement->execute();
  $result = $statement->fetchAll();
  $statement->closeCursor();
  return $result;
}
// get colour option - productAdd, productUpdate
//function get_colour_dropdown()
function get_colour_dropdown()
{
 global $pdo;
 $sql = 'SELECT * FROM colour ORDER BY colourID';//query
 $result = $pdo->query($sql); //execute
 return $result;
}
// function get colour options for dropdown menu
function get_size_dropdown()
{
  global $pdo;
  $sql = 'SELECT * FROM size ORDER BY sizeID';//query
  $result = $pdo->query($sql); //execute
  return $result;
}
// function to join order and orderItem tables / full order details
function get_orders(){
  global $pdo;
  $sql = "SELECT *
  FROM productionOrder;";
  //use a prepared statement to enhance security
  $statement = $pdo->prepare($sql);
  $statement->execute();
  $result = $statement->fetchAll();
  $statement->closeCursor();
  return $result;
}
//new user function 'form_signup.php' (prepared)
function add_user($username, $hashed_password, $firstName, $lastName, $phone)
{
  global $pdo;
  $sql = "INSERT INTO user (username, password, firstName, lastName, phone) VALUES ('$username','$hashed_password','$firstName', '$lastName', '$phone' )";
  $statement = $pdo->prepare($sql);
  $statement->bindValue(':username', $username);
  $statement->bindValue(':password', $hashed_password);
  //salt to inc later
  $statement->bindValue(':firstName', $firstName);
  $statement->bindValue(':lastName', $lastName);
  $statement->bindValue(':phone', $phone);
  $result = $statement->execute();
  $statement->closeCursor();
  return $result;
}
// add product to catalogue function 'form_productAdd' (prepared)
function add_product($productTitle, $description, $price, $qty, $colourID, $sizeID, $catID){

global $pdo;
$sql = "INSERT INTO product (productTitle, description, price, qty, colourID, sizeID, catID)
VALUES ('$productTitle', '$description', '$price', '$qty', '$colourID', '$sizeID', '$catID');";
$statement = $pdo->prepare($sql);
$statement->bindValue(':productTitle', $productTitle);
$statement->bindValue(':description', $description);
$statement->bindValue(':price', $price);
$statement->bindValue(':qty', $qty);
$statement->bindValue(':colourID', $colourID);
$statement->bindValue(':sizeID', $sizeID);
$statement->bindValue(':catID', $catID);
$result = $statement->execute();
$statement->closeCursor();
return $result;
}
// update product, form_productUpdate (prepared)
function update_product($productID, $productTitle, $description, $price, $qty, $colourID, $sizeID, $catID )
{
  global $pdo;

  $sql = "UPDATE fresh_prints.product SET product.productTitle = '$productTitle', description = '$description', price = '$price', qty = '$qty', colourID = '$colourID', sizeID = '$sizeID', catID = '$catID' WHERE productID = $productID";
  $statement = $pdo->prepare($sql);
  $statement->bindValue(':productID', $productID);
  $statement->bindValue(':productTitle', $productTitle);
  $statement->bindValue(':description', $description);
  $statement->bindValue(':price', $price);
  $statement->bindValue(':qty', $qty);
  $statement->bindValue(':colourID', $colourID);
  $statement->bindValue(':sizeID', $sizeID);
  $statement->bindValue(':catID', $catID);
  $result = $statement->execute();
  $statement->closeCursor();
  return $result;
}
//order form, pulls correct item when size is selected
function get_product_by_size(){

  global $pdo;
  $size = intval($_GET['size']);
  $colour = intval($_GET['colour']);
  $cat = intval($_GET['cat']); //define with var from javascript??
  //$c = intval($_GET['c']);;
  $sql = ' SELECT * FROM product WHERE catID = ' . $cat . ' AND sizeID = '. $size .'  AND colourID = '. $colour .' ; ';//make catID dynamic
  $result = $pdo->query($sql);
  return $result;
}
//remove orders from admin page + db function (prepared)
function delete_order($orderID)
{
  global $pdo;
  $sql = "DELETE FROM productionOrder WHERE orderID = '$orderID'; ";
  $statement = $pdo->prepare($sql);
  $result = $statement->execute();
  $statement->closeCursor();
  return $result;
}
//remove products from admin page + db function (prepared)
function delete_product($productID)
{
  global $pdo;
  $sql = "DELETE FROM product WHERE productID = '$productID'; ";
  $statement = $pdo->prepare($sql);
  $result = $statement->execute();
  $statement->closeCursor();
  return $result;
}
//populate order and quote forms with database info
function get_cat_details()
{
  global $pdo;
  $catID = $_GET['catID'];
  $sql = "SELECT * FROM `category` WHERE catID =" . $catID;
  $result = $pdo->query($sql);
  return $result;
}

?>
