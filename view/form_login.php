
<div id="formLogin">
  <!-- in case of 2 forms being open close both -->

  <form method="post" action="<?php  echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
    <div class="container">

 <?php require('../controller/loginController.php'); //call logic to check user input against records?>

      <h2>Login</h2>
      <p>Please fill in this form to access your account...</p>
      <hr>
      <p>admin - 'admin@freshprints.com' pass - '12345678'</p>
      <p>guest - 'guest@test' | pass - 'aaaaaaaa' </p>
      <br>

      <label for="username">Username / Email *</label>
      <input type="text" placeholder="Choose a Username" id="username" name="username" class="form-username" value="<?php if(isset($username)){echo $username;}?>" />
      <span class="error"><?php echo $usernameErr; ?></span>

      <label for="password"><strong>Password</strong></label>
      <input id="password" type="password" placeholder="Enter Password" name="password" class="form-password"/>
      <span class="error"><?php echo $passwordErr; ?></span>

      <!--<label for="psw-repeat"><b>Repeat Password</b></label>
      <input type="password" placeholder="Repeat Password" name="psw-repeat" required>-->

      <p>please visit the <a href="signup.php" title="signup">signup</a> page to create an account </p>

      <!--<label>
        <input type="checkbox" checked="checked" name="remember" style="margin-bottom:15px"> Remember me
      </label>-->

      <div class="clearfix">
        <!-- in case of 2 forms being open close both -->
        <button type="button" class="cancelbtn">Cancel</button>

          <button type="submit" class="signupbtn" name="submit" value="submit" />login</button>
          <div class="form-result"></div>
      </div>
    </div>
  </form>
</div>
