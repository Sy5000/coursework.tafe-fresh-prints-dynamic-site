<?php
//define vars
$username = $password = $firstName = $lastName = $phone = "";
//set errors to empty on pageload
$usernameErr = $passwordErr = $firstNameErr = $lastNameErr = $phoneErr = "";

//conditionals //if form has been submitted
if ($_SERVER["REQUEST_METHOD"] == "POST"){

  //empty() checks for any input
  if (empty($_POST["username"])) {
    $usernameErr = "<p>username is a required field</p>";
  } else {
    $username = ($_POST["username"]);
  }
  //empty() checks for any input
  if (empty($_POST["password"])) {
    $passwordErr = "<p>password is a required field</p>";
  } else {
    $password = ($_POST["password"]);
  }
  if (empty($_POST["firstName"])) {
    $firstNameErr = "<p>first Name is a required field</p>";
  } else {
    $firstName = ($_POST["firstName"]);
  }
  if (empty($_POST["lastName"])) {
    $lastNameErr = "<p>last Name is a required field</p>";
  } else {
    $lastName = ($_POST["lastName"]);
  }
  if (empty($_POST["phone"])) {
    $phoneErr = "<p>Phone is a required field</p>";
  } elseif(!is_numeric($_POST["phone"])) {
    $phoneErr = "<p>Numeric inputs only</p>";
  } else {
    $phone = ($_POST["phone"]);
  }

}//post end

// if all variables exist (validated) and not an empty string (as set line 16) write record to database
// if isset($_POST['username'] VS isset($username) the variable is already set )
if($username != '' &&  $password != '' && $firstName != '' && $lastName !='' && $phone != ''){

    $hashed_password = password_hash($password, PASSWORD_DEFAULT);
  //more secure method
  //call the function containing the prepared statement with named perameters
    $data = add_user($username, $hashed_password, $firstName, $lastName, $phone);
  //nested conditional statement when the record been added
    if($data){
      // if written successfully do; add redirect later
    echo "<p><b>The following records were added!</b></p>";
    echo "<p>Username - " . $username . "</p>";
    echo "<p>pass - " . $password . "</p>";
    echo "<p>Fname - " . $firstName . "</p>";
    echo "<p>Lname - " . $lastName . "</p>";
    echo "<p>E-mail - " . $phone . "</p>";
  // when the correct row has failed to be added
    } else {
    echo "error adding user to table";
}

}


?>
