<?php 
include 'connection.php';
header("Content-Type: application/json");

    
    $userid = filter_input(INPUT_POST,"userid"); 
      
    $sql1 = "select * from cart where userid='".$userid."'";
   
    $resultsql1=$conn->query($sql1);
    $finalprice='0';
    $prods = array();
    $barcodes = array();
    while($rowsql1 = $resultsql1->fetch_assoc()){
    $barcode = $rowsql1["detail"];

    $details= explode("-",$barcode);

    $productid= $details[0];
    $catogary = $details[1];

    $sqlData = "select * from $catogary where PRODUCT_ID='".$productid."' ";
    $result = $conn->query($sqlData);
    $row = $result->fetch_assoc();
    $prods[] = $row;
    $barcodes[] = $barcode;
    $price =$row["PRICE"];
    $expirydate = $row["EXP_DATE"];
    $foodname= $row["FOOD_NAME"];
    $weight = $row["WEIGHT"];
    $brandid = $row["BRAND_ID"];
        $finalprice =$finalprice+$price;
    }
    echo '{ "cart":'.json_encode($prods).',"finalprice":'.$finalprice.',"barcode":'.json_encode($barcodes).'}';
//$barcode = $rowsql1["detail"];
     
    //
   // echo json_encode($rowsql1);

    
?>