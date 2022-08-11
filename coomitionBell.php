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

        <article class="reqest" style="margin-top: -110px; padding-right:5%;width:100%">
            

            
            <div class="panel-body p-20"  style="margin-left:-9%">
            <p style="padding-left:0%; color:blueviolet">TRANSACTIONS</p>
                <?php
                require_once 'DBconect.php';
                $conn = db_connect();
                $Ac_ID = GetID();
                $User_Name = GetUserName();
         
                
                ?>
              
              <table id="example" class="display table table-striped table-bordered" cellspacing="0" width="100%" style="background-color:rgb(250, 250, 255,.8);">
                <thead>
                    <tr>
                        
                        <th>Buyer Name</th>
                        <th>Property ID</th>
                        <th>Total Amount</th>
                        <th>Date</th>
                        
                    </tr>
                </thead>
                <tbody>
                                <?php

                                $Ac_ID = GetID();

                                $query = "SELECT * FROM requests where req_status='paid' and sell_ID =$Ac_ID ORDER BY req_date DESC";

                                $result = mysqli_query($conn, $query);
                                if ($result->num_rows > 0) {
                                    while ($row = mysqli_fetch_assoc($result)) {
                                        $reqid=$row['RqID'];
                                        $user=$row['fromUser'];
                                        $payquery = "SELECT * FROM payment where acept_req_id = $reqid";
                                        
                                $resultp = mysqli_query($conn, $payquery);
                                if ($resultp->num_rows > 0) {
                                    while ($rowp = mysqli_fetch_assoc($resultp)) {
                                    ?>
                                
                                        <tr style="background-color:rgb(255, 127, 80,.0995);">
                                            <td><?php echo $user?> </td>
                                            <td><a style="color: coral; text-decoration:none" href="viewrequest.php?pid=<?php echo $row["pro_ID"] ?>&user=<?php echo "cbel"?>&acc=<?php echo $row["buy_ID"]?>&reqid=<?php echo $row["RqID"]; ?>#popup"><?php echo $row["pro_ID"] ?> </td>
                                            <td> <?php echo $rowp["amount"] ?> SAR</td>
                                            <td> <?php echo $rowp["pay_date"] ?> </td>
                                            <!--
                                             <?php if($rowp["comStatus"]=='unpaied'){?>
                                            <td style="color:red; font-weight:700; font-size:14px;"> <?php echo $rowp["comStatus"] ?> </td>
                                             <?php }else{?>
                                            <td style="color:darkgreen;font-weight:700; font-size:14px;"> <?php echo $rowp["comStatus"] ?> </td>
                                            <?php }?>
                                            <!--td>
                                            <a onclick="return confirm('Are you sure you want to complete payment ?');" href="payment.php?reqid=<?php echo $row["RqID"] ?>&proid=<?php echo $row["pro_ID"]; ?>&stat=<?php echo $rowp["comStatus"]; ?>&user=<?php echo "sel"; ?>#pay">payment</a>
                                            </td> -->
                                        
                                        </tr>



                                    <?php
                                    }
                                }
                                    }
                                } else {
                                    ?>
                        <div class="col-md-4 col-sm-6 col-lg-4" style=" margin-left: 15%;">
                            <p style=" padding-right: 20%; font-size:12px">No request found</p>
                        </div>
                    <?php } ?>
                    </tbody>
                </table>



            </div>
        </article>


    <!-- ========== THEME JS ========== -->
    <script src="js/main.js"></script>

</body>

</html>