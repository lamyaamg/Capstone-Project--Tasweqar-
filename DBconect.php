<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
session_start();

function db_connect(){
$host     = "localhost";
$userName = "root";
$password = "";
$dbName   = "tasweqar";
// Create database connection
$conn = new mysqli($host, $userName, $password, $dbName);
$conn->set_charset("UTF8");
//--------------------------------------------------Check connection
if ($conn->connect_error) {
die("Connection failed: " . $conn->connect_error);
exit;
}
return $conn;
}
//______________________________________________________________________________



function checkeUser($User_ID) {
     
    $conn   = db_connect();
    $sql    = "SELECT * FROM  regesterdacounts where Ac_ID = $User_ID " ;
    $result = mysqli_query($conn, $sql);
    $row    = mysqli_fetch_assoc($result);
    return $row;
    
}


function GetID(){ 
    $Ac_ID = $_SESSION["ID"];
    return   $Ac_ID ; 
}

function GetUserName(){ 
    $User_Name = $_SESSION["name"];
    return   $User_Name ; 
}
?>