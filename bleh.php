<?php
include_once('db.php');
session_start();
$chosen = $_SESSION["friendname"];
if(!isset($chosen)){
    header("Location: ajaxtext.php");
}

elseif(isset($chosen)){
    $checkdb = "SELECT username FROM users WHERE username = '$chosen' ";
    $query = mysqli_query($conn,$checkdb);
    if(mysqli_num_rows($query)>0){
        while($row=mysqli_fetch_assoc($query)){
            $chosen = $row["username"];
        }
        header("Location: messageview.php");
    }
    else{
        
        ?>
<!-- <script type="text/javascript">
alert('Username Doesnt Exist');
</script> -->
<?php
header("Location: ajaxtest.php");
    }
}
?>