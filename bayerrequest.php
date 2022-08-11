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
    $conn = db_connect();
    $Ac_ID = GetID();
    $User_Name = GetUserName();
    

    ?>
    <div>
        <div>
            <?php include('btopbar.php'); ?>
        </div>

        <?php include('bleftbar.php'); ?>
    </div>


    <section style="flex-direction: column; padding-top:50px;">
        <!-------------------------------view section----------------------------------------->

        <article>
            <article class="hello">
                <article class="reqest" style="margin-top: -120px; width:100%">
                    <p style="padding-left:30%">SELECT REQUEST TYPE</p>
                    <form class="form" method="post" action="bayerrequest.php#">

                        <select class="input" name="sr">
                            <option value="all" selected>All requests</option>
                            <option value="sale">Sale requests</option>
                            <option value="rent">Rent requests</option>
                        </select>
                        <button style="margin-left:100%">Search</button>

                    </form>
                    <div class="panel-body p-20">
                        <?php

                        if (!(filter_input(INPUT_POST, 'sr')))
                            $sr = 'all';
                        else
                            $sr = filter_input(INPUT_POST, 'sr');

                        ?>
                        <p style="font-variant: small-caps;"> <?php echo $sr; ?> requests</p>
                        <table id="example" class="display table table-striped table-bordered" cellspacing="0" width="100%">
                            <thead>
                                <tr>
                                    <th>Request ID</th>
                                    <th>Property ID</th>
                                    <th>Type</th>
                                    <th>Date</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                    <th>Action</th>
                                    <th>Action</th>

                                </tr>
                            </thead>

                            <tbody>
                                <?php

                                $Ac_ID = GetID();

                                if ($sr != "all") {
                                    $query = "SELECT * FROM requests where buy_ID = $Ac_ID  and req_type= '$sr' order by req_date DESC";
                                } else {
                                    $query = "SELECT * FROM requests where buy_ID = $Ac_ID order by req_date DESC";
                                }



                                $result = mysqli_query($conn, $query);
                                if ($result->num_rows > 0) {
                                    while ($row = mysqli_fetch_assoc($result)) {

                                ?>
                                        <tr style="background-color:rgb(255, 127, 80,.0995);">
                                            <td>#00<?php echo $row["RqID"] ?> </td>
                                            <td><?php echo $row["pro_ID"] ?> </td>
                                            <td><?php echo $row["req_type"] ?> </td>
                                            <td><?php echo $row["req_date"] ?> </td>

                                            <?php if ($row["req_status"] == "approved") { ?>
                                                <td style="color:goldenrod; font-weight:700;"><?php echo $row["req_status"] ?> </td>
                                            <?php } else if ($row["req_status"] == "on hold") { ?>
                                                <td style="color:coral; font-weight:700;"><?php echo $row["req_status"] ?> </td>
                                            <?php } else if ($row["req_status"] == "closed") { ?>
                                                <td style="color:dimgray; font-weight:700;"><?php echo $row["req_status"] ?> </td>
                                                <?php } else if ($row["req_status"] == "rejected") {?>
                                            <td ><a style="color:red; font-weight:700;"href="reson.php?reqID=<?php echo $row["RqID"] ?>&user=<?php echo 'bay'?>#reqR" title="click to view reject reason"><?php echo $row["req_status"] ?></a> </td>
                                            <?php } else { ?>
                                                <td style="color:green; font-weight:700;"><?php echo $row["req_status"] ?> </td>
                                            <?php } ?>
                                            <td>
                                                <a href="viewrequest.php?pid=<?php echo $row["pro_ID"] ?>&table=<?php echo $row["req_type"] ?>&acc=<?php echo $row["buy_ID"] ?>&reqid=<?php echo $row["RqID"]; ?>&user=<?php echo "buy"; ?>#popup">View </a>
                                            </td>
                                            <td>
                                                <a onclick="return confirm('Are you sure you want to cancel this request ?');" href="cancelrequest.php?reqid=<?php echo $row["RqID"] ?>&stat=<?php echo $row["req_status"]; ?>&emp=<?php echo "cus"; ?>#cancel">Delete</a>

                                            </td>
                                            <td>
                                                <a onclick="return confirm('Are you sure you want to complete payment ?');" href="payment.php?reqid=<?php echo $row["RqID"] ?>&proid=<?php echo $row["pro_ID"]; ?>&stat=<?php echo $row["req_status"]; ?>&user=<?php echo "buy"; ?>#pay">Payment</a>

                                            </td>
                                            <!--
                                            <?php if ($sr == "sales" || $sr == "rent") { ?>
                                            <!--td>Bayer:<?php echo $row["OwFrist"], " ", $row["OwLast"] ?> </td>
                                            <?php } else { ?>
                                            <td>Bayer ID:<?php echo $row["buy_ID"] ?> </td> <?php } ?>-->

                                        </tr>



                                    <?php
                                    }
                                } else {
                                    ?>
                                    <div class="col-md-4 col-sm-6 col-lg-4" style=" margin-left: 35%;">
                                        <p style=" padding-right: 20%; font-size:12px"> No requests found</p>
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