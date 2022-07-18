<!-- <!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Navbar</title>
    <link rel="stylesheet" href="stylesheet/bootstrap.min.css" />
</head>

<body>
    <div class="container-fluid text-center" style="
        background-image: linear-gradient(to left, white, blue);
        padding: 18px;
        font-size: 18px;
        box-shadow: 0px 1px black;
        position: fixed;
        top: 0;
        width: 100%;
        z-index: 100;
      ">
        <div class="row">
            <div class="col-md-1"></div>
            <div class="col-md-2" style="border-right: 2px solid white">
                YAP YAK
            </div>
            <div class="col-md-1"></div>
            <div class="col-md-1">
                <a href="messages.php" style="color: black; text-decoration: none">Messages</a>
            </div>
            <div class="col-md-1">
                <a href="contacts.php" style="color: black; text-decoration: none">Contacts</a>
            </div>
            <div class="col-md-1">
                <a href="profile.php" style="color: black; text-decoration: none">Profile</a>
            </div>
            <div class="col-md-1">
                <a href="#" style="color: black; text-decoration: none">Settings</a>
            </div>
            <div class="col-md-1" style="border-right: 2px solid white; margin-top: -2px">
                <form action="" method="POST">
                    <button name="logout" style="border: none; background-color: inherit">
                        Logout
                    </button>
                </form>
            </div>
            <div class="col-md-2">Language</div>
            <div class="col-md-1"></div>
        </div>
    </div>
</body>

</html> -->
<!DOCTYPE html>
<html>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="stylesheet/bootstrap.min.css" />
    <style>
    body {
        margin: 0;
        font-family: Arial, Helvetica, sans-serif;
        top: 0;
    }

    .navcontainer {
        top: 0;
        position: fixed;
    }

    .topnav {
        overflow: hidden;
        /* background-color: #333; */
        background-color: white;
        padding: 5px;
        padding-right: 5%;
    }


    .topnav a {
        float: left;
        display: flex;
        color: black;
        text-align: center;
        padding: 14px 16px;
        text-decoration: none;
        font-size: 17px;
    }

    .topnav a:hover {
        background-color: #ddd;
        color: black;
    }

    /* .topnav a.active {
        background-color: #04AA6D;
        color: white;
    } */

    .topnav .icon {
        display: none;
    }

    .yapyaklogo {
        padding-left: 85px;
        padding-right: 50px;
        padding-top: 5px;
        float: left;
    }

    @media screen and (max-width: 800px) {
        .yapyaklogo {
            width: 22%;
            padding-left: 5px;
            padding-top: 8px;
            padding-right: 0px;
        }
    }

    @media screen and (max-width: 650px) {
        .topnav a {
            display: none;
        }

        .topnav a.icon {
            float: right;
            display: block;
        }
    }

    @media screen and (max-width: 650px) {
        .topnav.responsive {
            position: relative;
        }

        .topnav.responsive .icon {
            position: absolute;
            right: 0;
            top: 0;
        }

        .topnav.responsive a {
            float: none;
            display: block;
            text-align: left;
        }
    }
    </style>
</head>

<body style="background-color: blue;">

    <div class="container-fluid navcontainer">
        <div class="row">
            <div class="topnav" id="myTopnav">
                <img src="assets/Images/yapyak.png" alt="yap-yak logo2" class="yapyaklogo">
                <a href="messages.php" class="active">Messages</a>
                <a href="contacts.php">Contacts</a>
                <a href="profile.php">Profile</a>
                <a href="#">Settings</a>
                <a>
                    <form action="" method="POST">
                        <button name="logout" style="border: none; background-color: inherit">
                            Logout
                        </button>
                    </form>
                </a>
                <a href="javascript:void(0);" class="icon" onclick="myFunction()">
                    <i class="fa fa-bars"></i>
                </a>
            </div>
        </div>
    </div>

    <script>
    function myFunction() {
        var x = document.getElementById("myTopnav");
        if (x.className === "topnav") {
            x.className += " responsive";
        } else {
            x.className = "topnav";
        }
    }
    </script>

</body>

</html>

</html>