<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */




require_once "DBconect.php";


$conn = db_connect();
$Ac_ID = GetID();
$id = filter_input(INPUT_POST, 'ID');
$adid = filter_input(INPUT_POST, 'ADID');
$table = filter_input(INPUT_POST, 'save');
echo $id,$adid,$table;
//__________________________________________________properties
$categ = filter_input(INPUT_POST, 'cat');
$area = filter_input(INPUT_POST, 'area');
$age = filter_input(INPUT_POST, 'age');
$floor = filter_input(INPUT_POST, 'floor');
$room = filter_input(INPUT_POST, 'room');
$bedroom = filter_input(INPUT_POST, 'bedroom');
$price = filter_input(INPUT_POST, 'price');
$des = filter_input(INPUT_POST, 'des');
$stat = filter_input(INPUT_POST, 'stat');
$photo = filter_input(INPUT_POST, 'file');
$picmap =filter_input(INPUT_POST, 'map');
$doc = filter_input(INPUT_POST, 'doc');
//____________________________________________________address
$city = filter_input(INPUT_POST, 'city');
$prov = filter_input(INPUT_POST, 'prov');
$zip = filter_input(INPUT_POST, 'zip');
$street = filter_input(INPUT_POST, 'street');
$hno = filter_input(INPUT_POST, 'hno');
$gmap = filter_input(INPUT_POST, 'gmap');

$targetDir = "uploads/";
$fileNames = $_FILES['doc']['name'];
$targetFilePath = $targetDir . $fileNames;
$fileType = pathinfo($targetFilePath, PATHINFO_EXTENSION);
$allowTypes = array('jpg', 'png', 'jpeg', 'gif', 'pdf');
if (in_array($fileType, $allowTypes)){
    move_uploaded_file($_FILES["doc"]["tmp_name"], $targetFilePath);
}else{echo " cant upload";}
 
$targetDir = "uploads/";
$fileNames = $_FILES['map']['name'];
$targetFilePath = $targetDir . $fileNames;
$fileType = pathinfo($targetFilePath, PATHINFO_EXTENSION);
$allowTypes = array('jpg', 'png', 'jpeg', 'gif', 'pdf');
if (in_array($fileType, $allowTypes)){
    move_uploaded_file($_FILES["map"]["tmp_name"], $targetFilePath);
}else{echo " cant upload";}


$targetDir = "../uploads/";
$targetFilePath = $targetDir . $photo;
$fileType = pathinfo($targetFilePath,PATHINFO_EXTENSION);
$allowTypes = array('jpg','png','jpeg','gif','pdf');
if(!empty($photo)){

    if(in_array($fileType, $allowTypes)){
        if(move_uploaded_file($_FILES["file"]["tmp_name"], $targetFilePath)){
            $statusMsg = "The file ".$fileName. " has been uploaded successfully.";  
                 
        }

  else {$statusMsg = "Sorry, there was an error uploading your file.";}
}
else{
   $statusMsg = 'Sorry, only JPG, JPEG, PNG, GIF, & PDF files are allowed to upload.';
}
}

else{/* issset else */
$statusMsg = 'Please select a file to upload.';
}

echo $statusMsg;


// ____________________________________________________insert
$query = "UPDATE property SET  `pro_category` =  '$categ',`pro_Age` =  '$age',`pro_img` =  '$photo'  ,`pro_sqm` =  '$area' 
           ,`pro_description` =  '$des' ,`pro_price` =  '$price'  ,`pro_status` =  '$stat' ,`imgMap` =  '$picmap',`Document` =  '$doc'                                             
                 WHERE  pro_ID = '$id' LIMIT 1";

if ($conn->query($query)) {

    echo "   your profile has been Updated";
} else {
    echo "Error: " . $query . "
                " . $conn->error;
}
//-------------------------------------------------------------update address
$updquery = "UPDATE address SET  `city` =  '$city',`province` =  '$prov',`zip` =  '$zip'  ,`street` =  '$street' 
           ,`homenum` =  '$hno' ,`Gmap` =  '$gmap'                                              
                 WHERE  pro_ID = '$id' LIMIT 1";

if ($conn->query($updquery)) {

    echo "   your profile has been Updated";
} else {
    echo "Error: " . $updquery . "
                " . $conn->error;
}
//---------------------------------------------------------update structure
$updsquery = "UPDATE structure  SET  `floor` =  '$floor',`rooms` =  '$room',`bedrooms` =  '$bedroom'                                              
                 WHERE  pro_ID = '$id' LIMIT 1";

if ($conn->query($updsquery)) {

    echo "   your profile has been Updated";
} else {
    echo "Error: " . $updsquery . "
                " . $conn->error;
}

$conn->close();
if($adid=="sell")
header('Location:myproperties.php');
else
header('Location:manageprop.php');