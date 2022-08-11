<!DOCTYPE html>
<html lang="en">

<head>
    <title>TASWEQAR</title>
    <meta name="auther" content="name" />
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="this is my frist weab bage" />
    <meta name="keywords" content="page,web" />
    <link rel="stylesheet" href="css/bootstrap.min.css" media="screen">
    <link rel="stylesheet" href="css/font-awesome.min.css" media="screen">
    <link rel="stylesheet" href="css/animate-css/animate.min.css" media="screen">
    <link rel="stylesheet" href="css/lobipanel/lobipanel.min.css" media="screen">
    <link rel="stylesheet" href="css/prism/prism.css" media="screen"> <!-- USED FOR DEMO HELP - YOU CAN REMOVE IT -->
    <link rel="stylesheet" type="text/css" href="js/DataTables/datatables.min.css" />
    <link rel="stylesheet" href="css/main.css" media="screen">
    <link rel="stylesheet" href="css/style.css">
    <script src="js/modernizr/modernizr.min.js"></script>

    <link rel="stylesheet" href="indexStyle.css">
    <link rel="stylesheet" href="barstyle.css">

</head>

<body>
<?php


require_once 'DBconect.php';
$conn = db_connect();
$id = intval($_GET['reqid']);
$proid = intval($_GET['proid']);
$stat=$_GET['stat'];
$user=$_GET['user'];
$Ac_ID = GetID();

?>
    
    <article class="hello">

        <div class="ft-modal" id="buyer">
            <div class="ft-modal-content">
                <div class="ft-modal-header">
                </div>
                <div class="ft-modal-body">
                    <h5>YOUR REQUEST</h5>
                    <?php


                    require_once 'DBconect.php';
                    $conn = db_connect();
                    $id = intval($_GET['reqid']);
                    $proid = intval($_GET['proid']);
                    $stat=$_GET['stat'];
                    $Ac_ID = GetID();
                    $query = "UPDATE requests SET  `req_status` =  'paid'   WHERE  RqID = '$id' LIMIT 1";    
                    $squery = "UPDATE approvedreq SET  `app_pays_status` =  'paid'   WHERE req_id = '$id' LIMIT 1";                    
                    $pquery = "UPDATE `property` SET `pro_status` = 'closed' WHERE `property`.`pro_ID` = '$proid' LIMIT 1";    

                    if($stat=='approved'){
                        $AMOUNTQ = "SELECT * FROM  property WHERE pro_ID=$proid";
                        $results = mysqli_query($conn, $AMOUNTQ);
                        if ($results->num_rows > 0) {
                            $rows = mysqli_fetch_assoc($results);
                            $amount=$rows['pro_price'];
                            $comm= $amount*.025;
                          
                            $SETACOUNTQ = "INSERT INTO   payment (acept_req_id,amount,pay_date,commetion,comStatus)
                             values ('$id','$amount',NOW(),'$comm','paid') ";
                            if ($conn->query($SETACOUNTQ)) {
                               if ($conn->query($query)) {
                                if ($conn->query($squery)) {
                                    if ($conn->query($pquery)) {
                                    echo "your payment has been completed sucsessfully";
                                }else {
                                    echo "Error: " .  $pquery. "
                             " . $conn->error;
                                }
                                
                                }else {
                                echo "Error: " .  $squery. "
                                 " . $conn->error;
                                }
                            

                        }else {
                            echo "Error: " .  $query. "
                     " . $conn->error;
                        }
                        } else {
                            echo "Error: " .  $SETACOUNTQ. "
                     " . $conn->error;
                        }
                        } else { echo "someting went wrong";}
                                            
                    }
                else{ }
                    ?>

                </div>
                <div class="ft-modal-footer">
                    <a class="ft-modal-close" href="bayerrequest.php">&#10006;</a>
                </div>
            </div>
        </div>
       

        <!-- ========== THEME JS ========== -->
        <script src="js/main.js"></script>

</body>

</html>