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
   
    ?>
    <section style="flex-direction: column; padding-top:150px;">
        <!-------------------------------view section----------------------------------------->

        <article>
           
                <article class="reqest" style="margin-top: -120px; width:100%">
                    <div class="ft-modal" id="cancel">
                <div class="ft-modal-content">
                    <div class="ft-modal-header">
                    </div>
                    <div class="ft-modal-body">
                        <h5>YOUR REQUEST</h5>
                        <?php


                        require_once 'DBconect.php';
                        $conn = db_connect();
                        $id = intval($_GET['reqid']);
                        $stat = $_GET['stat'];
                        if(($stat=="paid")||($stat=="approved")){
                        echo "This request has been accepted can't be canceled ";
                    }
                    else{
                        $DELETQ = "DELETE FROM requests  WHERE RqID=$id ";
                        if ($conn->query($DELETQ)) {
                                echo " your request has been deleted";
                            } else {
                                echo "Error: " . $DELETQ . "  " . $conn->error;
                            }
                        
                        
                    }
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

        </article>
    </section>

</body>

</html>