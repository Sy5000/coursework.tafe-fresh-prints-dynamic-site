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
  <title>Fresh Prints | Add Product</title>

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

<section class="grid">
  <div class="admin">
  <p>admin panel</p>
  <?php if($pdo){echo 'conected to :' . $db . ' database';} ?>
  </div>
</section>

<hr>

<section class="section_container formbkg" >

  <div class="">

   <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
  <?php
//empty variables for fresh starting point on load
$productTitle = $description = $price = $qty = $colourID = $sizeID = $catID = '';
//error vsriables
$productTitleErr = $descriptionErr = $priceErr = $qtyErr = $colourIDErr = $sizeIDErr = $catIDErr = '' ;

  //require ('../controller/workshopAddController.php'); //call script to process inputs, errors etc

if($_SERVER["REQUEST_METHOD"] == "POST"){

 //nested conditionals to validate form input
 if(empty($_POST['productTitle'])){
   $productTitleErr = "Product Name is a required field";
 } else {
   $productTitle = test_input($_POST['productTitle']);
 }
 if(empty($_POST['description'])){
   $descriptionErr = "Description is a required field";
 } else {
   $description = test_input($_POST['description']);
 }
 if(!is_numeric($_POST['price'])){
   $priceErr = "Price field accepts numeric characters only";
 } else {
   $price = test_input($_POST['price']);
 }
 if(!is_numeric($_POST['qty'])){
   $qtyErr = "Inventory field accepts numeric characters only";
 } else {
   $qty = test_input($_POST['price']);
 }
 if(empty($_POST['colourID'])){
   $colourIDErr = "Please select from available colours";
 } else {
   $colourID = test_input($_POST['colourID']);
 }
 if(empty($_POST['sizeID'])){
   $sizeIDErr = "Please select from available sizes";
 } else {
   $sizeID = test_input($_POST['sizeID']);
 }
 if(empty($_POST['catID'])){
   $catIDErr = "Please choose which category the new items belongs to";
 } else {
   $catID = test_input($_POST['catID']);
 }
//call function to pass sanitised data to datbase
$result = add_product($productTitle, $description, $price, $qty, $colourID, $sizeID, $catID);

// user feedback logic
if($result){

header('location: admin.php');
//  echo 'the following record was successfully added to the database';

//  echo '<p> title ' . $productTitle . ' </p> ';
//  echo '<p> description ' . $description . ' </p> ';
//  echo '<p> price ' . $price . ' </p> ';
//  echo '<p> qty ' . $qty . ' </p> ';
//  echo '<p> colour ' . $colourID . ' </p> ';
//  echo '<p> size ' . $sizeID . ' </p> ';
//  echo '<p> cat ' . $catID . ' </p> ';

}else{

  "could not add to database";

}



}


  ?>

<h2>Add to Catalogue</h2>
<p>Please fill out this form to add a product to the catalogue...</p>
<hr>

        <label for="productTitle">Product Name:</label>
         <input id="productTitle" type="text" placeholder="Product title eg 'Crew T-shirt' " id="productTitle" name="productTitle" value="<?php if (isset($productTitle)){ echo $productTitle; } ?>" />
         <span class="error"> <?php echo $productTitleErr; ?></span>

         <p><label for="description">Description:</label></p>
         <textarea placeholder="Enter a brief description about the item" id="description" name="description" cols="120" rows="8"><?php if (isset($description)){ echo $description; } ?></textarea>
         <span class="error"> <?php echo $descriptionErr; ?></span>

         <p><label for="price">Product Price:</label></p>
         <input type="text" placeholder="How much wuold you like to charge for each item?" id="price" name="price" value="<?php if (isset($price)){ echo $price; } ?>" />
         <span class="error"> <?php echo $priceErr; ?></span>

         <p><label for="qty">Inventory:</label></p>
         <input type="text" placeholder="How many are available to purchase?" id="qty" name="qty" value="<?php if (isset($qty)){ echo $qty; } ?>" />
         <span class="error"> <?php echo $qtyErr; ?></span>


         <p><label for="colourID">Choose from available colours:</label></p>
         <!-- drop down options populated from colour database table -->
         <select name='colourID' id="colourID">
          <option value=""> -- select one -- </option><!--set empty value / ensure user has not overseen field -->
          <?php

           $result = get_colour_dropdown();

           foreach($result as $row): //display results, for each loop - $row is key value
           echo '<option value="' . $row['colourID'] . '" > ' . $row['colour'] . '</option>';
           //echo"<pre>";
           //print_r( $row );
           endforeach;

           ?>
         </select>
         <span class="error"> <?php echo $colourIDErr; ?></span>

         <p><label for="sizeID">Choose from available sizes:</label></p>
         <!-- drop down options populated from size database table -->
         <select name='sizeID' id="sizeID">
          <option value=""> -- select one -- </option><!--set empty value / ensure user has not overseen field -->
          <?php

           $result = get_size_dropdown();

           foreach($result as $row): //display results, for each loop - $row is key value
           echo '<option value="' . $row['sizeID'] . '" > ' . $row['sizes'] . '</option>';
           //echo"<pre>";
           //print_r( $row );
           endforeach;

           ?>
         </select>
         <span class="error"> <?php echo $sizeIDErr; ?></span>


         <p><label for="catID">Choose from available categories:</label></p>
         <!-- drop down options populated from  category database table -->
         <select name='catID' id="catID">
          <option value=""> -- select one --  </option><!--set empty value / ensure user has not overseen field -->
          <?php



           $result = get_category_dropdown();

           foreach($result as $row): //display results, for each loop - $row is key value
           echo '<option value="' . $row['catID'] . '" > ' . $row['catName'] . '</option>';
           //echo"<pre>";
           //print_r( $row );
           endforeach;

           ?>
         </select>
         <span class="error"> <?php echo $catIDErr; ?></span>

  <button type="submit" > Add  a new product </button>
  <br>
   </form>

    </div>


</section>
<hr>


<hr>

<?php require('footer.php');?>

</body>
</html>
<!--<script type="text/javascript" src="js/functions.js"></script><!- -Javascript functions link -->
