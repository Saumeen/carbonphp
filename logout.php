<?php
//include 'connection.php'
    session_start();
    $sessionID = filter_input(INPUT_POST,"sessionID");
    if (isset($sessionID)) {
    $session_delete = "DELETE FROM session WHERE sessionid = '".$sessionID."'";
    $conn =new mysqli("localhost","root","","mall_client");
    $conn->query($session_delete);
    echo '{"status": "true"}';
    session_destroy();
    } else {
        echo '{"status": "false"}';
    }
    
 ?>