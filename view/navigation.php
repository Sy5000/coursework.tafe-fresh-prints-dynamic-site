<?php

?>
<div class="topnav" id="myTopnav">
<nav class="flex split">
  <div>
    <a href="home.php" >Home</a>
    <?php if(isset($_SESSION['loggedin'])){
              if($_SESSION['roleID'] == '1'){
    echo'<a href="admin.php" class="canHide">admin</a>
         <a href="form_productAdd.php" class="canHide">add product</a>';
       }
      } ?>
  </div>

  <div>
    <!--<a href="#" class="canHide">Catalogue</a>-->
    <a href="#" class="canHide">Services</a>
    <a href="#" class="canHide">About</a>
    <a href="javascript:void(0);" class="icon" onclick="burgerNavFunction()" title="burgerIcon" >
      <strong class="fa fa-bars"></strong>
    </a>
  </div>

</nav>

<div class="subnav flex">

  <?php if(!isset($_SESSION['loggedin'])){// show/hide login/out links dependant on session status
    echo '<a href="signup.php" class="canHide">signup / login</a>';
  } else {
    echo '<a href="../controller/logoutController.php" class="canHide" >logout</a>';
  }
  ?>
</div>

</div>
