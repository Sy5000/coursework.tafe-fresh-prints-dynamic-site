<?php if(isset($_SESSION['loggedin'])){
?>
<section class="grid col3">
  <div class="admin">
  <p>admin panel</p>
  <?php //if($pdo){echo 'conected to :' . $db . ' database';} ?>
  <?php if(isset($_SESSION['loggedin'])) {
    echo 'welcome <strong>' . $_SESSION['username'] . '</strong> you are currently logged in';
    echo '<p>userID -' . $_SESSION['userID'] . '</p>';
    echo '<p>roleID' . $_SESSION['roleID'] . '</p>';
   }?>
  </div>
</section>

<hr>

<?php } ?>
