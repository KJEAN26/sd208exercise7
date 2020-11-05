<?php
    include "connection.php";
    if(isset($_GET["id"])){
        $sql = "SELECT * FROM info WHERE id=".$_GET['id'];
    $result = mysqli_query($conn, $sql);
    $user =  mysqli_fetch_assoc($result);
    }
    
    if(isset($_POST["submit"])){
        $fname = $_POST["firstname"];
        $lname = $_POST["lastname"];
        $email = $_POST["email"];
        $password = $_POST["password"];
        //define the sql query
        $sql_update = "UPDATE info SET  firstname='". $fname."',lastname='".$lname."',email='".$email."',password='".$password . "' where id=".$_POST["id"];

        //check the query if it is executed well
        if(mysqli_query($conn, $sql_update)){
            echo "Updated new row";
            header('location: ./register.php ');


        }else {
            echo "ERROR: ". mysqli_error($conn);
          
        }
    }


    
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration Form</title>
    <link href='https://fonts.googleapis.com/css?family=Chicle' rel='stylesheet'>

    <style>
h1{
    color:black;
}

form{
   background-image:linear-gradient(pink,pink,skyblue);
    padding:20px;
    width:50%;
    font-family: "Times New Roman", Times, serif;
    height:50%;
    border-radius:5px;
    
   
}

p{
    font-family: "Times New Roman", Times, serif;
    height:50%; 
}

input{
    padding:10px;
}

body{
         background-image: linear-gradient(rgba(0,0,0,0.4),rgba(0,0,0,0.4)),url(nature.jpeg);  
    }
</style>
</head>
<body>
   <center>
    <div class = "registration">
        <!-- <img src="avatar.png" class = "avatar"> -->
            <h1>Sign Up Here</h1>
            <form action = "update.php" method="POST">
            <input type="hidden" name="id" value="<?php echo $user["id"]; ?>">
            <p>First Name</p>
            <input type="text" name="fistname" value="<?php echo $user["firstname"];?>" required>
            <p>Last Name</p>
            <input type="text" name="lastname" value="<?php echo $user["lastname"]?>" placeholder="ENTER LAST NAME" required>
            <p>Email Address</p>
            <input type="text" name="email" value="<?php echo $user["email"]?>"placeholder="ENTER EMAIL ADDRESS" required>
            <p>Password</p>
            <input type="password" name="password" placeholder="Enter Password" required>
            <input type="submit" name="submit" value="Update" style="background-color:aquamarine">   
               
    </form>
        <div>
        </center>
</body>
</html>