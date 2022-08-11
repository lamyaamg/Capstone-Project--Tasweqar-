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
    <link rel="stylesheet" href="barstyle.css">
    <link rel="stylesheet" href="indexStyle.css">
    <style>
         a{
            font-size: 14px;
        }
        
   .image-galler a:hover img {
        display: block;
        width:250px;
    }
    </style>
    
</head>

<body style="  background-image: url('Webbuble.png');position:absolute;
  background-repeat:repeat;background-size:cover">
    <!-- start header -------------------------->
    <?php include('topadmin.php');?>
    <!-- end header------------------------------>


    <?php
    require_once 'DBconect.php';
    $conn = db_connect();
    
    ?>
    <section style="flex-direction: column; padding-top:190px; width:100%">
        <article style="width: 100%;">
          <p style="color:blueviolet; padding-left:38%; margin-top:0px;font-size:50px">Home Page</p>
        </article>
        <article class="container" style="flex-wrap: wrap">

            <?php
            $query = "SELECT * FROM property join address using(pro_ID) ORDER BY Added_Date DESC ";
            $result = mysqli_query($conn, $query);
            if ($result->num_rows > 0) {
                while ($row = mysqli_fetch_assoc($result)) {
                    $imageURL = 'uploads/' . $row["pro_img"];
            ?>

                    <div class="image-galler wow fadeInUp" data-wow-delay="4s" style="margin: 15px;">
                        <div class="img" >
                            <a href="<?php echo $imageURL; ?>" data-fluidbox><img style="border-radius: 10px;"src="<?php echo $imageURL; ?>" width="250" alt="img " /> </a>
                            <br><br>
                        </div>
                        <div class="image_overlay wow fadeInUp" data-wow-delay="4s"style="z-index:-2;">
                        <a style="color:coral;font-size:20px;font-variant:small-caps"> for <?php echo $row["pro_type"] ?></a> <br>
                        <a>ID:</a><a ><?php echo $row["pro_ID"] ?></a><br>
                        <a>Category:</a><a><?php echo $row["pro_category"] ?></a><br>
                        <a>Location:</a><a> <?php echo $row["city"]?></a> <br>
                        <a>Area:</a><a > <?php echo $row["pro_sqm"] ?> Sqm</a> <br>
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
                           
                        <?php
                            }
                            ?>
     
                            <a>Property Price:<a style="color:coral;font-weight:700;"><?php echo $row["pro_price"] ?> SAR</a><br>
                            <a>Added Date:<?php echo $row["Added_Date"] ?></a><br><br>
                        </div>

                    </div>



                <?php
                }
            } else {
                ?>
                <div class="col-md-4 col-sm-6 col-lg-4" >
                    <p style=" padding: 10%  50%;width: 200%; margin-left:210%"> No properties found</p>
                </div>
            <?php } ?>
            

        </article>
    </section>


</body>

</html>