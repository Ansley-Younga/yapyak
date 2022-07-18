<?php
include_once 'db.php';
// include_once 'loginValidate.php';
session_start();
// print_r($_SESSION);
$name = isset($_SESSION['username']) ? $_SESSION['username'] : 'GUEST';

if(isset($_POST["logout"])){
    unset($_SESSION["username"]);
    session_destroy();
    $name = isset($_SESSION['username']) ? $_SESSION['username'] : 'GUEST';
    // print_r($_SESSION);

}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>temp</title>
</head>

<body>
    <h5>Thank you <?php echo $name?> You are in</h5>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="POST">
        <button name="logout">LOGOUT</button>
    </form>
    <a href="login.php">LOGIN</a>
    <?php
       
    ?>
</body>

</html>