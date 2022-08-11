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
 
        <!---------------------------------------------------------------------------->
        <div class="ft-modal" id="delet">
            <div class="ft-modal-content">
                <div class="ft-modal-header">
                </div>
                <div class="ft-modal-body">
                    <h5>YOUR PROPERTY</h5>
                    <?php
                    require_once 'DBconect.php';
                    $conn = db_connect();
                    $id = intval($_GET['emID']);
                    
                    $DELETQ = "DELETE FROM employee WHERE em_ID=$id ";
                   
                    if ($conn->query($DELETQ)) {
                        
                        echo " employee account has been deleted";
                         } else {
                                 echo "Error: " . $DELETQ . "   " . $conn->error;
                         }
                    
                    ?>

                </div>
                <div class="ft-modal-footer">
                
                    <a class="ft-modal-close" href="manageAcount.php">&#10006;</a>
                    
                </div>
            </div>
        </div>

    </section>
</body>

</html>