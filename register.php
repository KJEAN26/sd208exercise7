<?php
        include "connection.php";

        if(isset($_POST['update'])){
            header('location: update.php?id='.$_POST['id']);
        }

        if(isset($_POST['delete'])){
            $sql_delete = "DELETE FROM `info` where id =". $_POST['id'];
        
            //check the query if it is executed well
        if(mysqli_query($conn, $sql_delete)){
            "Deleted successfully";
        }else {
            echo "ERROR: ". mysqli_error($conn);
        }
        }
        $sql = "SELECT * FROM `info`";
    
        $result = mysqli_query($conn,$sql);
        
    
    
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration Form</title> 
    <link href='https://fonts.googleapis.com/css?family=Chicle' rel='stylesheet'>

<style>

    th{
       padding:20px;
       color:blue;
    }
    td{
        padding:20px;
    }

    table{
        background-image:linear-gradient(pink,pink,skyblue);
    }

    body{
         background-image: linear-gradient(rgba(0,0,0,0.4),rgba(0,0,0,0.4)),url(nature.jpeg);  
    }
</style>
</head>
<body>
    <center>
        <h1 style="color:white">USER'S INFORMATION</h1>
    <table style="padding:50px;border-style:dotted;margin-top:30px;">
        <thead>
            <tr>
                <th >ID</th>
               
                <th>First name</th>
                <th>Last name</th>
                <th>Email</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
           <?php
            if (mysqli_num_rows($result) > 0) {
                //output data each row
                while($row = mysqli_fetch_assoc($result)){
                    ?> 
                    <tr>
                        <td><?php  echo $row["id"]; ?> </td>
                        <td><?php  echo $row["firstname"]; ?> </td>
                        <td><?php  echo $row["lastname"]; ?> </td>
                        <td><?php  echo $row["email"]; ?> </td>
                        <td>
                            <form action="./register.php" method="post">
                                <input type="hidden" name="id" value="<?php echo $row["id"]; ?>">
                                <button type="submit" name="update" style="background-color:aquamarine;padding:5px;border-radius:5px;">Update</button>
                                <button type="submit" name="delete" style="background-color:aquamarine;padding:5px;border-radius:5px;">Delete</button>
                            </form>
                        </td>
                    </tr>
            <?php
                }
            }else{
                echo " 0 results";
            }
           ?>
        </tbody>
    </table>
    </center>
</body>
</html>