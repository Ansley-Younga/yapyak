<?php

include_once('db.php');

// ensure first that the fields have variables to hold their data
$usernameVar = $passwordVar = "";
// define error variables for the above mentioned
$usernameErr = $passwordErr = "";

// CHECKING METHOD TYPE...
// PROCEED WITH CODE WITHIN THE METHOD CHECK
if($_SERVER['REQUEST_METHOD']=="POST"){
    
    // store input from username field
    $usernameVar = $_POST["username"];

    // ensure username field isn't empty
    if(empty($usernameVar)){
        $usernameErr = "Please Input Username";
    }
    
    // delete white spaces, from front and back of variabes
    $usernameVar = trim($usernameVar);

    // check if username exists already
    $checkUsername = "SELECT username FROM users WHERE username = '$usernameVar' ";
    // connect above query with database
    $connCheck = mysqli_query($conn, $checkUsername);
    // check database rows for similarity in data input for username
    if(mysqli_num_rows($connCheck)>0){
        $usernameErr = "Username already exists. Please choose another username";
    }

    // store input from password field
    $passwordVar = $_POST["password"];

    // ensure password field isn't empty
    if(empty($passwordVar)){
        $passwordErr = "Please Input Password!";
    }

    // proceed to store validations if Error fields are empty, i.e no errors exist
    if(empty($usernameErr)&&empty($passwordErr)){
        $storeData = mysqli_query($conn, "INSERT into users (username, password) VALUES ('$usernameVar','$passwordVar')");
        header('Location: login.php');
    }
}
?>