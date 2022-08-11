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
        .res{
           border: 2px solid gray; 
           color:red;
           font-size: 14px;
           width:500px;
           height: auto;
           padding: 15px;

        }
        
    </style>

</head>

<body>
    <?php
    require_once 'DBconect.php';
    $Ac_ID = GetID();
    ?>

    <section style="flex-direction: column; padding-top:150px;">
        <!-------------------------------view section----------------------------------------->

            <div class="ft-modal" id="popup">
                <div class="ft-modal-content" style="display: flex;">
                    <div class="ft-modal-header">
                    </div>
                    <div class="ft-modal-body">
                        <h5>View Rejection Reason</h5>
                        <?php


                        require_once 'DBconect.php';
                        $conn = db_connect();
                        $id = intval($_GET['propID']);
                       
                        $query = "SELECT * FROM rejected WHERE pro_ID= $id ";
                       
                        $result = mysqli_query($conn, $query);
                        if ($result->num_rows > 0) {
                            while ($row = mysqli_fetch_assoc($result)) {
                                if($row["comment"]==null) continue;
                                else
                             
                        ?>
                           
                                <br> &nbsp;&nbsp;&nbsp;<p class="res"> <?php echo $row["comment"]   ?></p> <br>
                              
                          
                            
                        <?php  }
                            }else{}
                            ?>

                    </div>
                    <div class="ft-modal-footer">
                        <?php
                         if($_GET['user']=='cus'){
                        ?>
                        <a class="ft-modal-close" href="myproperties.php">&#10006;</a>
                        <?php
                        }else {
                        ?>
                         <a class="ft-modal-close" href="manageprop.php">&#10006;</a>
                        <?php }?>
                    </div>
                </div>
            </div>
 
      
            <!--------------------------------------------------------------------------------------------------------> 
        
            <div class="ft-modal" id="reqR">
                <div class="ft-modal-content" style="display: flex;">
                    <div class="ft-modal-header">
                    </div>
                    <div class="ft-modal-body">
                        <h5>View Rejection Reason</h5>
                        <?php


                        require_once 'DBconect.php';
                        $conn = db_connect();
                        $id = intval($_GET['reqID']);
                       
                        $query = "SELECT * FROM rejectedrequests WHERE RqID= $id ";
                       
                        $result = mysqli_query($conn, $query);
                        if ($result->num_rows > 0) {
                            while ($row = mysqli_fetch_assoc($result)) {
                                if($row["comment"]==null) continue;
                                else
                             
                        ?>
                           
                                <br> &nbsp;&nbsp;&nbsp;<p class="res"> <?php echo $row["comment"]   ?></p> <br>
                              
                          
                            
                        <?php  }
                            }else{}
                            ?>

                    </div>
                    <div class="ft-modal-footer">
                        <?php
                         if($_GET['user']=='sel'){
                        ?>
                        <a class="ft-modal-close" href="myrequest.php">&#10006;</a>
                        <?php
                         }else if($_GET['user']=='bay'){
                        ?>
                        <a class="ft-modal-close" href="bayerrequest.php">&#10006;</a>
                        <?php
                        }else {
                        ?>
                         <a class="ft-modal-close" href="manageRequests.php">&#10006;</a>
                        <?php }?>
                    </div>
                </div>
            </div>

        </article>
    </section>

</body>

</html>