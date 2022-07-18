<?php
session_start();
$name = $_SESSION['username'];
$friend = $_SESSION['friendname'];
if(isset($_POST["logout"])){
    session_destroy();
    header("Location: login.php");
  }
include_once('db.php');
include_once('navbar.php');
    // MAKE SURE TO SPELL OUT FRIEND NAME AS IT IS IN DATABASE
    $checkdb = "SELECT username FROM users WHERE username = '$friend' ";
    $query = mysqli_query($conn,$checkdb);
    if(mysqli_num_rows($query)>0){
        while($row=mysqli_fetch_assoc($query)){
            $friend = $row["username"];
        }
    }

if(!isset($_SESSION['username'])){
header("Location: login.php");
}
if(!isset($friend)){
    header('Location: startmessage.php');
}

if(isset($_POST["logout"])){
    session_destroy();
    header("Location: login.php");
  }

  if($_SERVER['REQUEST_METHOD']=="POST"){
    
    // store input from message field
    $message = $_POST["message"];
    // allow certain string characters like the apostrophe in message
    $message = mysqli_real_escape_string($conn, $message);

    // ensure message field isn't empty
    if(empty($message)){
        $messageErr = "Please Input Message";
    }

    // store input from receiver field
    // $receiver = trim($_POST["receiver"]);

    // ensure receiver field isn't empty
    // if(empty($receiver)){
        // $receiverErr = "Please Input receiver!";
    // }

    // ensure receiver name exists in database
    // $checkReceiver = "SELECT username from users where username = '$receiver'";
    // $result = mysqli_query($conn,$checkReceiver);
    // if(mysqli_num_rows($result)>0){
        // $receiver = trim($_POST["receiver"]);
    // }else{
        // $receiver = "GUEST";
    // }

    // proceed to store validations if Error fields are empty, i.e no errors exist
    if(empty($messageErr)){
        $storeData = mysqli_query($conn, "INSERT into messages (messagefrom, messageto, messageinfo) VALUES ('$name','$friend','$message')");
        header('Location: messageview.php');
    }

    
} 


?>
<!DOCTYPE html>
<html lang="en">
<meta charset="UTF-8" />
<meta http-equiv="X-UA-Compatible" content="IE=edge" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<!-- BOOTSTRAP CSS -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous" />
<!-- BOOTSTRAP JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
</script>
<!-- messageview.css -->
<link rel="stylesheet" href="stylesheet/messageview.css">
<!-- JQUERY -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"
    integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

<script>
// jquery code here
$(document).ready(function() {
    var messagecount;
    $("button").click(function() {
        messagecount = messagecount + 1;
        $("#messageview").load("shownewmessage.php", {
            messagecountNew: messagecount
        });
    })
});
</script>
<link rel="stylesheet" href="stylesheet/index.css" />
<title>YAP-YAK</title>

<style>
body {
    background-image: linear-gradient(to left, #add8e6 0%, #009ffd);
}
</style>
</head>

<body>
    <div class="container" style="margin-top: 5%;">
        <div class="row">
            <div class="col-md-3 mt-4"></div>
            <div class="col-md-6 text-center">
                <img src="assets/Images/logo.png" alt="" class="" style="margin-bottom: -30px;">
                <!-- <h3 style="margin-top: -20px;"><b>YAP-YAK</b></h3> -->
                <p style="background-color: grey; font-size: 20px; color:white">
                    <?php echo ('user '.$friend.' currently in message session with user '.$name)?>
                </p>
            </div>
            <div class="col-md-3 mt-4"></div>
        </div>
        <br>
        <div class="container ">
            <div class="row">

                <!-- <div style="background-color: green; width:25em; height:3em; color:white">hey</div> -->
                <!-- <div class="col-md-2"></div> -->
                <div class="col-md-12 text-center" id="messageview">
                    <?php
                    // create sql statement
                    $mainSelection = "SELECT messageinfo, messagefrom, messageto FROM messages WHERE (messagefrom='$name' OR messagefrom='$friend') AND (messageto='$name' OR messageto='$friend')";
                    // query mainSelection
                    $querymainSelection = mysqli_query($conn,$mainSelection);
                    // check for selection existence in db
                    if(mysqli_num_rows($querymainSelection)>0){
                        // store data whilst looping through db
                        while($storeData = mysqli_fetch_assoc($querymainSelection)){
                            $storeMessageInfo = $storeData['messageinfo'];
                            $storeMessageFrom = $storeData['messagefrom'];
                            $storeMessageTo = $storeData['messageto'];
                            ?>

                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-xl-2"></div>
                            <div class="col-xl-8" id="content">
                                <div class="row">
                                    <div class="col-3 text-center" id="msgname">
                                        <h5><?php echo $storeMessageFrom?></h5>
                                    </div>
                                    <div class="col-7" id="msginfo">
                                        <p><?php echo $storeMessageInfo?></p>
                                    </div>
                                    <div class=" col-2 text-center" id="trashcan" style="border-left: 2px solid red;">
                                        <?php
                           echo  
                                 " <form action=\"messageview.php\" method=\"post\">
                                 <input type=\"hidden\" value=\"deleted\" name=\"deleteonemessage\">
                                 <button id=\"trashcanimg\">
                                 <img src=\"assets/Images/trashcan.png\" alt=\"delete text\" class=\"img-fluid trash\" width=\"60%\">
                             </button>
                           </form> ";

                        //    if($_SERVER["REQUEST_METHOD"]=="POST"){
                        //        $delete = $_POST["deleteonemessage"];
                        //     if(!empty($delete)){
                        //         $sqldelete = "DELETE from messages WHERE messageinfo = '$storeMessageInfo' ";
                        //         // echo $delete;
                        //     }
                        //    }

                        // if (isset($_POST['deleteonemessage'])){
                        //     mysqli_select_db ($conn, "yapyak");
                        //     $delete = $_POST["deleteonemessage"];
                        //     $sql = " DELETE FROM messages WHERE messageinfo = '.mysql_real_escape_string($storeMessageInfo).' ";
                        
                        //     $query = "SELECT `messagefrom` FROM `messages`";
                        //     $result = mysqli_query($conn, $query);
                         
                        // }
                          ?>


                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-2"></div>
                        </div>
                    </div>
                    <br>

                    <?php
                            // echo "From ".$storeMessageFrom."<p style=\"font-size:18px; background-color:blue; color:white; padding-left:5px\">$storeMessageInfo</p>"."<hr>";
                            // if(($storeMessageFrom = $friend)&&($storeMessageTo = $name)){
                            //     echo "Message From: ".$storeMessageFrom." To: ".$storeMessageTo;
                            //     echo "<p style=\"background-color:yellow\">$storeMessageInfo</p>"."<br>";
                                
                            // } 
                            // if(($storeMessageFrom = $name)&&($storeMessageTo = $friend)){
                            //     echo "Message From: ".$storeMessageFrom." To: ".$storeMessageTo;
                            //     echo "<p style=\"background-color:blue\">$storeMessageInfo</p>"."<br>";
                                
                            // }
                            
                        }
                    }

                    // $selectmessagefrom = "SELECT messageinfo FROM messages WHERE messagefrom='$friend' AND messageto='$name'";
                    // $selectmessageto = "SELECT messageinfo FROM messages WHERE messagefrom='$friend' AND messageto='$name'";
                    // $resSelectMessageFrom = mysqli_query($conn, $selectmessagefrom);
                    // $resSelectMessageTo = mysqli_query($conn, $selectmessageto);
                    // if(mysqli_num_rows($resSelectMessageFrom)>0){
                    //     while($row=mysqli_fetch_assoc($resSelectMessageFrom)){
                    //         $view = $row['messageinfo'];
                    //         echo $view; echo "<br>";
                    //     }
                    // }

                    // if(mysqli_num_rows($resSelectMessageTo)>0){
                    //     while($rownext=mysqli_fetch_assoc($resSelectMessageTo)){
                    //         $viewnext = $rownext['messageinfo'];
                    //         echo $viewnext; echo "<br>";
                    //     }
                    // }
?>
                    <!-- <p style="background-color: orange; width:25em; padding-right:5px">This is a basic text with a
                        background which would break on it's own
                    </p>
                    <p>00:00:00 AM</p><br> -->
                </div>

                <!-- <div class="col-md-2"></div> -->
            </div>

            <div class="row">
                <div class="col-sm-4"></div>
                <div class="col-sm-4"></div>
                <div class="col-sm-4 text-end">
                    <!-- <p style="background-color: orange; width:25em; padding-right:5px">This isd a basic text with a
                        background
                        which would break on it's own
                    </p>
                    <p>00:00:00 AM</p> -->
                </div>
            </div>
            <br>
            <!-- <div class="row text-end">
               <p><textarea name="" id="" cols="50" rows="2"
                        style="float: right; background-color:grey; color:white">ad</textarea>
                </p> -->
            <!-- 
            <p style="margin-top: -15px;" class="text-end">00:01:00 AM</p> -->
        </div>

    </div>

    <br><br>
    <div class="container mb-4">
        <div class="row">
            <!-- <div class="col-md-3"></div> -->
            <div class="col-md-12">
                <form action="" method="POST">
                    <textarea name="message" id="" rows="2" class="container
                        <?php echo (!empty($messageErr)) ? 'is-invalid' : ''; ?>"></textarea>
                    <button style="float: right;" class="btn btn-primary">SEND</button>
                    <span class="invalid-feedback" style="color:black"><?php echo $messageErr;?></span>
                </form>
            </div>
            <!-- <div class="col-md-3"> -->

        </div>
    </div>



</body>

</html>