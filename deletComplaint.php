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
    <style>
        a {
            color: black;
            text-decoration: none;
            font-size: 14px;
        }

        a:hover {
            text-decoration: none;
        }
    </style>

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
     
    </div>
    <article class="hello">


    <div class="ft-modal" id="popup">
        <div class="ft-modal-content" style="display: flex;">
            <div class="ft-modal-header">
            </div>
            <div class="ft-modal-body">
             
                <?php


                require_once 'DBconect.php';
                $conn = db_connect();
                $comid = intval($_GET['comid']);
                $acc = $_GET['acc'];
            
                $DELETQ = "DELETE FROM complaint WHERE com_ID=$comid ";
               
                if ($conn->query($DELETQ)) {
                    
                    echo " complaint  has been deleted";
                     } else {
                             echo "Error: " . $DELETQ . "   " . $conn->error;
                     }
                
                ?>

            </div>

            <div class="ft-modal-footer">
                <?php if($acc=="emp"){?>
                <a class="ft-modal-close" href="adcomplaint.php">&#10006;</a>
                <?php }else {
                    if($acc=="cus"){ ?>
                <a class="ft-modal-close" href="mycomplaint.php">&#10006;</a>
                <?php }}?>
            </div>
        </div>
    </div>





    <!-- ========== THEME JS ========== -->
    <script src="js/main.js"></script>

</body>

</html>