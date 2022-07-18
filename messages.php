<?php
session_start();
$name = $_SESSION['username'];
if(isset($_POST["logout"])){
  session_destroy();
  header("Location: login.php");
}
if($_SERVER["REQUEST_METHOD"]=="POST"){
  // $friend = $_POST["friendname"];
  $_SESSION['friendname'] = htmlentities($_POST['friendname']);
  header("Location: messageview.php");
}
include_once('db.php');
include_once('navbar.php');



// $displayMessageData = $throwEmptyMessage = $messagePrompt = "";
// $checkDatabase = "SELECT * FROM messages";
// $result = mysqli_query($conn, $checkDatabase);
// if(mysqli_num_rows($result)>0){
//   $displayMessageData = " DATA IN MESSAGE TABLE";
// }else{
//   $throwEmptyMessage = "No messages found yet!";
//   $messagePrompt = "Click the icon to start messaging";
// }

if(!isset($_SESSION['username'])){
    header("Location: login.php");
}

// if(isset($_POST['friendname'])){
//   $friend = $_SESSION['friendname'];
//   header("Location: messageview.php");
// }


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Messages - Yap-Yak</title>
    <link rel="stylesheet" href="stylesheet/bootstrap.min.css" />
    <link rel="stylesheet" href="stylesheet/message.css" />
</head>

<body>
    <div class="container text-center" style="padding-top: 240px">
        <div class="row">
            <div class="col-sm-1"></div>
            <div class="col-sm-10" style="color:white">
                <p><span class="h4">Welcome</span> <span class="h4"><?php echo $name; ?></span>
                    <span class="h4">|</span><span> <a href="startmessage.php"
                            style="text-decoration: none;color:white">Start New
                            Message</a></span>
                </p>
            </div>
            <div class="col-sm-1"></div>
        </div>
    </div>
    <!-- <h1 class="<?php echo (!empty($throwEmptyMessage))? 'is-invalid' : ''; ?>">
                    <?php echo $throwEmptyMessage;?></h1> -->
    <!-- <p class="<?php echo (!empty($messagePrompt))? 'is-invalid' : 'MESSAGE PROMPT FROM HTML'; ?>"
                    style="font-size: 20px">
                    <?php echo $messagePrompt;
                    echo '<img src="assets/Images/messageAdd.png" alt="" width="40px" />';
                    ?>
                </p> -->
    <!-- <h1 class="<?php echo(!empty($displayMessageData))? 'is-invalid' : ''?>">
                    <?php echo $displayMessageData;?>
                </h1> -->
    <h6>
        <!-- <?php
                    if(!empty($displayMessageData)){
                      echo $displayMessageData;
                      $getMessagefrom = "SELECT messagefrom, messageinfo FROM messages WHERE messageto = '$name' ";
                      $result = mysqli_query($conn,$getMessagefrom);
                      echo "<br>";
                      if(mysqli_num_rows($result)>0){             
                        while($row=mysqli_fetch_assoc($result)){
                          echo "Message From: ".$row["messagefrom"]. "<br>". "Message Info: ".$row["messageinfo"];
                          echo "<hr>";
                        }
                      }
                      else{echo "No message to you bruh";}
                    }
                  ?>  -->
        <?php
                      $getMessagefrom = "SELECT DISTINCT messagefrom FROM messages WHERE messageto = '$name' ";
                      // $getMessageinfo = "SELECT messageinfo FROM messages WHERE messageto = '$name' ";
                      $result = mysqli_query($conn,$getMessagefrom);
                      echo "<br>";
                      if(mysqli_num_rows($result)>0){             
                        while($row=mysqli_fetch_assoc($result)){
                          // "SELECT DISTINCT messagefrom FROM messages";
                          // messageview.php?store='urlencode($store).'
                          $store = $row['messagefrom'];
                    //       echo  
                    //       " <form action=\"messages.php\" method=\"post\">
                    //       <input type=\"hidden\" value=\"$store\" name=\"friendname\">
                    // <button class=\"btn btn-small\">
                    //    <p style=\"font-size:20px\"> View messages from $store</p>
                    // </button>
                    // </form> ";
                    // echo "<hr>";
                    ?>
        <div class="container-fluid">
            <div class="row">
                <div class="col-xl-3"></div>
                <div class="col-xl-6" id="content">
                    <div class="row">
                        <div class="col-2 text-center" id="iconbackground">
                            <img src="assets/Images/ProfileIcon.png" alt="" class="img-fluid" width="80%">
                        </div>
                        <div class="col-5" id="namePC">
                            <h2><?php echo $store?></h2>
                        </div>
                        <div class="col-1"></div>
                        <div class="col-2 text-end" id="messageicon">
                            <?php
                           echo  
                                 " <form action=\"messages.php\" method=\"post\">
                                 <input type=\"hidden\" value=\"$store\" name=\"friendname\">
                                 <button id=\"buttonNewImage\">
                                 <img src=\"assets/Images/WriteMessageIcon.png\" class=\"img-fluid\" width=\"60%\">
                             </button>
                           </form> ";
                          ?>
                            <!-- <img src="assets/Images/WriteMessageIcon.png" alt="" class="img-fluid" width="60%"> -->
                        </div>
                        <div class=" col-2 text-center" id="trashcan" style="border-left: 2px solid white;"><img
                                src="assets/Images/trashcan.png" alt="" class="img-fluid" width="60%">
                        </div>
                    </div>
                </div>
                <div class="col-xl-3"></div>
            </div>
        </div> <br>
        <?php
                    }
                    }
                    else{
                      ?>
        <p>No Messages Found <br> Click icon to start messaging <a href="startmessage.php"><img
                    src="assets/Images/messageAdd.png" alt="" width="40px" /></a>
        </p>
        <?php
                    }
        
                    ?>
        </h5>

        <p style="font-size: 20px">
            <?php
                    if(!empty($messagePrompt)){
                      echo $messagePrompt.' ';
                      echo '<a href="messageview.php"><img src="assets/Images/messageAdd.png" alt="" width="40px" /></a>';
                    }
                  ?>
        </p>
</body>

</html>