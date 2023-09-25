<div id="formOrder" class="">
  <form class="order-form" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"] . "?" . $_SERVER["QUERY_STRING"]);?>" enctype="multipart/form-data">
    <div class="container">

<?php //require ('../controller/orderPart1.php'); //call script to process inputs, errors etc ?>
<?php require('../controller/quoteController.php') //call validation ?>
  <?php $catID = $_GET['catID']; ?>

      <h2>Quote Request Form</h2>
      <hr>
<?php
$result = get_cat_details();

foreach ($result as $row):
echo "<img src='../images/" . $row['catImg'] . "' alt='" . $row['catImg'] . "'> ";
echo "<strong>" . $row['catName'] . "</strong>";
endforeach; ?>

<hr>

      <input type="hidden" name="userID" value="<?php if(isset($userID)) {echo $userID; } ?>" />
      <input type="hidden" name="catID" id="catID" value="<?php if(isset($catID)) {echo $catID; } ?>" />


      <div class="flex split">
        <p><label for="colourID">Choose from available colours:</label></p>
        <!-- drop down options populated from colour database table -->

        <select name='colourID' id="colourID" onchange="call_catalogue(this.value); calcTotalPrice();"><!--onchange="setColour()" -->
        <option value=""> -- select one -- </option>
         <?php

          $result = get_colour_dropdown();

          foreach($result as $row): //display results, for each loop - $row is key value
          echo '<option value="' . $row['colourID'] . '" > ' . $row['colour'] . '</option>';
          //echo"<pre>";
          //print_r( $row );
          endforeach;

          ?>
        </select>
      </div>

      <span class="error"> <?php if(isset($colourErr)) { echo $colourErr; } ?></span>

      <div class="flex split">
        <p><label for="sizeID">Choose from available sizes:</label></p>
        <!-- drop down options populated from size database table -->
        <select name='sizeID' id="sizeID" onchange="call_catalogue(this.value); calcTotalPrice;"><!--  may need to move to selected field -->
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
      </div>

      <span class="error"> <?php if(isset($sizeErr)) { echo $sizeErr; } ?></span>

<div id="txtHint" class="hidden" ><strong>dev options</strong></div>

<hr>

      <!--<div class="flex split">
      <label for="productID">ajax the product id</label>
      <input type="text" id="productID" name="productID" value="" />
    </div>-->

      <div class="flex split">
      <label for="orderQty">Quantity Required</label>
      <input type="text" placeholder="" id="orderQty" name="orderQty" onchange="calcTotalPrice()" required/>
    </div>
    <span class="error"><?php if(isset($orderQtyErr)){ echo $orderQtyErr; }; ?></span>

    <div class="flex split">
    <label for="email">email address</label>
    <input type="email" placeholder="" id="email" name="email" required/>
  </div>
    <!--<div class="flex split">
    <label>OrderPrice</label>
    <input type="text" placeholder="orderPrice" id="orderPrice" name="orderPrice" />
  </div>-->

    <hr>

    <label for="artUpload">Select image to upload:</label>
    <input type="file" id="artUpload" name="artUpload" >
    <span class="error"><!-- multiple fail conditions -->
      <?php if (isset($imgErr)){ echo $imgErr; } ?>
      <?php if (isset($imgUploadErr)){ echo $imgUploadErr; } ?>
    </span>

    <hr>

    <p class="hidden" id="priceAlert" style="font-size:2rem;"><strong>$00.00</strong></p>

    <div class="clearfix">
        <p><button type="submit" class="quoteBut" name="submit" value="submit" />Request Quote</button><p>
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

function call_catalogue(str) {//define var #1 'ste' to pass through to query
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
     var colour = document.getElementById('colourID').value; //define variable #2 'c' to pas through to query
     var cat = document.getElementById('catID').value;

    xhttp.open('GET', '../controller/ajaxProcess.php?size='+str+'&colour='+colour+'&cat='+cat, true);
    xhttp.send();
  }
</script>
<script type="text/javascript">

function calcTotalPrice(){

  const pricePerItem = document.getElementById('pricePerItem').value; //grab fetched price per item field from ajaxProcess.php
  const orderQty = document.getElementById('orderQty').value; //grab user input for order qty

      let totalPrice = pricePerItem * orderQty; //calculate the total
      document.getElementById("priceAlert").innerHTML =  "$" + totalPrice;//display the total

}
</script>
<!-- USEFULL THIS SKETCH WAS USED TO FOR FUNCTION ABOVE
when user enters qty

id="pricePerItem" * id="orderQty"

change "priceAlert" -->
