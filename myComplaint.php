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
            <?php
            if ($_SESSION["table_ID"] == 1) {
                include('topbar.php');
            } else {
                include('btopbar.php');
            }
            ?>
        </div>

        <?php
        if ($_SESSION["table_ID"] == 1) {
            include('leftbar.php');
        } else {
            include('bleftbar.php');
        }
        ?>
    </div>
    <article class="hello">

        <article class="reqest" style="margin-top: -110px; padding-right:5%;width:100%">
        <div class="panel-body p-20"  style="margin-left:-9%">
        <p style="padding-left:0%;">COMPLAINTS</p>
  
                <table id="example" class="display table table-striped table-bordered" cellspacing="0" width="100%">
                    <thead>
                        <tr>
                            <th>Complaint ID</th>
                            <th>Title</th>
                            <th>Description</th>
                            <th>Status</th>
                            <th>Employee comment</th>
                            <th>Date</th>
                            <th>Action</th>


                        </tr>
                    </thead>
                    <tbody>
                        <?php

                            $query = "SELECT * FROM complaint where ac_ID = $Ac_ID  order by com_date DESC";
                      

                        $result = mysqli_query($conn, $query);
                        if ($result->num_rows > 0) {
                            while ($row = mysqli_fetch_assoc($result)) {

                        ?>
                                <tr style="background-color:rgb(255, 127, 80,.0995);">
                                    <td>#00<?php echo $row["com_ID"] ?> </td>
                                    <td><?php echo $row["com_title"] ?> </td>
                                    <td><?php echo $row["com_text"] ?> </td>

                                    <?php if ($row["com_status"] == "on hold") { ?>
                                        <td style="color:coral; font-weight:700;"><?php echo $row["com_status"] ?> </td>
                                    <?php } else { ?>
                                        <td style="color:green; font-weight:700;"><?php echo $row["com_status"] ?> </td>
                                    <?php }  
                                    if ($row["emp_comment"]=="under processing.."){?>
                                    
                                    <td style="color:coral; font-weight:500;"><?php echo $row["emp_comment"] ?> </td>
                                    <?php }else{ ?>
                                    <td><?php echo $row["emp_comment"] ?> </td>
                                    <?php }?>
                                    <td><?php echo $row["com_date"] ?> </td>
                                   <td> <a onclick="return confirm('Are you sure you want to delete this complaint ?');"href="deletComplaint.php?comid=<?php echo $row["com_ID"]?>&acc=<?php echo "cus"?>#popup">Delete </a></td>


                                </tr>



                            <?php
                            }
                        } else {
                            ?>
                            <div class="col-md-4 col-sm-6 col-lg-4" style=" margin-left: 35%;">
                                <p style=" padding-right: 20%; font-size:12px">No complaints found</p>
                            </div>
                        <?php } ?>
                    </tbody>
                </table>



            </div>
        </article>

    </article>
    <div class="ft-modal" id="popup">
        <div class="ft-modal-content" style="display: flex;">
            <div class="ft-modal-header">
            </div>
            <div class="ft-modal-body">
             
                <?php


                require_once 'DBconect.php';
                $conn = db_connect();
                $comid = intval($_GET['comid']);
                $acc = intval($_GET['acc']);
            
                $DELETQ = "DELETE FROM complaint WHERE com_ID=$comid ";
               
                if ($conn->query($DELETQ)) {
                    
                    echo " complaint  has been deleted";
                     } else {
                             echo "Error: " . $DELETQ . "   " . $conn->error;
                     }
                
                ?>

            </div>

            <div class="ft-modal-footer">
                <?php if($acc=="cus"){?>
                <a class="ft-modal-close" href="mycomplaint.php">&#10006;</a>
                <?php }else {?>
                <a class="ft-modal-close" href="adcomplaint.php#">&#10006;</a>
                <?php }?>
            </div>
        </div>
    </div>





    <!-- ========== THEME JS ========== -->
    <script src="js/main.js"></script>

</body>

</html>