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
          
            color:black;
        }
    </style>

</head>

<body>
    <?php
    require_once 'DBconect.php';
    $Ac_ID = GetID();
    //$User_Name = GetUserName();
    ?>

    <section style="flex-direction: column; padding-top:150px;">
        <!-------------------------------view section----------------------------------------->

        <article>
      

                <article class="reqest" style="margin-top: -120px; width:100%">
                   

            <div class="ft-modal" id="popup">
                <div class="ft-modal-content" style="display: flex;">
                    <div class="ft-modal-header">
                    </div>
                    <div class="ft-modal-body">
                        <p>View Request</p>
                        <?php


                        require_once 'DBconect.php';
                        $conn = db_connect();
                        $id = intval($_GET['pid']);
                        $acc = intval($_GET['acc']);
                        $reqid = intval($_GET['reqid']);
                        $user = $_GET['user'];
                        if($user!='cbel')
                            $query = "SELECT * FROM requests join property  USING(pro_ID) WHERE pro_ID= $id and buy_ID= $Ac_ID";
                        else   
                            $query = "SELECT * FROM requests join property  USING(pro_ID) WHERE RqID= $reqid";

                        $result = mysqli_query($conn, $query);
                        if ($result->num_rows > 0) {
                            while ($row = mysqli_fetch_assoc($result)) {
                                $imageURL = 'uploads/' . $row["pro_img"];
                        ?>
                                &nbsp;&nbsp;&nbsp;<a> Request ID: <?php echo "00", $reqid ?></a> <br>
                                &nbsp;&nbsp;&nbsp;<a> Seller ID: <?php echo "00",$row["sell_ID"]   ?></a> <br>
                               &nbsp;&nbsp;&nbsp;&nbsp;<a>Seller Name: <?php echo $row["owner"] ?></a> <br>
                               &nbsp;&nbsp;&nbsp;&nbsp;<a>buyer Name: <?php echo $row["fromUser"] ?>  </a> <br>
                                <a href="<?php echo $imageURL; ?>" data-fluidbox><img src="<?php echo $imageURL; ?>" style=" width: 250px ;height: 250px ;margin-left:20px" alt="img " /> </a>
                    </div>
                    <div style="margin: 80px 20px; text-align:left"><br><br>
                        <a>Property ID: <?php echo $row["pro_ID"] ?></a> <br>
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
                                }
                            }
                        } else {
                            echo "Sory this property may be deleted";
                        }
                ?>

                    </div>
                    <div class="ft-modal-footer">
                    <?php  if($user=="empl"){?>
                        <a class="ft-modal-close" href="latenotice.php">&#10006;</a>
                    <?php }else{
                        if($user=="empp"){?>
                           <a class="ft-modal-close" href="paiedReport.php">&#10006;</a>
                        <?php }else{
                            if($user=="cbel"){?>
                           <a class="ft-modal-close" href="coomitionBell.php">&#10006;</a>
                        <?php }else{
                            if($user=="sbel"){?>
                           <a class="ft-modal-close" href="mybells.php">&#10006;</a>
                        <?php }else{?>
                       
                        <a class="ft-modal-close" href="bayerrequest.php">&#10006;</a>
                        <?php }}}}?>
                    </div>
                </div>
            </div>


        </article>
    </section>

</body>

</html>