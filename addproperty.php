<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */




require_once "DBconect.php";


$conn = db_connect();
$Ac_ID = GetID();
$owner= $_SESSION["name"]." ".$_SESSION["Lname"];
$sr = filter_input(INPUT_POST, 'sr');
//__________________________________________________properties

$categ = filter_input(INPUT_POST, 'cat');
$area = filter_input(INPUT_POST, 'area');
$age = filter_input(INPUT_POST, 'age');
$floor = filter_input(INPUT_POST, 'floor');
$room = filter_input(INPUT_POST, 'room');
$bedroom = filter_input(INPUT_POST, 'bedroom');
$price = filter_input(INPUT_POST, 'price');
$des = filter_input(INPUT_POST, 'des');
$photo = filter_input(INPUT_POST, 'file');
//____________________________________________________address

$city = filter_input(INPUT_POST, 'city');
$prov = filter_input(INPUT_POST, 'prov');
$zip = filter_input(INPUT_POST, 'zip');
$street = filter_input(INPUT_POST, 'street');
$hno = filter_input(INPUT_POST, 'hno');

//_____________________________________________________img upload
$targetDir = "../uploads/";
//$fileName = basename($_FILES[$photo]);
$targetFilePath = $targetDir . $photo;
$fileType = pathinfo($targetFilePath, PATHINFO_EXTENSION);
$allowTypes = array('jpg', 'png', 'jpeg', 'gif', 'pdf');
if (in_array($fileType, $allowTypes)) {
 
        echo "uploaded";
    }

// ____________________________________________________insert
$SETADRESS = "INSERT INTO address (city,province,zip,street,homenum)
              values ('$city','$prov','$zip','$street','$hno')";
if ($conn->query($SETADRESS)) {

    echo "Address added";

    $sql = "SELECT * FROM  address where homenum = '" . $hno . "'";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);
    $pro_ID = $row['ADID'];
    $query = "UPDATE  `tasweqar`.`address`SET  `pro_ID` =  '$pro_ID'                            
    WHERE  `address`.`ADID` = '$pro_ID' LIMIT 1";

    if ($conn->query($query)) {

        echo "address updated";
    } else {
        echo "Error: " . $query . "
   " . $conn->error;
    }

    //-----------------------------------------------------------------------structuer add
    if($categ=="LAND"){}else{
    $SETSTRUC = "INSERT INTO structure (floor,bedrooms,rooms,pro_ID)
    values ('$floor','$bedroom','$room','$pro_ID')";
        if ($conn->query($SETSTRUC)) {
            echo "property added";
        } else {
            echo "Error: " . $SETSTRUC . "
    " . $conn->error;
        }}
    //-----------------------------------------------------------------------property  add
    $SETPROPERQ = "INSERT INTO property (pro_ID,pro_type,pro_category,Added_Date,pro_Age,pro_img,pro_sqm,pro_description,pro_status,pro_price,sell_ID,owner)
                                values ('$pro_ID','$sr','$categ',NOW(),'$age','$photo','$area','$des','inactive','$price','$Ac_ID','$owner')";

    if ($conn->query($SETPROPERQ)) {}
    else{ echo "Error: " . $SETPROPERQ . "  " . $conn->error;}



    } else {
        echo "Error: " . $SETADRESS . "
             " . $conn->error;
    }



    $conn->close();
   header('Location:properties.php#popup');


