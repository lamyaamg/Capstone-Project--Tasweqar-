<!DOCTYPE html>
<html lang="en">

<head>
    <title>TASWEQAR</title>
    <meta name="auther" content="name" />
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="this is my frist weab bage" />
    <meta name="keywords" content="page,web" />
    <link rel="stylesheet" href="indexStyle.css">
    <link rel="stylesheet" href="barstyle.css">
    <style>
    
    </style>
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

    <?php
    require_once 'DBconect.php';
    $conn = db_connect();
    $location = filter_input(INPUT_POST, 'location');
    $type = filter_input(INPUT_POST, 'type');
    $sel = filter_input(INPUT_POST, 'sel');

    if (($type == null) || ($location == null)) {
        $location = "LOCATION";
        $type = "PROPERTY TYPE";
    }

    ?>
    <section style="flex-direction: column; padding-top:190px;">
        <article>
            <form class="sel" method="POST" action="bayerview.php#." style="margin:3% 18% ;">
                <select class="input" name="location">
                
                    <option>LOCATION</option>
                    <option>RIYADH</option>
                    <option>JEDDAH</option>
                    <option>MAKKAH</option>
                    <option>JUBAIL</option>
                </select>
                <select class="input" name="type">
           
                    <option>PROPERTY TYPE</option>
                    <option>HOUSE</option>
                    <option>LAND</option>
                    <option>APARTMENT</option>
                    <option>VILLA</option>
                </select>
                <button class="btn" name="sel" value="rent"> rent</button>
                <button class="btn" name="sel" value="sale"> sale</button>
            </form>
        </article>
        <article style="display: flex; justify-content: center;flex-direction: row;align-content: center; flex-wrap: wrap; margin-left: 200px;">

            <?php

            $loc = filter_input(INPUT_POST, 'location');
            $typ = filter_input(INPUT_POST, 'type');
            if ($sel != null) {
                $table = $sel;
            } else {
                $loc = $_GET['loc'];
                $typ = $_GET['typ'];
                $table = $_GET['table'];
            }

            if ($table=='all'){
                if (($typ == "PROPERTY TYPE") || ($loc == "LOCATION"))

                    $query = "SELECT * FROM property join address using(pro_ID) where pro_status='active' order by Added_Date DESC";
                
                else 

                $query = "SELECT*FROM property join address using(pro_ID) WHERE pro_status='active' and pro_category='$typ' and city='$loc'  order by Added_Date DESC";
                

            }else{
                if (($typ == "PROPERTY TYPE") || ($loc == "LOCATION")) {

                $query = "SELECT * FROM property join address using(pro_ID) where pro_type='$table' and pro_status='active'";
            } else {

                $query = "SELECT*FROM property join address using(pro_ID) WHERE pro_type='$table' and pro_status='active' and pro_category='$typ' and city='$loc'";
            }
        }

            $result = mysqli_query($conn, $query);
            if ($result->num_rows > 0) {
                while ($row = mysqli_fetch_assoc($result)) {
                    $imageURL = 'uploads/' . $row["pro_img"];
            ?>

                    <div class="image-gallery" style="width: auto; padding:10px">
                        <div class="img">
                            <a href="<?php echo $imageURL; ?>" data-fluidbox><img src="<?php echo $imageURL; ?>" width="300" height="300" alt="img " /> </a>
                            <br><br>
                        </div>
                        <div class="image_overlay" style="margin-left:-300px; margin-top:100px; width:300px; margin-bottom:auto;">
                            <!--<a style="color:coral;font-weight:700;"> FOR <?php echo $table ?></a> <br><br>
                            <a>Property ID:<?php echo $row["pro_ID"] ?></a> <br>
                            <a> Property Owner: <?php echo $row["OwFrist"] ?> <?php echo $row["OwLast"] ?> </a> <br>-->
                            <a style="color:coral;font-size:20px;font-variant:small-caps"> for <?php echo $row["pro_type"]?></a> <br>
                            <a>Property ID:<?php echo $row["pro_ID"] ?></a> <br>
                            <a>Property Price:<?php echo $row["pro_price"] ?> SAR</a><br>
                            <a>Category:<?php echo $row["pro_category"] ?></a><br>
                            <a>City:<?php echo $row["city"] ?></a><br>
                            <a>Added Date:<?php echo $row["Added_Date"] ?></a><br>


                            <a href="viewproperty.php?propID=<?php echo $row["pro_ID"] ?>&table=<?php echo $table ?>&loc=<?php echo $loc ?>&typ=<?php echo $typ ?>&pg=<?php echo "ser"?>"><button class="btn"><b>view</b></button></a>


                        </div>

                    </div>



                <?php
                }
            } else {
                ?>
                <div class="col-md-4 col-sm-6 col-lg-4">
                    <p style=" padding-top: 20%;"> No properties found</p>
                </div>
            <?php } ?>

        </article>
    </section>
    <!-------------------------------view section----------------------------------------->


</body>

</html>