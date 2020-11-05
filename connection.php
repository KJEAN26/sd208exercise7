<?php 

    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "crud";

    //create connection
    $conn = mysqli_connect($servername,$username,$password,$dbname);

    //check connection
    if($conn){
        echo "";
    }else {
        die("Connection failed: " . mysqli_connect_error());
    }
?>