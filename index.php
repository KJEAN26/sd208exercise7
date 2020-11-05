
<?php
    include "connection.php";


    if(isset($_POST["submit"])){
        
		$fname = $_POST["firstname"];
		$lname = $_POST["lastname"];
        $email = $_POST["email"];
        $password = $_POST["password"];
        //define the sql query
        $sql = "INSERT INTO `info`(`firstname`,`lastname`,`email`,`password`) VAlUES('$fname','$lname','$email','$password')";
    
        //check the query if it is executed well
        if(mysqli_query($conn, $sql)){
            echo "Inserted new row";
            header('location: register.php');
        }else {
            echo "ERROR: ". mysqli_error($conn);
        }
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:400,700">
<title>Bootstrap Simple Registration Form</title>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
<link rel="stylesheet" type="text/css" href="index.css">
<style>
	body{
	
         background-image: linear-gradient(rgba(0,0,0,0.4),rgba(0,0,0,0.4)),url(nature.jpeg);  
    }
	
</style>
</head>
<body>
	<center>
<div class="signup-form" style="width:100%;">
    <form action="index.php" method="POST">
        <h2>Register</h2>      
        <div class="form-group">
            <div class="row">
                <div class="col"><input type="text" class="form-control" name="firstname" placeholder="First Name" required="required"></div>
                <div class="col"><input type="text" class="form-control" name="lastname" placeholder="Last Name" required="required"></div>
            </div>          
        </div>
        <div class="form-group">
            <input type="email" class="form-control" name="email" placeholder="Email" required="required">
        </div>
        <div class="form-group">
            <input type="password" class="form-control" name="password" placeholder="Password" required="required">
        </div>        
        <div class="form-group">
            <label class="form-check-label"><input type="checkbox" required="required"> I accept the <a href="#">Terms of Use</a> &amp; <a href="#">Privacy Policy</a></label>
        </div>
        <div class="form-group">
            <button type="submit" name="submit" class="btn btn-success btn-lg btn-block">Register Now</button>
        </div>
    </form>
</div>
</center>


</body>
</html>
