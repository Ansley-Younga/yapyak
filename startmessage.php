<?php
include_once('db.php');
session_start();
if(!isset($_SESSION['username'])){
    header("Location: login.php");
    }
    
if($_SERVER["REQUEST_METHOD"]=="POST"){
    // eliminate empty form submission
    $forminput = $_POST["friendname"];
    $forminputErr;
    if(empty($forminput)){
        $forminputErr = "Please Input Username Before Submitting!!!";
    }
    elseif(!empty($forminput)){
    session_start();
    $_SESSION["friendname"] = htmlentities($_POST["friendname"]);
    header("Location: bleh.php");
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous" />
</head>

<body>
    <div class="container" style="max-width: 50%;">
        <div class="text-center mt-5 mb-4">
            <h2>Search Username</h2>
        </div>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="POST">
            <input type="text" class="form-control <?php echo (!empty($forminputErr)) ? 'is-invalid' : ''; ?>"
                name="friendname" id="live_search" autocomplete="off" placeholder="Search ...">
            <button>DONE</button>
            <span class="invalid-feedback" style="color:black"><?php echo $forminputErr;?></span>
        </form>
    </div>

    <div id="searchresult"></div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

    <script type="text/javascript">
    $(document).ready(function() {
        $("#live_search").keyup(function() {
            var input = $(this).val();
            // alert(input);

            if (input != "") {
                $.ajax({
                    url: "livesearch.php",
                    method: "POST",
                    data: {
                        input: input
                    },

                    success: function(data) {
                        $("#searchresult").html(data);
                        $("#searchresult").css("display", "block");
                    }
                })
            }
        });
    });
    </script>
</body>

</html>