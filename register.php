<?php
session_start();
include("db.php");
include("links.php");

if(isset($_POST["name"]))
{
    $sql = "INSERT INTO users (user) VALUES ('".$_POST["name"]."')";
    if($conn->query($sql)) header('Location: index.php');
    else echo "Error. Please try again";
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Chat Bot</title>
</head>

<body>
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4>Please register your name</h4>
            </div>
            <div class="modal-body">
               <form action="register.php" method="POST">
               <p>Name</p>
               <input type="text" required name="name" id="name" class="form-control" a utocomplete="off">
               <br>
               <input type="submit" name="submit" class="btn btn-primary" style="float: right;" value="Register">
               <a href="index.php" class="btn btn-success" style="float: right; margin-right: 10px;">Back</a>
               </form>
            </div>
        </div>
    </div>
</body>

</html>
