<?php
include_once('signupValidate.php');
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
    <link rel="stylesheet" href="stylesheet/index.css" />
    <title>LOG IN YAP-YAK</title>
</head>

<body>
    <div class="text-center" style="padding-top: 100px">

        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post"
            style="max-width: 400px; margin: auto" autocomplete="off">

            <a href="index.html"><img class="img-fluid" src="assets/images/Logo.png" alt="Logo" height="100"
                    width="200" /></a>
            <h4 class="mb-3">CREATE YOUR ACCOUNT</h4>


            <input type="text" id="username" placeholder="MY USERNAME" name="username" autocomplete="off"
                class="form-control mb-3  <?php echo (!empty($usernameErr)) ? 'is-invalid' : ''; ?>" />

            <span class="invalid-feedback" style="color:black"><?php echo $usernameErr;?></span>


            <input type="password" id="password" placeholder="MY PASSWORD" name="password" class="form-control 
                <?php echo (!empty($passwordErr)) ? 'is-invalid' : ''; ?>" />

            <span class="invalid-feedback" style="color:black"><?php echo $passwordErr;?></span>

            <div class="mt-3 ">
                <button class="btn btn-lg btn-primary w-100">SIGN IN</button><br />
                <h6 class="mt-2">
                    Already Have An Account?
                    <a href="login" class="text-decoration-none">Log In</a>
                </h6>
            </div>
        </form>
    </div>
</body>


</html>