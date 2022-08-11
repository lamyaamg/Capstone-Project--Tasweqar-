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
    <section style="flex-direction: column; padding-top:190px;padding-bottom:390px">
        <article>
            <p style="color:blueviolet; padding-left:42%; margin-top:-40px;font-size:30px">Complaints</p>
        </article>
        <article class="container" style="width: 100%;">

            <table id="example" class="display table table-striped table-bordered" cellspacing="0" width="100%" style="background-color:rgb(250, 250, 255,.8);">
                <thead>
                    <tr>
                        <th>Complaint ID</th>
                        <th>Customer ID</th>
                        <th>Title</th>
                        <th>Description</th>
                        <th>Status</th>
                        <th>Employee comment</th>
                        <th>Date</th>
                        <th>Action</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php


                    $query = "SELECT * FROM complaint";
                    $result = mysqli_query($conn, $query);
                    if ($result->num_rows > 0) {
                        while ($row = mysqli_fetch_assoc($result)) {

                    ?>
                            <tr style="background-color:rgb(255, 127, 80,.0995);">
                                <td>#00<?php echo $row["com_ID"] ?> </td>
                                <td><?php echo $row["ac_ID"] ?> </td>
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
                                <td> <a style="color:coral; font-weight:700;" onclick="return confirm('Are you sure you want to respond  this complaint ?');" href="adcomplaint.php?comid=<?php echo $row["com_ID"] ?>&stat=<?php echo $row["com_status"] ?>#respond">Respond </a></td>
                                <td> <a style="color:coral; font-weight:700;"onclick="return confirm('Are you sure you want to delete this complaint ?');" href="deletComplaint.php?comid=<?php echo $row["com_ID"] ?>&acc=<?php echo "emp" ?>#popup">Delete </a></td>


                            </tr>



                        <?php
                        }
                    } else {
                        ?>
                        <div class="col-md-4 col-sm-6 col-lg-4" style=" margin-left: 15%;">
                            <p style=" padding-right: 10%; font-size:12px">No Complaints found</p>
                        </div>
                    <?php } ?>
                </tbody>
            </table>

        </article>
    </section>


    <div class="ft-modal" id="respond">
            <div class="ft-modal-content">
                <div class="ft-modal-header">
                </div>
                <div class="ft-modal-body">
                    <h5>COMPLAINT RESPOND</h5>
                    <?php
                    require_once 'DBconect.php';
                    $conn = db_connect();
                    $comid = intval($_GET['comid']);
                    $stat = $_GET['stat'];
                 
                    if($stat=="on hold"){
                    ?>

                    <form class="form" method="post" action="complaintRespond.php?comid=<?php echo $comid?>&stat=<?php echo $stat;?>#popup" style="width: 100%;">

                        <article id="details">
                            <label>Write complaint respond <a style="color: red;padding-bottom:20px">*</a></label>
                            <input class="input" name="comment" required style="height:200px;">

                        </article>
                        <article style="display:inline-flex;">

                            <a><button type="reset">Reset</button></a>
                            <button name="save"><b>save</b></button></a>

                        </article>
                    <?php }else{ echo " this request has already ",$stat," ";} ?>


                    </form>


                </div>
                <div class="ft-modal-footer">
              
                        <a class="ft-modal-close" href="adcomplaint.php">&#10006;</a>
                  
                </div>
            </div>
        </div>



</body>


</html>