<?php
//call connection object
require ('../model/pdo.php');
//call functions file
require ('../model/functions.php');

//fetch defining variable from url link
$orderID = $_POST['orderID'];

//call the function containing the prepared statement with named perameters
$data = delete_order($orderID);
//conditional statement when the correct row has been deleted
if($data){

	header('location: ../view/admin.php');

} else {

  echo "could not remove record";

}

echo '<a href="../view/home.php" >home</a>'
?>
