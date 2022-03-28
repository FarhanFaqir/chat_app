<?php
session_start();
include("db.php");
include("links.php");

$sql = "SELECT * FROM users WHERE id = '" . $_SESSION["userId"] . "'";
$res = $conn->query($sql);
if ($res && $res->num_rows > 0) {
    $row = $res->fetch_object();
} else echo ("Something wrong");


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Chat Bot</title>
</head>

<body>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-4">
                <p style="font-size: 18px;">Hi <b style="text-decoration: underline;"><?php echo $row->user; ?></b></p>
                <input type="text" id="fromUser" value="<?php echo $row->id ?>" hidden>
                <p>Send message to </p>
                <ol>
                    <?php
                    $sql = "SELECT * FROM users WHERE id != '".$_SESSION['userId']."'";
                    $res = $conn->query($sql);

                    if ($res && $res->num_rows > 0) {
                        while ($row = $res->fetch_object()) {
                            echo '<li>
                    <a href="?toUser=' . $row->id . '">' . $row->user . '</a>
                    </li>';
                        }
                    }

                    ?>
                </ol><br>
                <a href="index.php" class="btn btn-primary">Back</a>
            </div>
            <div class="col-md-4">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4>
                            <?php
                              if(isset($_GET["toUser"])){
                                $sql = "SELECT * FROM users WHERE id = '".$_GET["toUser"]."'";
                                $res = $conn->query($sql);
            
                                if ($res && $res->num_rows > 0) {
                                    $row = $res->fetch_object();
                                        echo '<input type="text" value='.$_GET["toUser"].' id="toUser"  hidden/>';
                                        echo $row->user;
                                }
                              }
                              else {
                                $sql = "SELECT * FROM users WHERE id != '".$_SESSION["userId"]."'";
                                $res = $conn->query($sql);
            
                                if ($res && $res->num_rows > 0) {
                                    $row = $res->fetch_object();
                                    $_SESSION["toUser"] = $row->id;
                                        echo '<input type="text" value='.$_SESSION["toUser"].' id="toUser"  hidden/>';
                                        echo $row->user;
                                }
                              }
                            ?>
                            </h4>
                        </div>
                        <div class="modal-body" id="msgBody" style="height:400px; overflow-y: scroll; overflow-x: hidden;">

                        </div>
                        <div class="modal-footer">
                        <textarea name="message" id="message" class="form-control" style="height: 70px;"></textarea>
                        <button id="send" class="btn btn-primary" style="height: 70%;">Send</button>
                        </div>

                    </div>
                </div>
            </div>

        </div>
        <div class="col-md-4">
        </div>
    </div>
    </div>

<script type="text/javascript">

$(document).ready(function(){
    $("#send").on("click", function(){
        $.ajax({
            url:"insertMessage.php",
            method: "POST",
            data:{
                fromUser: $("#fromUser").val(),
                toUser: $("#toUser").val(),
                message: $("#message").val()
            },
            dateType: "text",
            success: function(data){
                $("#message").val("");
            }
        });
    });
    
    setInterval(function(){
                $.ajax({
                    url: "realTimeChat.php",
                    method: "POST",
                    data: {
                        fromUser: $("#fromUser").val(),
                        toUser: $("#toUser").val()
                    },
                    dateType: "text",
                    success: function(data) {
                        $("#msgBody").html(data);
                    }    
               }); 
            },500);
}); 
</script>

</body>




</html>