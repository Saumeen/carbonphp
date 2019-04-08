<?php
include 'connection.php';

$barcode = filter_input(INPUT_POST,"barcode");
//$barcode = '1-food';
$sql = "delete from cart where detail='".$barcode."'";
if($conn->query($sql)){
    echo '{"status":"true"}';
}
else
    echo '{"status":"false"}';

?>
