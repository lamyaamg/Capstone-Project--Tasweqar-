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
    <style>
         a{
            font-size: 15px;
            color: black;
            text-decoration: none;
        }
    
 
    </style>

</head>
<body  >
    <!-- start header -------------------------->
    <?php include('topadmin.php'); ?>
    <!-- end header------------------------------>
    <?php
    require_once 'DBconect.php';
    $conn = db_connect();
    $Ac_ID = GetID();
    $User_Name = $_SESSION["name"];
    if(!(filter_input(INPUT_POST, 'sr')))$sr="all";
    else  $sr = filter_input(INPUT_POST, 'sr');
                
    ?>
    
    <section style="flex-direction: column; padding-top:190px;padding-bottom:280px">
        <article>
            <p style="color:blueviolet; padding-left:40%; margin-top:-40px;font-size:30px">Manage Requests</p>
        </article>
        <article class="container">
            <p style="margin-left:70px ;margin-right:25% ; padding-top:25px; font-variant:small-caps;font-size:18px;"> select request type: <?php if($sr) echo $sr;else echo "all" ?></p>

            <form class="form" method="post" action="manageRequests.php#">

                <select class="input" name="sr">

                    <option value="all" >All requests</option>
                    <option value="on hold">on hold requests</option>
                    <option value="approved">approved requests</option>
                    <option value="paid">paid requests</option>
                    <option value="closed">closed requests</option>
                </select>
                <button>Search</button>

            </form>
            
            <table id="example" class="display table table-striped table-bordered" cellspacing="0" width="100%" style="background-color:rgb(250, 250, 255,.8);">
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
                        <th>Action</th>

                    </tr>
                </thead>
                <tbody>
                    <?php
                    
                    if ($sr != "all") {
                        $query = "SELECT * FROM requests where  req_status='$sr' ORDER BY req_date DESC";
                    } else {
                        $query = "SELECT * FROM requests ORDER BY req_date DESC";
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
                                            <?php } else if ($row["req_status"] == "on hold") {?>
                                            <td style="color:coral; font-weight:700;"><?php echo $row["req_status"] ?> </td>
                                            <?php } else if ($row["req_status"] == "closed") {?>
                                            <td style="color:imgray; font-weight:700;"><?php echo $row["req_status"] ?> </td>
                                            <?php } else if ($row["req_status"] == "rejected") {?>
                                            <td ><a style="color:red; font-weight:700;"href="reson.php?reqID=<?php echo $row["RqID"] ?>&user=<?php echo 'ad'?>#reqR" title="click to view reject reason"><?php echo $row["req_status"] ?></a> </td>
                                            <?php } else { ?>
                                            <td style="color:green; font-weight:700;"><?php echo $row["req_status"] ?> </td>
                                            <?php }?>

                                <td>

                                    <a style="color:coral; font-weight:900" href="manageRequests.php?pid=<?php echo $row["pro_ID"] ?>&table=<?php echo $row["req_type"] ?>&acc=<?php echo $Ac_ID ?>&reqid=<?php echo $row["RqID"] ?>#popup">View </a>

                                </td>
                                <td>
                                    <a style="color:coral; font-weight:900" onclick="return confirm('Are you sure you want to approve this request ?');" href="acceptrequest.php?reqid=<?php echo $row["RqID"] ?>&proid=<?php echo $row["pro_ID"]?>&user=<?php echo "emp"?>&stat=<?php echo $row["req_status"]?>#accept">Respond </a>

                                </td>
                                <td>
                                 <a style="color:coral; font-weight:900" onclick="return confirm('Are you sure you want to cancel this request ?');" href="cancelrequest.php?reqid=<?php echo $row["RqID"]?>&stat=<?php echo $row["req_status"];?>&emp=<?php echo "emp"; ?>#cancel">Delete</a>

                                </td>
                                <td>
                                 <a style="color:coral; font-weight:900" onclick="return confirm('Are you sure you want to reject this request ?');" href="rejectRequest.php?reqid=<?php echo $row["RqID"]?>&stat=<?php echo $row["req_status"];?>&emp=<?php echo "emp"; ?>#reject">Reject</a>
                                </td></tr>



                        <?php
                        }
                    } else {
                        ?>
                        <div class="col-md-4 col-sm-6 col-lg-4" style=" margin-left: 35%;">
                            <p style=" padding-right: 20%; font-size:12px">No requests found</p>
                        </div>
                    <?php } ?>
                </tbody>
            </table>

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
                       
                        $query = "SELECT * FROM requests join property  USING(pro_ID) WHERE pro_ID= $id and RqID=$reqid";
                       
                        $result = mysqli_query($conn, $query);
                        if ($result->num_rows > 0) {
                            while ($row = mysqli_fetch_assoc($result)) {
                                $imageURL = 'uploads/' . $row["pro_img"];
                        ?>
                                &nbsp;&nbsp;&nbsp;<a> Request ID: <?php echo "00", $reqid ?></a> <br>
                                &nbsp;&nbsp;&nbsp;<a> Buyer ID: <?php echo "00", $acc ?></a> <br>
                                &nbsp;&nbsp;&nbsp;&nbsp;<a>Buyer: <?php echo $row["fromUser"] ?></a> <br>
                                <a href="<?php echo $imageURL; ?>" data-fluidbox><img src="<?php echo $imageURL; ?>" style=" width: 200px ;height: 200px ;margin-left:20px" alt="img " /> </a>
                    </div>
                    <div style="margin: 80px 20px; text-align:left">
                        <a>Property ID: <?php echo $row["pro_ID"] ?></a> <br>
                        <!--a> Property Owner: <?php echo $row["OwFrist"] ?> <?php echo $row["OwLast"] ?> </a> <br-->
                      
                        <a>Property Price:<?php echo $row["pro_price"] ?></a><br>
                        <a>Category:<?php echo $row["pro_category"] ?></a><br>
                        <?php
                                    $pro_ID = $row["pro_ID"];
                                    if ($row["pro_type"] = "rent") {
                                        $rentquery = "SELECT * FROM rent WHERE pro_ID =$pro_ID  limit 1 ";
                                        $results = mysqli_query($conn, $rentquery);
                                        if ($results->num_rows > 0) {
                                            $rowr = mysqli_fetch_assoc($results);

                                    ?>
                                            <a>Rent frequency:<?php echo $rowr["freq"] ?></a><br>
                                            <a>Rent period:<?php echo $rowr["period"] ?></a><br>
                                    <?php }
                                    } ?>

                        <?php
                        $pro_ID= $row["pro_ID"];
                            $querys = "SELECT * FROM structure WHERE pro_ID =$pro_ID  limit 1 ";
                            $results = mysqli_query($conn, $querys);
                            if ($results->num_rows > 0) {
                            $rows = mysqli_fetch_assoc($results);
                            
                            ?>
                        <a>Property structuer: floor:<?php echo $rows["floor"] ?> rooms :<?php echo $rows["rooms"] ?> bedrooms :<?php echo $rows["bedrooms"] ?></a><br>
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
                                <a>Google Map:<br> <a href="<?php echo $row1["Gmap"] ?>" style="text-decoration: none;"> <?php echo $row1["Gmap"] ?> </a><br>

                                <?php
                                    }
                                }
                                //$em_ID="";
                                if(($row["req_status"]=="approved")||($row["req_status"]=="paid")){
                                $query2 = "SELECT * FROM approvedreq WHERE req_id=  $reqid";
                                $result2 = mysqli_query($conn, $query2);
                                if ($result2->num_rows > 0) {
                                    while ($row2 = mysqli_fetch_assoc($result2)) {
                                        $em_ID= $row2["em_ID"];
                                        if($em_ID!=null){
                               
                                $query3 = "SELECT * FROM employee WHERE em_ID= $em_ID";
                                $result3 = mysqli_query($conn, $query3);
                                if ($result3->num_rows > 0) {
                                    while ($row3 = mysqli_fetch_assoc($result3)) { 
                                     
                                         ?>
                                <a > Approved by employee : <?php echo $row3["em_fname"]," ",$row3["em_lname"] ?></a> <br>
                                <?php      } } }else{?>
                                    
                                    <a > Approved by seller :  <?php echo $row["owner"] ?></a> <br>
                                <?php }
                                }}}}
                        } else {
                            echo "Sory this property may be deleted";
                        }
                ?>
                
                    </div>
                   
                    <div class="ft-modal-footer">
                        <a class="ft-modal-close" href="manageRequests.php#">&#10006;</a>
                    </div>
                </div>
            </div>


        <!---------------------------------------------------------------------------->

    </section>
</body>

</html>