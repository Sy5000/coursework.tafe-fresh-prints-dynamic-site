<div id="formSignup">
  <!-- in case of 2 forms being open close both -->

  <form method="post" action="<?php  echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
    <div class="container">

<?php require ('../controller/accountAddController.php'); ?>

      <h2>Sign Up</h2>
      <p>Please fill in this form to create an account...</p>
      <hr>
      <label for="username" >Username / Email *</label>
      <input type="email"  placeholder="Choose a Username" id="username" name="username" value="<?php if(isset($_POST['username'])){echo $username;} ?>" required />
      <span class="error"><?php echo $usernameErr; ?></span>
      <label for="password"><strong>Password</strong></label>
      <input type="password" minlength="8" placeholder="Enter Password" id="password" name="password" required />
      <span class="error"><?php echo $passwordErr; ?></span>
      <!--<label for="psw-repeat"><b>Repeat Password</b></label>
      <input type="password" placeholder="Repeat Password" name="psw-repeat" required>-->

      <label for="firstName">First Name *</label>
      <input type="text" placeholder="Enter First Name" id="firstName" name="firstName" value="<?php if(isset($_POST['firstName'])){echo $firstName;} ?>" required/>
      <span class="error"><?php echo $firstNameErr; ?></span>
      <label for="lastName">Last Name *</label>
      <input type="text" placeholder="Enter Last Name" id="lastName" name="lastName" value="<?php if(isset($_POST['lastName'])){echo $lastName;} ?>" required/>
      <span class="error"><?php echo $lastNameErr; ?></span>
      <label for="phone">Phone *</label>
      <input type="text" placeholder="Enter Phone Numbers" id="phone" name="phone" required />
      <span class="error"><?php echo $phoneErr; ?></span>
      <br>
      <p>please visit the <a href="login.php">login</a> page if you already have an account </p>

      <!--<label>
        <input type="checkbox" checked="checked" name="remember" style="margin-bottom:15px"> Remember me
      </label>-->
      <!-- <a href="../controller/accountAddController.php">link</a> --->
      <p>Click here to agree
        <input title="checkbox" id="accept" name="accept" type="checkbox" value="y" /> to our <a href="#" style="color:dodgerblue">Terms & Privacy</a>.</p>
      <div id="message"></div>
      <div class="clearfix">
        <!-- in case of 2 forms being open close both -->
        <button type="button" class="cancelbtn">Cancel</button>

          <button  id="submitbtn" disabled="disabled" type="submit" class="signupbtn" name="submit" value="submit" />signup</button>
      </div>
    </div>
  </form>
</div>
