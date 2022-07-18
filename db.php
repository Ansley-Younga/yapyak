<?php
    // connecting site to created database
    
        $dbHost = 'localhost';
        $dbUsername = 'root';
        $dbPassword = '';
        $dbName = 'yapyak';
    
        $conn = mysqli_connect($dbHost, $dbUsername, $dbPassword, $dbName);
        if($conn===false){
            echo die('Connection Error'.mysqli_connect_errno());
        }
        
    ?>