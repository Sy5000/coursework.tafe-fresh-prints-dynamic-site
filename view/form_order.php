<div id="formOrder" class="">
  <form class="order-form" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"] . "?" . $_SERVER["QUERY_STRING"]);?>" enctype="multipart/form-data">
    <div class="container">

<?php require('../controller/orderController.php') ?>
<?php $userID = $_SESSION['userID']; ?>
<?php $catID = $_GET['catID'];?>

      <h1>Order Form</h1>
      <hr>
<?php
$result = get_cat_details();

foreach ($result as $row):
echo "<img src='../images/" . $row['catImg'] . "'> ";
echo "<b>" . $row['catName'] . "</b>";
endforeach; ?>

<hr>


      <input type="hidden" name="userID" value="<?php if(isset($userID)) {echo $userID; } ?>" />
      <input type="hidden" name="catID" id="catID" value="<?php if(isset($catID)) {echo $catID; } ?>" />

      <div class="flex split">
        <p><label>Choose from available colours:</label></p>
        <!-- drop down options populated from colour database table -->

        <select name='colourID' id="colourID" onchange="call_catalogue(this.value); calcTotalPrice();"><!--onchange="setColour()" -->
         <option value=""> -- select one -- </option>
         <?php

          $result = get_colour_dropdown();

          foreach($result as $row): //display results, for each loop - $row is key value
          echo '<option value="' . $row['colourID'] . '" > ' . $row['colour'] . '</option>';
          endforeach;

          ?>
        </select>
      </div>

      <span class="error"> <?php if(isset($colourErr)) { echo $colourErr; } ?></span>

      <div class="flex split">
        <p><label>Choose from available sizes:</label></p>
        <!-- drop down options populated from size database table -->
        <select name='sizeID' id="sizeID" onchange="call_catalogue(this.value); calcTotalPrice();"><!--  may need to move to selected field -->
         <option value=""> -- select one -- </option><!--set empty value / ensure user has not overseen field -->
         <?php

          $result = get_size_dropdown();

          foreach($result as $row): //display results, for each loop - $row is key value
          echo '<option value="' . $row['sizeID'] . '" > ' . $row['sizes'] . '</option>';
          //echo"<pre>";  //print_r( $row );
          endforeach;

          ?>
        </select>
      </div>

      <span class="error"> <?php if(isset($sizeErr)) { echo $sizeErr; } ?></span>

<div class="hidden" id="txtHint"><b>dev options</b></div><!-- remove 'hidden' attribute to reveal ajax data -->

<hr>

      <!--<div class="flex split">
      <label for="productID">ajax the product id</label>
      <input type="text" id="productID" name="productID" value="" />
    </div>-->

    <div class="flex split">
    <label>Quantity Required</label>
    <input type="text" placeholder="" id="orderQty" name="orderQty" onchange="calcTotalPrice()"/>
    </div>

    <span class="error"><?php if(isset($orderQtyErr)) { echo $orderQtyErr; } ?></span>

    <!--<div class="flex split">
    <label>OrderPrice</label>
    <input type="text" placeholder="orderPrice" id="orderPrice" name="orderPrice" />
  </div>-->

    <hr>

    <label>Select image to upload:</label>
    <input type="file" id="artUpload" name="artUpload" >
    <span class="error"><!-- multiple fail conditions -->
      <?php if (isset($imgErr)){ echo $imgErr; } ?>
      <?php if (isset($imgUploadErr)){ echo $imgUploadErr; } ?>
    </span>

    <hr>
    <p id="priceAlert" style="font-size:2rem;"><i>$00.00</i></p>


    <div class="clearfix">
    <p><button id="submitbtn" type="submit" class="orderBut">Place Order</button></p>
    </div>

    </div>
  </form>
</div>
<!--<script type="text/javascript">

var colourID;
    function setColour(){
      colourID = document.getElementById('colourID').value;
      alert(colourID);
    }

</script>-->
<script type="text/javascript">/* pull all colours from dtabase based on user selection */

function call_catalogue(str) {//define var #1 to pass through to query
    var xhttp;
    if (str == "") {
      document.getElementById("txtHint").innerHTML = "";
      return;
    }
    xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
        document.getElementById("txtHint").innerHTML = this.responseText;
      }
    };
     var colour = document.getElementById('colourID').value; //define variable #2 to pas through to query
     var cat = document.getElementById('catID').value;

    xhttp.open('GET', '../controller/ajaxProcess.php?size='+str+'&colour='+colour+'&cat='+cat, true);
    xhttp.send();
  }
</script>
<script type="text/javascript">

function calcTotalPrice(){

  const pricePerItem = document.getElementById('pricePerItem').value; //grab price per item from ajaxProcess.php
  const orderQty = document.getElementById('orderQty').value; //grab user input for order qty
  const stock = document.getElementById('stockQty').value; //grab stock level item from ajaxProcess.php
  const stockQty = Number(stock); //change stock value to number/integer. ***** BUGFIX ***** conditional below wont work WO this line

  if( orderQty <= stockQty ){ //compare order qty to stock levels fetched in ajaxProcess.php function

      let totalPrice = pricePerItem * orderQty; //calculate the total
      document.getElementById("priceAlert").innerHTML =  "$" + totalPrice;//display the total

      document.getElementById("submitbtn").removeAttribute("disabled", "disabled"); // remove disabled attribute FROM SUBMIT if it has been set

  } else {

    document.getElementById("priceAlert").innerHTML = "Insuficient stock. " + stockQty + " available only.";//display feedback of current stock levels

    document.getElementById("submitbtn").setAttribute("disabled", "disabled"); // Add a disabled attribute to SUBMIT if stock is too low
  }

}


</script>
<!-- when user enters qty

id="pricePerItem" * id="orderQty"

change "priceAlert" -->
