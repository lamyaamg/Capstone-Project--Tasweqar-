<!DOCTYPE html>
<html lang="en">

<head>
    <title>TASWEQAR</title>
    <meta name="auther" content="name" />
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="this is my frist weab bage" />
    <meta name="keywords" content="page,web" />
     <!-- Animate CSS-->
     <link rel="stylesheet" href="css/animate.css">
    <link rel="stylesheet" href="indexStyle.css">
</head>

<body style="background-image: url('Web 1920 – 1.png');position:relative;
  background-repeat: no-repeat; 
  background-size: cover;">
    <!-- start header -------------------------->
    <header>
        <div class="container">
            <!-- -------------logo -->
            <a href="#" class="logo">
                <img src="img/logo.png" alt="logo" />
            </a>

            <!-----------------menue-->
            <nav>

                <ul class="menu">
                    <li><a href="index.php" onclick="blog()">HOME</a></li>
                    <li><a class="active" href="homeSearch.php?table=<?php echo "all"?>&typ=<?php echo "PROPERTY TYPE"?>&loc=<?php echo "LOCATION"?>">SALES&nbsp;&nbsp; AND &nbsp;&nbsp;RENTS </a></li>
                    <li><a href="HowitWork.php">HOW IT WORKS</a></li>
                    <li><a href="Abutus.php">ABOUT US</a></li>
                    <li><a href="formlogin.php" class="btn-link" >LOGIN</a></li>
                    <li><a href="Signup.php" class="btn-link" >SIGNUP</a></li>
                </ul>
            </nav>
            <div class="log" >

                <button style="position: fixed; margin-top: 40%; margin-right:-5%;width:130px;height:120px;padding:5px">Sign up to see more details and to be able to buy your happy place</button></a>


            </div>

        </div>

    </header>
    <!-- end header------------------------------>


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
            <form class="sel" method="POST" action="homeSearch.php" style="margin:3% 25% ;width:fit-content">
                <select class="input" name="location" ><?php echo $location ?>
                  
                    <option>LOCATION</option>
                    <option>RIYADH</option>
                    <option>JUBAIL</option>
                    <option>JEDDAH</option>
                    <option>MAKKAH</option>
                </select>
                <select class="input" name="type"><?php echo $type ?>
              
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
        <article class="container" style="margin-left: 110px;">

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

                    $query = "SELECT * FROM property join address using(pro_ID) where pro_status='active' order by Added_Date DESC ";
                
                else 

                $query = "SELECT*FROM property join address using(pro_ID) WHERE pro_status='active' and pro_category='$typ' and city='$loc' order by Added_Date DESC";
                

            }else{
                if (($typ == "PROPERTY TYPE") || ($loc == "LOCATION")) {

                $query = "SELECT * FROM property join address using(pro_ID) where pro_type='$table' and pro_status='active' order by Added_Date DESC";
            } else {

                $query = "SELECT*FROM property join address using(pro_ID) WHERE pro_type='$table' and pro_status='active' and pro_category='$typ' and city='$loc'order by Added_Date DESC";
            }
        }

            $result = mysqli_query($conn, $query);
            if ($result->num_rows > 0) {
                while ($row = mysqli_fetch_assoc($result)) {
                    $imageURL = 'uploads/' . $row["pro_img"];
            ?>

                    <div class="image-gallery wow fadeInUp" data-wow-delay="4s" style="margin: 15px;">
                        <div class="img">
                            <a href="<?php echo $imageURL; ?>" data-fluidbox><img src="<?php echo $imageURL; ?>" width="300" alt="img " /> </a>
                            <br><br>
                        </div>
                        <div class="image_overlay">
                        <a style="color:coral;font-size:20px;font-variant:small-caps"> for <?php echo $row["pro_type"]?></a> <br>
                        <a>ID:</a><a class="p"><?php echo $row["pro_ID"] ?></a><br>
                        <a>Category:</a><a class="p"><?php echo $row["pro_category"] ?></a><br>
                        <a>Location:</a><a class="p"> <?php echo $row["city"]?></a> <br>
                        <a>Area:</a><a class="p"> <?php echo $row["pro_sqm"] ?></a> <br>
                        <?php
                        $pro_ID= $row["pro_ID"];
                            $querys = "SELECT * FROM structure WHERE pro_ID =$pro_ID  limit 1 ";
                            $results = mysqli_query($conn, $querys);
                            if ($results->num_rows > 0) {
                            $rows = mysqli_fetch_assoc($results);
                            
                            ?>
                        
                        <a class="p"> floor:<?php echo $rows["floor"] ?> rooms :<?php echo $rows["rooms"] ?> <br>
                        <?php 
                            }else{?>
                            <br>
                        <?php
                            }
                            ?>
     
                            <a>Property Price:<a style="color:coral;font-weight:700;"><?php echo $row["pro_price"] ?> SAR</a><br>
                            <a>Added Date:<?php echo $row["Added_Date"] ?></a><br>
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


</body>

</html>