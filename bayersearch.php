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
    ?>
    <section style="flex-direction: column; padding-top:190px;">
        <article>
            <form class="sel" method="POST" action="bayersearch.php" style="margin:3% 18% ;">
            <select class="input" name="sr" style="width: 350px;">
                 
                    <option value ="rent">rent</option>
                    <option value="sale">sale</option>
                  
                </select>

                <select class="input" name="type" style="width: 350px;">
                    <option value="HOUSE">HOUSE</option>
                    <option value="LAND">LAND</option>
                    <option value="APARTMENT">APARTMENT</option>
                    <option value="VILLA">VILLA</option>
                </select>
              
                <input class="input" name="size" placeholder="size" type="number"  style="width: 150px;">
                <input class="input" name="room" placeholder="rooms" type="number"  style="width: 150px;">
                <input class="input" name="price"placeholder="price" type="number" style="width: 150px;">
                <Label class="input" style="margin-right:-35px;margin-top:10px;">Sort by</Label>
                <select class="input" name="filter" style="width: 350px;">
                    <option value="pro_price">price</option>
                    <option value="pro_sqm">size</option>
                </select>
                <button class="btn" name="search" id="search" style="width: 250px;"> Search</button>
 
            </form>
        </article>
        <article id="q"style="display: flex; justify-content: center;flex-direction: row;align-content: center; flex-wrap: wrap; margin-left: 200px;">

            <?php
             if((filter_input(INPUT_POST, 'sr')) ||(filter_input(INPUT_POST, 'location'))||(filter_input(INPUT_POST, 'type'))||(filter_input(INPUT_POST, 'size'))||(filter_input(INPUT_POST, 'room'))||(filter_input(INPUT_POST, 'price')))
            {
                $sr=filter_input(INPUT_POST, 'sr');
              
                $type=filter_input(INPUT_POST, 'type');
                $size=filter_input(INPUT_POST, 'size');
                $room=filter_input(INPUT_POST, 'room');
                $price=filter_input(INPUT_POST, 'price');
                $filter=filter_input(INPUT_POST, 'filter');
                if($size==null) $size=0;

                $query = "SELECT * FROM property join structure using(pro_ID)
                 where pro_status='active' and pro_type='$sr' 
                 and (rooms='$room' and pro_sqm=$size and pro_category='$type' and pro_price<='$price')
                 order by $filter ASC";
            } else{
            $query = "SELECT * FROM property join structure using(pro_ID) where pro_status='active'";
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
                        <div class="image_overlay" style="margin-left:-300px; margin-top:60px; width:300px; margin-bottom:auto;">
                            <!--<a style="color:coral;font-weight:700;"> FOR <?php echo $table ?></a> <br><br>
                            <a>Property ID:<?php echo $row["pro_ID"] ?></a> <br>
                            <a> Property Owner: <?php echo $row["OwFrist"] ?> <?php echo $row["OwLast"] ?> </a> <br>-->
                            <a style="color:coral;font-size:20px;font-variant:small-caps"> for <?php echo $row["pro_type"] ?></a> <br>
                            <a>Property ID:<?php echo $row["pro_ID"] ?></a> <br>
                            <a>Property area:<?php echo $row["pro_sqm"] ?></a> <br>
                            <a>Property Price:<?php echo $row["pro_price"] ?> SAR</a><br>
                            <a>Number of rooms:<?php echo $row["rooms"] ?></a> <br>
                            <a>Category:<?php echo $row["pro_category"] ?></a><br>
                            <?php
                                $pro_ID = $row["pro_ID"];
                                $querys = "SELECT * FROM address WHERE pro_ID =$pro_ID  limit 1 ";
                                $results = mysqli_query($conn, $querys);
                                if ($results->num_rows > 0) {
                                    $rows = mysqli_fetch_assoc($results);

                                ?>
                                      <a>City:<?php echo $rows["city"] ?></a><br>
                                <?php
                                } else { ?>
                                    <br><br>
                                <?php
                                }
                                ?>
                          
                            <a>Added Date:<?php echo $row["Added_Date"] ?></a><br>


                            <a href="viewproperty.php?propID=<?php echo $row["pro_ID"] ?>&table=<?php echo $row["pro_type"] ?>&loc=<?php echo $rows["city"] ?>&typ=<?php echo $row["pro_category"] ?>&pg=<?php echo "adv" ?>"><button class="btn"><b>view</b></button></a>


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