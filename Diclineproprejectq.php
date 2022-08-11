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
<body >
    <!-- start header -------------------------->
    <?php include('topadmin.php'); ?>
    <!-- end header------------------------------>


    <?php
    require_once 'DBconect.php';
    $conn = db_connect();
    $Ac_ID = GetID();
    ?>
    <section style="flex-direction: column; padding-top:190px;">
    
         <div class="ft-modal" id="rejectq">
            <div class="ft-modal-content">
                <div class="ft-modal-header">
                </div>
                <div class="ft-modal-body">
                    <h5>YOUR PROPERTY</h5>

                    <?php
                    require_once 'DBconect.php';
                    $conn = db_connect();
                    $id = intval($_GET['propID']);
                    $table = $_GET['table'];
                    $reson = filter_input(INPUT_POST, 'reson');
                    $stat = $_GET['stat'];
                    if($stat=="inactive"){
                    $query = "UPDATE property SET  `pro_status` =  'rejected'                                              
                              WHERE  pro_ID = '$id' ";
                    $SETACOUNTQ = "INSERT INTO rejected (pro_ID,comment,em_ID)
                        values ('$id','$reson',$Ac_ID) ";
                    if ($conn->query($SETACOUNTQ)) {
                       
                        if ($conn->query( $query)) {

                            echo " property has been rejected";
                        } else {
                            echo "Error: " .  $query . "
                         " . $conn->error;
                        }
                    } else {
                        echo "Error: " . $SETACOUNTQ . "
                            " . $conn->error;
                    }
                  
                }else{echo "This property has been ",$stat," can not be active";}
       

                    ?>

                </div>
                <div class="ft-modal-footer">
                    <a class="ft-modal-close" href="manageprop.php?propID=<?php echo $id ?>&table=<?php echo $table ?>#view">&#10006;</a>

                </div>
            </div>
        </div>

    
    </section>


</body>

</html>