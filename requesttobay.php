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
    $Ac_ID = GetID();
    $User_Name = GetUserName()." ".$_SESSION["Lname"];
  
            $conn = db_connect();
            $id = intval($_GET['pid']);
            $sellid = intval($_GET['sellid']);
            $table = $_GET['table'];
            $type = $_GET['typ'];
            $loct = $_GET['loc'];
            $pg=$_GET['pg'];

    ?>
    <!-----------------------------------------delete-->

    <div class="ft-modal" id="reqtobay">
        <div class="ft-modal-content">
            <div class="ft-modal-header">
            </div>
            <div class="ft-modal-body">
                <h5>YOUR REQUEST</h5>
                <?php
                $CHECKQ = "SELECT * FROM  requests WHERE pro_ID='$id' and buy_ID='$Ac_ID'";
                $result = mysqli_query($conn, $CHECKQ);
                if ($result->num_rows > 0) {
                    $rows = mysqli_fetch_assoc($result); 
                    echo "This property has already requested";
                }else{
                    $CHECKQ = "SELECT * FROM  approvedreq WHERE pro_ID=$id";
                    $result = mysqli_query($conn, $CHECKQ);
                    if ($result->num_rows > 0) {
                        $rows = mysqli_fetch_assoc($result); 
                        echo "This property has already accepted for request NO#",$rows["req_id"];
                    }else{
                            
                $SETACOUNTQ = "INSERT INTO   requests (buy_ID,sell_ID,fromUser,req_type,pro_ID,req_status,req_date)
                values ('$Ac_ID','$sellid','$User_Name','$table','$id','on hold',NOW())";

               if ($conn->query($SETACOUNTQ)){
                   
                $CHECKQ = "SELECT * FROM  requests WHERE pro_ID='$id' and buy_ID='$Ac_ID'";
                $results = mysqli_query($conn, $CHECKQ);
                if ($results->num_rows > 0) {
                $row = mysqli_fetch_assoc($results); 
                $req_ID=$row["RqID"];
               
                }
    
                  echo " your request has been added sucsesfully request NO# 00",$req_ID;;
               
               }
               else{
                   echo "Error: ". $SETACOUNTQ ."
                   ". $conn->error;
               }
            }}

           
        
               ?>
               

            </div>
            <div class="ft-modal-footer">
                <a class="ft-modal-close" href="viewproperty.php?propID=<?php echo $id ?>&table=<?php echo $table ?>&typ=<?php echo $type?>&loc=<?php echo $loct?>&pg=<?php echo  $pg ?>">&#10006;</a>

            </div>
        </div>
    </div>


</body>

</html>