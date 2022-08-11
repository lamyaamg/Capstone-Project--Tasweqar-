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
        a{
            color: black;
            text-decoration: none;
            font-size: 14px;
        }
        a:hover{
            text-decoration: none;
        }
    </style>

</head>

<body>
    <div>
        <div>
            <?php include('topbar.php'); ?>
        </div>

        <?php include('leftbar.php'); ?>
    </div>
    <article class="hello">

        <article class="reqest" style="margin-top: -90px; padding-right:5%;width:100%">
            <p style="padding-left:32%">SELECT REQUEST TYPE</p>

            <form class="form" method="post" action="myrequest.php#" style="padding-left:12%;">

                <select class="input" name="sr">
                    
                    <option value="all" >All requests</option>
                    <option value="sale">sales requests</option>
                    <option value="rent">rent requests</option>
                </select>
                <button>Search</button>

            </form>
            <div class="panel-body p-20"  style="margin-left:-9%">
                <?php
                require_once 'DBconect.php';
                $conn = db_connect();
                $Ac_ID = GetID();
                $User_Name = GetUserName();
                if(!(filter_input(INPUT_POST, 'sr')))  
                $sr = 'all';
                else
                $sr = filter_input(INPUT_POST, 'sr');
                
                ?>
                <p style="padding-left:0%;"> <?php echo $sr; ?> requests</p>
                <table id="example" class="display table table-striped table-bordered" cellspacing="0" width="100%" >
                <thead>
                                <tr>
                                    <th>Request ID</th>
                                    <th>Property ID</th>
                                    <th>Type</th>
                                    <th>From</th>
                                    <th>Date</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                    <th>Action</th>
                                    <th>Action</th>

                                </tr>
                            </thead>
                    <tbody>
                        <?php

                        if ($sr != "all") {
                            $query = "SELECT * FROM requests  where sell_ID = $Ac_ID  and req_type ='$sr' ORDER BY req_date DESC";
                            }else{
                            $query = "SELECT * FROM requests where sell_ID = $Ac_ID  ORDER BY req_date DESC";

                            }
                        


                        $result = mysqli_query($conn, $query);
                        if ($result->num_rows > 0) {
                            while ($row = mysqli_fetch_assoc($result)) {

                        ?>
                                <tr style="background-color:rgb(255, 127, 80,.0995);">
                                    <td>#00<?php echo $row["RqID"] ?> </td>
                                    <td><?php echo $row["pro_ID"] ?> </td>
                                    <td><?php echo $row["req_type"] ?> </td>
                                    <td><?php echo $row["fromUser"] ?> </td>
                                    <td><?php echo $row["req_date"] ?> </td>
                                    <?php if ($row["req_status"] == "approved") { ?>
                                            <td style="color:goldenrod; font-weight:700;"><?php echo $row["req_status"] ?> </td>
                                            <?php } else if ($row["req_status"] == "on hold") {?>
                                            <td style="color:coral; font-weight:700;"><?php echo $row["req_status"] ?> </td>
                                            <?php } else if ($row["req_status"] == "closed") {?>
                                            <td style="color:dimgray; font-weight:700;"><?php echo $row["req_status"] ?> </td>
                                            <?php } else if ($row["req_status"] == "rejected") {?>
                                            <td ><a style="color:red; font-weight:700;"href="reson.php?reqID=<?php echo $row["RqID"] ?>&user=<?php echo 'sel'?>#reqR" title="click to view reject reason"><?php echo $row["req_status"] ?></a> </td>
                                            <?php } else { ?>
                                            <td style="color:green; font-weight:700;"><?php echo $row["req_status"] ?> </td>
                                            <?php }?>
                                    <td>

                                        <a href="myrequest.php?pid=<?php echo $row["pro_ID"] ?>&table=<?php echo $row["req_type"]?>&acc=<?php echo $Ac_ID?>&reqid=<?php echo $row["RqID"]?>#popup">View </a>

                                    </td>
                                    <td>
                                        <a href="acceptrequest.php?reqid=<?php echo $row["RqID"] ?>&proid=<?php echo $row["pro_ID"]?>&user=<?php echo 'sel'?>&stat=<?php echo $row["req_status"]?>#accept" onclick="return confirm('Are you sure you want to accept this request ?');">Accept </a>

                                    </td>
                                    <td>
                                    <a  onclick="return confirm('Are you sure you want to reject this request ?');" href="rejectRequest.php?reqid=<?php echo $row["RqID"]?>&stat=<?php echo $row["req_status"];?>&emp=<?php echo "sel"; ?>#reject">Reject</a>
                                    </td>
                                </tr>



                            <?php
                            }
                        } else {
                            ?>
                            <div class="col-md-4 col-sm-6 col-lg-4" style=" margin-left: 35%;">
                                <p style=" padding-right: 20%; font-size:12px">No requests ,please search</p>
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
            <h5>View Request</h5>
                        <?php


                        require_once 'DBconect.php';
                        $conn = db_connect();
                        $id = intval($_GET['pid']);
                        $acc = intval($_GET['acc']);
                        $reqid = intval($_GET['reqid']);
                        $table = $_GET['table'];
                       
                        $query = "SELECT * FROM requests join property  USING(pro_ID) WHERE RqID= $reqid ";
                       
                        $result = mysqli_query($conn, $query);
                        if ($result->num_rows > 0) {
                            while ($row = mysqli_fetch_assoc($result)) {
                                $imageURL = 'uploads/' . $row["pro_img"];
                        ?>
                                &nbsp;&nbsp;&nbsp;<a> Request ID: <?php echo "00", $reqid ?></a> <br>
                                &nbsp;&nbsp;&nbsp;<a> Buyer ID: <?php echo "00",$row["buy_ID"]  ?></a> <br>
                                &nbsp;&nbsp;&nbsp;<a> Buyer Name:<?php echo $row["fromUser"] ?></a><br>
                                <!--&nbsp;&nbsp;&nbsp;&nbsp;<a>Saler ID: <?php echo "00", $row["user_ID"] ?></a> <br-->
                                <a href="<?php echo $imageURL; ?>" data-fluidbox><img src="<?php echo $imageURL; ?>" style=" width: 250px ;height: 250px ;margin-left:20px" alt="img " /> </a>
                    </div>
                    <div style="margin: 80px 20px; text-align:left"><br>
                        <a>Property ID: <?php echo $row["pro_ID"] ?></a> <br>
                        <a> Property Owner: <?php echo $row["owner"] ?></a> <br>
                      
                        <a>Property Price:<?php echo $row["pro_price"] ?></a><br>
                        <a>Category:<?php echo $row["pro_category"] ?></a><br>
                        <?php
                        $pro_ID= $row["pro_ID"];
                            $querys = "SELECT * FROM structure WHERE pro_ID =$pro_ID  limit 1 ";
                            $results = mysqli_query($conn, $querys);
                            if ($results->num_rows > 0) {
                            $rows = mysqli_fetch_assoc($results);
                            
                            ?>
                        <a>Property structure: floor:<?php echo $rows["floor"] ?> rooms :<?php echo $rows["rooms"] ?> bedrooms :<?php echo $rows["bedrooms"] ?></a><br>
                        <?php 
                            }else{?>
                            
                        <?php
                            }
                            ?>

                        <?php
                               
                                $query1 = "SELECT * FROM address WHERE pro_ID= $id";
                                $result1 = mysqli_query($conn, $query1);
                                if ($result1->num_rows > 0) {
                                    while ($row1 = mysqli_fetch_assoc($result1)) {
                        ?>
                                <a> City: <?php echo  $row1["city"], " - ", $row1["province"] ?></a> <br>
                                <a> Zip: <?php echo $row1["zip"] ?></a> <br>
                                <a> Address: <?php echo  $row1["street"], " - ", $row1["homenum"] ?></a> <br>
                                <a href="<?php echo $row1["Gmap"] ?>"> Google Map: <?php echo $row1["Gmap"] ?></a> <br>
                               
                    <?php
                                    }
                                }?>
                                <a> added on: <?php echo $row["Added_Date"] ?></a> <br>
                                <?php
                            }
                        } else {
                            echo "Sory this property may be deleted";
                        }
                ?>
                
                    </div>
                   
                    <div class="ft-modal-footer">
                        <a class="ft-modal-close" href="myrequest.php#">&#10006;</a>
                    </div>
                </div>
            </div>


    


    <!-- ========== THEME JS ========== -->
    <script src="js/main.js"></script>

</body>

</html>