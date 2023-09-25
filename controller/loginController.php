<?php

//set vars to empty
$password = $username = '';
//set error vars to empty
$passwordErr = $usernameErr = '';

//Run if user has submitted form by clicking submit/POST
if ($_SERVER["REQUEST_METHOD"] == "POST"){

// check fields are not empty
  if(empty($_POST['username'])){
    $usernameErr = "Please enter a username";
  }
  if(empty($_POST['password'])){
    $passwordErr = "Please enter your password";
  }

  // prepared PDO statement, data is sent with placeholder '?'
  // conditional (if records exist continue ELSE echo 'username was not found')
  if($sql = $pdo->prepare("SELECT * FROM user WHERE username = ?")){
  //execute the query & send data seperate to the query as a safety measure
  $sql->execute([$_POST['username']]);
  //fetch the row from the table to check against
  $userRecord = $sql->fetch();

  //conditional, if POST username matches DB result check PW else ''no user found
  if($_POST['username'] == $userRecord['username']){

// if data has been fetched correctly && passwords match using password_verify() function
//passswword_verify ONLY works on hashed passwords
      if (password_verify($_POST['password'], $userRecord['password'])){
        // Verification success! User has loggedin!
        // Create sessions so we know the user is logged in, they basically act like cookies but remember the data on the server.
        session_regenerate_id();
        $_SESSION['loggedin'] = TRUE; // use to validate user is logged in
        $_SESSION['username'] = $_POST['username'];
        $_SESSION['userID'] = $userRecord['userID'];
        $_SESSION['roleID'] = $userRecord['roleID'];;

       // echo 'Welcome ' . $_SESSION['username'] . '!';
        header('Location: ../view/home.php');
       // print_r($userRecord);
      } else {

        $passwordErr = "a valid password is required";

      } // password varification
    }  else { $usernameErr = "no user found"; } // username varification

  } // record wasnt returned?

}
?>
