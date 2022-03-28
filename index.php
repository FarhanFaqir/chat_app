<?php
session_start();
include("db.php");
include("links.php");

if (isset($_GET["userId"])) {    
    $_SESSION["userId"] = $_GET["userId"];
    header("Location: chatbox.php");
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
                <h4>Please select your Account</h4>
            </div>
            <div class="modal-body">
                <ol>
                    <?php
                    $result = array();
                    $sql = "SELECT * FROM users";
                    $res = $conn->query($sql);

                    if ($res && $res->num_rows > 0) {
                        while ($row = $res->fetch_object()) {
                                echo '<li>
                            <a href="index.php?userId=' . $row->id . '">' . $row->user . '</a>
                            </li>';
                        }
                    }
                    ?>
                </ol>
                <a class="btn btn-primary" href="register.php" style="float: right;">Register Here</a>
            </div>
        </div>
    </div>
</body>

</html>