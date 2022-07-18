<?php
include_once('db.php');
// variable declarations
$usernameVar = $passwordVar = "";
$usernameErr = $passwordErr = "";
$globalErr = "";

if($_SERVER['REQUEST_METHOD']=="POST"){
    
    // get input from username field
    $usernameVar = $_POST["username"];

    // ensure username field isn't empty
    if(empty($usernameVar)){
        $usernameErr = "Please Input Username";
    }
    
    // delete white spaces, from front and back of variabes
    $usernameVar = trim($usernameVar);

    // check if username exists already
    // $checkUsername = "SELECT username FROM users WHERE username = '$usernameVar' ";
    // connect above query with database
    // $connCheck = mysqli_query($conn, $checkUsername);
    // check database rows for similarity in data input for username
    // if(mysqli_num_rows($connCheck)>0){
        // $usernameErr = "Username already exists. Please choose another username";
    // }

    // store input from password field
    $passwordVar = $_POST["password"];

    // ensure password field isn't empty
    if(empty($passwordVar)){
        $passwordErr = "Please Input Password!";
    }

    // proceed to store validations if Error fields are empty, i.e no errors exist
    if(empty($usernameErr)&&empty($passwordErr)){
        $checkUsername = "SELECT username FROM users WHERE username = '$usernameVar' ";
        $checkPassword = "SELECT password FROM users WHERE password = '$passwordVar' ";
        $storeUsername = mysqli_query($conn, $checkUsername);
        $storePassword = mysqli_query($conn, $checkPassword);
        if((mysqli_num_rows($storeUsername)>0)&&(mysqli_num_rows($storePassword)>0)){
            $idCheck = "SELECT id FROM users where username='$usernameVar' AND password='$passwordVar'";
            $idCheckConn = mysqli_query($conn, $idCheck);
            if((mysqli_num_rows($idCheckConn))>0){
            if(session_status()==PHP_SESSION_NONE){
                session_start();
                $_SESSION['username'] = htmlentities($_POST['username']);
            }
            header("Location: messages.php");
            
            // while($row = mysqli_fetch_assoc($idCheckConn)){
            //     echo 'id = '.$row["id"];
            // }
        }
        else $globalErr = 'Could not find corresponding username and password in system! Please try again';;
        }
        else{
            $globalErr = 'Could not find corresponding username and password in system! Please try again';
        }
    }
}
?>