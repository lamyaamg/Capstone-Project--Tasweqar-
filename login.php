

<!DOCTYPE html>
<html lang="en">

<head>
    <title>TASWEQAR</title>
    <meta name="auther" content="name" />
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="this is my frist weab bage" />
    <meta name="keywords" content="page,web" />
    <link rel="stylesheet" href="indexStyle.css">
    <link rel="stylesheet" href="barstyle.css">

</head>

<body>
  
<div class="ft-modal" id="log">
            <div class="ft-modal-content">
                <div class="ft-modal-header">
                </div>
                <div class="ft-modal-body">
                  <p>login</p>
<?php

  
 require_once "DBconect.php";
 
 $conn = db_connect();
 if(($_GET['pass'])&&($_GET['user'])){
  $username =  $_GET['user'];
  $password =$_GET['pass'];
}else{
 $username = filter_input(INPUT_POST, 'ucname');
 $password = filter_input(INPUT_POST, 'pass');
}
$sql = "SELECT * FROM  regesterdacounts where Email = '".$username."' and Password = '". $password."'" ;
$result = mysqli_query($conn, $sql);
if ($result->num_rows > 0) {
$row= mysqli_fetch_assoc($result);

$_SESSION["name"]=$row['User_Name'];
$_SESSION["Lname"]=$row['user_Lname'];
$_SESSION["ID"]=$row['Ac_ID'];
$_SESSION["table_ID"] =$row['type'];

       if($row['type']=='1'){ header('Location:saler.php'); }
       else{ header('Location:bayer.php');}         
         //header('saler.php');}
        // include("../03-UserProfile-page/03-UserProfile-page.php");
     
    
        }else{
          $sql = "SELECT * FROM  employee where em_mail = '".$username."' and em_Pass = '". $password."'" ;
          $result = mysqli_query($conn, $sql);
          if ($result->num_rows > 0) {
          $row= mysqli_fetch_assoc($result);

          $_SESSION["name"]=$row['em_fname'];
          $_SESSION["ID"]=$row['em_ID'];
          $_SESSION["poss"]=$row['em_pos'];
          $_SESSION["table_ID"] ="employee";
          header('Location:admin.php');

        }
        else{  ?>


<?php
         header('Location:alert.php#popup'); 
        }
      }
$conn->close();

?>
</div>
                <div class="ft-modal-footer">
           
                    <a class="ft-modal-close" href="#.php">&#10006;</a>
                
                </div>
            </div>
        </div>
</body>
</html>