<?php
include_once('loginValidate.php');
session_start();
// $name = isset($_SESSION['username']) ? $_SESSION['username'] : 'GUEST';
if(isset($_SESSION['username'])){
    header("Location: messages.php");
}
// print_r($_SESSION);
// echo $name;
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- BOOTSTRAP CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous" />
    <!-- BOOTSTRAP JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
    </script>
    <!-- BOOTSTRAP ICONS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">
    <link rel="stylesheet" href="stylesheet/index.css" />
    <title>LOG IN YAP-YAK</title>
</head>

<body>
    <div class="text-center " style="padding-top: 100px">

        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post"
            style="max-width: 400px; margin: auto">

            <p style="background-color: red; color:white"
                class="<?php echo (!empty($globalErr))? 'is-invalid' : ''; ?>">
                <?php echo $globalErr;?>
            </p>

            <a href="index.html"><img class="img-fluid" src="assets/images/Logo.png" alt="Logo" height="100"
                    width="200" /></a>
            <h4 class="mb-3">LOG IN TO YOUR ACCOUNT</h4>


            <input type="text" id="username" placeholder="MY USERNAME" name="username" require
                class="form-control mb-3  <?php echo (!empty($usernameErr)) ? 'is-invalid' : ''; ?>" />

            <span class="invalid-feedback" style="color:black"><?php echo $usernameErr;?></span>


            <span>
                <input type="password" id="password" placeholder="MY PASSWORD" name="password" class="form-control 
                <?php echo (!empty($passwordErr)) ? 'is-invalid' : ''; ?> " />

            </span>

            <span class="invalid-feedback" style="color:black"><?php echo $passwordErr;?></span>

            <div class="mt-3 ">
                <button class="btn btn-lg btn-primary w-100">LOG IN</button><br />
                <h6 class="mt-2">
                    Don't Have An Account?
                    <a href="signup.php" class="text-decoration-none">Sign Up</a>
                </h6>


            </div>
        </form>
    </div>
</body>


</html>