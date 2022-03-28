<?php

include("db.php");

$fromUser = $_POST["fromUser"];
$toUser = $_POST["toUser"];
$output= "";

$sql = "SELECT * FROM messages where (fromUser = '".$fromUser."' AND toUser = '".$toUser."') OR (fromUser = '".$toUser."' AND toUser = '".$fromUser."') ORDER BY id ASC";
$res = $conn->query($sql);

if ($res && $res->num_rows > 0) {
    while ($row = $res->fetch_object()) {
        if($row->fromUser == $fromUser){
             $output .= "<div style='text-align: right';>
                   <p style='background-color:lightblue; word-wrap: break-word; display: inline-block; padding: 8px; border-radius: 5px; max-width:70%;'>".$row->message."</p>
                   </div> 
             ";
        }
        else {
            $output .= "<div style='text-align: left';>
                   <p style='background-color:yellow; word-wrap: break-word; display: inline-block; padding: 8px; border-radius: 5px; max-width:70%;'>".$row->message."</p>
                   </div>
             ";
        }
    }
    echo $output;
}
    

?>
