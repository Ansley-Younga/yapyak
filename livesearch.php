<?php
include('db.php');
if(isset($_POST['input'])){
    $input = $_POST['input'];
    
    $query = "SELECT * FROM users WHERE username LIKE '{$input}%' ";

    $result = mysqli_query($conn,$query);
    if(mysqli_num_rows($result)>0){?>
<table class="table table-bordered table-striped mt-4">
    <thead>
        <tr>
            <!-- <th>id</th> -->
            <th>Username</th>
        </tr>
    </thead>
    <tbody>
        <?php
            while($row=mysqli_fetch_assoc($result)){
                // $id = $row['id'];
                $username = $row['username'];
                ?>

        <tr>
            <!-- <td><?php echo $id?></td> -->
            <td><?php echo $username?></td>
        </tr>
        <?php
            }
        ?>
    </tbody>
</table>
<?php
$newinput = $input;
echo $newinput;

    }
    else{
        echo "<h6 class=\"text-danger text-center mt-3\">Username not found</h6>";
    }
}
?>


<!-- <!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php
if($_SERVER["REQUEST_METHOD"]=="POST"){
    session_start();
    $_SESSION["shit"] = htmlentities($_POST["shit"]);
    // header("Location: bleh.php");
}   
?>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="POST">
        <input type="text" value="<?php echo $newinput?>" name="shit" />
        <button type="submit" class="btn btn-primary">SELECT</button>
    </form>
</body>

</html> -->