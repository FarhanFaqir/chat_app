<?php

session_start();
include("db.php");

$fromUser = $_POST["fromUser"];
$toUser = $_POST["toUser"];
$message = $_POST["message"];
$output = "";

$sql = "INSERT INTO messages (fromUser, toUser, message) VALUES ('$fromUser', '$toUser', '$message')";
    if($conn->query($sql)) $output .= "";
    else $output .= "Error. Please try again";

    echo $output;
?>