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

    <article class="hello">

    <div class="ft-modal" id="accept">
        <div class="ft-modal-content">
            <div class="ft-modal-header">
            </div>
            <div class="ft-modal-body">
                <h5>ACCEPT REQUEST</h5>
                <?php


                require_once 'DBconect.php';
                $conn = db_connect();
                $id = intval($_GET['reqid']);
                $proid = intval($_GET['proid']);
                $stat = $_GET['stat'];
                $Ac_ID = GetID();
                if($_GET['user']=="emp") 
                    $SETACOUNTQ = "INSERT INTO   approvedreq (app_pays_status,app_date,req_id,pro_ID,em_ID) 
                                   values ('unpaid',NOW(),'$id','$proid','$Ac_ID') ";
                else
                $SETACOUNTQ = "INSERT INTO   approvedreq (app_pays_status,app_date,sell_ID,req_id,pro_ID) 
                               values ('unpaid',NOW(),'$Ac_ID','$id','$proid') ";
                $query = "UPDATE requests SET  `req_status` =  'approved'   WHERE  RqID = '$id' LIMIT 1";    
                                  
                      if($stat!='on hold'){
                        echo "This property has been ",$stat," can not accept.";
                      }else {
                $CHECKQ = "SELECT * FROM  approvedreq WHERE pro_ID=$proid";
                $result = mysqli_query($conn, $CHECKQ);
                if ($result->num_rows > 0) {
                    $rows = mysqli_fetch_assoc($result); 
                    echo "This property has already ",$stat, " for request NO#",$rows["req_id"];
                }else{
                       
                    if ($conn->query($query)) {
                        
                        if ($conn->query($SETACOUNTQ)) {

                        echo " property request has been approved";
                    } else {
                        echo "Error: " . $SETACOUNTQ . "
                                    " . $conn->error;
                    }
               
                } else {
                    echo "Error: " .  $query. "
             " . $conn->error;
                }
            }}
                ?>

            </div>
            <div class="ft-modal-footer">
            <?php if($_GET['user']=="emp"){ ?>
                        <a class="ft-modal-close" href="manageRequests.php">&#10006;</a>
                        <?php }else{?>
                            <a class="ft-modal-close" href="myrequest.php">&#10006;</a>
                        <?php }?>
                
            </div>
        </div>
    </div>
    

    <!-- ========== THEME JS ========== -->
    <script src="js/main.js"></script>

</body>

</html>