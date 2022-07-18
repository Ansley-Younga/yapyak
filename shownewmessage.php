<?php
include_once('db.php');
    $messagecountNew = $POST_['messagecountNew'];
    // create sql statement
    $mainSelection = "SELECT messageinfo, messagefrom, messageto 
                    FROM messages WHERE (messagefrom='$name' OR messagefrom='$friend')
                    AND (messageto='$name' OR messageto='$friend')
                    ORDER BY id DESC Limit $messagecountNew";
    // query mainSelection
    $querymainSelection = mysqli_query($conn,$mainSelection);
    // check for selection existence in db
    if(mysqli_num_rows($querymainSelection)>0){
        // store data whilst looping through db
        while($storeData = mysqli_fetch_assoc($querymainSelection)){
            $storeMessageInfo = $storeData['messageinfo'];
            $storeMessageFrom = $storeData['messagefrom'];
            $storeMessageTo = $storeData['messageto'];
            echo "From ".$storeMessageFrom."<p style=\"font-size:18px; background-color:blue; color:white; padding-left:5px\">$storeMessageInfo</p>"."<hr>";
            
        }
    }

?>