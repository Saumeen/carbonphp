<?php
include 'connection.php';
header("Content-Type: application/json");

    
    //$userid = filter_input(INPUT_POST,"userid"); 
$userid='2';    
$sql1 = "select * from cart where userid='".$userid."'";
    //$sql1 = "select * from cart where userid='2'";
    
    $resultsql1=$conn->query($sql1);
    
$finalprice='0';
   
    $prods = array();
    while($rowsql1 = $resultsql1->fetch_assoc()){
        $barcode = $rowsql1["detail"];
        
        $details= explode("-",$barcode);
    
    $productid= $details[0];
    $catogary = $details[1];


    $sqlData = "select * from $catogary where PRODUCT_ID='".$productid."' ";
    $result = $conn->query($sqlData);
    $row = $result->fetch_assoc();
   
    //echo json_encode($row);    
    $price =$row["PRICE"];
    $expirydate = $row["EXP_DATE"];
    $foodname= $row["FOOD_NAME"];
    $weight = $row["WEIGHT"];
    $brandid = $row["BRAND_ID"];
    $finalprice =$finalprice+$price;
    $prods[] = $row;

        
    }
    echo '{ "cart":'.json_encode($prods).',"finalprice":'.$finalprice.'}';
    
?>