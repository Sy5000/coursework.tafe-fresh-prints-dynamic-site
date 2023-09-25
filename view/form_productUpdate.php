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
  <title>Fresh Prints | Update Product</title>

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
<?php require('section_account.php'); ?>

<section class="section_container formbkg">

  <div class="">

   <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"] . "?" . $_SERVER['QUERY_STRING'] );?>">

<?php require('../controller/productUpdateProcess.php'); ?><!--validation script-->

  <?php

  $productID = $_GET['productID'];

if(isset($productID)){

  global $pdo;
  $sql = 'SELECT * FROM product WHERE productID =' . $productID;
  //display results, for each loop
  foreach($pdo->query($sql) as $result): //pull results as a array_key stored in variable $row

?>

  <input type="hidden" id="productID" name="productID" value=" <?php echo $productID; ?> ">

<h2>Update Catalogue</h2>
<p>Please fill out this form to update a catalogue product...</p>
<hr>
<p><?php $selectedCol = $result['colourID']; //echo $selectedCol; // vars for default options in drop down menu selections ?></p>
<p><?php $selectedSize = $result['sizeID']; //echo $selectedSize; ?></p>
<p><?php $selectedCat = $result['catID']; //echo $selectedCat; ?></p>

        <label for="productTitle">Product Name:</label>
         <input type="text" id="productTitle" name="productTitle" value="<?php echo $result['productTitle']; ?>" />
         <span class="error"><?php if(isset($productTitleErr)) { echo $productTitleErr; }  ?></span>

         <p><label for="description">Description:</label></p>
         <textarea id="description" name="description" cols="120" rows="8"><?php  echo $result['description']; ?></textarea>
         <span class="error"><?php if(isset($descriptionErr)) { echo $descriptionErr; }  ?></span>

         <p><label for="price">Product Price:</label></p>
         <input type="text" id="price" name="price" value="<?php echo $result['price'];  ?>" />
         <span class="error"><?php if(isset($priceErr)) { echo $priceErr; }  ?></span>

         <p><label for="qty">Inventory:</label></p>
         <input type="text" id="qty" name="qty" value="<?php echo $result['qty'];  ?>" />
         <span class="error"><?php if(isset($qtyErr)) { echo $qtyErr; }  ?></span>

         <p><label for="colourID">Choose from available colours:</label></p>
         <!-- drop down options populated from colour database table -->
         <select name='colourID' id="colourID">
          <!--<option value=""> - - select one - - </option>set empty value / ensure user has not overseen field -->
          <?php

          $result = get_colour_dropdown();

           foreach($result as $row): //display results, for each loop - $row is key value

             if( $selectedCol == $row['colourID'] ){ // conditional - add 'selected' attribute to load default colourID
               echo '<option selected value="' . $row['colourID'] . '" > ' . $row['colour'] . '</option>';
             } else {
              echo '<option value="' . $row['colourID'] . '" > ' . $row['colour'] . '</option>';
             }
           //echo"<pre>";
           //print_r( $row );
           endforeach;


           ?>
         </select>

         <p><label for="sizeID">Choose from available sizes:</label></p>
         <!-- drop down options populated from size database table -->
         <select name='sizeID' id="sizeID">
          <!--<option value=""> - - select one - - </option>set empty value / ensure user has not overseen field -->
          <?php

          $result = get_size_dropdown();

           foreach($result as $row): //display results, for each loop - $row is key value

             if($row['sizeID'] == $selectedSize){
           echo '<option selected value="' . $row['sizeID'] . '" > ' . $row['sizes'] . '</option>';
         } else {
           echo '<option value="' . $row['sizeID'] . '" > ' . $row['sizes'] . '</option>';
         }

           endforeach;

           ?>
         </select>

         <p><label for="catID">Choose from available categories:</label></p>
         <!-- drop down options populated from  category database table -->
         <select name='catID' id="catID">

          <?php

           $result = get_category_dropdown();

           foreach($result as $row): //display results, for each loop - $row is key value

             if($row['catID'] == $selectedCat){
           echo '<option selected value="' . $row['catID'] . '" > ' . $row['catName'] . '</option>';
         } else {
          echo '<option value="' . $row['catID'] . '" > ' . $row['catName'] . '</option>';
         }

           endforeach;

           ?>
         </select>

  <button type="submit" > Update </button>
  <br>
  <?php

endforeach; //end of loop to populate product data
  } else {
    "could not find product";

  }  ?>

<?php



?>

   </form>

    </div>


</section>
<hr>


<hr>

<?php require('footer.php');?>

</body>
</html>
<!--<script type="text/javascript" src="js/functions.js"></script><!- -Javascript functions link -->
