<?php
    include 'connection.php';
    
    
   $barcode = filter_input(INPUT_POST,"barcode");
//$barcode = '1001-male';    
//$details= explode("-",$barcode);
    
    $productid= $details[0];
    $catogary = $details[1];


    $sqlData = "select * from $catogary where PRODUCT_ID='".$productid."' ";
    $result = $conn->query($sqlData);
    //$row = $result->fetch_assoc();
    $row1 = mysqli_fetch_array($result,MYSQLI_NUM);
if (!$result) {
    printf("Error: %s\n", mysqli_error($conn));
    exit();
}
        

    $price =$row1[1];
    $expirydate = $row1[6];
    $foodname= $row1[3];
    $weight = $row1[4];
    $brandid = $row1[5];

/*
    $price =$row["PRICE"];
    $expirydate = $row["EXP_DATE"];
    $foodname= $row["FOOD_NAME"];
    $weight = $row["WEIGHT"];
    $brandid = $row["BRAND_ID"];
*/
    echo '{"productid":'.$productid.',"price":'.$price.', "expirydate":'.$expirydate.',"foodname":'.$foodname.',"weight":'.$weight.',"brandid":'.$brandid.'}';
    


?>