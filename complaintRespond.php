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
</head>

<body>
    <!-- start header -------------------------->
    <?php include('topadmin.php'); ?>
    <!-- end header------------------------------>


    <?php
    require_once 'DBconect.php';
    $conn = db_connect();
    $Ac_ID = GetID();
    $User_Name = $_SESSION["name"];
    ?>

    <div class="ft-modal" id="popup">
        <div class="ft-modal-content" style="display: flex;">
            <div class="ft-modal-header">
            </div>
            <div class="ft-modal-body">
             
                <?php


                require_once 'DBconect.php';
                $conn = db_connect();
                $comid = intval($_GET['comid']);
                $comment = filter_input(INPUT_POST, 'comment');

                $query = "UPDATE  `tasweqar`.`complaint`SET  `com_status` = 'responded',`emp_ID` =  '$Ac_ID',`emp_comment` =  '$comment'
                  WHERE  `complaint`.`com_ID` = '$comid' LIMIT 1";

                if ($conn->query($query)) {

                    echo "Complaint respond has been sent";
                } else {
                    echo "Error: " . $query . "
                " . $conn->error;
                }

                ?>

            </div>

            <div class="ft-modal-footer">
          
                <a class="ft-modal-close" href="adcomplaint.php">&#10006;</a>
               
            </div>
        </div>
    </div>



</body>


</html>