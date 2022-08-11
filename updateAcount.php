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
<?php
        require_once 'DBconect.php';
        $conn = db_connect();
        $Ac_ID = GetID();
        //$User_Name = GetUserName();
        
?>
    <div>
 
    </div>
    <article class="hello">

    <div class="ft-modal" id="popup">
        <div class="ft-modal-content">
            <div class="ft-modal-header">
            </div>
            <div class="ft-modal-body">

                <?php


                require_once 'DBconect.php';
                $conn = db_connect();
                $userfname = filter_input(INPUT_POST, 'userfname');
                $userlname = filter_input(INPUT_POST, 'userlname');
                $Email = filter_input(INPUT_POST, 'Email');
                $phone = filter_input(INPUT_POST, 'phone');
                $addres = filter_input(INPUT_POST, 'address');
                $gender = filter_input(INPUT_POST, 'gender');
                $dob = filter_input(INPUT_POST, 'dob');
                $card= filter_input(INPUT_POST, 'card');
                $pass= filter_input(INPUT_POST, 'pass');
                $Ac_ID = GetID();
                
                if(intval($_GET['acID'])){$Ac_ID=intval($_GET['acID']);}
                $query = "UPDATE  `tasweqar`.`regesterdacounts`SET  `User_Name` =  '$userfname',`user_Lname` =  '$userlname',`Password` =  '$pass'
                ,`Email` =  '$Email',`phone` =  '$phone',`address` =  '$addres',`gender` =  '$gender',`dob` =  '$dob' ,`cardNo` =  '$card'                                                    
                 WHERE  `regesterdacounts`.`Ac_ID` = '$Ac_ID' LIMIT 1";

                if ($conn->query($query)) {
                    
                    echo "profile has been Updated";
                } else {
                    echo "Error: " . $query . "
                " . $conn->error;
                }
                
                ?>

            </div>
            <div class="ft-modal-footer">
                <?php  if($_GET['user']=="emp"){?>
                <a class="ft-modal-close" href="customers.php">&#10006;</a>
                <?php }else{?>
                <a class="ft-modal-close" href="Acount.php">&#10006;</a>
                <?php }?>
            </div>
        </div>
    </div>


</body>

</html>