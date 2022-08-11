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
        $User_Name = GetUserName();
        
?>
    <div>
        <div>
            <?php 
            if($_SESSION["table_ID"]==1){
                include('topbar.php'); 
            }
            else{
                include('btopbar.php'); 
            }   
            ?>
        </div>

        <?php 
        if($_SESSION["table_ID"]==1){
            include('leftbar.php');
        }
        else{
            include('bleftbar.php'); 
        }
         ?>
    </div>


    <div class="ft-modal" id="popup">
        <div class="ft-modal-content">
            <div class="ft-modal-header">
            </div>
            <div class="ft-modal-body">

                <?php


                require_once 'DBconect.php';
                $conn = db_connect();
                $title = filter_input(INPUT_POST, 'title');
                $des = filter_input(INPUT_POST, 'des');
                $Ac_ID = GetID();
                $SellQ = "INSERT INTO   complaint (com_title,com_text,com_status,com_date,ac_ID,emp_comment)
                values ('$title','$des','on hold',NOW(),'$Ac_ID','under processing..')";
                
               if ($conn->query($SellQ)){
                  echo " your complaint has been added sucsesfully";
               }
               else{
                   echo "Error: ". $SellQ ."
                   ". $conn->error;
               }
                
                ?>

            </div>
            <div class="ft-modal-footer">
                <a class="ft-modal-close" href="complaint.php">&#10006;</a>
            </div>
        </div>
    </div>


</body>

</html>