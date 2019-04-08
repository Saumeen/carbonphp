<?php

include 'connection.php';
$barcode="1-food";

$details = explode("-",$barcode);

$det = $details[1];

    $sql1 = "select * from $det where PRODUCT_ID='1' ";
     $result=$conn->query($sql1);
    $row1 = mysqli_fetch_array($result,MYSQLI_NUM);
        echo $row1[0];
        
?>