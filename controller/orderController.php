<?php

//echo 'controller connected';

//set vars as empty
$userID = $colourID = $sizeID = $productID = $orderQty = $artUpload = $orderPrice = '';
//set error vars as empty
$colourErr = $sizeErr = $orderQtyErr = '';

//if form is submitted execute data checks
if ($_SERVER["REQUEST_METHOD"] == "POST"){

 $userID = test_input($_POST['userID']);

 //colour & size required to fetch exact productID in ajaxprocess.php
 //mandate inputs
 if(empty($_POST['colourID'])){
 $colourErr = "<p>please choose a garment colour.</p>";
 } else {
 $colourID = $_POST['colourID'];
 }

 if(empty($_POST['sizeID'])){
 $sizeErr = "<p>please choose a garment size.</p>";
 } else {
 $sizeID = $_POST['sizeID'];
 }

 $productID = test_input($_POST['productID']);

 if(!is_numeric($_POST['orderQty'])){
 $orderQtyErr = "<p>This field accepts numeric values only.</p>";
 } else {
 $orderQty = $_POST['orderQty'];
 }

 $productID = test_input($_POST['productID']);
 $price = test_input($_POST['pricePerItem']);//used to calculate orderPrice only
 $orderPrice = $price * $orderQty ;// orderPrice = pricePerItem * orderQty from user inputs

/* -----------------image upload-----------------------*/
 $target_dir = "../view/uploads/";
 $target_file = $target_dir . basename($_FILES["artUpload"]["name"]);
 $uploadOk = 1;
 $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));


// Check if image file is a actual image or fake image
 $check = getimagesize($_FILES["artUpload"]["tmp_name"]);
 if($check !== false) {
 //echo "<p>File is an image - " . $check["mime"] . ".</p>";
 $uploadOk = 1;
 } else {
 $imgErr = "<p>File is not an image.</p>";
 $uploadOk = 0;
 }

 if(empty($_FILES["artUpload"]['tmp_name'])){   //bespoke waring if field is left empty
 $imgErr = "<p>Please uplaod a design file for your merch.</p>";
 $uploadOk = 0;
 } elseif (file_exists($target_file)) {   // Check if file already exists
 $imgErr = "<p>Sorry, file name already exists. Please give file a unique name.</p>";
 $uploadOk = 0;
 } elseif ($_FILES["artUpload"]["size"] > 500000) {   // Check file size
 $imgErr = "<p>Sorry, your file is too large.</p>";
 $uploadOk = 0;
 } elseif ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif" ) {   // Allow certain file formats
 $imgErr = "<p>Sorry, only JPG, JPEG, PNG & GIF files are allowed.</p>";
 $uploadOk = 0;
 }

 if ($uploadOk == 0 or $sizeErr or $colourErr) { //if errors exist in form do not upload
 $imgUploadErr = "<p>Sorry, your file was not uploaded.</p>";
 // if everything is ok, try to upload file
 } else {
  if (move_uploaded_file($_FILES["artUpload"]["tmp_name"], $target_file)) {
  // echo "The file ". htmlspecialchars( basename( $_FILES["artUpload"]["name"])). " has been uploaded.";
  $artUpload = $_FILES["artUpload"]["name"]; //save filename/filepath to database
  } else {
  $imgUploadErr = "<p>Sorry, there was an error uploading your file.</p>";
  }
 }
/* -----------------image upload-----------------------*/
}
//test outputs before submitting to db
//echo 'user ' . $userID . ' | ';
//echo 'art ' . $artUpload . ' | ';
//echo 'prodID ' . $productID . ' | ';
//echo 'qty ' . $orderQty . ' | ';
//echo 'price ' . $orderPrice . ' | ';

/* if($userID != '' && $artUpload != '' && $productID != '' && $orderQty != ''){

function create_order($userID, $artUpload, $productID, $orderQty, $orderPrice){
	global $pdo;
	$sql = "INSERT INTO productionOrder ( userID, artUpload, productID, orderQty, orderPrice )
   VALUES ('$userID', '$artUpload', '$productID', '$orderQty', '$orderPrice');";
	$statement = $pdo->prepare($sql);
	$statement->bindValue(':userID', $userID);
	$statement->bindValue(':artUpload', $artUpload);
  $statement->bindValue(':productID', $productID);
  $statement->bindValue(':orderQty', $orderQty);
  $statement->bindValue(':orderPrice', $orderPrice);
  $result = $statement->execute();
	$statement->closeCursor();
	return $result;
  }

$result = create_order($userID, $artUpload, $productID, $orderQty, $orderPrice);

if($result){
  header('location: ../view/home.php');
} else {
  echo "errorrrr";
}

}




*/
?>
