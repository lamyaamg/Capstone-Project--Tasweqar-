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

    <!-- end header------------------------------>


    <?php
    require_once 'DBconect.php';
    $conn = db_connect();

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
                    $id = intval($_GET['reqid']);
                    $stat = $_GET['stat'];
                    $emp = $_GET['emp'];
                    $reson = filter_input(INPUT_POST, 'reson');
                    if( $stat =="on hold"){
                    $query = "UPDATE requests SET  `req_status` =  'rejected'                                              
                              WHERE  RqID = '$id' ";
                    $SETACOUNTQ = "INSERT INTO rejectedRequests (RqID,comment)
                        values ('$id','$reson') ";
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
                    }
                    else { echo " This request has been approved can not reject  ";}

                    ?>

                </div>
                <div class="ft-modal-footer">
                <?php if($_GET['emp']=="emp"){ ?>
                        <a class="ft-modal-close" href="manageRequests.php">&#10006;</a>
                        <?php }else{?>
                        <a class="ft-modal-close" href="bayerrequest.php">&#10006;</a>
                        <?php }?>
                </div>
            </div>
        </div>

        <div class="ft-modal" id="reject">
            <div class="ft-modal-content">
                <div class="ft-modal-header">
                </div>
                <div class="ft-modal-body">
                    <h5>REJECT PROPERTY</h5>
                    <?php
                    require_once 'DBconect.php';
                    $conn = db_connect();
                    $id = intval($_GET['reqid']);
                    $stat = $_GET['stat'];
                    $emp = $_GET['emp'];
                    if($stat=="on hold"){
                    ?>

                    <form class="form" method="post" action="rejectRequest.php?reqid=<?php echo $id?>&stat=<?php echo $stat;?>&emp=<?php echo $emp; ?>#rejectq" style="width: 100%;">

                        <article id="details">

                            <label>Write reason of rejection <a style="color: red;">*</a></label>
                            <input class="input" name="reson" required style="height:200px;">

                        </article>
                        <article style="display:inline-flex;">

                            <a><button type="reset">Reset</button></a>
                            <button name="save"><b>save</b></button></a>

                        </article>
                    <?php }else{ echo " this request has been ",$stat," can not reject";} ?>


                    </form>


                </div>
                <div class="ft-modal-footer">
                        <?php if($_GET['emp']=="emp"){ ?>
                        <a class="ft-modal-close" href="manageRequests.php">&#10006;</a>
                        <?php }else{?>
                        <a class="ft-modal-close" href="myrequest.php">&#10006;</a>
                        <?php }?>
                </div>
            </div>
        </div>

    
    </section>


</body>

</html>