<?php
include 'connection.php';

$barcode = filter_input(INPUT_POST,"barcode");
$userid = filter_input(INPUT_POST,"userID");

$sql = "insert into cart(userid,detail) values('".$userid."','".$barcode."')";
$result=$conn->query($sql);

?>