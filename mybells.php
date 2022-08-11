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
    $Ac_ID = GetID();
    $User_Name = GetUserName();
    ?>
    <div>
        <div>
            <?php include('btopbar.php'); ?>
        </div>

        <?php include('bleftbar.php'); ?>
    </div>


    <section style="flex-direction: column; padding-top:150px;">
        <!-------------------------------view section----------------------------------------->

        <article>
            <article class="hello">

                <article class="reqest" style="margin-top: -200px; padding-right:5%;width:100%">
                 
                    <div class="panel-body p-20" style="margin-left:-9%">
                        <?php
                        require_once 'DBconect.php';
                        $conn = db_connect();
                        ?>
                          <p style="padding-left:0% ;">BILLS</p>
                        <table id="example" class="display table table-striped table-bordered" cellspacing="0" width="100%"style="background-color:rgb(250, 250, 255,.8);">
                            <thead>
                                <tr>
                                    <th>Bill ID</th>
                                    <th>Request ID</th>
                                    <th>Amount</th>
                                    <th>Commision</th>
                                    <th>Status</th>
                                    <th>Date of pay</th>
                                   

                                </tr>
                            </thead>

                            <tbody>
                                <?php

                                $query = "SELECT * FROM requests where buy_ID = $Ac_ID  and req_status='paid' order by req_date DESC";

                                $result = mysqli_query($conn, $query);
                                if ($result->num_rows > 0) {
                                    while ($row = mysqli_fetch_assoc($result)) {
                                        $reqid=$row['RqID'];
                                        $payquery = "SELECT * FROM payment where acept_req_id = $reqid";
                                        
                                $resultp = mysqli_query($conn, $payquery);
                                if ($resultp->num_rows > 0) {
                                    while ($rowp = mysqli_fetch_assoc($resultp)) {
                                    ?>
                                
                                        <tr style="background-color:rgb(255, 127, 80,.0995);">
                                            <td>#00<?php echo $rowp["pay_ID"] ?> </td>
                                            <td><a href="viewrequest.php?pid=<?php echo $row["pro_ID"] ?>&table=<?php echo $row["req_type"]?>&acc=<?php echo $row["buy_ID"]?>&reqid=<?php echo $row["RqID"]; ?>&user=<?php echo "sbel"; ?>#popup">ID: <?php echo $rowp["acept_req_id"] ?> </td>
                                            <td> <?php echo $rowp["amount"] ?> SAR</td>
                                            <td> <?php echo $rowp["commetion"] ?> SAR </td>
                                            <td style="color:darkgreen;font-weight:700; font-size:14px;"> <?php echo $rowp["comStatus"] ?> </td>
                                            <td>ON: <?php echo $rowp["pay_date"] ?> </td>
                                        
                                        </tr>



                                    <?php
                                    }
                                }
                                    }
                                } else {
                                    ?>
                                    <div class="col-md-4 col-sm-6 col-lg-4" style=" margin-left: 35%;">
                                        <p style=" padding-right: 20%; font-size:12px"> No requests ,please search</p>
                                    </div>
                                <?php } ?>
                            </tbody>
                        </table>



                    </div>
                </article>

            </article>

        </article>
    </section>

</body>

</html>