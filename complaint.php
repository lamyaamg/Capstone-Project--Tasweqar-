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
    <article class="hello">
       
                <article class="progress">

                </article>
                <article class="reqest" style="margin-top: -100px;">
                    <p>Add Complaint</p>
                    <article>
                        <form class="form" method="post" action="sendComplaint.php#popup">
                            <label>Title:</label>
                            <input class="input" required type="text" id="title" name="title" maxlength="100" placeholder="complaint title" ">
                            <label>Complaint description:</label>
                            <input style="height: 150px;" class="input" required type="text" name="des" id="des" maxlength="50" placeholder="Add massege"">
                            
                            <button class="btn" type="submit"> Send</button>

                        </form>
                    </article>

                </article>


    </article>
     


</body>

</html>